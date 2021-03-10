<?php
include 'vendor/autoload.php';
include 'Request_gmail.php';
include 'config.php';

$gClient = new Google_Client();

$gClient->setApplicationName('gmailTest');
$gClient->setClientId('1078711225983-mlr91um6muhb55jo0irnrs3hn0542ciu.apps.googleusercontent.com');
$gClient->setClientSecret('i4N4c55egPe9zn42SfFONoeL');
$gClient->setRedirectUri('http://localhost/p1/gmail/sign-in.php');
$gClient->setScopes('https://mail.google.com/');
$gClient->setApprovalPrompt('force');
//Critical in order to get a refresh_token, otherwise it's not provided in the response.
$gClient->setAccessType('offline');

	if(isset($_SESSION['access_token']))
{
	$gClient->setAccessToken($_SESSION['dbrtoken']);
	echo "working 2";
	$result=$gClient->getAccessToken();
	$json = json_decode($result, true);
	$_SESSION["access_token"]=$json['access_token'];


	
	unset($_SESSION['access_token']);
	unset($_SESSION['token']);
	unset($_SESSION['dbstoken']);
	unset($_SESSION["emailAddress"]);
	unset($_SESSION['dbrtoken']);
	unset($_SESSION["access_token"]);
	unset($_SESSION['refresh_token']);
	$gClient->revokeToken();
}
	

?>
	<a href="<?php echo $login_url; ?>">Sign in with Gmail</a>




