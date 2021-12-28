<?php
    session_start();
?>
<?php
    include('include/header.php');
?>
            <div class="row ">
                <div class="col-2">
                    <h1>Give Your Workout<br> A New Style!</h1>
                    <p>
                        Success isn't always about greatnees.It's about consistency. Consistent hard work gains success.
                        Greatness will com.
                    </p>
                    <?php if(isset($_SESSION['userinfo'])){ ?>
                        <a href="products.php" class="btn">Explore Now &#8594;</a>  
                    <?php
                        }else{
                    ?>
                            <a href="account.php" class="btn">Explore Now &#8594;</a>
                    <?php
                            }
                    ?>
                    
                </div>
                <div class="col-2">
                    <img src="images/image1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--------------------  featured categories --------------------->
    <div class="small-container">
        <div class="categories">
            <div class="row">
                <div class="col-3">
                    <img src="images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg">
                </div>
            </div>
        </div>
    </div>
    <!--------------------  featured products --------------------->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/product-1.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-2.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-3.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-4.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
        </div>
        <h2 class="title">Latest Products1</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/product-5.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-6.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-7.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-8.jpg">
                <h4>Red Printed T-shirt</h4>
                <p>$50.00</p>
            </div>
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
    <!----------------------- offer ----------------------->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>
                        Exclusively Available on RedStore
                    </p>
                    <h1>Smart Band 4</h1>
                    <small>
                        The Mi Smart Band 4 features a 39.9% larger (than Mi Band 3) AMOLED color full-touch display
                        with adjustable brightness, so everything is clear as can be .
                    </small>
                    <?php if(isset($_SESSION['userinfo'])){ ?>
                        <a href="products.php" class="btn">Buy Now &#8594;</a>  
                    <?php
                        }else{
                    ?>
                            <a href="account.php" class="btn">Buy Now &#8594;</a>
                    <?php
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!------------------------- brands ---------------------------->
    <div class="brands">
        <div class="small-container">
            <div class="row">
            <?php
                $query="select * from category";
				$stm=$connection->prepare($query);
				$stm->execute();
					if($stm->rowCount())
					{
						foreach($stm->fetchAll() as $row)
							{
								$id=$row['Category_id'];
                                $name=$row['Category_name'];
                                $image=$row['image'];
            ?>
                <div class="col-5">
                    <img src="images/<?php echo $image;?>">
                </div>
                <?php
							}
					}
		        ?>
            </div>
        </div>
    </div>
    <?php
    include('include/footer.php');
    ?>
    