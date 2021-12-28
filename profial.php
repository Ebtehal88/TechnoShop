<?php
    session_start();
    if(isset($_SESSION['userinfo'])){
?>
<?php
    include('include/header.php');
    $sql = "select * from users  where User_id= :x1 ";
    $query = $connection->prepare($sql);
    $query->execute(array("x1" => $_SESSION['userinfo']['User_id']));
    if ($query->rowcount() > 0) {
        $row = $query->fetch();
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
                    <div class="form-container" style="height: 500px;overflow:auto;">
                        <div class="form-btn">
                            <!-- onclick="login()" -->
                            <span >Profile Account</span>
                            <!-- <span onclick="register()">Register</span> -->
                            <!-- <hr id="Indicator"> -->
                        </div>
                        <form action="" id="" method="POST">
                            <input type="text" placeholder="Name" name="name" value="<?php if (isset($row['User_id'])) {echo $row['User_name'];} ?>" required>
                            <br>
                            <?php
                            if (isset($_POST['createaccount'])) {
                            $name = trim($_POST['name']);
                            if (is_numeric($name)) {
                            $error['name'] = "<h4 style=\"color:red;\">Name is number!<br>Please enter just alphabet.</h4>";
                            echo $error['name'];
                            echo "<br>";}
                            }
                            ?>
                            <input type="text" placeholder="Email" name="email" value=<?php if (isset($row['Eamil'])) {echo $row['Eamil'];} ?> required>
                            <?php
                            if (isset($_POST['email'])) {
                            $email = $_POST['email'];
                            }
                            ?>
                            <br>
                            <input type="tel" placeholder="Phone" name="phone" value=<?php if (isset($row['Phone'])) {echo $row['Phone'];} ?> required>
                            <?php
                            if (isset($_POST['createaccount'])) {
                            $phone = $_POST['phone'];
                            if (!is_numeric($phone)) {
                            $error['phone'] = "<h4 style=\"color:red;\">Phone is string!<br>Please enter just numbers.</h4>";
                            echo $error['phone'];
                            } else {
                            if (strlen($phone) < 9) {
                            $error['phone'] = "<h4 style=\"color:red;\">Phone is smaller than 9 numbers.</h4>";
                            echo $error['phone'];
                            }
                            }
                            }
                            ?>
                            <br>
                            <input type="text" placeholder="Address" name="address"  value=<?php if (isset($row['Address'])) {echo $row['Address'];} ?> required>
                            <?php
                            if (isset($_POST['createaccount'])) {
                            $address = $_POST['address'];
                            if (is_numeric($address)) {
                            $error['address'] = "<h4 style=\"color:red;\">address is number!<br>Please enter just alphabet.</h4>";
                            echo $error['address'];
                            }
                            }
                            ?>
                            <br>
                            <input type="password" placeholder="Password" name="pass" value=<?php if (isset($row['Password'])) {echo $row['Password'];} ?> required>
                            <?php
                            if (isset($_POST['createaccount'])) {
                            $password = $_POST['pass'];
                            if (is_numeric($password)) {
                            $error['pass'] = "<h4 style=\"color:red;\">Password is number!<br>Please make mix.</h4>";
                            echo $error['pass'];
                            if (strlen($password) < 5) {
                            $error['long_pass'] = "<h4 style=\"color:red;\">Password is smaller than 5!<br>Please try again.</h4>";
                            echo $error['long_pass'];
                            }
                            }
                            }
                            ?>
                            <br>
                            <input type="submit" class="btn" name="update" value="Update Account"></input>
                            <br>
                            <!-- <a href="">Forgot password</a> -->
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
    <?php
    if (isset($_POST['update'])) {
        if (empty($error)) {
            $sql = "update users set User_name=:x1, Address=:x2, Phone=:x3, Eamil=:x4, Password=:x5 , Role_id = 2 where User_id =:x6";
            $query = $connection->prepare($sql);
            $query->execute(array("x1" =>$_POST['name'],"x2" =>$_POST['address'], "x3" =>$_POST['phone'], "x4" =>$_POST['email'], "x5" =>password_hash( $_POST['pass'] ,PASSWORD_DEFAULT), "x6" =>$_SESSION['userinfo']['User_id']));
            if ($query->rowcount() > 0) {
            echo "updated succfully";
            // header("LOCATION:index.php");
            } else {
            echo "no row updated";
            }
        }
    }      
    ?>
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
<?php 
}{
    header("LOCATION:index.php");
}
?>