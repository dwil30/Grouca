<?php
session_start();
$_SESSION = array();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca - Options Trading Utility</title>
  <meta name="description" content="Grouca is a option trading utility that gives you step by step directions for setting up trades that generate above average returns, it shows you how to rebalance portfolio risk, and it intervenes with adjustments when existing trades get in trouble.">
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
      <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript">
     var RecaptchaOptions = {
        theme : 'white'
     };
     </script>
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand" href="index.php">
        <img class="brand-logo" src="images/lgl_name.png" alt="logo">
      </a>
      <nav class="w-nav-menu nav-menu" role="navigation">
        <a class="w-hidden-main w-inline-block close-sidebar" href="index.php">
          <img src="images/close-mobile.png" width="20" alt="Logo.png">
        </a>
          <a class="w-nav-link menu" href="index.php#home">Hello</a>
           <a class="w-nav-link menu menu-hide" href="login.html">Log In</a>
          <a class="w-nav-link menu" href="index.php#about">About Us</a>
          <a class="w-nav-link menu" href="index.php#trade">New Trade</a>
            <a class="w-nav-link menu" href="index.php#risk">At Risk</a>
          <a class="w-nav-link menu" href="index.php#trouble">In Trouble</a>
          <a class="w-nav-link menu" href="index.php#legal">Legal</a>
          <a class="w-nav-link menu" href="index.php#contact">Contact</a>
           <a class="w-nav-link button-login log phone" id="login" href="login.html">Log In</a>
         
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
 </div>
    <div class="w-container">
        <div class="personal_section">   
    <div class="w-row">
      <div class="w-col w-col-7"><img class="social-image" src="images/image_pseudo_social.jpg" alt="546e4b05c740bddf740cebaa_image_pseudo_social.jpg">
        <h1 class="below-image">See for yourself why Grouca outperforms the market!</h1>
          <h1 class="below-text">Free 14-day trial. No credit card necessary.</h1>
      </div>
      <div class="w-col w-col-5">
        <div class="w-container right-container">
          <div>
            <div id="servicesform" style="text-align: center;">
                                 <?php
        // show potential errors / feedback (from registration object)
        if (isset($registration)) {
            if ($registration->errors) {
                foreach ($registration->errors as $error) {
                    echo '<div class="error">'.$error.'</div>';
                }
            }
            if ($registration->messages) {
                foreach ($registration->messages as $message) {
                    echo $message;
                }
            }
        }
            ?>
            <form method="post" action="register.php" name="registerform">
        <input type="email" class="w-input email-text" id="login_input_email" placeholder="Email Address" name="user_email" value="<?php echo $_POST['user_email'];?>" required >
        <input type="password" class="w-input email-text" id="login_input_password_new" placeholder="Password" name="user_password_new" value="<?php echo $_POST['user_password_new'];?>" required>
        <input type="password" class="w-input email-text" id="login_input_password_repeat" placeholder="Confirm Password" name="user_password_repeat" value="<?php echo $_POST['user_password_repeat'];?>" required>
        <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?><br><br>
        <input type="text" id="security_code" name="security_code" autocomplete="off" class="w-input email-text" placeholder="Enter the code" required>
        <input type="submit" class="nav-email nav-continue" id="continue" name="register" value="Continue">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
