<?php
require 'config.php';

function getElects()
{
 global $con;
 $get_elects= "select distinct product_type from electronics";
 $run_elects= mysqli_query($con, $get_elects);
 
 while($row_elects=mysqli_fetch_array($run_elects))
 {
	//$elects_id= $row_elects['product_id'];
	$elects_type=$row_elects['product_type'];
	
	
	echo "<li><a href='index.php?prod_cat=`electronics` && product_type=$elects_type'><span>".$elects_type."</span></a></li>"; 

}
}

function getClothes()
{
 global $con;
 $get_clothes= "select distinct product_type from clothes";
 $run_clothes= mysqli_query($con, $get_clothes);
 
 while($row_clothes=mysqli_fetch_array($run_clothes))
 {
	//$clothes_id= $row_clothes['product_id'];
	$clothes_type=$row_clothes['product_type'];
	echo "<li><a href='index.php?prod_cat=`clothes` && product_type=$clothes_type'><span>".$clothes_type."</span></a></li>"; 
}
}

function getFood()
{
 global $con;
 $get_food= "select distinct product_type from `food stuffs`";
 $run_food= mysqli_query($con, $get_food);
 
 while($row_food=mysqli_fetch_array($run_food))
 {
	//$clothes_id= $row_clothes['product_id'];
	$food_type=$row_food['product_type'];
	
	
	echo "<li><a href='index.php?prod_cat=`food stuffs` && product_type=$food_type'><span>".$food_type."</span></a></li>"; 

}
}

function getStation()
{
 global $con;
 $get_station= "select distinct product_type from stationery";
 $run_station= mysqli_query($con, $get_station);
 
 while($row_station=mysqli_fetch_array($run_station))
 {
	//$clothes_id= $row_clothes['product_id'];
	$station_type=$row_station['product_type'];
	
	
	echo "<li><a href='index.php?prod_cat=`stationery` && product_type=$station_type'><span>".$station_type."</span></a></li>"; 

}
}
function getFuntr()
{
 global $con;
 $get_funtr= "select distinct product_type from furniture";
 $run_funtr= mysqli_query($con, $get_funtr);
 
 while($row_funtr=mysqli_fetch_array($run_funtr))
 {
	//$clothes_id= $row_clothes['product_id'];
	$funtr_type=$row_funtr['product_type'];
	
	
	echo "<li><a href='index.php?prod_cat=`furniture` && product_type=$funtr_type'><span>".$funtr_type."</span></a></li>"; 

}
}
function getToilet()
{
 global $con;
 $get_toilet= "select distinct product_type from toiletries";
 $run_toilet= mysqli_query($con, $get_toilet);
 
 while($row_toilet=mysqli_fetch_array($run_toilet))
 {
	//$clothes_id= $row_clothes['product_id'];
	$toilet_type=$row_toilet['product_type'];
	
	
	echo "<li><a href='index.php?prod_cat=`toiletries` && product_type=$toilet_type'><span>".$toilet_type."</span></a></li>"; 

}
}
//selecting brands

	function electsBrand()	
	{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
	
		global $con;
		$get_elects= "select * from electronics ORDER BY RAND() LIMIT 0,1";
		$run_elects= mysqli_query($con, $get_elects);
 try{
		while($row_elects=mysqli_fetch_array($run_elects))
		{
			$elects_brand=$row_elects['product_brand'];
			$elects_type=$row_elects['product_type'];
			$elects_id=$row_elects['product_id'];
			$elects_desc=$row_elects['product_description'];
			$elects_price=$row_elects['price'];
			$elects_image=$row_elects['image'];
			echo "<div id='one_product'>
			<h3>".$elects_brand."</h3>
			<img src='Admin_area/Product_images/$elects_image' width='180px' height='180px' alt='No Image'>
			<p><b>Khs. $elects_price</b></p>
			<a href='details.php?prod_id=$elects_id && prod_cat=`electronics`' style='float:left'>Details</a>
			<a href='index.php?addToCart=$elects_id && prod_cat=`electronics`'><button style='float:right'>Add to cart</button></a>
			</div>";  

		}
		}
		catch(Exception $e){
		echo $e->getMessage();
	}
	  }
	}}
	
