
<?php
 
                                      require_once("./../includes/DbHandler.php");

                                      
                                      if(isset($_POST['wShowMessages']))
                                          {

                                            $number= $_POST['phone'];
                                            $direction= $_POST['msgdirection'];
                                           
                                            

                                            include("./../includes/connection.php");

										   	$query = "select Message_Text,datetime,phone_num from whats_app where direction='" . $direction . "' AND
											 user_application_User_App_Id = (select User_App_Id from user_application where Phone_no = '" . $number ."')";
											$result = $conn -> query($query) or die("sql error");
                                        }


?>