<?php require_once("includes/session.php");  ?>
<?php require_once("includes/functions.php");  ?>
<?php include 'gmail/config.php' ?>
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

    <script type="text/javascript">

function gSubmitdata()
 {
    var code  = document.getElementById("gphonecode").value;
    var gphoneno = document.getElementById("gphoneno").value;
      
     var temp =code+gphoneno;
     
     if(code && gphoneno)
      {
        var str='BusinessLogic/RegisterServices.php?session_name='+temp;
        jQuery('#div_session_write').load(str);
      }
      else
      {
        alert("Fill the fields");
      }
     
}

////////////////////////

function tSubmitdata()
 {
    alert("Working");
    var tcode  = document.getElementById("tphonecode").value;
    var tphoneno = document.getElementById("tphoneno").value;
     
     
    
     var temp =tcode+tphoneno;
     
     if(tcode && gphoneno)
      {
        var str='BusinessLogic/RegisterServices.php?tsession_name='+temp;
        jQuery('#div_session_twrite').load(str);
      }
      else
      {
        alert("Fill the fields");
      }
     
}

    </script>
    
    
</head>

<body>
<!--Modal for 1st whatsapp number-->
<div id='div_session_write'> </div>
<div id='div_session_twrite'> </div>
                    <div class="modal fade firstmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
<!--end of first modal-->

<!--Modal for 2nd whatsapp number-->
                    
                    <div class="modal fade secondmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="RegisterServices.php" method="post">
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
<!--end of 2nd modal-->

<!--Modal for gmail number-->
                    
                    <div class="modal fade gmailmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
<!--end of gmail modal-->

<!--Modal for twitter number-->
                    
                    <div class="modal fade twittermodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
<!--end of 2nd modal-->

<!--Modal for sign in Gmail -->
                    
                   <div class="modal fade gmailSignIn" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">Please select Sign In Option</h5>
                        </div><!--modal header ends here-->

                        <div class="modal-body">
                          
                          
                            <!-- <img onclick="javascript:PopupCenter('<?php echo $login_url; ?>','xtf','900','500')" src="img/gmailButton2.png" alt="" style="width: 270px; height: 50px;" data-dismiss="modal">
                                            -->               
                             <a onclick="javascript:PopupCenter('<?php echo $login_url; ?>','xtf','900','500')" data-dismiss="modal" class="btn btn-lg btn-block btn-social btn-google">
                              <span class="fa fa-google"></span> Sign in with Google
                            </a>        
                            <br>         
                            <p class="gmail-center"><label>OR</label></p>
                            <div class="form-group has-feedback">                    
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            </div>
                              
                            <div class="form-group has-feedback">                    
                              <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                            </div>
                              
                                      
                        </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>

                      </div><!--modal content ends here-->
                    </div>
                  </div>
<!--end of 2nd modal-->

<!--Modal for sign in Twitter -->
                    
                   <div class="modal fade twitterSignIn" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">Please Sign In to continue</h5>
                        </div><!--modal header ends here-->

                        <div class="modal-body">
                          
                                        
                             <a onclick="javascript:PopupCenter('<?php echo "sign_in_with_twitter/sign-in.php"; ?>','xtf','900','500')" data-dismiss="modal" class="btn btn-lg btn-block btn-social btn-twitter">
                              <span class="fa fa-twitter"></span> Sign in with Twitter
                            </a>        
                            <br>         
                            
                              
                                      
                        </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>

                      </div><!--modal content ends here-->
                    </div>
                  </div>
<!--end of 2nd modal-->





<div class="container">
 
  <!--navigation bar-->
        <?php 
        include("includes/header.php");
         ?>