function clothesBrand()
{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
	
	
	
	
		global $con;
		$get_clothes= "select * from clothes ORDER BY RAND() LIMIT 0,1";
		$run_clothes= mysqli_query($con, $get_clothes);
 
		while($row_clothes=mysqli_fetch_array($run_clothes))
			{
	
			$clothes_brand=$row_clothes['product_brand'];
			$clothes_type=$row_clothes['product_type'];
			$clothes_id=$row_clothes['product_id'];
			$clothes_desc=$row_clothes['product_description'];
			$clothes_price=$row_clothes['price'];
			$clothes_image=$row_clothes['image'];
			echo "<div id='one_product'>
			<h3>".$clothes_brand."</h3>
			<img src='Admin_area/Product_images/$clothes_image' width='180px' height='180px' alt='No Image'>
			<p><b>Khs. $clothes_price</b></p>
			<a href='details.php?prod_id=$clothes_id && prod_cat=`clothes` 'style='float:left'>Details</a>
			<a href='index.php?addToCart=$clothes_id && prod_cat=`clothes` '><button style='float:right'>Add to cart</button></a>
			</div>"; 
			}
		}
	}
}	
function foodBrand()
{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
		global $con;
		$get_food= "select * from `food stuffs` ORDER BY RAND() LIMIT 0,1";
		$run_food= mysqli_query($con, $get_food);
 
		while($row_food=mysqli_fetch_array($run_food))
			{
			$food_brand=$row_food['product_brand'];
			$food_type=$row_food['product_type'];
			$food_id=$row_food['product_id'];
			$food_desc=$row_food['product_description'];
			$food_price=$row_food['price'];
			$food_image=$row_food['image'];
			echo "<div id='one_product'>
			<h3>".$food_brand."</h3>
			<img src='Admin_area/Product_images/$food_image' width='180px' height='180px' alt='No Image'>
			<p><b>Khs. $food_price</b></p>
			<a href='details.php?prod_id=$food_id && prod_cat=`food stuffs` 'style='float:left'>Details</a>
			<a href='index.php?addToCart=$food_id && prod_cat=`food stuffs`'><button style='float:right'>Add to cart</button></a>
		</div>"; 

			}
		}
	}
}	
function stationBrand()
{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
		global $con;
		$get_station= "select * from stationery ORDER BY RAND() LIMIT 0,1";
		$run_station= mysqli_query($con, $get_station);
 
		while($row_station=mysqli_fetch_array($run_station))
		{
		$station_brand=$row_station['product_brand'];
		$station_type=$row_station['product_type'];
		$station_id=$row_station['product_id'];
		$station_desc=$row_station['product_description'];
		$station_price=$row_station['price'];
		$station_image=$row_station['image'];
		echo "<div id='one_product'>
		<h3>".$station_brand."<h3>
		<img src='Admin_area/Product_images/$station_image' width='180px' height='180px'alt='No Image'>
		<p><b>Khs. $station_price</b></p>
		<a href='details.php?prod_id=$station_id && prod_cat=`stationery`'style='float:left'>Details</a>
		<a href='index.php?addToCart=$station_id && prod_cat=`stationery`'><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	}
}
function funtrBrand()
{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
	
		global $con;
		$get_funtr= "select * from furniture ORDER BY RAND() LIMIT 0,1";
		$run_funtr= mysqli_query($con, $get_funtr);
 
		while($row_funtr=mysqli_fetch_array($run_funtr))
		{
		$funtr_brand=$row_funtr['product_brand'];
		$funtr_type=$row_funtr['product_type'];
		$funtr_id=$row_funtr['product_id'];
		$funtr_desc=$row_funtr['product_description'];
		$funtr_price=$row_funtr['price'];
		$funtr_image=$row_funtr['image'];
		echo "<div id='one_product'>
		<h3>".$funtr_brand."<h3>
		<img src='Admin_area/Product_images/$funtr_image' width='180px' height='180px' alt='No Image'>
		<p><b>Khs. $funtr_price</b></p>
		<a href='details.php?prod_id=$funtr_id && prod_cat=`furniture` 'style='float:left'>Details</a>
		<a href='index.php?addToCart=$funtr_id && prod_cat=`furniture` '><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	}
}

