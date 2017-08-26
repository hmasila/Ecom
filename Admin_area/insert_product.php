<!DOCTYPE html>
<?php
include 'includes/config.php';
include 'includes/functions_admn.php';

?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
<body bgcolor="#bfefef">
	<form action = <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method= "post" enctype="multipart/form-data">
	 <table align="center" width="700px" border="2px" bgcolor="#efefef">
	 <tr align="center"><td colspan="5"><h2>Insert a new product</h2></td></tr>
	 <tr><td align="right"><b>Product Category:</b></td><td>
	 <select name="product_cat" required>
		<option disabled selected value="">Select category</option>
		<option value="Electronics">Electronics</option>
		<option value="Clothes">Clothes</option>
		<option value="Food stuffs">Food stuffs</option>
		<option value="Stationery">Stationery</option>
		<option value="Furniture">Furniture</option>
		<option value="Toiletries">Toiletries</option>
	 </select>
	 </td></tr>
	 <tr><td align="right"><b>Product type:</b></td><td>
	  <select name="product_type" required>
	  <option disabled selected value="">Select Type</option>
		<?php
		getElects();
		getClothes();
		getFood();
		getStation();
		getFuntr();
		getToilet();
		?>
	 
	 </select>
	 </td></tr>
	 
	 
	
	 <tr><td align="right"><b>Brand name:</b></td><td><input type="text" size= "23" name= "product_brand" placeholder="Enter the name of the product" required></td></tr>
	 <tr><td align="right"><b>Product image:</b></td><td><input type="file" name="product_image" required></td></tr>
	 <tr><td align="right"><b>Product Description:</b></td><td>
	 <textarea cols= "30" rows= "7" name= "product_desc" placeholder="Enter a small description of the product"></textarea>
	 </td></tr>
	  <tr><td align="right"><b>Product price:</b></td><td><input type="text" name="product_price" size= "23" placeholder="Enter the price of the product" required ></td></tr>
	 <tr align="center"><td colspan="5"><input type="submit" name="addprdct" value="Add Product" ></td></tr>
	 </table>
	
	</form>
	<?php
	
	 if(isset($_POST['addprdct']))
	  {
		$prod_cat=$_POST['product_cat'];
		$prod_type=$_POST['product_type'];
		$brand=$_POST['product_brand'];
		$price=$_POST['product_price'];
		$prod_desc=$_POST['product_desc'];
		
		$product_image=$_FILES['product_image']['name'];
		$img_tmp=$_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($img_tmp,"Product_images/$product_image"); 
		$insert_product="insert into $prod_cat (product_type,product_brand,product_description, price,image) values('$prod_type','$brand','$prod_desc','$price','$product_image')";
		$insert=mysqli_query($con,$insert_product);
		if($insert)
		{
		echo "<script>alert('Product Successfully added.')</script>";
		echo "<script>window.open('insert_product.php','_self')</script>";
		}
		else
		{
			echo "<script>alert('Adding failed.')</script>";
		}
	  }
	
	?>
</body>

</html>