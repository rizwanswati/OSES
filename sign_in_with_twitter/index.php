<?php
session_start();

require_once('lib/twitteroauth.php');
include 'config.php';

if( isset($_SESSION['user_info']) ){ // if user is logged in

	$_SESSION['test']=$_SESSION['user_info'];
	print_r($_SESSION['test']);
	echo "<br>";

	echo $user_token = $_SESSION['user_info']['oauth_token'];
	echo "<br>";
	$user_token_secret = $_SESSION['user_info']['oauth_token_secret'];

	$user_id = $_SESSION['user_info']['user_id'];
	$screen_name = $_SESSION['user_info']['screen_name'];

	$connection = new TwitterOAuth($api_key, $api_secret, $user_token, $user_token_secret);
	$user_profile = $connection->get('users/show', array('screen_name' => $screen_name)); // users/show: https://dev.twitter.com/rest/reference/get/users/show

	// Read example result: https://dev.twitter.com/rest/reference/get/users/show
	
	
	echo $username = $user_profile->screen_name; // get username
		echo "<br>";

	echo $name = $user_profile->name; // get full name
	$profile_image_url = str_replace("_normal", null, $user_profile->profile_image_url); // get user image

	if( !empty($user_profile->description) ){ // if user has bio
		$get_bio = $user_profile->description; // get user bio
		echo $bio = "<p>$get_bio</p>";
	}else{
		$bio = null;
	}

	$title = "Welcome $name!";
}
else{ // if user is not logged in
	$title = "Sign in with Twitter";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="description" content="Sign in with Twitter using PHP.">
</head>
<body>

<?php if( isset($_SESSION['user_info']) ) : // if user is logged in ?>


	<h1>Welcome <?php echo $name; ?>!</h1>

	<p>@<?php echo $username; ?> - <a href="logout.php">Logout?</a></p>
	<?php echo $bio; ?>

	<p><img src="<?php echo $profile_image_url; ?>"></p>
	<br>
	<br>
	<form action="postTweet.php" method="post">
		<input type="text" name="textarea" id="textarea">
		<input type="submit" name="Tsubmit" id="Tsubmit" value="Post Tweet">
	</form>


<?php else : // if user is not logged in ?>


	<a href="sign-in.php">Sign in with Twitter</a>


<?php endif; ?>

</body>
</html>