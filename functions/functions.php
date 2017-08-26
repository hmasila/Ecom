<?php
require 'config.php';


function getCats()
{
 global $con;
 $get_cats= "select * from categories";
 $run_cats= mysqli_query($con, $get_cats);
 
 while($row_cats=mysqli_fetch_array($run_cats))
 {
	$cats_id= $row_cats['product_id'];
	$cats_type=$row_cats['product_type'];
	
	
	echo "<li><a href='#'><span>".$cats_type."</span></a></li>"; 

}
}
?>
