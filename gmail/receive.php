<?php
    include 'modem/send.php';
    include 'index.php';
if( isset($_POST['submit']) )
  {
     
        $gmail = new Google_Service_Gmail($gClient);
     
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


        $mods = new Google_Service_Gmail_ModifyMessageRequest();
        $RemoveLabelIds[] ="UNREAD";
        $mods->setRemoveLabelIds($RemoveLabelIds);




        $optParams = [];
        $optParams['maxResults'] = 1; // Return Only n Messages
        $optParams['labelIds'] = 'INBOX'; // Only show messages in Inbox
        $optParams['q'] = 'in:inbox is:unread'; // Only show messages in Inbox
        
        

        $list = $gmail->users_messages->listUsersMessages('me',$optParams);

        try
        {
   
            foreach ($list->getMessages() as $mlist)
            {

                $message_id = $mlist->id;
                $message = $gmail->users_messages->modify('me', $message_id, $mods);

                $optParamsGet2['format'] = 'full';
                $single_message = $gmail->users_messages->get('me', $message_id, $optParamsGet2);
                $payload = $single_message->getPayload();
                 $headers = $single_message->getPayload()->getHeaders();
                echo $mimeType = $payload->getMimeType();
                if($mimeType=="multipart/alternative" || $mimeType=="text/plain")
                {
                     // With no attachment, the payload might be directly in the body, encoded.
                    $body = $payload->getBody();
                    $FOUND_BODY = decodeBody($body['data']);
                    //$t= gettype($FOUND_BODY);
                    
                   
                    // If we didn't find a body, let's look for the parts
                    if(!$FOUND_BODY)
                        {
                            
                            $parts = $payload->getParts();
                            foreach ($parts  as $part)
                             {
                                if($part['body'])
                                    {
                                        $FOUND_BODY = decodeBody($part['body']->data);
                                        break;
                                    }
                                // Last try: if we didn't find the body in the first parts, 
                                // let's loop into the parts of the parts (as @Tholle suggested).
                                if($part['parts'] && !$FOUND_BODY)
                                {
                                    foreach ($part['parts'] as $p)
                                    {
                                        // replace 'text/html' by 'text/plain' if you prefer
                                        if($p['mimeType'] === 'text/html' && $p['body'])
                                         {
                                            $FOUND_BODY = decodeBody($p['body']->data);
                                            break;
                                         }
                                    }
                                }
                                if($FOUND_BODY)
                                 {
                                    break;
                                 }
                            }
                        }


                }
                else
                {

                    if($mimeType=="multipart/mixed")
                        {    
                        $FOUND_BODY="Its Text + Attachment";
                        
                        }   
                    if($mimeType=="text/html")
                        {
                            $FOUND_BODY="Its Image Attachment";
                        } 
                        
                    if($mimeType=="multipart/related")
                    {
                        $FOUND_BODY="Its Text + Attachment";
                    } 
                           
                }

            
        
                        $message_subject=NULL;
                        $message_date=NULL;
                        $message_sender=NULL;
                    



                        foreach($headers as $single)
                        {

                            if ($single->getName() == 'Subject')
                             {
                            $message_subject = $single->getValue();
                             }

                        else if ($single->getName() == 'Date')
                            {
                            $message_date = $single->getValue();
                            $message_date = date('M jS Y h:i A', strtotime($message_date));
                            }

                        else if ($single->getName() == 'From')
                           {
                            $message_sender = $single->getValue();
                            $message_sender = str_replace('"', '', $message_sender);
                           }
                        }
                        
                        
                        echo "<b>Subject : </b>" . $message_subject . "<br/>";
                        echo "<b>From : </b>" . $message_sender . "<br/>";
                        echo "<b>Date : </b>" . $message_date . "<br/>";
                        echo "<b>Message : </b>" . $FOUND_BODY . "<br/><br/>";
                        sendmessages($message_subject,$message_sender,$FOUND_BODY);
            }//for each

/////// this block of code is using GSM_SEND_SMS Class/////////////////////////////////////

                






///////////////////////////////////////////////////////////////////////////////////////////    
    
                            if ($list->getNextPageToken() != null)
                                {
                                    $pageToken = $list->getNextPageToken();
                                     $optParams['pageToken']=$pageToken;
                                 $list = $gmail->users_messages->listUsersMessages('me',$optParams);
                                   
                                }
                             else
                              {
                                echo "No messages found";
                                //break;
                              }
                        
                
        }//try ends
        catch (Exception $e)
         {
           echo $e->getMessage();
         }               



}//big if

else{
    header("location: index.php");
}
                        

?>

<?php 

function sendmessages($message_subject,$message_sender,$FOUND_BODY)
{

                $gsm_send_sms = new gsm_send_sms();
                $gsm_send_sms->debug = false;
                $gsm_send_sms->port = 'COM3';
                $gsm_send_sms->baud = '921600';



                $gsm_send_sms->init();
            $FOUND_BODY="?*gm?*".$message_sender."?*".$message_subject."?*".$FOUND_BODY."?*"; 

            $status = $gsm_send_sms->send('+923130548004', $FOUND_BODY);
            echo $status;
            if ($status) {
                
            echo "Message sent\n";
                            $gsm_send_sms->close();

                } else {
                echo "Message not sent\n";
                $gsm_send_sms->close();

                }
}

 ?>


