
<!DOCTYPE html>
<?php 
include 'functions/functions1.php';
?>
<html>
<head>
	<title>Quick Serve Supermaket</title>
	<link rel="stylesheet" href="styles/style.css" media="all">
	<link rel="stylesheet" href="styles/menustyle.css" media="all">
	<link rel="stylesheet" type="text/css" href="style2.css" media="all">

</head>
<body>
	<div class="container">
	
		<div class="header">
			<a href='index.php'><img src="images/Picture3.jpg" id="logo" style='border-radius: 10px;'></a>
			<div class="menubar">
				<ul id="menu">
				
					<li><a href="index.php">Home</a></li>
					<li><a href="allprods.php">Products</a></li>
					<li><a href="login.php" >Login</a></li>
					<li><a href="register.php">Sign up</a></li>
					<li><a href="cart.php">Cart</a></li>
					<li><a href="contact.html">Contact us</a></li>
				
				</ul>
			<div id="form" method= "get" action="results.php" enctype= "multipart/form-data"> <!--used for video and images-->
				
				
			</form>
			</div>
			</div>
		</div>
		</br>
		</br>
		
		<?php 
		 if($_SERVER["REQUEST_METHOD"]!='POST')
        {
            $fName=""; $sName=""; $email=""; $country=""; $pass=""; $rpass=""; $idNum="";
            $fNameErr=""; $sNameErr=""; $emailErr=""; $passErr=""; $rpassErr=""; $idNumErr="";
            $form=array($fName, $sName, $email, $country, $idNum);
            $formErr= array($sNameErr,$sNameErr,$emailErr,$passErr,$rpassErr,$idNumErr);
        }
      
	
	//Sanitize the POST values
	if(isset($_POST['submit'])){ 
		
	$fName = $_POST['fname'];
	$sName = $_POST['lname'];
	$idNum = $_POST['id'];
	$country =$_POST['country'];
	$phone= $_POST['phone'];	
	$email = $_POST['email'];
	$pass =$_POST['password'];
	$rpass= $_POST['password1'];
	
	 
	
		
		 //validate input. Prevent MYSQL injections from hackers
            $fName=  stripslashes($fName);
            $sName=  stripslashes($sName);
            $idNum= stripslashes($idNum);
            $phone=  stripslashes($phone);
			$email= stripslashes($email);
            $pass=  stripslashes($pass);
            $rpass=  stripslashes($rpass);
            
            $fName=mysqli_real_escape_string($con, $fName);
            $sName=mysqli_real_escape_string($con, $sName);
			$idNum=mysqli_real_escape_string($con,$idNum);
			$phone=mysqli_real_escape_string($con,$phone);
            $email= mysqli_real_escape_string($con,$email);
			$pass=mysqli_real_escape_string($con,$pass);
	$rpass=mysqli_real_escape_string($con,$rpass);
	
            
	 if($pass!=$rpass)
                        {
                          
                            
                           $formErr= array("","","","Passwords Do not Match.","Passwords Do not Match.","");
                            $form=array($fName, $sName, $email, $country, $idNum);
                        }
						 else
                        {
                            //check to see if email or idnumber has been taken
                            $queryMail=mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
                            $queryIdNum=mysqli_query($con, "SELECT * FROM users WHERE customer_ID = '$idNum'");
                            //Count the number of rows. If a row exists, then the user  exists
                            $rowEmail = mysqli_num_rows($queryMail);
                            $rowIdNum= mysqli_num_rows($queryIdNum);
                            if ($rowEmail > 0)
                            {
                                /// echo "Sorry, that email has already been taken!";
                                  $formErr= array("","","<b>Sorry. That email has already been taken. Try a different one.</b>","","","");
                                  $form=array($fName, $sName, $email, $country, $idNum);
                            }else if ($rowIdNum > 0)
                            {
                                $formErr= array("","","","","","<b>Sorry. That number has already been taken. Try a different one.</b>");
                                $form=array($fName, $sName, $email, $country, $idNum);
                            }
                             else   
                            {
 $add = mysqli_query($con, "INSERT INTO users (id,firstname, lastname, customer_ID, phone_No,country, username, password) 
 VALUES ('NULL','$fName','$sName','$idNum','$phone','$country','$email','$pass')");
                                if($add)
                                {
                                   header('location:index.php');
                          // echo "<script>alert("Registered successfully")</script>";
                                }
                                else 
                                {
                                    echo "update failed".  mysqli_error($con);
                                }
                            }
 
						}
		
	}
		?>
		

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form" >
        
       <h2 id="h2">Please sign up for the purpose of processing your details</h2>
        <ul>
        <li><label for="firstname">Firstname</label>
        <input type="text" name="fname" placeholder="Required" size="30" required/>  
        
        </li>
          <br>
        
          <li><label for="lastname">Lastname</label>
          <input type="text" name="lname" placeholder="Required" size="30"required/>
            
          </li>
          <br>
          
            <li><label for="identity">Identification Number</label>
        <input type="text" name="id" placeholder="29900000" size="30" required/>
            
            </li>
           <br>
		   
         <li> <label for="phone">Phone</label>
          <input type="text" name="phone" placeholder="0705840752" size="30" required/>
      
         </li>
         
         <br>
		 <li> <label for="country">Home Country</label>
		 <select name="country" >
                        <option value="Algerian">Algeria</option>
                        <option value="Brazilian">Brazil</option>
                        <option value="British">Britain</option>
                        <option value="Chinese">China</option>
                        <option value="Cuba">Cuba</option>
                        <option value="German">Germany</option>
                        <option value="Iranian">Iran</option>
                        <option value="Iraqi">Iraq</option>
                        <option value="Israelite">Israel</option>
                        <option value="Japanese">Japan</option>
                        <option selected value="Kenyan">Kenya</option>
                        <option value="Mauritanian">Mauritania</option>
                        <option value="Moroccan">Morocco</option>
                        <option value="Nigerian">Nigeria</option>
                        <option value="Portuguese">Portugal</option>
                        <option value="Spanish">Spain</option>
                        <option value="Russian">Russia</option>
                        <option value="South African">South Africa</option>
                        <option value="Tanzanian">Tanzania</option>
                        <option value="Uruguayan">Uruguay</option>
                        <option value="American">USA</option>
                         </select>
			</li></br>			 
        
          <li><label for="email">Email</label>
        <input type="text" name="email" placeholder="example@gmail.com" size="30" required/>
         
          </li>
         <br>
        
          <li><label for="password">Password</label>
        <input type="password" name="password" placeholder="Required" size="30" required/></li>
          
          <br>
          
            <li><label for="password"> Confirm Password</label>
        <input type="password" name="password1" placeholder="Required" size="30" required/></li><br>
          
         
        <li>
        <button type="submit" id="button" name="submit" >Sign Up</button>
        </li>
        </ul>
        </form>
		</br>
		</br>
		
<div id="footer" style="background-color:black;clear:both;
font-family:Freestyle Script;color:grey;font-size:15px;text-align:center"><i><b>
&copy Copyright quick service supermarket (K) Ltd</br> 2015 All Rights Reserved</i></b></div>

      
</body>
</html>


