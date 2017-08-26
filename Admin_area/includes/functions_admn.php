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
	
	
	echo "<option value='$elects_type'><span>".$elects_type."</span></option>";  

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
	echo "<option value='$clothes_type'><span>".$clothes_type."</span></option>"; 
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
	
	
	echo "<option value='$food_type'><span>".$food_type."</span></option>"; 

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
	
	
	echo "<option value='$station_type'><span>".$station_type."</span></option>"; 

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
	
	
	echo "<option value='$funtr_type'><span>".$funtr_type."</span></option>"; 

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
	
	
	echo "<option value='$toilet_type'><span>".$toilet_type."</span></option>"; 

}
}
//select brands
/*
function electsBrand()
{
 global $con;
 $get_elects= "select distinct product_brand from electronics";
 $run_elects= mysqli_query($con, $get_elects);
 
 while($row_elects=mysqli_fetch_array($run_elects))
 {
	$elects_brand=$row_elects['product_brand'];
	echo "<option value='$elects_brand'><span>".$elects_brand."</span></option>";  

}
}

function clothesBrand()
{
 global $con;
 $get_clothes= "select distinct product_brand from clothes";
 $run_clothes= mysqli_query($con, $get_clothes);
 
 while($row_clothes=mysqli_fetch_array($run_clothes))
 {
	//$clothes_id= $row_clothes['product_id'];
	$clothes_brand=$row_clothes['product_brand'];
	echo "<option value='$clothes_brand'><span>".$clothes_brand."</span></option>"; 
}
}
function foodBrand()
{
 global $con;
 $get_food= "select distinct product_brand from `food stuffs`";
 $run_food= mysqli_query($con, $get_food);
 
 while($row_food=mysqli_fetch_array($run_food))
 {
	//$clothes_id= $row_clothes['product_brand'];
	$food_brand=$row_food['product_brand'];
	
	
	echo "<option value='$food_brand'><span>".$food_brand."</span></option>"; 

}
}

function stationBrand()
{
 global $con;
 $get_station= "select distinct product_brand from stationery";
 $run_station= mysqli_query($con, $get_station);
 
 while($row_station=mysqli_fetch_array($run_station))
 {
	//$clothes_id= $row_clothes['product_id'];
	$station_brand=$row_station['product_brand'];
	
	
	echo "<option value='$station_brand'><span>".$station_brand."</span></option>"; 

}
}
function funtrBrand()
{
 global $con;
 $get_funtr= "select distinct product_brand from furniture";
 $run_funtr= mysqli_query($con, $get_funtr);
 
 while($row_funtr=mysqli_fetch_array($run_funtr))
 {
	//$clothes_id= $row_clothes['product_id'];
	$funtr_brand=$row_funtr['product_brand'];
	
	
	echo "<option value='$funtr_brand'><span>".$funtr_brand."</span></option>"; 

}
}

function toiletBrand()
{
 global $con;
 $get_toilet= "select distinct product_brand from toiletries";
 $run_toilet= mysqli_query($con, $get_toilet);
 
 while($row_toilet=mysqli_fetch_array($run_toilet))
 {
	//$clothes_id= $row_clothes['product_id'];
	$toilet_brand=$row_toilet['product_brand'];
	
	
	echo "<option value='$toilet_brand'><span>".$toilet_brand."</span></option>"; 

}
}  */
?>
