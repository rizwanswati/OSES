<?php 
	session_start();
		         
                  
                  if (isset($_GET['session_name'])) 
                    {
                      $_SESSION['gmcPhone_num'] = $_GET['session_name'];
                     		
                    }


                  if (isset($_GET['tsession_name'])) 
                    {
                      	
                      $_SESSION['twPhone_num'] = $_GET['tsession_name'];
                      echo $_SESSION['user'];
                      echo $_SESSION['twPhone_num'];
                      echo "<br>";
                      echo session_id();

                    }

	
 ?>