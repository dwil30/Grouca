<?php
session_start();

?>
<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca</title>
  <meta name="description" content="Receive high probability professional trades daily. Option strategy, stock name and price, detailed instructions on how to place the order, what entry prices to use, target gain, risk profile and margin requirements if any.">
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
  <script type="text/javascript" src="js/modernizr.js"></script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-50007502-1'], ['_trackPageview']);
    (function() {
      var ga = document.createElement('script');
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript">
$(function() {
    $(document).scrollTop( $("#bottom_form").offset().top - 270);  
});
    </script>
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand" href="index.php">
        <img class="brand-logo" src="images/lgl_name.png" alt="logo">
      </a>
      <nav class="w-nav-menu nav-menu" role="navigation">
        <a class="w-hidden-main w-inline-block close-sidebar" href="#">
          <img src="images/close-mobile.png" width="20" alt="Logo.png">
        </a>
          <a class="w-nav-link menu" href="index.php#home">Hello</a>
           <a class="w-nav-link menu phone2" href="login.php">Log In</a>
          <a class="w-nav-link menu" href="index.php#about">About Us</a>
          <a class="w-nav-link menu" href="index.php#trade">New Trade</a>
            <a class="w-nav-link menu" href="index.php#risk">At Risk</a>
          <a class="w-nav-link menu" href="index.php#trouble">In Trouble</a>
          <a class="w-nav-link menu" href="index.php#legal">Legal</a>
          <a class="w-nav-link menu" href="index.php#contact">Contact</a>
          <a class="w-nav-link button-login log phone" id="login" href="index.php?logout"><?php echo $_SESSION['user_email']; ?></a>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
 </div>
   <div class="w-container">
            <div class="login_section">
            <div class="form-signin"> 
            <p class="loginheadline"><b>Today's Daily Trade</b></p>
                <p>Includes full access to all our current and future high probability professional daily trades.</p><br>
            <p>Receive high probability professional trades daily. Option strategy, stock name and price, detailed instructions on how to place the order, what entry prices to use, target gain, risk profile and margin requirements if any. Receive notification with step by step intructions on how to increase and lock your profits on existing positions, how to rebalance your trades when risk gets high. Receive intervention with detailed professional instructions on how to adjust positions that get in trouble.</p>
                
                <p><b>Free 14 day trial, no credit card required.</b></p>
                
                  <p>No long term contract, you can cancel at any time.</p>
        <!--        
             <form action="#" method="post">
                 <select name="plan" class="nav-email">
                     <option selected disabled>Select an option</option>
                     <option value="basic">Monthly $39</option>
                 </select>
                 <br>
                  <p class="loginheadline">At Risk</p>
            <p>It provides notification with step by step intructions on how to rebalance your trades when risk gets high. </p>
            
                 <select name="risk" class="nav-email">
                     <option selected disabled>Select an option</option>
                     <option value="risk-one">Monthly $69</option>
                 </select>
                 <br>
                  <p class="loginheadline">In Trouble</p>
            <p>It intervenes with detailed professional instructions on how to adjust positions that get in trouble.</p>
             <form action="#" method="post">   
                 <select name="trouble" class="nav-email">
                     <option selected disabled>Select an option</option>
                     <option value="trouble-one">Monthly - $99</option>
                 </select>
                <input type="submit" class="nav-email nav-continue" id="continue" name="continue" value="Submit">
            </form><br>
                </div>
                    </div>
                </div>
    <br><br>-->
                </div></div></div>
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
</body>
</html>