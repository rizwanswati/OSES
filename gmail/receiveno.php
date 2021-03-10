<?php 
include 'modem/connection.php';
include 'modem/send.php';
include 'vendor/autoload.php';

$google_client_id       = '1078711225983-mlr91um6muhb55jo0irnrs3hn0542ciu.apps.googleusercontent.com';
$google_client_secret   = 'i4N4c55egPe9zn42SfFONoeL';
$google_redirect_url    = 'http://localhost/p1/gmail/sign-in.php';
$google_application_name = 'gmailTest';
$google_application_scope = 'https://mail.google.com/'; /* I only needed the basic user info */

$gClient = new Google_Client();
$gClient->setApplicationName($google_application_name);
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setScopes($google_application_scope);
$gClient->setApprovalPrompt('force');
$gClient->setAccessType('offline');



        $userno=NULL;
        $query = "Select Phone_no,Access_Token from user_application where App_ID = '2' AND Email IS NULL";
		$result1 = $conn -> query($query) or die("Access_Token not found");
		$email=NULL;
		foreach ($result1 as $row)       
		{
         echo $_SESSION['userno']=$row['Phone_no'];
         echo $_SESSION['dbrtoken'] = $row['Access_Token'];

         /////////
         $gClient->setAccessToken($_SESSION['dbrtoken']);
		 $result=$gClient->getAccessToken();
		 $json = json_decode($result, true);
		 $_SESSION["access_token"]=$json['access_token'];

		 if ($gClient->isAccessTokenExpired())
           {    
     		$tokenToRefresh=$json['refresh_token'];
     		$gClient->refreshToken($tokenToRefresh);
     	    $_SESSION['refresh_token'] = $gClient->getAccessToken();  		
			$json1 = json_decode($_SESSION['refresh_token'], true);			
			$_SESSION["access_token"]=$json1['access_token'];
            } 

            include 'roffline.php'; 
     			



        }//foreach   




?>
<?php 

 function decodeBody($body)
            {
                $rawData = $body;
                $sanitizedData = strtr($rawData,'-_', '+/');
                $decodedMessage = base64_decode($sanitizedData);
                if(!$decodedMessage)
                {
                    $decodedMessage = FALSE;
                }
                return $decodedMessage;
            }
            function sendmessages($message_subject,$message_sender,$FOUND_BODY)
{
echo "Code is commented...plz attach modem";
/*
                $gsm_send_sms = new gsm_send_sms();
                $gsm_send_sms->debug = false;
                $gsm_send_sms->port = 'COM8';
                $gsm_send_sms->baud = '921600';



                $gsm_send_sms->init();
            $userno=$_SESSION['userno'];
            $FOUND_BODY="?*gm?*".$message_sender."?*".$message_subject."?*".$FOUND_BODY."?*"; 

            $status = $gsm_send_sms->send($userno, $FOUND_BODY);
            echo $status;
            if ($status) {
                
            echo "Message sent\n";
                            $gsm_send_sms->close();

                } else {
                echo "Message not sent\n";
                $gsm_send_sms->close();

                }*/
}


 ?>
