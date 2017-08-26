<!DOCTYPE html>
<?php 
include 'functions/functions1.php';
include 'config.php';
session_start();

//$_SESSION['qntty']=1;
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
					
					<li><a href="register.php">Sign up</a></li>
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
			<?php cart(); ?>
			<div id='cart'>
				<span style='float:right;font-size:20px; padding:5px; line-height:40px;'>
				Welcome our esteemed customer!
				<b style='color:#666633'>Your Cart:</b>
				All items:<b><?php itemsInCart()  ?> </b>Total price:<b><?php totalPrice() ?></b>
				
				</span>
			</div>
			
			
				
				<form action ='' method='post' enctype='multipart/form-data'>
				<table align='center' width='750px' bgcolor='#efefef'>
					<tr align='center'>
					<td colspan='5'><h2><u>Your shopping cart</u></h2></td></tr>
					
					<tr>
					<th style="font-family:'freestyle script';font-size: 20px;">Click the button to Remove</th><th>Item(s)</th><th>Quantity</th><th>Total Price</th>
					</tr>
					
					<?php
				$totalPrice=0;
				global $con;
				$ip=getIp();
				$proInCart= "select * from cart where ip_add= '$ip'";
				$run_proInCart=mysqli_query($con,$proInCart);
				while($pro_selctd=mysqli_fetch_array($run_proInCart))
				{
					$pro_id=$pro_selctd['pro_id'];
					$pro_cat=$pro_selctd['prod_cat'];
					$prod_= "select * from $pro_cat where product_id = '$pro_id'";
					$run_prod_=mysqli_query($con,$prod_);
					
					while($product=mysqli_fetch_array($run_prod_)){
					$total_products_price=array($product['price']);
					$value=array_sum($total_products_price);
					$totalPrice+=$value;
					$product_brand=$product['product_brand'];
					$product_image=$product['image'];
					$product_price=$product['price'];
				
			?>				
				<tr align='center'>
				<td><button name ='remove'><a href='cart.php?rem_cat=<?php echo $pro_cat ?> && rem_id= <?php echo $pro_id ?>' style='text-decoration:none; color:black;'>Remove</a></button></td>
				<td><?php echo $product_brand; ?><br>
				<img src='admin_area/product_images/<?php echo $product_image ?>' width='60px' height='60px'>
				</td>
				<td><input type='text' size='3' name='qntty' value='<?php echo $_SESSION['qntty']; ?>' ></td>
				
				<?php
				if(isset($_POST['update']))
				{
				$qnty=$_POST['qntty'];
				$update="update cart set qty=$qnty";
				$runqnty=mysqli_query($con, $update);
				$_SESSION['qntty']=$qnty;
				$totalPrice=$totalPrice*$qnty;
				
				}	
				
				
				?>
				<td><?php  echo "Ksh. ".$product_price ?></td>

				</tr>
		<?php
			}
		}
		?>				
				<tr><td></td><td></td><td><b>Sub-Total Price</b></td><td><b><?php echo "Ksh. ".$totalPrice; ?></b></td></tr>
				<tr align='center'>
				<td colspan='2'><input type='submit' name='update' value='Update'></td>
				<td><input type='submit' name='continue' value='Continue Shopping'></td>
				<td><button><a href='checkout.php' style='text-decoration:none; color:black;'>Pay</a></button></td><td><b></b></td>
				</tr>
				</table>
			</form>
				<?php 
					if(isset($_GET['rem_cat']))
					{
					$pro_id = $_GET['rem_id'];
					$pro_cat = $_GET['rem_cat'];
					$remove= "DELETE FROM cart where pro_id=$pro_id AND prod_cat='$pro_cat'";
					$run_remove=mysqli_query($con,$remove);
					if($run_remove)
						{				
						echo "<script>window.open('cart.php','_self')</script>";
						
						}
						else
						{
					
						echo "".mysqli_error($con);
						}
					
					
					}
					if(isset($_POST['continue']))
					{
					echo "<script>window.open('index.php','_self')</script>";
					}
				
				?>
			
	
			</div>
		</div>
		

<div id="footer" style="background-color:#b0b0b0;clear:both;
font-family:Freestyle Script;color:#030303;font-size:15px;text-align:center"><i><b>
&copy Copyright quick service supermarket (K) Ltd 2015 All Rights Reserved</i></b></div>
	
	</div>
</body>		
</html>