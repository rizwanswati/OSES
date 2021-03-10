<div>
<div class="row top">
    <div class="col-md-12">

      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>         
          
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            
            <li><a href="Home.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="ShowMessagesPage.php">Messages</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="RegisterServicesPage.php">Register Services</a></li>
                <li><a href="ManageServicesPage.php">Manage Services</a></li>
              </ul>
              </li>
            <li><a href="#">Contact</a></li>
           </ul>

           <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><label><?php echo $_SESSION['user']; ?></label></a></li>
        <li><a href="BusinessLogic/logout.php">Log Out</a></li>
</ul>
          
        </div><!-- /.navbar-collapse -->
    </div>
  </div><!--row-->