function toiletBrand()
{
	if(!isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
		global $con;
		$get_toilet= "select * from toiletries ORDER BY RAND() LIMIT 0,1";
		$run_toilet= mysqli_query($con, $get_toilet);
 
		while($row_toilet=mysqli_fetch_array($run_toilet))
		{
		$toilet_brand=$row_toilet['product_brand'];
		$toilet_type=$row_toilet['product_type'];
		$toilet_id=$row_toilet['product_id'];
		$toilet_desc=$row_toilet['product_description'];
		$toilet_price=$row_toilet['price'];
		$toilet_image=$row_toilet['image'];
	
		echo "<div id='one_product'>
		<h3>".$toilet_brand."</h3>

		<img src='Admin_area/Product_images/$toilet_image' width='180px' height='180px' alt='No Image'>
		<p><b>Khs. $toilet_price</b></p>
		<a href='details.php? prod_id=$toilet_id && prod_cat=`toiletries` 'style='float:left'>Details</a>
		<a href='index.php? addToCart=$toilet_id && prod_cat=`toiletries` '><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	}
}
function getProduct()
{
	if(isset($_GET['prod_cat'])){
		if(isset($_GET['product_type']))
		{
		$prod_cat=$_GET['prod_cat'];
		$prod_type=$_GET['product_type'];
		global $con;
		$get_prod= "select * from $prod_cat where product_type = '$prod_type'";
		$run_prod= mysqli_query($con, $get_prod);
		$count=mysqli_num_rows($run_prod);
		if($count<1)
		{
			echo "No products in this category";
		}
 
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
		<a href='details.php? prod_id=$prod_id && prod_cat=$prod_cat 'style='float:left'>Details</a>
		<a href='index.php? addToCart=$prod_id && prod_cat=$prod_cat '><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	}
}
function getCategory()
{
	if(isset($_GET['prod_cat'])){
		if(!isset($_GET['product_type']))
		{
		$prod_cat=$_GET['prod_cat'];
		//$prod_type=$_GET['product_type'];
		global $con;
		$get_prod= "select * from $prod_cat";
		$run_prod= mysqli_query($con, $get_prod);
		$count=mysqli_num_rows($run_prod);
		if($count<1)
		{
			echo "Sorry.<br>No products in this category.<br> Try again later.";
			
		}
 
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
		<a href='details.php? prod_id=$prod_id && prod_cat=$prod_cat 'style='float:left'>Details</a>
		<a href='index.php? addToCart=$prod_id && prod_cat=$prod_cat '><button style='float:right'>Add to cart</button></a>
		</div>"; 
		}
		}	
	}
}
function getIp() 
{
		$ip = $_SERVER['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} else
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
 
    return $ip;
}



function cart()
{
if(isset($_GET['addToCart']))
{
	global $con;
	$ip=getIP();
	$prod_id=$_GET['addToCart'];
	$prod_cat=$_GET['prod_cat'];
	$confrm_prod="select * from cart where ip_add='$ip' AND prod_cat='$prod_cat' AND pro_id='$prod_id'";
	$run_conf=mysqli_query($con,$confrm_prod);
	if(mysqli_num_rows($run_conf)>0)
	{
		echo "";
	}
	else
	{
		$insertToCart="insert into cart(pro_id,prod_cat,ip_add) values ('$prod_id','$prod_cat','$ip')";
		$runInsert=mysqli_query($con,$insertToCart);
		echo "<script>window.open('index.php','_self')</script>";
		
	}
}
}
//total added items
function itemsInCart()
{
	global $con;
	$ip = getIp();
	$getItems="select * from cart where ip_add='$ip'";
	$run_items=mysqli_query($con,$getItems);
	$count_items=mysqli_num_rows($run_items);
	
	echo $count_items;
}

//total price of items in the cart
function totalPrice()
{
$total=0;
global $con;
$ip=getIp();
$sellingPrice= "select * from cart where ip_add= '$ip'";
$run_price=mysqli_query($con,$sellingPrice);
while($pro_price=mysqli_fetch_array($run_price))
{
	$pro_id=$pro_price['pro_id'];
	$pro_cat=$pro_price['prod_cat'];
	$prod_price= "select * from $pro_cat where product_id = '$pro_id'";
	$run_prod_price=mysqli_query($con,$prod_price );
	while($pr_price=mysqli_fetch_array($run_prod_price)){
		$product_price=array($pr_price['price']);
		$value=array_sum($product_price);
		$total+=$value;
	}

}
echo "Ksh ".$total;
}
?>
