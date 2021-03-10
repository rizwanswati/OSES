<?php session_start(); ?>
<?php require_once("DbHandler.php") ?>
<?php require_once("functions.php") ?>
<?php

	function login()
	{
				
			

			if(isset($_POST['username']) && isset($_POST['password']) )
			{
				$username = $_POST['username'];			
				$password = $_POST['password'];
				if ($username=="" && $password=="") 
				{

					echo "plz enter the values";
					redirect_to("LoginPage.php?c=1");	
				}

				$flag=loginQuery($username,$password);

				

				if($flag== true)
				{
				$_SESSION['user']=$username;
				redirect_to("Home.php");
				
				}
				else
				{
					echo "Invalid Email/password";
				}

				
		    }	


}

	function confirm_login()
		{		
			      if(!isset($_SESSION['user']))
			      {

			        redirect_to("LoginPage.php");
			      }
		}
	



?>

