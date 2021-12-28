<?php
    session_start();
    if(isset($_SESSION['userinfo'])){
?>
<?php
    include('include/header.php');
?>

    </div>
    <!-------------------- cart items details ----------->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Subtotal</th>
            </tr>
            <?php
			    $query="select * from temp_order where user_id=:ui";
			    $stm=$connection->prepare($query);
				$stm->execute(array('ui'=>$_SESSION['userinfo']['User_id']));
				if($stm->rowCount())
				{
					$totle=0;
					foreach($stm->fetchAll() as $row)
					{
					$id=$row['Id'];
				    $name=$row['name'];
					$name_en=$row['E_name'];
					$cost=$row['cost'];
					$image=$row['image'];
					$id_c=$row['Category_id'];
				?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="img/<?php echo $image;?>">
                        <div>
                            <p><?php echo $name;?></p>
                            <small>Price: $<?php echo $cost;?></small>
                            <br>
                            <a href="?id=<?php echo $id ?>" >Remove</a>
                        </div>
                    </div>
                </td>
                <td>$<?php echo $cost;?>.00</td>
            </tr>
            <?php
				$totle +=$cost;
				}
			?>
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$<?php echo $totle;?>.00</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a class="btn" href="?totle=<?php echo $totle;?>
                                             &o_id=<?php echo $id;?>
                                             &o_price=<?php echo $id;?>
                                            "> 
                        PAY
                        </a>
                    </td>
                </tr>
                <!-- <tr>
                    <td>Tax</td>
                    <td>$35.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$200.00</td>
                </tr> -->
            </table>
        </div>
    </div>
    <?php
			}
		else
		{
			echo "<h3>Choose product first from product page</h3><br><br><br><br>";
		}
	?>

    <?php
        if (isset( $_GET['id'])){
            $stm = $connection->prepare("delete from temp_order where Id=:catid");
			$stm->execute(array("catid"=> $_GET['id']));
		}
		if(isset($_GET['totle']))
		{
		    $sql = "insert into orders (User_id,Order_date,price) VALUES (?,NOW(),?) ";
			$stm = $connection->prepare($sql);
			$stm->execute(array($_SESSION['userinfo']['User_id'],$_GET['totle']));
		}
    ?>

    <!-------------------- Footer ----------------------->
    
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
    <?php
    }
    ?>
    <?php
    include('include/footer.php');
    ?>
</body>

</html>
