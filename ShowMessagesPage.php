<?php require_once("includes/session.php");  ?>
<?php require_once("includes/functions.php");  ?>

<?php confirm_login(); ?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
    
    <!--<script src="js/respond.js"></script> 
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>    
     -->

     
     
      
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/owncustom.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

    
    


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
             
                <div><!--Tab div starts here-->

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#whatsapp" aria-controls="whatsapp" role="tab" data-toggle="tab"><i class="fa fa-whatsapp fa-fw fa-lg"></i> WhatsApp</a></li>
                            <li role="presentation"><a href="#gmail" aria-controls="gmail" role="tab" data-toggle="tab"><i class="fa fa-envelope-square fa-fw fa-lg"></i> Gmail</a></li>
                            <li role="presentation"><a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter fa-fw fa-lg"></i> Twitter</a></li>    
                          </ul>

                          <!-- Tab panes -->
                  <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="whatsapp"><!--first tab content starts here-->
                              
                              <div class="well well-sm">
                                <div class="container">                        
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
                                              </div><!--Select container ends here-->
                                        </div><!--form group ends here-->
                                    </div><!--colmd3 ends here-->
                                                        
                                                        
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
                                    

                                </div><!--container ends here-->
                              </div><!--well ends here-->

  
                              <div class="well well-lg">
                                <div class="container">
                                  <div class="col-md-11">  
                                      <div class="table-responsive">
                                        <table id="wtable"class="display">
                                          <thead>
                                            <tr>
                                              <th class="col-md-3"><center>Phone No</center></th>
                                              <th class="col-md-3"><center>Date/Time</center></th>
                                              <th class="col-md-5"><center>Message</center></th>
                                            </tr>
                                          </thead>
                                          
                                          <tbody>
                                          
                                          </tbody>
                                                                
                                                                  
                                        </table>
                                      </div><!--Table responsive div ends-->
                                  </div><!--col md 11 ends here-->

                                </div><!--container ends here-->
                              </div><!--well for table ends here--> 

                            </div><!--first tab div ends here-->

                          <div role="tabpanel" class="tab-pane" id="gmail">
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
                                        <table id="gtable"class="display">
                                          <thead>
                                            <tr>
                                              <th class="col-md-3"><center>Email Address</center></th>
                                                <th class="col-md-3"><center>Date/Time</center></th>
                                                <th class="col-md-5"><center>Email</center></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                                                
                                        </table>
                                      </div><!--Table div ends-->
                                    </div>

                                </div>
                              </div><!--well for table ends here-->        





                          </div><!--second tab ends here-->

                      <div role="tabpanel" class="tab-pane" id="twitter">
                      
                          <div class="well well-sm">
                              <div class="container">
                                <div class="col-md-3"></div>      
                                  <div class="col-md-4">
                                      <input type="submit" name="tShow-Messages" id="tShow-Messages" class="btn btn-primary btn-block btn-md  showbutton" value="Show Tweets " />                            
                                  </div><!--colmd4 ends here-->                   
                                                      
                              </div><!--container ends here-->
                          </div><!--well ends here--> 

          
                          <div class="well well-lg">
                              <div class="container">
                                <div class="col-md-11">  
                                  <div class="table-responsive">
                                    <table id="ttable"class="display">
                                      <thead>
                                        <tr>
                                          <th class="col-md-3"><center>Date/Time</center></th>
                                          <th class="col-md-5"><center>Tweet</center></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      
                                                              
                                    </table>
                                  </div><!--Table div ends-->
                                                  </div>

                                </div>
                              </div>  
                          </div><!--well for table ends here--> 





                      </div><!--3rd ends here-->
                          
                  </div><!--Tab contents ends here starts here-->

                </div> <!--Tab div ends  here-->    
                 
              </div><!--Panel body ends here-->
    </div><!--panel primary ends here-->
      
  </div><!--Colmd12 ends here-->

  
  
</div><!--Row ends here-->


</div><!--container-->       
<!-- javascript -->
<!--<script src="https://code.jquery.com/jquery.js"></script>-->
 <!--   <script src="js/jquery.min.js"></script>
       
  <!--<script src="js/bootstrap.min.js"></script>
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>--> 
  <!--<script src="http://malsup.github.com/jquery.form.js"></script>-->
   <script src="js/global.js"></script>
  
  
  <script type="text/javascript">
  $(function() {
    $('.nav-tabs a:first').tab('show');
  });
  </script>
<script type="text/javascript">

  // For demo to fit into DataTables site builder...
  $('#wtable').addClass('table table-striped table-bordered');

</script>

<script type="text/javascript">

  // For demo to fit into DataTables site builder...
  $('#gtable').addClass('table table-striped table-bordered');

</script>

<script type="text/javascript">

  $('#ttable').addClass('table table-striped table-bordered');

</script>

 
</body>
</html>
 