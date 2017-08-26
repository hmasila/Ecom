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
			<a href='index.php'><img src="images/picture3.jpg" id="logo" style='border-radius: 10px;'></a>
			<div class="menubar">
				<ul id="menu">
				
					<li><a href="index.php">Home</a></li>
					<li><a href="allprods.php">Products</a></li>
					
					<li><a href="login.php">Login</a></li>
					<li><a href="cart.php">Cart</a></li>
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
		for($i=0;$i<6;$i++)
		{
		if($i==0){$prod_cat="`electronics`";} if($i==1){$prod_cat="`clothes`";} if($i==2){$prod_cat='`food stuffs`';} if($i==3){$prod_cat='`stationery`';}
		if($i==4){$prod_cat='`furniture`';} if($i==5){$prod_cat='`toiletries`';}
		$get_prod= "select * from $prod_cat";
		$run_prod= mysqli_query($con, $get_prod);
		$count=mysqli_num_rows($run_prod);
		
		while($row_prod=mysqli_fetch_array($run_prod))
		{
		$prod_brand=$row_prod['product_brand'];
		$prod_type=$row_prod['product_type'];
		$prod_id=$row_prod['product_id'];
		$prod_desc=$row_prod['product_description'];
		$prod_price=$row_prod['price'];
		$prod_image=$row_prod['image'];
	
		echo "<div id='one_product'>
		<h3>".$prod_brand."</h3>

		<img src='Admin_area/Product_images/$prod_image' width='180px' height='180px' alt='No Image'>
		<p><b>Khs. $prod_price</b></p>
		<a href='details.php?prod_id=$prod_id && prod_cat=$prod_cat 'style='float:left'>Details</a>
		<a href='index.php?addToCart=$prod_id && prod_cat=$prod_cat '><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	
	?>			
				</div>
			
			
			</div>
		</div>
		

<div id="footer" style="background-color:#b0b0b0;clear:both;
font-family:Freestyle Script;color:#030303;font-size:15px;text-align:center"><i><b>
&copy Copyright quick service supermarket (K) Ltd 2015 All Rights Reserved</i></b></div>

</body>		
</html>