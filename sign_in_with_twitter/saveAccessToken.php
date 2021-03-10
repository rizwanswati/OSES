<?php 

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo session_id();
echo "<br>";
include 'connection.php';
if( isset($_SESSION['user_info']) )
{
	print_r($_SESSION['user_info']);
	if(isset($_SESSION['user']))
		{
			echo "Session Set";
		}
		else
		{
			echo "session not set";
		}
	$query = "insert into user_application(User_ID, App_ID, Service_Status, Phone_no , Access_Token) values(:User_ID, :App_ID, :Service_Status , :Phone_no , :Access_Token)";
		echo $User_ID=$_SESSION['user'];
		$App_ID="3";
		$Service_Status="Enable";
	    echo $Phone_no=$_SESSION['twPhone_num'];
		$Access_Token=$_SESSION['user_info'];
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
			      
			      sendCode();

			      
			       echo "<br>Registered Successfully...Please wait ...";
			        
			         echo "<SCRIPT>";
                     echo "setTimeout('self.close()', 3000 )"; // after 3 seconds
                     echo "</SCRIPT>";
			       
			      return true;
			 }
			else
			{
				echo "NOT Inserted";
				return false;
			}
		}
		catch(PDOException $e)
		{$msg = $e -> getMessage();}	
}
else
{
	echo "Not signed in";
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