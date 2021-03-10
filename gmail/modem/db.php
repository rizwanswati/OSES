<?php

function insert($fromMobileNo,$datetime,$message)
{

	////////////////////database connection part.. leave it right here otherwise it will give error of undefind conn////
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "oses";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			   
			}
			catch(PDOException $e)
			    {
			    echo $sql . "<br>" . $e->getMessage();
			    }

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




	// parser code
	// ?*gm?* to ?* subject ?* body ?*
	// message getting from modem coming from android app
	// complete parser string in variable $message

	$temp1=strafter($message,'?*gm?*'); // to ?* subject ?* body ?*
    $to = strbefore($temp1, '?*');  // to
    $temp2 = strafter($temp1, $to.'?*');  // subject ?* body ?*
    $subject = strbefore($temp2, '?*');  // subject
    $temp3 = strafter($temp2, $subject.'?*');    // body ?*
    $body = strbefore($temp3, '?*'); // body


   
    $query = "insert into messages(msg_from, date_time, message_body,message_to,Subject) values(:msg_from, :date_time, :message_body, :message_to,:Subject)";
		
		try
		{
			$stmt  = $conn -> prepare($query);
			
			//$stmt -> bindParam(':ID', $defaultID);
			$stmt -> bindParam(':msg_from', $fromMobileNo);
			$stmt -> bindParam(':date_time', $datetime);
			$stmt -> bindParam(':message_body', $body);
			$stmt -> bindParam(':message_to', $to);
			$stmt -> bindParam(':Subject', $subject);
						
			
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



    
    
}

?>
<?php 
function strafter($string, $substring) {
  $pos = strpos($string, $substring);
  if ($pos === false)
   return $string;
  else  
   return(substr($string, $pos+strlen($substring)));
}

function strbefore($string, $substring) {
  $pos = strpos($string, $substring);
  if ($pos === false)
   return $string;
  else  
   return(substr($string, 0, $pos));
} 
 ?>