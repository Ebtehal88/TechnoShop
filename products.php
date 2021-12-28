<?php
    session_start();
    if(isset($_SESSION['userinfo'])){
?>
<?php
    include('include/header.php');
?>
    </div>
    <!--------------------  featured products --------------------->
    <div class="small-container">
        
        <div class="row">

        <?php 
			$query="select * from product where Active=1";
			$stm=$connection->prepare($query);
			$stm->execute();
			if($stm->rowCount())
			{
				foreach($stm->fetchAll() as $row)
				{
					$id=$row['pro_id'];
					$name=$row['pro_name'];
					$image=$row['image1'];
                    $price=$row['pro_cost'];
		?>
            <div class="col-4">
                <a href="productsdetails.php?p_id=<?php echo $id ?>"><img src="img/<?php echo $image;?>"></a>
                <h4><?php echo $name; ?></h4>
                <p>$<?php echo $price;?></p>
            </div>
            <?php	
				}
			}
		   ?>
            
        </div>
        
    </div>
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
</body>
</html>
<?php
}else{
    header("LOCATION:index.php");
}
?>