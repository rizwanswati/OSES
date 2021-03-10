<?php require_once("includes/session.php");  ?>
<?php require_once("includes/functions.php");  ?>

<?php confirm_login(); ?>


<!doctype html>
<html>
<head>
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 <link rel="stylesheet" type="text/css" href="css/owncustom.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#mytable').DataTable();
      } );
    </script>


</head>

<body>
<div class="container">
    <!--navigation bar-->
        <?php 
        include("includes/header.php");
         ?>

<div class="row top">



  <div class="col-md-12">
  <div class="panel panel-primary">  
            <div class="panel-heading">Messages <i class="fa fa-comments-o fa-fw fa-lg"></i> </div>  
               <div class="panel-body">
                  
                  <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#whatsapp" aria-controls="whatsapp" role="tab" data-toggle="tab"><i class="fa fa-whatsapp fa-fw fa-lg"></i> WhatsApp</a></li>
                    <li role="presentation"><a href="#gmail" aria-controls="gmail" role="tab" data-toggle="tab"><i class="fa fa-envelope-square fa-fw fa-lg"></i> Gmail</a></li>
                    <li role="presentation"><a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter fa-fw fa-lg"></i> Twitter</a></li>    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    
                   <div role="tabpanel" class="tab-pane fade in active" id="whatsapp">
                        <div class="well well-sm">
                           <div class="container">


                           <!--<form id="wMessagesForm" action="ShowMessagesPage.php" method="post">-->
                           

                           <div class="col-md-3">
                                  
                                  <div class="form-group">
                                          <label>Select Phone No.</label>
                                           <div class="selectContainer">
                                            <select class="form-control" name="phone" id="phone">
                                                <?php
                                                  require_once("includes/DbHandler.php");
                                                  fillCombobox();

                                                 ?>
                                                                                                
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <!--colmd3 ends here-->
                            
                            <div class="col-md-3">
                                  <div class="form-group">
                                          <label>Show Sent/Recieve</label>
                                           <div class="selectContainer">
                                            <select class="form-control" name="wmsgdirection"  id="wmsgdirection">
                                                
                                                <option>Sent</option>
                                                <option>Received</option>
                                                
                                            </select>
                                        </div>
                                    </div>      
                            </div><!--colmd3 ends here-->          

                           <div class="col-md-3">
                           
                            <input type="submit" name="wShow-Messages" id="wShow-Messages" class="btn btn-primary btn-block  showbutton" value="Show Messages" />   
                         
                           </div><!--colmd3 ends here-->
                           

                      <!--     </form>  -->


                           </div><!--container ends here-->
                        </div><!--well ends here-->



                     <div class="well well-lg">
                          <div class="container">
                            <div class="col-md-11">  
                              <div class="table-responsive">
                                  <table id="mytable"class="display">
                                    <thead>
                                      <tr>
                                        <th class="col-md-3">Phone No</th>
                                        <th class="col-md-3">Date/Time</th>
                                        <th class="col-md-5">Message</th>
                                      </tr>
                                    </thead>
                                    <tbody id="testid">
                                    
                                        
                                  
                                    </tbody>
                                  </table>
                        </div><!--Table div ends-->
                        </div>

                          </div>
                     </div><!--well for table ends here-->     

                      



                    </div><!--First tab content ends-->

                    <div role="tabpanel" class="tab-pane fade" id="gmail">
                                <div class="well well-sm">
                           <div class="container">
                           
                           
                            <div class="col-md-3">
                                  <div class="form-group">
                                          <label>Show Sent/Recieve</label>
                                           <div class="selectContainer">
                                            <select class="form-control" name="gmsgdirection" id="gmsgdirection">
                                                
                                                <option>Sent</option>
                                                <option>Received</option>
                                                
                                            </select>
                                        </div>
                                    </div>      
                            </div><!--colmd3 ends here-->          

                           <div class="col-md-3">
                           
                            <input type="submit" name="gShow-Messages" id="gShow-Messages" class="btn btn-primary btn-block  showbutton" value="Show Mails" />                            
                           </div><!--colmd3 ends here-->                   
                          
                           </div><!--container ends here-->
                        </div><!--well ends here-->



                     <div class="well well-lg">
                          <div class="container">
                            <div class="col-md-11">  
                              <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-md-3">Email</th>
                                        <th class="col-md-3">Date/Time</th>
                                        <th class="col-md-5">Message</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                    
                                       if(isset($_POST['first']))                                       
                                       {
                                         
                                         
                                         
                                         require_once("includes/DbHandler.php");
                                         
                                         
                                         showEmails();
                                                                                 
                                        /* foreach ($result as $row)
                                          {
                                            echo "<tr>" .
                                              "<td>" . $row['phone_num'] . "</td>" .
                                              "<td>" . $row['datetime'] . "</td>" .
                                              "<td>" . $row['Message_Text'] . "</td>" .
                                              "</tr>";
                                          } */
                                          $conn=NULL;

                                       } 
                                    
                                    
                                    
                                      ?>
                                      
                                                                            
                                    </tbody>
                                  </table>
                        </div><!--Table div ends-->
                        </div>

                          </div>
                     </div><!--well for table ends here-->     

                      <div><nav>
                        <ul class="pager pagination-lg">
                          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Back</a></li>
                          <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                      </nav>
                      </div>

                    </div><!--second tab content ends-->
                    
                    <div role="tabpanel" class="tab-pane fade" id="twitter">


                                   <div class="well well-lg">
                          <div class="container">
                            <div class="col-md-11">  
                              <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-md-3">Date/Time</th>
                                        <th class="col-md-5">Tweet</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>22/10/2014</td>
                                        <td>the quick brown fox jumps over the lazy dog.</td>
                                      </tr>
                                      
                                      <tr>
                                        <td>6/08/2010</td>
                                        <td>the quick brown fox jumps over the lazy dog.</td>
                                      </tr>
                                      <tr>
                                        <td>6/08/2010</td>
                                        <td>the quick brown fox jumps over the lazy dog.</td>
                                      </tr>
                                      <tr>
                                        <td>6/08/2010</td>
                                        <td>the quick brown fox jumps over the lazy dog.</td>
                                      </tr>
                                      <tr>
                                        <td>6/08/2010</td>
                                        <td>the quick brown fox jumps over the lazy dog.</td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                        </div><!--Table div ends-->
                        </div>

                          </div>
                     </div><!--well for table ends here-->     

                      <div><nav>
                        <ul class="pager">
                          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Back</a></li>
                          <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                      </nav>
                      </div>

                    </div><!--3rd tab content ends here-->
                  </div>

                  </div>

              </div><!--Panel body ends here-->
  </div><!--panel primary ends here-->
      
  </div><!--Colmd10 ends here-->

  
  
</div><!--Row ends here-->


</div><!--container-->       

   <script src="js/global.js"></script>
  
  
  <script type="text/javascript">
  $(function() {
    $('.nav-tabs a:first').tab('show');
  });
  </script>
<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#mytable')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
</script>

 
</body>
</html>
