<!DOCTYPE html>
<?php 
include 'functions/functions1.php';

?>
<html>
<head>
	<title>Quick Serve Supermaket</title>
	<link rel="stylesheet" href="styles/style.css" media="all">
	<link rel="stylesheet" href="styles/menustyle.css" media="all">
</head>
<body>
	<div class="container">
	
		<div class="header">
			<a href='index.php'><img src="images/picture3.jpg" id="logo" style='border-radius: 10px;' id="logo"></a>
			<div class="menubar">
				<ul id="menu">
				
					<li><a href="index.php">Home</a></li>
					<li><a href="allprods.php">Products</a></li>
					<li><a href="customer/cust_acc.php">My account</a></li>
					<li><a href="#">Sign up</a></li>
					<li><a href="cart.php">Cart</a></li>
					<li><a href="#">Contact us</a></li>
				
				</ul>
			<div id="form" method= "get" action="results.php" enctype= "multipart/form-data"> <!--used for video and images-->
				
			</form>
			</div>
			</div>
		</div>
		<div class="content_wrapper">
			<div id="side_bar">
				<div id="side_menu">
					<div id="catHead">categories</div>
					<ul>
						<li class='has-sub'><a href='index.php?prod_cat=`electronics`'><span>Electronics</span></a>
							<ul>
							<?php getElects(); ?> 
							</ul>
						</li>
					<li class='has-sub'><a href='index.php?prod_cat=`clothes`'><span>Clothes</span></a>
							<ul>
							 <?php getClothes(); ?>
							</ul>
					</li>
					<li class='has-sub'><a href='index.php?prod_cat=`food stuffs`'><span>Food stuffs</span></a>
						<ul>
							 <?php getFood(); ?>
						</ul>
					</li>
					<li class='has-sub'><a href='index.php?prod_cat=`stationery`'><span>Stationery</span></a>
						<ul>
							 <?php getStation(); ?>	
						</ul>
					</li>
					<li class='has-sub'><a href='index.php?prod_cat=`furniture`'><span>Furniture</span></a>
						<ul>
							<?php getFuntr(); ?>		
						</ul>
					</li>
					<li class='has-sub'><a href='index.php?prod_cat=`toiletries`'><span>Toiletries</span></a>
						<ul>
							<?php getToilet(); ?>	
						</ul>
					</li>
				
					</ul>
				
			</div>
		</div>
			<div id="content_area">
			<div id='cart'>
				<span style='float:right;font-size:20px; padding:5px; line-height:40px;'>
				Welcome our esteemed customer!
				<b style='color:#666633'>Your Cart:</b>
				All items:<b><?php itemsInCart()  ?> </b>Total price:<b><?php totalPrice() ?></b>
				<a href='cart.php'>Go to cart</a>
				</span>
			</div>
				<div id="product_box">
	<?php
	if(isset($_GET['prod_id']))
	{	
	$prod_id=$_GET['prod_id'];
	$prod_cat=$_GET['prod_cat'];
	
	global $con;
	$get_prod= "select * from $prod_cat where product_id = '$prod_id'";
	$run_prod= mysqli_query($con, $get_prod);
 
	while($row_prod=mysqli_fetch_array($run_prod))
            {
		$prod_brand=$row_prod['product_brand'];
		$prod_id=$row_prod['product_id'];
		$prod_desc=$row_prod['product_description'];
		$prod_price=$row_prod['price'];
		$prod_image=$row_prod['image'];
	
		echo "<div id='one_product'>
		<h3>".$prod_brand."</h3>
                <img src='Admin_area/Product_images/$prod_image' width='410px' height='410px' alt='No Image'>
		<p><b>Khs. $prod_price</b></p>
                <p>$prod_desc</p>  

		<a href='index.php' style='float:left'>Go back</a>
		<a href='index.php? addToCart=$prod_id && prod_cat=$prod_cat '><button style='float:right'>Add to cart</button></a>
		</div>"; 

            }
	}			
	?>
				
				</div>
			
			
			</div>
		</div>
		<div id="footer">
		&copy Quick Service Supermarket ltd 2015 <br> All rights Reserved.
		
		</div>
	
	</div>
</body>		
</html>