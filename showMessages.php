             
              <?php
                    
                  
                      // this is for whatsapp messages
                        if(isset($_POST['wfirst']) && isset($_POST['wsecond']))                                       
                     { 
                       require_once("includes/DbHandler.php");
                       $number= $_POST['wfirst'];
                       $direction=$_POST['wsecond'];
                       
                       $result = showWhatsappMessages($number, $direction);
                       
                       
                       foreach ($result as $row)
                        {
                          
                          $output[] = array ($row['phone_num'],$row['datetime'],$row['Message_Text']);
                        } 
                        echo json_encode($output);
                        $conn=NULL;
                      

                     }                                   
            
            


                    // this is for gmail messages              
                    if(isset($_POST['gfirst']))                                       
                    {
                    
                    
                    
                    require_once("includes/DbHandler.php");
                    
                    $direction =$_POST['gfirst'];
                    $result2   = showEmails($direction);
                    
                    foreach ($result2 as $row)
                    {
                    
                    $output[]  = array ($row['Address'],$row['Datetime'],$row['Email']);
                    } 
                    echo json_encode($output);
                    $conn      =NULL;
                    
                    } 
                    

                    // this is for twitter

                    if(isset($_POST['tfirst']))                                       
                    {
                    
                    
                    require_once("includes/DbHandler.php");
                    
                    
                    $result3   = showTweets();
                    
                    foreach ($result3 as $row)
                    {
                    
                    $output[]  = array ($row['Datetime'],$row['Tweet']);
                    } 
                    echo json_encode($output);
                    $conn      =NULL;
                    
                    } 

                    // this is for gmail button that is stored in session
                    
                    

      ?>