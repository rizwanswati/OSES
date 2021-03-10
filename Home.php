<?php require_once("includes/session.php");  ?>
<?php require_once("includes/functions.php");  ?>
<?php confirm_login(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/owncustom.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    
</head>

<body>
<div class="container">

<!--navigation bar-->
    
        <?php 
        include("includes/header.php");
         ?>
</div>         
<div class="row top">
    <div class="col-md-12">
       <div class="jumbotron">
       <img src="img/os.png" alt="Image Error!!!" class="img-responsive pull-right  img-rounded" height="350px" width="350px">
          <h2>Offline Socail Media and Email Sevices!</h2>
          <p><h5 class="text-justify">OS&ES is a system based on Android application and a back-end dedicated server both connected through GSM and server uses internet to connect to the other receiver as well as sender devices while need no internet availability at sender end devices.</h5></p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Read More</a></p>
        </div>     
    </div>
</div>


<div class="row top">
    <div class="col-md-4">      

            <div class="panel panel-green">  
            <div class="panel-heading">WhatsApp</div>  
               <div class="panel-body text-justify">
                 WhatsApp Messenger is a instant messaging client for smartphones. It uses the Internet to send text messages, images, video, user location and audio media messages to other users using standard cellular mobile numbers.
                  
                </div>
            </div>    
                  
    </div>

    <div class="col-md-4">
          
          <div class="panel panel-red">  
            <div class="panel-heading">Gmail</div>  
               <div class="panel-body">
                  Gmail is a free, advertising-supported email service provided by Google. Users may access Gmail as secure webmail, as well as via POP3 or IMAP4 protocols.It is an application by Google.Google also have other applications.
                </div>
            </div>

    </div>
    <div class="col-md-4">
      
    <div class="panel panel-blue">  
            <div class="panel-heading">Twitter</div>  
               <div class="panel-body">
                 Twitter is an online social networking service that enables users to send and read short 140-character messages called "tweets". Registered users can read and post tweets, but those who are unregistered can only read them. 
                </div>
            </div>

    </div>

</div>

</div><!--container-->       
<!-- javascript -->
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
 
</body>
</html>
