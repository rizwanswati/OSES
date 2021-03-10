<?php 
	require_once('lib/twitteroauth.php');
	session_start();


	if(isset($_SESSION['user_info']) && isset($_POST['Tsubmit']))
	{
		
		print_r($_SESSION['user_info']);

		$api_key = "fDtYMBqqzF88Z7UmJ40SQn5lB"; // enter your consumer key
		$api_secret = "sbsWqZhKKbqNEAPeOsLSGlDNggXVHWMhflJMNA2db89oCH2ii0"; // enter your consumer secret
		
		$user_token = $_SESSION['user_info']['oauth_token'];
        $user_token_secret = $_SESSION['user_info']['oauth_token_secret'];
 
		$publish_tweet = new TwitterOAuth($api_key, $api_secret, $user_token, $user_token_secret);
		echo $status = $_POST['textarea']; // your tweet text
		 
		$tweet = $publish_tweet->post('statuses/update', array('status' => $status));
		echo $tweet->text; // read example result: https://dev.twitter.com/rest/reference/post/statuses/update
		echo "Posted Successfully";
	}


 ?>