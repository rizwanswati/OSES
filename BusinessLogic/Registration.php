<?php require_once("./../includes/functions.php");  ?>
<?php require_once("./../includes/DbHandler.php");  ?>
<?php require_once("./../includes/session.php") ?>
<?php

if( isset($_POST['regsubmit'] ))
{	
	
	
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];


	

	$isValid = validateCradentials($uname ,$pass ,$phone,$email);
	
	if($isValid)
	{
		$isInserted = insert( $uname , $pass , $phone, $email );
		
		if($isInserted)
			{
				$_SESSION['user']=$uname;
				sleep(5);
				redirect_to("./../Home.php");
			}
		else
			{
				//echo "User Already Exist";
				redirect_to("../LoginPage.php");
				
			}		
		
	}
	else
	{
		echo "not valid";
	}
	


}

?>