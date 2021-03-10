<?php 
$google_client_id       = '1078711225983-mlr91um6muhb55jo0irnrs3hn0542ciu.apps.googleusercontent.com';
$google_client_secret   = 'i4N4c55egPe9zn42SfFONoeL';
$google_redirect_url    = 'http://localhost/p1/gmail/sign-in.php';
$google_application_name = 'gmailTest';
$google_application_scope = 'https://mail.google.com/'; /* I only needed the basic user info */
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
        $userno="03434332322";
        $query = "Select Access_Token from user_application where Phone_no ='". $userno. "' AND Email IS NULL";
		$result1 = $conn -> query($query) or die("Access_Token not found");
		$email=NULL;
		foreach ($result1 as $row)       
		{
         $_SESSION['dbrtoken'] = $row['Access_Token'];
        }     
 

////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////////// 
$gClient = new Google_Client();
// Set Basic Client info as established at the beginning of the file
$gClient->setApplicationName($google_application_name);
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setScopes($google_application_scope);

$gClient->setApprovalPrompt('force');
//Critical in order to get a refresh_token, otherwise it's not provided in the response.
$gClient->setAccessType('offline');
 
$google_oauthV2 = new Google_Service_Oauth2($gClient);
if (isset($_SESSION['dbrtoken']))
 {
	$gClient->setAccessToken($_SESSION['dbrtoken']);
	echo "working 2";
	$result=$gClient->getAccessToken();
	$json = json_decode($result, true);
	$_SESSION["access_token"]=$json['access_token'];

 
	if ($gClient->isAccessTokenExpired())
     {    
     		
    
  			echo "expired";
     }  
     else
     {
     		//$gClient->revokeToken();	
  			echo "Not expired";
     }	

	
	 	
}
else {
  $authUrl = $gClient->createAuthUrl();
}


 ?>