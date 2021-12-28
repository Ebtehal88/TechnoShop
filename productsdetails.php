<?php
    session_start();
    if(isset($_SESSION['userinfo'])){
?>
<?php
    include('include/header.php');
?>
    </div>
    <!--------------------  single product details ---------------->
    <div class="small-container single-product">
        <div class="row">
        <?php
			if(isset($_GET['p_id']))
			{
			    $query="select * from product where pro_id=:pid ";
				$stm=$connection->prepare($query);
				$stm->execute(array('pid'=>$_GET['p_id']));
				if($stm->rowCount())
				{
					foreach($stm->fetchAll() as $row)
					{
                        $id=$row['pro_id'];
						$name=$row['pro_name'];
                        $e_name=$row['E_pro_name'];
                        $image1=$row['image1'];
                        $image2=$row['image2'];
                        $image3=$row['image3'];
                        $image4=$row['image4'];
						$price=$row['pro_cost'];
                        $cat_id=$row['Category_id'];		
		?>
        <div class="col-2">
                <img src="images/<?php echo $image1;?>" width="100%" id="productImg">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="img/<?php echo $image2;?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $image3;?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $image4;?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="img/<?php echo $image3;?>" width="100%" class="small-img">
                    </div>
                </div>
        </div>
        <div class="col-2">
                
                <h1>
                    <?php echo $name; ?>
                </h1>
                <h4>
                    $<?php echo $price;?>.00
                </h4>
                
                <!-- <select name="product_size" id="">
                    <option value="">Select Size</option>
                    <option value="">XXL</option>
                    <option value="">XL</option>
                    <option value="">Large</option>
                    <option value="">Medium</option>
                    <option value="">Small</option>
                </select>
                <input type="number" value="1" name="product_qty"> -->

                <a class="btn" href="?p_id=<?php echo $_GET['p_id'] 
                                ?>&c_id=<?php echo $cat_id
								?>&p_name=<?php echo $name
								?>&p_name_e=<?php echo $e_name
								?>&p_image=<?php echo $image1
								?>&p_cost=<?php echo $price
								?>">
                    Add To Cart
                </a>
                
                <!-- <h3>Product Details</h3>
                <br>
                <p>
                    <?php echo $des;?>
                </p> -->
            </div>
        <?php
					}
				}
            } 
		?>
        
        </div>
        
    </div>
    <!-------------------- title ------------------------>
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="products.php"><p>View More</p></a>
        </div>
    </div>
    <!-------------------- products --------------------->
    <div class="small-container">
        <div class="row">

            <div class="col-4">
                <img src="images/product-9.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-11.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-12.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
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
    <script>
        var productImg = document.getElementById("productImg");
        var smallImg = document.getElementsByClassName("small-img");
        smallImg[0].onclick = function () {
            productImg.src = smallImg[0].src;
        }
        smallImg[1].onclick = function () {
            productImg.src = smallImg[1].src;
        }
        smallImg[2].onclick = function () {
            productImg.src = smallImg[2].src;
        }
        smallImg[3].onclick = function () {
            productImg.src = smallImg[3].src;
        }
    </script>
    <?php
    // echo $_SESSION['userinfo']['User_id'];
	if (isset($_GET['p_id'] , $_GET['c_id']) )
    {
        $sql = "insert into temp_order (pro_id, user_id,Category_id, image, name, E_name, cost) VALUES  (?,?,?,?,?,?,?) ";
        $stm = $connection->prepare($sql);
        $stm->execute(array($_GET['p_id'],$_SESSION['userinfo']['User_id'],$_GET['c_id'],$_GET['p_image'],$_GET['p_name'],$_GET['p_name_e'],$_GET['p_cost']));
    }
	?>
</body>

</html>
<?php
}
?>