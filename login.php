
<!DOCTYPE html>
<?php 
include 'functions/functions1.php';
?>
<html>
<head>
	<title>Quick Serve Supermaket</title>
	<link rel="stylesheet" href="styles/style.css" media="all">
	<link rel="stylesheet" href="styles/menustyle.css" media="all">
	<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
	
		<div class="header">
			<a href='index.php'><img src="images/Picture3.jpg" id="logo" style='border-radius: 10px;'></a>
			<div class="menubar">
				<ul id="menu">
				
					<li><a href="index.php">Home</a></li>
					<li><a href="allprods.php">Products</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Sign up</a></li>
					<li><a href="cart.php">Cart</a></li>
					<li><a href="contact.html">Contact us</a></li>
				
				</ul>
			<div id="form" method= "get" action="results.php" enctype= "multipart/form-data"> <!--used for video and images-->
				
				
			</form>
			</div>
			</div>
		</div>


<div style="padding: 100px 0 0 250px;">


<div id="login-box">
<form method="post" action="config.php">

<H2>Login</H2>
Welcome our estemeed customer. Kindly login here.
<br />
<br />

<div id="login-box-name" style="margin-top:20px;">Email:</div><div id="login-box-field" style="margin-top:20px;"><input name="q" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Password:</div><div id="login-box-field"><input name="q" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<br />
<span class="login-box-options"><input type="checkbox" name="1" value="1"> Remember Me <a href="#" style="margin-left:30px;">Forgot password?</a></span>
<br />
<br />
<button type="submit"><a href="#"><img src="images/login-btn.png" width="103" height="42" style="margin-left:90px;" /></a></button>




</form>

</div>

</div>










<div id="footer" style="background-color:#b0b0b0;clear:both;
font-family:Freestyle Script;color:#030303;font-size:15px;text-align:center"><i><b>
&copy Copyright quick service supermarket (K) Ltd 2015 All Rights Reserved</i></b></div>



</body>
</html>
