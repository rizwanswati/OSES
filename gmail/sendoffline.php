<?php
session_start();

include 'Request_gmail.php';
include 'config.php';
require ('modem/connection.php');
include 'vendor/autoload.php';
		
		// reading message from database
		// we have to send this record to gmail server 
		// only 1 record
        $query = "select ID,msg_from,message_body,message_to,Subject,date_time from messages Limit 1;";
		$result = $conn -> query($query) or die("Result not found");
		$message=NULL;
		$message_to=NULL;
		$subject=NULL;
		$msgId=NULL;
		$msgfrom=NULL;
		$datetime=NULL;
		foreach ($result as $row)       
		{
         $message = $row['message_body'];
         $message_to = $row['message_to'];
         $subject = $row['Subject'];
         $msgId=$row['ID']; 
         $msgfrom = $row['msg_from'];
         $datetime = $row['date_time'];       
        }

        echo $msgId;
        $msgfrom=substr($msgfrom, 2);
        $msgfrom="0".$msgfrom;
        echo $msgfrom;
        // Now getting access token from database against particualr user
        
        $getAccessTokenQuery = "select Access_Token, User_App_Id from user_application where Phone_no ='".$msgfrom."'";
        $result1 = $conn -> query($getAccessTokenQuery) or die("Access Token not founddb");
        
        foreach ($result1 as $row) {
        	
        	$_SESSION['sendAccessToken'] = $row["Access_Token"];
        	$User_App_Id = $row['User_App_Id'];
        }


        // Now check either AccessToken expired or not

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
			 
			if (isset($_SESSION['sendAccessToken']))
			 {
				$gClient->setAccessToken($_SESSION['sendAccessToken']);
				echo "working 2";
				$result=$gClient->getAccessToken();
				$json = json_decode($result, true);
				$_SESSION["access_token"]=$json['access_token'];

			 
				if ($gClient->isAccessTokenExpired())
			     {    
			     		
			    		$tokenToRefresh=$json['refresh_token'];
			     		$gClient->refreshToken($tokenToRefresh);
			     		echo $_SESSION['refresh_token'] = $gClient->getAccessToken();  		
						$json1 = json_decode($_SESSION['refresh_token'], true);
						echo "<br/>This is refres token".$json1['refresh_token'];
						echo "<br/>This is access token".$_SESSION["access_token"]=$json1['access_token'];
			  			echo "expired";
			     }  
			     else
			     {
			     		//$gClient->revokeToken();	
			  			echo "Not expired";
			     }	

			 }
			 else
			 {

			 	echo "its not set Access token not found";
			 }    







		
	


			 // Now sending email to gmail server

		$access_token = $_SESSION["access_token"];
		$url = "https://www.googleapis.com/gmail/v1/users/me/messages/send";
		$header = array('Content-Type: application/json', "Authorization: Bearer $access_token");
	
		$to = $message_to;
		$message_body = $message;

		$line = "\n";
		$raw = "to: $to".$line;
		$raw .= "subject: $subject".$line.$line;
		$raw .= $message;

		$base64 = base64_encode($raw);	// encoding email here
		$data = '{ "raw" : "'.$base64.'" }';
		$send = Request_gmail_HTTP(1, $url, $header, $data);

		if( !empty($send['id']) )
		{ // if message has been sent, will be redirect to index.php and show "Message has been sent!".
			
					// Now, populating record (email) in gmail table
					// gmail table records have to display on website  
					$query = "insert into gmail(App_ID, Email_body, Direction, Datetime, Email_Address, User_App_Id) values(:App_ID, :Email_body, :Direction, :Datetime, :Email_Address,:User_App_Id)";
				
					$App_Id = 2;	// for gmail
					$Direction = 'Sent';
					try
					{
					$stmt  = $conn -> prepare($query);
					
					$stmt -> bindParam(':App_ID', $App_Id);
					$stmt -> bindParam(':Email_body', $message_body);
					$stmt -> bindParam(':Direction', $Direction);
					$stmt -> bindParam(':Datetime', $datetime);
					$stmt -> bindParam(':Email_Address', $message_to);
					$stmt -> bindParam(':User_App_Id', $User_App_Id);		
					
						if ($stmt -> execute()) 
						{
							try
							{
								$deleteQuery = "DELETE FROM messages WHERE ID ='".$msgId."'";
								$stmt = $conn->prepare($deleteQuery);   
								if($stmt->execute())
								{
									echo "deleted successfully";
								}
								else
								{
									echo "Not Deleted";
								}	
							
						}
						catch(PDOException $e)
						{
							$msg = $e -> getMessage();	
						}	


						      return true;
						}
						else
						{
							return false;
						}
					}
					catch(PDOException $e)
					{
					$msg = $e -> getMessage();
					}



					// Now, deleting record from database
					// from messages table
					// because message has been sent and record move to according table (gmail table) 
					

		}
		else{ // if access token is expired or has some problems, will be logout!
			if( !empty($send['error']['errors'][0]['reason']) )
			{
				echo " error";
				//header("location: logout.php");
			}
			else
			{
				echo "not error";
				//header("location: logout.php");
			}
		}


		

		/*unset($_SESSION['sendAccessToken']);
		unset($_SESSION['access_token']);
		unset($_SESSION['refresh_token']);
*/

	

?>