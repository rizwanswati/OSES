<?php
// 1. for redirect page

function redirect_to( $location = NULL ) 
{
	if ($location != NULL)
	{
		header("Location: {$location}");
		exit;
	}
}

function validateCradentials($username,$password,$phone,$email)
{
	if ($username == ''  || $password=='' || $phone=='' || $email=='')
	 {
		return 0;
	}
	else
	{
		return 1;
	}
}




?>