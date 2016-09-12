<?php
session_start();
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
        <script type="text/javascript" src="js/modernizr.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript" src="js/contact.js"></script>
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand" href="#">
        <img class="brand-logo" src="images/lgl_name.png" alt="logo">
      </a>
         <nav class="w-nav-menu nav-menu" role="navigation">
        <a class="w-hidden-main w-inline-block close-sidebar" href="#">
          <img src="images/close-mobile.png" width="20" alt="Logo.png">
        </a>
          <a class="w-nav-link menu" href="index.php#home">Hello</a>
           <?php if (empty($_SESSION['LoggedIn'])){echo '
          <a class="w-nav-link menu menu-hide" href="login.php">Log In</a>';}?>
          <a class="w-nav-link menu" href="index.php#about">About Us</a>
          <a class="w-nav-link menu" href="index.php#trade">New Trade</a>
            <a class="w-nav-link menu" href="index.php#risk">At Risk</a>
          <a class="w-nav-link menu" href="index.php#trouble">In Trouble</a>
          <a class="w-nav-link menu" href="index.php#legal">Legal</a>
          <a class="w-nav-link menu" href="index.php#contact">Contact</a>
          <?php if (empty($_SESSION['LoggedIn'])){
    echo '<a class="w-nav-link button-login log phone" id="login" href="login.php">Log In</a>
          <a class="w-nav-link button-login phone" id="signup" href="personal.php">Sign Up</a>';}
                elseif (!empty($_SESSION['LoggedIn'])){
                     if ($_SESSION['Account'] == 'Paid'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                        echo '<a class="w-nav-link button-login log3 phone" id="login" href="services.php">Account Type:<b> '.$_SESSION['Account'].'</b></a>';}
                     elseif ($_SESSION['Account'] == 'Expired'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="services.php">Account Type:<b> Exp&#39;d</b><br>Days Remaining: <b>0</b></a>';
                     }
                     elseif ($_SESSION['Account'] == 'Trial'){ echo
                        '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>
                        <a class="w-nav-link button-login log3 phone" id="login" href="services.php">Account Type:<b> '.$_SESSION['Account'].'</b><br>Days Remaining: <b>'.$_SESSION['days'].'</b></a>';
                        }
                }   
?>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
      </div>
    </div>
    <div class="w-container">
        <div class="personal_section">
    <div class="w-row">
      <div class="w-col w-col-6">
        <h1 class="below-image sales">We have made it even easier for you to subscribe to Grouca, we’ve deeply discounted the already-low subscription price for a limited time. That’s 50% off our standard price.</h1>
          <h1 class="below-text">No commitments. Cancel at any time.</h1>
      </div>
      <div class="w-col w-col-6">
        <div class="w-container right-container">
          <div>
            <div id="servicesform">
               <?php echo isset($errors) ? '<div class="errors">'.$errors.'</div>': '';?>
                <h1 class="below-image CC">Grouca Trade Intelligence Utility</h1>
                 <h1 class="below-text CC">*Discount Pricing*</h1><br>
                <h1 class="below-text CC" style="color:red">Payment Successful. Click here to access the <a href='services.php'>Services</a> section.</h1>
                </div>
              </div>
            </div>
          </div>
     </div>
    
           <br><p style="text-align: left;">YOUR SUBSCRIPTION INCLUDES<br>
Daily notification about new high probability professional trades, when to take profits, how to protect profit and stretch it further, how to rebalance portfolio for risk and how to adjust trades to mitigate risk of loss. Full access to all our current and future high probability professional trades. Included with each trade you will get a stock and option strategy selection, instructions on how to place the order, what entry prices to use, what is the target gain, risk profile and margin requirements if any. In addition, you will get intructions in how to maximize your gains and when to lock your profits on existing trades. In the event of a position becoming unbalanced, or of a sudden market move that shifts a position to a loss profile, we will immediately intervene with step by step adjustment instructions on how to improve or eliminate the risk and get the position out of trouble.
<br><br>
INFORMATION:<br>
All credit card charges will appear under the name Labtrade, Grouca's parent company. Maurice Lichten, the founder and employees, all have a financial interest in Grouca's recommendations as they trade on the same equities and options that are recommend.
<br><br>
RISK DISCLOSURE: <br>
Past performance is not necessarily indicative of future results. All of the content on our website and in our email alerts is for informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Grouca is not registered or regulated as a broker-dealer. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts.</p>
            </div>
          </div>
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
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>