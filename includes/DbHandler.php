
<?php


// 1. for login


function loginQuery($uname,$pass)
{

	require_once("connection.php");	

	$query = "select Password from registration where User_ID = '" . $uname . "'";
				
	$result = $conn -> query($query) or die("sql error");

	if (!$result) 
	{    			
		die("Error is :" . mysql_error());
	}

	$pswd=NULL;
	foreach ($result as $value) {
		$pswd=  $value['Password'];
	}

	// Comparing the password

	if ($pass==$pswd)
	{  
		return true;
	}
	else
	{
		return false;
	}

	$conn=NULL;
}

///////////////////////
// 2. For data insertion (Account Registration)
	
    function insert( $uname , $pass , $phone, $email )
    {
    	require_once("connection.php");
    	$query = "insert into registration(User_ID, Email_ID, Password, phone_num , Date) values(:User_ID, :Email_ID, :Password, :phone_num, :Date)";
		$date=date("Y/m/d");
		try
		{
			$stmt  = $conn -> prepare($query);
			
			$stmt -> bindParam(':User_ID', $uname);
			$stmt -> bindParam(':Email_ID', $email);
			$stmt -> bindParam(':Password', $pass);
			$stmt -> bindParam(':phone_num', $phone);
			$stmt -> bindParam(':Date',$date);
			if ($stmt -> execute()) {
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



		$conn=NULL;
    }
	
// 3. show Whatsapp messages
    function showWhatsappMessages($number , $direction)
    {
	   	require("connection.php");

	   	$query = "select Message_Text,datetime,phone_num from whats_app where direction='" . $direction . "' AND
		 user_application_User_App_Id = (select User_App_Id from user_application where Phone_no = '" . $number ."')";
		$result = $conn -> query($query) or die("No Messages Found");
		return $result;
    	
    }


 // 4. 
 
 function fillCombobox()
 {

  require_once("connection.php");
  $user=$_SESSION['user'];
  $stmt = $conn->prepare("Select Phone_no from user_application where User_ID ='". $user. "' AND Email is NULL");
  $stmt->execute();
  
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo '<option>'.$row['Phone_no'].'</option>';
   }

  $conn=NULL;

 }

// 5. show emails 

function showEmails($direction)
{

require_once("connection.php");
require_once("includes/session.php");
$user=$_SESSION['user'];


  		$query1 = "Select Email from user_application where User_ID ='". $user. "' AND Email IS NOT NULL";
		$result1 = $conn -> query($query1) or die("Email not found");
		$email=NULL;
		foreach ($result1 as $row)       
		{
         $email = $row['Email'];
        } 
        
  $query2 = "select Email_Address,Datetime,Email_body from gmail where direction='" . $direction . "' AND
		 User_App_Id = (select User_App_Id from user_application where Email = '" . $email ."')";

		$result2 = $conn -> query($query2) or die("Email not found");
		
		return $result2;       


   
}

// 6 show Tweets
function showTweets()
{

require_once("connection.php");
require_once("includes/session.php");
$user=$_SESSION['user'];
		
  		$query1 ="Select phone_no from user_application where User_ID ='". $user. "' AND App_ID = (Select App_ID from application where App_Name ='Twitter') ";
		$result1 = $conn -> query($query1) or die("Email not found");
		$phoneno=NULL;
		foreach ($result1 as $row)       
		{
         $phoneno = $row['phone_no'];
        } 
        
          $query2 = "select Datetime,Tweet from twitter where App_ID=(Select App_ID from application where App_ID=(Select App_ID from user_application where User_Id='".$user."' AND phone_no ='".$phoneno."'))";

		$result2 = $conn -> query($query2) or die("Tweets not found");
		
		return $result2;       


   
}

?>