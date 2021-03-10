<?php
session_start();
include 'Request_gmail.php';
include 'config.php';
include 'vendor/autoload.php';
include 'modem/connection.php';
include 'clientinfo.php';
//	 By Qassim Hassan, http://wp-time.com/send-email-via-gmail-api-using-php/ */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Send email via Gmail API using PHP</title>
<meta name="description" content="Send email via Gmail API using PHP.">
</head>
<body>

<?php if(isset($_SESSION['access_token']) ) : // if user is logged in 

   //$gClient->revokeToken();

   if ($gClient->isAccessTokenExpired())
     {    
     		//$gClient->revokeToken();
     		$tokenToRefresh=$json['refresh_token'];
     		$gClient->refreshToken($tokenToRefresh);
     		echo $_SESSION['refresh_token'] = $gClient->getAccessToken();  		
			$json1 = json_decode($_SESSION['refresh_token'], true);
			echo "<br/>This is refres token".$json1['refresh_token'];
			echo "<br/>This is access token".$_SESSION["access_token"]=$json1['access_token']; 		

  			echo "expired<br/>";
     }  
     else
     {
     		//$gClient->revokeToken();	
  			echo "Not expired<br/>";
     }	

?>

	


	<h1>Welcome</h1>

	<?php
	if( isset($_SESSION['sent']) ){ // if message has been sent
		echo '<h3 style="color:red;">'.$_SESSION['sent'].'</h3>';
		unset($_SESSION['sent']);
	}
	?>

	<form method="POST" action="sendonline.php">
		<p>Subject: <input name="subject" type="text" value="" placeholder="Enter subject"></p>
		<p>To: <input name="to" type="text" value="" placeholder="Enter email"></p>
		<p>Message: <textarea name="message" placeholder="Enter message"></textarea></p>
		<p><input type="submit" name="submit" value="Send Online!"></p>
	</form>
	<form method="POST" action="sendoffline.php">
		
		<p><input type="submit" name="submit" value="Send Offline!"></p>
	</form>
<br/>
<br/>
	<form method="POST" action="receive.php">
		<p>Message: <textarea name="message" id="message"></textarea></p>
		<p><input type="submit" name="submit" value="Receive!"></p>
	</form>

	<p><a href="logout.php">Logout?</a></p>


<?php else : // if user is not logged in, show sign in link ?>


	<a href="<?php echo $login_url; ?>">Sign in with Gmail</a>


<?php endif; ?>

</body>
</html>