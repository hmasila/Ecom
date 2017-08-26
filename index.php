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
			<a href='index.php'><img src="images/Picture3.jpg" id="logo" style='border-radius: 10px;'></a>
			<div class="menubar">
				<ul id="menu">
				
					<li><a href="index.php">Home</a></li>
					<li><a href="allprods.php">Products</a></li>
					
					<li><a href="login.php" id="loginLink">Login</a></li>
					<li><a href="register.php">Sign up</a></li>
					
					<li><a href="contact.html">Contact us</a></li>
				
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
			<?php cart(); ?>
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
				electsBrand();
				clothesBrand();
				foodBrand();
				stationBrand();
				funtrBrand();
				toiletBrand();
				getProduct();
				getCategory();
				?>
				
				</div>
			
			
			</div>
		</div>
		

<div id="footer" style="background-color:#b0b0b0;clear:both;
font-family:Freestyle Script;color:#030303;font-size:15px;text-align:center"><i><b>
&copy Copyright quick service supermarket (K) Ltd 2015 All Rights Reserved</i></b></div>

</body>		
</html>