<div class="row top">
  <div class="col-md-12">
  <div class="panel panel-primary">  
            <div class="panel-heading">Register Services <i class="fa fa-pencil-square-o fa-fw fa-lg"></i> </div>  
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
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Registered Successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <strong>Warning!</strong> Failed to register the number!
                                        </div>
                                    </div><!--div for alert ends here-->
                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <strong>Warning!</strong> Limit reached !
                                        </div>
                                    </div><!--div for alert ends here-->


                        <!---->


                        <div class="well well-lg">

                        
                              <p class="whatsapp-center"><label>WhatsApp</label></p>
                              <label>Enter WhatsApp phone No</label>
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

                      <button class="btn btn-primary btn-block pnosubmitbutton1" data-toggle="modal" data-target=".firstmodal"> <i class="fa fa-plus-circle fa-fw fa-lg"></i> Add Number </button>                  


                         </div><!--well ends here-->
                    </div><!--First tab content ends-->  


                    <div role="tabpanel" class="tab-pane fade" id="gmail">


                        <!--Alerts-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Registered Successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Failed to register the number!
                                        </div>
                                    </div><!--div for alert ends here-->
                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Limit reached !
                                        </div>
                                    </div><!--div for alert ends here-->


                        <!---->

                         <div class="well well-lg">
                         <!--Here is a form for sign in with google-->
                            <p class="gmail-center"><label>Gmail</label></p>
                            <label>Enter phone No</label>

                                <div><!--input group start here-->
                                        <div class="selectContainer">
                                            <select class="form-control gray-color" name="gphonecode"  id="gphonecode" required>
                                              <option disabled selected value>Select code</option>
                                               <option>0300</option>
                                               <option>0301</option>
                                                <option>0302</option>
                                                <option>0303</option>
                                                <option>0304</option>
                                                <option>0305</option>
                                                <option>0306</option>
                                                <option>0307</option>
                                                <option>0308</option>
                                                <option>0310</option>
                                                <option>0311</option>
                                                <option>0312</option>
                                                <option>0313</option>
                                                <option>0314</option>
                                                <option>0315</option>
                                                <option>0320</option>
                                                <option>0321</option>
                                                <option>0322</option>
                                                <option>0323</option>
                                                <option>0324</option>
                                                <option>0330</option>
                                                <option>0331</option>
                                                <option>0332</option>
                                                <option>0333</option>
                                                <option>0334</option>
                                                <option>0335</option>
                                                <option>0336</option>
                                                <option>0337</option>
                                                <option>0340</option>
                                                <option>0341</option>
                                                <option>0342</option>
                                                <option>0343</option>
                                                <option>0344</option>
                                                <option>0345</option>
                                                <option>0346</option>
                                                <option>0347</option>
                                                <option>0348</option>
                                            </select>
                                          </div><!--select container ends here-->  
                                            <p></p>
                                          
                                          <div class="form-group has-feedback">

                                        <input type="text" class="form-control" name="gphoneno" id="gphoneno" maxlength="7" placeholder="Phone No" required>
                                          <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                      </div>  
                                                                                   
                                        <p></p>
                                                                                
                                      </div><!--input group ends here-->                                    

                            
                          
                          <div>
                          
                          <input type="submit" id="gSave-Number" name="gSave-Number" onclick="gSubmitdata();"  data-toggle="modal" data-target=".gmailSignIn" class="btn btn-primary btn-block"  value="Submit" />
                      
                          </div>
                          
                          <!--data-toggle="modal" data-target=".gmailSignIn"-->
                              

                         <!--form for sign in with google ends here-->
                         
                           
                         </div><!--well ends here-->
                    </div><!--second tab content ends-->  


                    <div role="tabpanel" class="tab-pane fade" id="twitter">


                      <!--Alerts-->

                                    <div class="visible"><!--div for alert start here-->  
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Registered Successfully!
                                        </div>
                                    </div><!--div for alert ends here-->

                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Failed to register the number!
                                        </div>
                                    </div><!--div for alert ends here-->
                                    <div class="hidden"><!--div for alert start here-->  
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           Limit reached !
                                        </div>
                                    </div><!--div for alert ends here-->


                        <!---->

                         <div class="well well-lg">

                              <form>
                                      <p class="twitter-center"><label>Twitter</label></p>
                                      
                                        
                                        <div><!--input group start here-->
                                        <div class="selectContainer">
                                            <select class="form-control" name="tphonecode"  id="tphonecode">
                                              <option disabled selected value>Select code</option>
                                               <option>0300</option>
                                               <option>0301</option>
                                                <option>0302</option>
                                                <option>0303</option>
                                                <option>0304</option>
                                                <option>0305</option>
                                                <option>0306</option>
                                                <option>0307</option>
                                                <option>0308</option>
                                                <option>0310</option>
                                                <option>0311</option>
                                                <option>0312</option>
                                                <option>0313</option>
                                                <option>0314</option>
                                                <option>0315</option>
                                                <option>0320</option>
                                                <option>0321</option>
                                                <option>0322</option>
                                                <option>0323</option>
                                                <option>0324</option>
                                                <option>0330</option>
                                                <option>0331</option>
                                                <option>0332</option>
                                                <option>0333</option>
                                                <option>0334</option>
                                                <option>0335</option>
                                                <option>0336</option>
                                                <option>0337</option>
                                                <option>0340</option>
                                                <option>0341</option>
                                                <option>0342</option>
                                                <option>0343</option>
                                                <option>0344</option>
                                                <option>0345</option>
                                                <option>0346</option>
                                                <option>0347</option>
                                                <option>0348</option>

                                            </select>
                                          </div><!--select container ends here--> 
                                            <p></p>
                                          
                                          <div class="form-group has-feedback">                    
                                        <input type="text" class="form-control" name="tphoneno" id="tphoneno" maxlength="7" placeholder="Phone No">
                                          <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                      </div>                                                
                                        <p></p>
                                                                               
                                      </div><!--input group ends here-->  
                                          
                                     
                                      </form>
                                   
                                   <input type="submit" id="tSave-Number" name="tSave-Number" onclick="tSubmitdata();"  data-toggle="modal" data-target=".twitterSignIn" class="btn btn-primary btn-block"  value="Submit" />  

                         </div><!--well ends here-->

                    </div><!--3rd tab content ends here-->
                  </div><!--tab panes ends here-->
                   </div><!--col md 4 ends here-->
                   <div class="col-md-4"></div>

                </div><!--row ends here-->



                  
                  <p>&nbsp</p>
                  <p>&nbsp</p>

              </div><!--Panel body ends here-->
  </div><!--panel primary ends here-->
      
  </div><!--Colmd12 ends here-->

  
  
</div><!--Row ends here-->


</div><!--container-->       
<!-- javascript -->
  <!--<script src="https://code.jquery.com/jquery.js"></script>-->
 <!--   <script src="js/jquery.min.js"></script>-->       
  <!--<script src="js/bootstrap.min.js"></script>-->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>--> 
  <!--<script src="http://malsup.github.com/jquery.form.js"></script>-->
   <script src="js/global.js"></script>
  <script>
  $(function() {
    $('.nav-tabs a:first').tab('show');
  });
  </script>
 <script>
$("[data-toggle=popover]").popover({
    html: true, 
  content: function() {
          return $('#popover-content').html();
        }
});
</script>

<script type="text/javascript">


    function PopupCenter(url, title, w, h) {  
        // Fixes dual-screen position                         Most browsers      Firefox  
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
                  
        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
                  
        var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
        var top = ((height / 2) - (h / 2)) + dualScreenTop;  
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
      
        // Puts focus on the newWindow  
        if (window.focus) {  
            newWindow.focus();  
        }  
    }  

</script>

</body>
</html>
