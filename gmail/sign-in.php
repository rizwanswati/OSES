<?php

//include google api files
include 'vendor/autoload.php'; 
include 'Request_gmail.php';
include 'modem/connection.php';
include 'modem/send.php';
//start session
session_start();
$google_client_id       = '1078711225983-mlr91um6muhb55jo0irnrs3hn0542ciu.apps.googleusercontent.com';
$google_client_secret   = 'i4N4c55egPe9zn42SfFONoeL';
$google_redirect_url    = 'http://localhost/p1/gmail/sign-in.php';
$google_application_name = 'gmailTest';
$google_application_scope = 'https://mail.google.com/'; /* I only needed the basic user info */
    
 
//Create the Client
$gClient = new Google_Client();
// Set Basic Client info as established at the beginning of the file
$gClient->setApplicationName($google_application_name);
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setScopes($google_application_scope);
//Set this to 'force' in order to get a new refresh_token.
//Useful if you had already granted access to this application.

//Critical in order to get a refresh_token, otherwise it's not provided in the response.
$gClient->setAccessType('offline');
$gClient->setApprovalPrompt('force');

 
$google_oauthV2 = new Google_Service_Oauth2($gClient);
  // $userinf                 = $google_oauthV2->userinfo->get();
  // $_SESSION['useremail']= filter_var($userinf['email'], FILTER_SANITIZE_EMAIL); 
/************************************************
  If we're logging out we just need to clear our
  local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  //Perform any other sort of redirection or work.

}
 
/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
echo "working 0";
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    echo "working 1";
    header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
    return;
}

$json1 = json_decode($_SESSION['token'], true);
$access_token=$json1['access_token'];

$info = Request_gmail_HTTP(0, "https://www.googleapis.com/gmail/v1/users/me/profile", array("Authorization: Bearer $access_token"), 0); // Get email address
$_SESSION["emailAddress"] = $info['emailAddress']; 
/***********************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ***********************************************/
if (isset($_SESSION['token']))
 {	
 	$_SESSION['dbstoken']=$_SESSION['token'];	
	 $gClient->setAccessToken($_SESSION['dbstoken']);
	
	 $result=$gClient->getAccessToken();
	 $json = json_decode($result, true);
	 $access_token=$json['access_token'];
	 //echo "<br/> This is ". $access_token; 
	//header("location: index.php");

	///////////////////////////////////////////////////////////////////////////////////////////////////////	
	///////////////////////////////////////////////////////////////////////////////////////////////////////	
 	$query = "insert into user_application(User_ID, App_ID, Service_Status, Phone_no , Access_Token) values(:User_ID, :App_ID, :Service_Status , :Phone_no , :Access_Token)";
		
		$User_ID=$_SESSION['user'];
		$App_ID="2";
		$Service_Status="Enable";
	    $Phone_no=$_SESSION['gmcPhone_num'];

		$Access_Token=$_SESSION['dbstoken'];
		try
		{
			$stmt  = $conn -> prepare($query);
			
			$stmt -> bindParam(':User_ID', $User_ID);
			$stmt -> bindParam(':App_ID',$App_ID);
			$stmt -> bindParam(':Service_Status', $Service_Status);
			$stmt -> bindParam(':Phone_no',$Phone_no);
			$stmt -> bindParam(':Access_Token',$Access_Token);
			if ($stmt -> execute())
			 {   
			      unset($_SESSION['dbstoken']);
			      sendCode();

			      
			       echo "Registered Successfully...Please wait ...";
			        
			         echo "<SCRIPT>";
                     echo "setTimeout('self.close()', 3000 )"; // after 3 seconds
                     echo "</SCRIPT>";
			       
			      return true;
			 }
			else
			{
				echo "NOT Inserted";
				// usleep(7000000);
			     //    echo  "<script type='text/javascript'>";
				    // echo "window.close();";
				    // echo "</script>";
				return false;
			}
			
						
		}
		catch(PDOException $e)
		{$msg = $e -> getMessage();}	

///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

}
else {
  $authUrl = $gClient->createAuthUrl();
}

?>

<?php 

	function sendCode()
	{
		echo "code is commented attach the modem";
		// $gsm_send_sms = new gsm_send_sms();
  //               $gsm_send_sms->debug = false;
  //               $gsm_send_sms->port = 'COM8';
  //               $gsm_send_sms->baud = '921600';



  //               $gsm_send_sms->init();
           
  //           $userEmail=$_SESSION['emailAddress'];
  //           $userNumber=$_SESSION['gmcPhone_num'];
  //           $BODY="?*GmailReg?*".$userEmail."?*".$userNumber."?*"; 
  //           $status = $gsm_send_sms->send($userNumber,$BODY);
  //           echo $status;
  //           if ($status) {
                
  //           echo "Message sent\n";
  //           unset($_SESSION['gmcPhone_num']);
  //           unset($_SESSION['emailAddress']);
  //           $gsm_send_sms->close();

  //               } else {
  //               echo "Message not sent\n";
  //               $gsm_send_sms->close();

  //               }
	}


 ?>