<?php

//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

require_once("connection.php");

//sanitize the input from the form. prevent SQl injection

function clean($str){
	
	$str=@trim($str);
	if(get_magic_quotes_gpc()){
		
		$str= stripslashes($str);
		
	}
	return mysql_real_escape_string($str);
	
	
}
if(isset($_POST['submit'])){
	
	$firstname=clean($_POST['firstname']);
	$lastname=clean($_POST['lastname']);
	$identity=clean($_POST['identity']);
	$phone_no=clean($_POST['phone_no']);
	$username=clean($_POST['username']);
	$password=clean($_POST['password']);
	
	if($firstname == ""){
		$errmsg_arr[]="Firstname missing";
		$errflag= true;
		
	}
	if($firstname == ""){
		$errmsg_arr[]="Firstname missing";
		$errflag= true;
		
	}
	if($lastname == ""){
		$errmsg_arr[]="lastname missing";
		$errflag= true;
		
	}
	if($identity == ""){
		$errmsg_arr[]="Identity/passport number missing";
		$errflag= true;
		
	}
	if($phone_no == ""){
		$errmsg_arr[]="Phone number missing";
		$errflag= true;
		
	}
	if($username == ""){
		$errmsg_arr[]="username missing";
		$errflag= true;
		
	}
	if($password == ""){
		$errmsg_arr[]="password missing";
		$errflag= true;
		
	}
if($errflag){
	
	$_SESSION["ERRMSG_ARR"] =$errmsg_arr;
	session_write_close();
	header("location:index.html");
	exit(); 
}

$query = "INSERT INTO users(id,firstname,lastname,customer_ID,phone_No,username,password)VALUES
('NULL','$firstname','$lastname','$identity','$phone_no','$username','$password');";

if($conn->query($query)){
             echo "<h2>Details Saved Successfully!</h2>";
         }
		  <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && 
			count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>

}





?>