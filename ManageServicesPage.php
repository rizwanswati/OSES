<?php require_once("includes/session.php");  ?>
<?php require_once("includes/functions.php");  ?>
<?php confirm_login(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/owncustom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    
</head>

<body>
<!--Modal for whatsapp manage-->
                    <div class="modal fade whatsappmanage" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">Code has been sent to your mobile</h5>
                        </div><!--modal header ends here-->

                        <div class="modal-body">
                            <input type="text" class="form-control" id="exampleInputAmount" maxlength="4" placeholder="Write code here that you recieved">
                        </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>

                      </div><!--modal content ends here-->
                    </div>
                  </div>
<!--end of modal for whatsapp manage-->

<!--Modal for gmail manage-->
                    <div class="modal fade gmailmanage" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">Code has been sent to your mobile</h5>
                        </div><!--modal header ends here-->

                        <div class="modal-body">
                            <input type="text" class="form-control" id="exampleInputAmount" maxlength="4" placeholder="Write code here that you recieved">
                        </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>

                      </div><!--modal content ends here-->
                    </div>
                  </div>
<!--end of modal for gmail manage-->


<!--Modal for twitter manage-->
                    <div class="modal fade twittermanage" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">Code has been sent to your mobile</h5>
                        </div><!--modal header ends here-->

                        <div class="modal-body">
                            <input type="text" class="form-control" id="exampleInputAmount" maxlength="4" placeholder="Write code here that you recieved">
                        </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>

                      </div><!--modal content ends here-->
                    </div>
                  </div>
<!--end of modal for Twitter manage-->



<div class="container">


  <!--navigation bar-->
        <?php 
        include("includes/header.php");
         ?>                        


<div class="row top">
  <div class="col-md-12">

  <div class="panel panel-primary">  
            <div class="panel-heading">Manage Services <i class="fa fa-cog fa-fw fa-lg"></i> </div>  
               <div class="panel-body">
                       
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#whatsapp" aria-controls="whatsapp" role="tab" data-toggle="tab"><i class="fa fa-whatsapp fa-fw fa-lg"></i> WhatsApp</a></li>
                    <li role="presentation"><a href="#gmail" aria-controls="gmail" role="tab" data-toggle="tab"><i class="fa fa-envelope-square fa-fw fa-lg"></i> Gmail</a></li>
                    <li role="presentation"><a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab"><i class="fa fa-twitter fa-fw fa-lg"></i> Twitter</a></li>    
                  </ul>


                
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="whatsapp">                      

                      <!--Alerts-->

                                    <div class="visible"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Enabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Disabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Status Changed successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Phone number not found !
                                        </div>
                                    </div><!--div for alert ends here-->



                        <!---->
                                   

                         <div class="well well-lg">
                           <p class="whatsapp-center"><label>WhatsApp</label></p>
                              <label>Select one Status!</label>
                                <p></p>
                                  
                                  <div class="selectContainer">
                                    <select class="form-control" name="whatsappStatus">                                                
                                      <option value="Enable">Enable</option> 
                                      <option value="Disable">Disable</option>                                                 
                                    </select>
                                  </div><!--select container ends here-->
                                  
                                <p></p>
                                <label>Enter WhatsApp Number!</label>
                                <p></p>
                                
                            <form>  
                              <div><!--input group start here-->                                     
                                <div class="selectContainer">
                                  <select class="form-control" name="phone">                                              
                                    <option value="s" selected="selected">0300</option>
                                    <option value="s">0301</option>
                                    <option value="s">0302</option>
                                    <option value="s">0303</option>
                                    <option value="s">0304</option>
                                    <option value="s">0305</option>
                                    <option value="s">0306</option>
                                    <option value="s">0307</option>
                                    <option value="s">0308</option>
                                    <option value="s">0310</option>
                                    <option value="s">0311</option>
                                    <option value="s">0312</option>
                                    <option value="s">0313</option>
                                    <option value="s">0314</option>
                                    <option value="s">0315</option>
                                    <option value="s">0320</option>
                                    <option value="s">0321</option>
                                    <option value="s">0322</option>
                                    <option value="s">0323</option>
                                    <option value="s">0324</option>
                                    <option value="s">0330</option>
                                    <option value="s">0331</option>
                                    <option value="s">0332</option>
                                    <option value="s">0333</option>
                                    <option value="s">0334</option>
                                    <option value="s">0335</option>
                                    <option value="s">0336</option>
                                    <option value="s">0337</option>
                                    <option value="s">0340</option>
                                    <option value="s">0341</option>
                                    <option value="s">0342</option>
                                    <option value="s">0343</option>
                                    <option value="s">0344</option>
                                    <option value="s">0345</option>
                                    <option value="s">0346</option>
                                    <option value="s">0347</option>
                                    <option value="s">0348</option>
                                  </select> 
                                </div><!--select container ends here-->                                         
                                <p></p>
                                
                                <div class="form-group has-feedback">                    
                                  <input type="text" class="form-control" id="exampleInputAmount" maxlength="7" placeholder="Phone No">
                                    <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                </div><!--div for form group ends here-->
                                                                                
                              </div><!--input group ends here-->
                                         
                            </form>         

                         <div>
                          <button class="btn btn-primary btn-block" data-toggle="modal" data-target=".whatsappmanage">Submit</button><p></p>
                         </div>


                                
                         </div><!--well ends here-->         
                        
                           
                         
                       
                    </div><!--First tab content ends-->  

                    <div role="tabpanel" class="tab-pane fade" id="gmail">

                          <!--Alerts-->

                                    <div class="visible"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Enabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Disabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Status Changed successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Phone number not found !
                                        </div>
                                    </div><!--div for alert ends here-->



                        <!---->

                         <div class="well well-lg">
                           <p class="gmail-center"><label>Gmail</label></p>
                              <label>Select one Status!</label>
                                <p></p>
                                  
                                  <div class="selectContainer">
                                    <select class="form-control" name="gmailStatus">                                                
                                      <option value="Enable">Enable</option> 
                                      <option value="Disable">Disable</option>                                                 
                                    </select>
                                  </div><!--select container ends here-->
                                  
                                <p></p>
                                <label>Enter Phone Number!</label>
                                <p></p>
                                
                            <form>  
                              <div><!--input group start here-->                                     
                                <div class="selectContainer">
                                  <select class="form-control" name="phone">                                              
                                    <option value="s" selected="selected">0300</option>
                                    <option value="s">0301</option>
                                    <option value="s">0302</option>
                                    <option value="s">0303</option>
                                    <option value="s">0304</option>
                                    <option value="s">0305</option>
                                    <option value="s">0306</option>
                                    <option value="s">0307</option>
                                    <option value="s">0308</option>
                                    <option value="s">0310</option>
                                    <option value="s">0311</option>
                                    <option value="s">0312</option>
                                    <option value="s">0313</option>
                                    <option value="s">0314</option>
                                    <option value="s">0315</option>
                                    <option value="s">0320</option>
                                    <option value="s">0321</option>
                                    <option value="s">0322</option>
                                    <option value="s">0323</option>
                                    <option value="s">0324</option>
                                    <option value="s">0330</option>
                                    <option value="s">0331</option>
                                    <option value="s">0332</option>
                                    <option value="s">0333</option>
                                    <option value="s">0334</option>
                                    <option value="s">0335</option>
                                    <option value="s">0336</option>
                                    <option value="s">0337</option>
                                    <option value="s">0340</option>
                                    <option value="s">0341</option>
                                    <option value="s">0342</option>
                                    <option value="s">0343</option>
                                    <option value="s">0344</option>
                                    <option value="s">0345</option>
                                    <option value="s">0346</option>
                                    <option value="s">0347</option>
                                    <option value="s">0348</option>
                                  </select> 
                                </div><!--select container ends here-->                                         
                                <p></p>
                                
                                <div class="form-group has-feedback">                    
                                  <input type="text" class="form-control" id="exampleInputAmount" maxlength="7" placeholder="Phone No">
                                    <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                </div><!--div for form group ends here-->
                                                                                
                              </div><!--input group ends here-->
                                         
                            </form>         

                         <div>
                          <button class="btn btn-primary btn-block" data-toggle="modal" data-target=".gmailmanage">Submit</button><p></p>
                         </div>


                                
                         </div><!--well ends here-->                        


                    </div><!--second tab content ends-->  


                    <div role="tabpanel" class="tab-pane fade" id="twitter">                      
                    
                          
                        <!--Alerts-->

                                    <div class="visible"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Enabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Already Disabled!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Status Changed successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Phone number not found !
                                        </div>
                                    </div><!--div for alert ends here-->



                        <!---->


                         <div class="well well-lg">
                           <p class="twitter-center"><label>Twitter</label></p>
                              <label>Select one Status!</label>
                                <p></p>
                                  
                                  <div class="selectContainer">
                                    <select class="form-control" name="twitterStatus">                                                
                                      <option value="Enable">Enable</option> 
                                      <option value="Disable">Disable</option>                                                 
                                    </select>
                                  </div><!--select container ends here-->
                                  
                                <p></p>
                                <label>Enter Phone Number!</label>
                                <p></p>
                                
                            <form>  
                              <div><!--input group start here-->                                     
                                <div class="selectContainer">
                                  <select class="form-control" name="phone">                                              
                                    <option value="s" selected="selected">0300</option>
                                    <option value="s">0301</option>
                                    <option value="s">0302</option>
                                    <option value="s">0303</option>
                                    <option value="s">0304</option>
                                    <option value="s">0305</option>
                                    <option value="s">0306</option>
                                    <option value="s">0307</option>
                                    <option value="s">0308</option>
                                    <option value="s">0310</option>
                                    <option value="s">0311</option>
                                    <option value="s">0312</option>
                                    <option value="s">0313</option>
                                    <option value="s">0314</option>
                                    <option value="s">0315</option>
                                    <option value="s">0320</option>
                                    <option value="s">0321</option>
                                    <option value="s">0322</option>
                                    <option value="s">0323</option>
                                    <option value="s">0324</option>
                                    <option value="s">0330</option>
                                    <option value="s">0331</option>
                                    <option value="s">0332</option>
                                    <option value="s">0333</option>
                                    <option value="s">0334</option>
                                    <option value="s">0335</option>
                                    <option value="s">0336</option>
                                    <option value="s">0337</option>
                                    <option value="s">0340</option>
                                    <option value="s">0341</option>
                                    <option value="s">0342</option>
                                    <option value="s">0343</option>
                                    <option value="s">0344</option>
                                    <option value="s">0345</option>
                                    <option value="s">0346</option>
                                    <option value="s">0347</option>
                                    <option value="s">0348</option>
                                  </select> 
                                </div><!--select container ends here-->                                         
                                <p></p>
                                
                                <div class="form-group has-feedback">                    
                                  <input type="text" class="form-control" id="exampleInputAmount" maxlength="7" placeholder="Phone No">
                                    <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                </div><!--div for form group ends here-->
                                                                                
                              </div><!--input group ends here-->
                                         
                            </form>         

                         <div>
                          <button class="btn btn-primary btn-block" data-toggle="modal" data-target=".twittermanage">Submit</button><p></p>
                         </div>


                                
                         </div><!--well ends here-->                        





                    </div><!--3rd tab content ends here-->
                  </div><!--tab panes ends here-->
                   </div><!--col md 4 ends here-->
                   <div class="col-md-4"></div>

                </div><!--row ends here-->

                  

              </div><!--Panel body ends here-->
  </div><!--panel primary ends here-->
      
  </div><!--Colmd12 ends here-->

  
  
</div><!--Row ends here-->


</div><!--container-->       
<!-- javascript -->
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $(function() {
    $('.nav-tabs a:first').tab('show');
  });
  </script>
 
</body>
</html>
