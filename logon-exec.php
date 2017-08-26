
<?php
//start session
   session_start();
	 
	 //Include database connection details
	require'config.php';
	?>
<?php
        if($_SERVER["REQUEST_METHOD"]!='POST')
        {
            $fName=""; $sName=""; $email=""; $country=""; $pass=""; $rpass=""; $idNum="";
            $fNameErr=""; $sNameErr=""; $emailErr=""; $passErr=""; $rpassErr=""; $idNumErr="";
            $form=array($fName, $sName, $email, $country, $idNum,$uName );
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
	
	} 
	else{
		
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
	}
            
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
 $add = mysqli_query($con, "INSERT INTO users (firstname, lastname, customer_ID, phone_NO,country, username, password) 
 VALUES ('$fName','$sName','$idNum','$phone','$country','$email','$pass')");
                                if($add)
                                {
                                   // header('location:index.php');
                          // echo "<script>alert("Registered successfully")</script>";
                                }
                                else 
                                {
                                    echo "update failed".  mysqli_error($con);
                                }
                            }
 
						}
	//Check whether the query was successful or not
//	if($result) {
	//	if(mysql_num_rows($result) > 0) {
			//Login Successful
		//	session_regenerate_id();
		//	$member = mysql_fetch_assoc($result);
		//	$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
			//$_SESSION['SESS_FIRST_NAME'] = $member['username'];
		//	$_SESSION['SESS_LAST_NAME'] = $member['password'];
		//	session_write_close();
		//	header("location: index.php");
		//	exit();
		
?>
