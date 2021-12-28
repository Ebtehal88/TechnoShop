<?php
    session_start();
?>
<?php
    include('include/header.php');
?>
<?php
// require('admin/dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["LoginForm"])) {

        if (isset($_POST["namel"])&&!empty($_POST["namel"])) {
            $name = trim($_POST["namel"]);
            if (is_numeric($name)){
                $error['name'] = "<h5 style='color:red '><b>Email is number!<br>Please enter Email</b></h5>";
            }
        } else {
            $error['Writename'] = "<h5 style='color:red '><b> Enter your Email</b></h5>";
        }

        if (isset($_POST['passl'])&&!empty($_POST["passl"])) {
            $password = trim($_POST['passl']);
            if (is_numeric($password)) {
                $error['pass'] = "<h5 style='color:red '><b>Password is number!<br>Please make mix</b></h5>";
            } elseif (strlen($password) < 5) {
                $error['long_pass'] = "<h5 style='color:red '><b>Password is smaller than 5!<br>Please try again</b></h5>";
            }
        } else {
            $error['Writepass'] = "<h5 style='color:red '><b>Enter your password</b></h5>";
        }
    
        if (empty($error)) {
            $query = "select * from users where Eamil=:U_name";
            $stm = $connection->prepare($query);
            $stm->execute(array('U_name' => $name));
            if ($stm->rowCount()==1) {
                $_SESSION['userinfo']=$stm->fetch();
                // echo $_SESSION['userinfo']['User_id'];
                // echo $password;
                // echo $_SESSION['userinfo']['Password'];
                // echo password_verify( $password ,$_SESSION['userinfo']['Password']);
                if(password_verify( $password ,$_SESSION['userinfo']['Password'])){
                    if($_SESSION['userinfo']['Role_id']==1){
                        header('location:index.php');
                    }else{
                        header('location:index.php');
                    }
                }
            }
            else{
                ?>
                    <script>
                        alert("your Email or password is not correct.")
                    </script>
                <?php
            }
        }
    }
}
           
?>

    </div>
    <!-------------------- account page ----------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <!-- onclick="login()" -->
                            <span >Login</span>
                            <!-- <span onclick="register()">Register</span> -->
                            <!-- <hr id="Indicator"> -->
                        </div>
                        <form action="" id="" method="POST">
                            <input type="text" placeholder="Email" name="namel">
                            <?php if (isset($error['Writename'])) {
                            echo ($error['Writename']);} 
                            ?>
                            <?php if (isset($error['name'])) {
                            echo ($error['name']);} 
                            ?>
                            <br>
                            <input type="password" placeholder="Password" name="passl">
                            <?php if (isset($error['pass'])) {
                            echo ($error['pass']);}
                            ?>
                            <?php if (isset($error['Writepass'])) {
                            echo ($error['Writepass']);} 
                            ?>
                            <?php if (isset($error['long_pass'])) {
                            echo ($error['long_pass']);}
                            ?>
                            <br>
                            <input type="submit" class="btn" name="LoginForm" value="Login"></input>
                            <br>
                            <a href="register.php">Create Account</a>
                        </form>
                        <!-- <form action="" id="">
                            <input type="text" placeholder="Username">
                            <br>
                            <input type="email" placeholder="Email">
                            <br>
                            <input type="password" placeholder="Password">
                            <br>
                            <button type="RegForm" class="btn">Register</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------- Footer ----------------------->
    <?php
    include('include/footer.php');
    ?>
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
    <!-- <script>
        var LoginForm =document.getElementById("LoginForm");
        var RegForm =document.getElementById("RegForm");
        var Indicator =document.getElementById("Indicator");
        function register(){
            RegForm.style.transform="translateX(0px)";
            LoginForm.style.transform="translateX(0px)";
            Indicator.style.transform="translateX(100px)"
        }
        function login(){
            RegForm.style.transform="translateX(300px)";
            LoginForm.style.transform="translateX(300px)";
            Indicator.style.transform="translateX(0px)"
        }
    </script> -->
</body>

</html>