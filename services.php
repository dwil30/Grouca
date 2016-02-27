<?php
session_start();
if( $_SESSION['LoggedIn'] != 1){ //if login in session is not set
    header("location:http://www.grouca.com/login.php");
    exit();
}     
?>
<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca | The very best Trade Intelligence Platform</title>
  <meta name="description" content="Grouca is an option trading utility that gives you step-by-step directions for setting up trades that generate above average returns.  It shows you how to rebalance portfolio risk, and intervenes with adjustments when existing trades get in trouble.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/labtrade-a-gemological-company.webflow.css">
    <link rel="stylesheet" type="text/css" href="css/grouca2.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" href="favicons/apple-touch-icon-180x180.png">
  
    <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
      <style type="text/css">
    @media screen and (min-width: 1200px) {
        .w-container {
          max-width: 1170px;
        }
      }
  </style>
        <script type="text/javascript" src="js/modernizr.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript" src="js/contact.js"></script>
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand" href="https://grouca.com">
        <img class="brand-logo" src="images/lgl_name.png" alt="logo">
      </a>
        
             <nav class="w-nav-menu nav-menu" role="navigation">
        <a class="w-hidden-main w-inline-block close-sidebar" href="#">
          <img src="images/close-mobile.png" width="20" alt="Logo.png">
        </a>
           <?php if (empty($_SESSION['LoggedIn'])){echo '
          <a class="w-nav-link menu menu-hide" href="login.php">Log In</a>';}?>
          <a class="w-nav-link menu" href="index.php#about">About Us</a>
          <a class="w-nav-link menu" href="index.php#trade">The Right Trade</a>
            <a class="w-nav-link menu" href="index.php#risk">Risk Management</a>
          <a class="w-nav-link menu" href="index.php#trouble">When to Intervene</a>
          <a class="w-nav-link menu" href="index.php#contact">Contact</a>
            <?php if (empty($_SESSION['LoggedIn'])){
    echo '<a class="w-nav-link button-login log phone" id="login" href="login.php">Log In</a>
          <a class="w-nav-link button-login phone" id="signup" href="personal.php">Sign Up</a>';}
                elseif (!empty($_SESSION['LoggedIn'])){
                     if ($_SESSION['Account'] == 'Paid'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                        echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b></a>';}
                     elseif ($_SESSION['Account'] == 'Expired'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> Exp&#39;d</b><br>Days Remaining: <b>0</b></a>';
                     }
                     elseif ($_SESSION['Account'] == 'Trial'){
                     $now = time();
                     $your_date = strtotime($_SESSION['Join_Date']);
                     $datediff = floor(($now - $your_date)/(60*60*24));
                        if ($datediff >=14){
                         $sql = "UPDATE users SET AccountType ='Expired' WHERE user_email ='". $_SESSION['UserName']."'";
                         include("base.php");
                         $query_update_status = mysql_query($sql) or die(mysql_error());
                            echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> Exp&#39;d</b><br>Days Remaining: <b>0</b></a>';
                        $_SESSION['Account'] = 'Expired';
                        }
                        elseif ($datediff <14){
                         $days_remaining = 14 - $datediff;
                        $_SESSION['days']=$days_remaining;    
                        echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                        echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b><br>Days Remaining: <b>'.$days_remaining.'</b></a>';
                        }
                }   
            }
?>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
      </div>
    </div>
                    <?php 
                    if($_SESSION['Account'] == 'Expired'){
                        include 'expired.php';
                    }
                    else{
                        include __DIR__ . '/member.php';
                    }
                    ?>
                     
    
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2014 Grouca&nbsp;</p>
          </div>
          <div class="w-col w-col-6">
            <div class="team-icons footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
    <script>
    $(".new").click(function(e){
         e.preventDefault();
    $("#new").show();
});

$(".adjust").click(function(e){
     e.preventDefault();
    $("#adjust").show();
});
        
        $(".trading").click(function(e){
             e.preventDefault();
    $("#trading").show();
});
        
        $(".help").click(function(e){
             e.preventDefault();
    $("#help").show();
});
        
              $(".hide-all").click(function(e){
                   e.preventDefault();
    $("#help").hide();
                     $("#trading").hide();
                     $("#adjust").hide();
                     $("#new").hide();
                  
});
        
    </script>
</body>
</html>