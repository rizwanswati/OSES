<?php require_once("includes/session.php");  ?>
<?php login(); ?>

<!doctype html>
<html>
<head>

<script type="text/javascript">
 
 

  function isValid()
  {
    var username = document.getElementById("usrname").value;
    var pswd     = document.getElementById("pswrd").value;
    

    if (username==null || username=="") 
      {
        
      
        //document.getElementById("walert").style.display   = 'inline';
        document.getElementById("username1").className      ='form-group has-error has-feedback has-feedback-left';
        document.getElementById("username2").className      ='glyphicon glyphicon-alert form-control-feedback';
        document.getElementById("helpBlock1").style.display = 'inline';        
        document.username.focus();            
        return false;
      }
    else
    {
      document.getElementById("username1").className='form-group has-success has-feedback has-feedback-left';
      document.getElementById("username2").className='glyphicon glyphicon-ok form-control-feedback';
      document.getElementById("helpBlock1").style.display = 'none';
    }  

      if (pswd==null || pswd=="") 
      {
        document.getElementById("password1").className='form-group has-error has-feedback has-feedback-left';
        document.getElementById("password2").className='glyphicon glyphicon-alert form-control-feedback';
        document.getElementById("helpBlock2").style.display = 'inline';
        document.pswrd.focus();
        return false;
      }
      else
      {
        document.getElementById("helpBlock2").style.display = 'none';

      }

      if (pswd.length<8 || pswd.length>32) 
      {
        document.getElementById("password1").className='form-group has-error has-feedback has-feedback-left';
        document.getElementById("password2").className='glyphicon glyphicon-alert form-control-feedback';
        document.getElementById("helpBlock3").style.display = 'inline';        
        document.pswrd.focus();
        return false;
      }
      

  }

 

  function checkdata()
  {
      var pswd = document.getElementById("pass").value;
      if (pswd.length<8 || pswd.length>32) 
      {
        alert("Password must be atleast 8 character long and less then 32 characters");
        pass.style.background = "#ffebee";
        document.pass.focus();
        return false;
      }

      var phonenumber = document.getElementById("phone").value;
      
      if (phonenumber.length>11 && phonenumber.length<11) 
        {
          alert("Phone number length must not exceed 11 digits or must below 11 digits");
          phone.style.background = "#ffebee";
          document.phone.focus();
          return false;
        }


      var username = document.getElementById("uname").value;
      if (username==null || username=="" || username==" ") 
      {
        alert("username Can not be Empty");
        uname.style.background = "#ffebee";
        document.uname.focus();
        return false;
      }


  }

  function warningAlert()
  {
    document.getElementById("walert").style.display = 'inline';
  }
/*function showDivAttid(){

        if(Your Condition) {

            document.getElementById("attid").style.display = 'inline';
        }
        else
        {
            document.getElementById("attid").style.display = 'none';
        }

  */
</script>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Testing</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/owncustom.css" rel="stylesheet">
  <script src="js/respond.js"></script>

</head>

<body>
  <!--Modal for registration starts here-->

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body">
          
          <form action="BusinessLogic/registration.php" method="post">
            
            <div class="form-group">
            
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required>
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="pass" id="pass"  placeholder="Password" pattern=".{8,}" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone No</label>
              <input type="text" class="form-control" name="phone" maxlength="11" placeholder="Phone No i.e 03454311519" id="phone" onkeypress="return event.charCode > 47 && event.charCode < 58 && event.charCode = 8;" pattern="[0-9]{11}" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" name="email" id="email"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>
            <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="regsubmit" id="regsubmit" class="btn btn-primary" onclick="checkdata();">Submit</button>
        </div>

          </form>
        </div>
        
      </div>
    </div>
  </div>
  <!--modal for registration ends here-->


  <div class="container">
    <div class="row top">
      <div class="col-md-12">
        <div class="row top">
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">



                </ul>

              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>
    <div class="row top">
      <div class="col-md-4">
      </div>

      <div class="col-md-4">

        <div class="panel panel-primary"> 

          <div class="panel-heading">Sign In</div>


          <div class="well well-lg well-login">

           <div id="center-image"><img src="img/login-icon.png" alt="Wisdom Pets." class="img-responsive" height="150px" width="150px"></div>      



            <!--div for alert start here-->  
            <div  id="walert" style="display:none">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Please enter username!
                </div>   
            </div><!--div for alert start here-->  

          <form action="LoginPage.php" method="post" >
          
            
            <div class="form-group has-feedback has-feedback-left" id="username1">

              <input type="text" name="username" class="form-control"  placeholder="Username" id="usrname" required>
              <i class="glyphicon glyphicon-user form-control-feedback" id="username2"></i>
              <div id="helpBlock1" class="help-block" style="display:none">Plese enter username.</div>
            </div>
            
            <div class="form-group has-feedback" id="password1">                  

              <input type="password" required id="pswrd" name="password" class="form-control"  placeholder="Password" pattern=".{8,}">
              <i class="glyphicon glyphicon-lock form-control-feedback" id="password2"></i>
              <div id="helpBlock2" class="help-block" style="display:none">Please enter password!</div>
              <div id="helpBlock3" class="help-block" style="display:none">Password must be atleast 8 character long and less then 32 characters</div>
            </div>



            <button type="submit" class="btn btn-primary btn btn-block" onclick="return isValid();">Sign In</button>
            <p></p>
            <br/>
            <p><a href="#" data-toggle="modal" data-target="#loginModal">Register</a></p>
            <p>&nbsp</p>    
            
          </form>
        </div><!--well-->

      </div><!--panel div ends-->
    </div>

    <div class="col-md-4">
    </div>

  </div><!--row-->
</div><!--container-->       
<!-- javascript -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script type="text/javascript">
       
        function run()
        {
          $('#loginModal').modal('hide');                        
                      
        }

        </script>




</body>
</html>
