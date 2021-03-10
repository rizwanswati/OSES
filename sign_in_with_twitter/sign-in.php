<?php

session_start();



require_once('lib/twitteroauth.php');
include 'config.php';


// if user is logged in, redirect user to index page
if( isset($_SESSION['user_info']) ){
header("location: saveAccessToken.php");
	exit();
}


// if user came from twitter authorize page
if( isset($_GET['oauth_token']) and isset($_GET['oauth_verifier']) and isset($_SESSION['get_oauth_token_secret']) ){
	$_SESSION['oauth_token'] = $_GET['oauth_token'];
	$_SESSION['oauth_verifier'] = $_GET['oauth_verifier'];
	$_SESSION['oauth_token_secret'] = $_SESSION['get_oauth_token_secret'];

	$connection = new TwitterOAuth($api_key, $api_secret, $_SESSION['oauth_token'] , $_SESSION['oauth_token_secret']);
	$user_info = $connection->getAccessToken($_SESSION['oauth_verifier']);
	$_SESSION['user_info'] = $user_info;
	header("location: saveAccessToken.php");
}
else{ // if user not logged in, redirect user to twitter authorize page
	$connection = new TwitterOAuth($api_key, $api_secret);
	$request_token = $connection->getRequestToken($callback_url);
	$_SESSION['get_oauth_token_secret'] = $request_token['oauth_token_secret'];

	if( $connection->http_code == '200' ){
		$login_url = $connection->getAuthorizeURL($request_token['oauth_token'], false);
		header("location: $login_url");
	}
}

?>