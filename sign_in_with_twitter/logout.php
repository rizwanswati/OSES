<?php

session_start();


if( isset($_SESSION['user_info']) or isset($_SESSION['oauth_token'])
or isset($_SESSION['oauth_verifier']) or isset($_SESSION['oauth_token_secret']) or isset($_SESSION['get_oauth_token_secret']) ){
	unset($_SESSION['user_info']);
	unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_verifier']);
	unset($_SESSION['oauth_token_secret']);
	unset($_SESSION['get_oauth_token_secret']);
	unset($_SESSION['ids']);
	header("location: index.php");
}

else{
	header("location: index.php");
}

?>