<?php
session_start();

if(isset($_GET['discount'])) 
{
  if ($_GET['discount'] == 'grouca1')
  {
      $_SESSION['discount'] = 1;
  }
}

if(isset($_POST['continue_off'])) {
      $errors ='';
        $captcha = $_SESSION['captcha']['code'];
        if (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $errors .= "Empty Password";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $errors .= "Password and confirm password are not the same";
        } elseif ($_POST['security_code'] !== $captcha) {
            $errors .= "Captcha code does not match. Please try again";
        } elseif (strlen($_POST['user_password_new']) < 4) {
            $errors .= "Password has a minimum length of 4 characters";
        } elseif (empty($_POST['user_email'])) {
            $errors .= "Email cannot be empty"; 
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors .= "Your email address is not in a valid email format";
        } elseif (!empty($_POST['user_email'])
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
            && ($_POST['security_code'] == $captcha)
        ) {
            include("base.php");
            $user_email = mysql_real_escape_string($_POST['user_email']);
            $user_password_hash = md5(mysql_real_escape_string($_POST['user_password_new']));
            $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
            $query_check_user_name = mysql_query($sql);

                 if(mysql_num_rows($query_check_user_name) == 1){
                    $errors .= "Sorry, that email address is already in use.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_password_hash, user_email, JoinDate, AccountType, Subscribed)
                            VALUES('" . $user_password_hash . "', '" . $user_email . "', CURDATE(), 'Trial', '1');";
                    $query_new_user_insert = mysql_query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $_SESSION['UserName'] = $_POST['user_email'];
                        $_SESSION['Join_Date'] = date('Y-m-d');
                        $_SESSION['Account'] = 'Trial';
                        $_SESSION['LoggedIn'] = 1;    
                        $_SESSION['price'] = $_POST['price'];
                        header("location:payment.php");
                        
                    } else {
                        $errors .= "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $errors .= "Sorry, no database connection.";
            }
        } 

if(isset($_POST['continue_log'])) {
    $_SESSION['price'] = $_POST['price'];
    header("location:payment.php");
}
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
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
      <a class="w-nav-brand" href="https://grouca.com">
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
        <h1 class="below-image sales">Expertly Selected Trades, Executed in Seconds.</h1>
          <h1 class="below-text">Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</h1>
          <h1 class="below-image" style="font-size: 32px;
">No long-term commitment required.</h1>
          <h1 class="below-text">Cancel your monthly or annual subscription at any time.</h1>
          <?php if (empty($_SESSION['LoggedIn'])){ ?>
          <br><p class="paragraph subphone2">YOUR SUBSCRIPTION INCLUDES:</p>
          <p class="paragraph subphone2"><b>Grouca’s High Probability Trade Locator</b> </p>
          <p class="paragraph subphone2">We’ve developed innovative, data-driven technology that scours the market, then zeroes in on trades that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy.  </p>
          <p class="paragraph subphone2"><b>Full Access: Current & Future High Probability Trades  </b> </p>
          <p class="paragraph subphone2">Whenever an open trade requires rebalancing or adjusting to get back on trade, you will receive an At Risk or In Trouble alert from Grouca’s intelligent risk management tool.  </p>
          <p class="paragraph subphone2">Each At Risk or In Trouble alert tells you 
  <ul>  <li>When to book a profit</li>
        <li>How to leverage current gains higher</li>
        <li>How to adjust trades to minimize risk </li>
      <li>How to reverse losing positions to break even or get back to gain status. </li></ul></p>
          <p class="paragraph subphone2"><b>Full Access: Adjustment Manager</b> </p>
          <p class="paragraph subphone2">Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed options strategy. When open trades require rebalancing or adjustments, you’ll receive an At Risk or In Trouble alert that outlines how to get back on track.</p>
          <p class="paragraph subphone2">Each new trade contains <ul>
        <li>Option strategy</li>
        <li>Underlying stock name and price</li>
        <li>Detailed instructions on how to place the order</li> 
        <li>What entry price to use </li>
        <li>Target gain and risk profile</li></ul></p>
     <p class="paragraph subphone2"><b>An Options Strategy, 100% Modeled for You   </b> </p>
          <p class="paragraph subphone2">We model the trade or adjustment entirely, so all you have to do is submit them to your broker. Click the submit button included in each alert to send the fully modeled trade to your broker in seconds.  </p>        <br>
          <?php } ?>
      </div>
      <div class="w-col w-col-6">
        <div class="w-container right-container">
          <div>
            <div id="servicesform">
               <?php echo isset($errors) ? '<div class="errors">'.$errors.'</div>': '';?>
                <h1 class="below-image CC">Sign Up for Grouca</h1>
                 <!--<h1 class="below-text CC">*Discount Pricing*</h1>-->
              
            <form name='credit' id="form-style" action="" method="post"> 
                <?php if ($_GET['discount'] == 'grouca1'){ ?>
                <input required id="radio-button" type="radio" name="price" value="1"> <b>$79 per month recurring</b> (normally $99/month) 20% Discount. <br>
                <input required id="radio-button" type="radio" name="price" value="2"><b> $949 per year</b> - 58% Discount.<br><br>
                
                <?php } else { ?>
                     <input required id="radio-button" type="radio" name="price" value="3"> <b>$99 per month recurring</b><br>
                <input required  id="radio-button" type="radio" name="price" value="4"><b> $1189 per year</b><br><br>
                <?php } ?>
                
                  <?php if (empty($_SESSION['LoggedIn'])) : ?>
                <h1 class="below-text CC" style="margin-left: 0px;">Create New Profile or <a href='login.php'>Log In</a></h1>
        <input type="email" class="w-input email-text" id="email" placeholder="Email Address" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required>
        <input type="password" class="w-input email-text" id="password" placeholder="Password" name="user_password_new"   value="<?php echo isset($_POST['user_password_new']) ? $_POST['user_password_new']: ''; ?>" required>
        <input type="password" class="w-input email-text" id="confirm" placeholder="Confirm Password" name="user_password_repeat" value="<?php echo isset($_POST['user_password_repeat']) ? $_POST['user_password_repeat']: ''; ?>" required>
         <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?><br><br>
        <input type="text" id="security_code" name="security_code" autocomplete="off" class="w-input email-text" placeholder="Enter the code" required>
        <input style="width: 100%;" type="submit" class="nav-email nav-continue" id="continue" name="continue_off" value="Create Profile and Continue to Checkout Page">
                <?php else : ?>
                <input style="width: 100%;" type="submit" class="nav-email nav-continue" id="continue" name="continue_log" value="Continue to Checkout Page">
                <?php endif; ?>
            </form>
            </div>
          </div>
        </div><p></p>
      </div>
    </div>
            <?php if (!empty($_SESSION['LoggedIn'])){ ?>
            <br>   <p class="paragraph">YOUR SUBSCRIPTION INCLUDES:<br>
           <p class="paragraph subphone2"><b>Grouca’s High Probability Trade Locator</b> </p>
          <p class="paragraph subphone2">We’ve developed innovative, data-driven technology that scours the market, then zeroes in on trades that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy.  </p>
          <p class="paragraph subphone2"><b>Full Access: Current & Future High Probability Trades  </b> </p>
          <p class="paragraph subphone2">Whenever an open trade requires rebalancing or adjusting to get back on trade, you will receive an At Risk or In Trouble alert from Grouca’s intelligent risk management tool.  </p>
          <p class="paragraph subphone2">Each At Risk or In Trouble alert tells you 
  <ul>  <li>When to book a profit</li>
        <li>How to leverage current gains higher</li>
        <li>How to adjust trades to minimize risk </li>
      <li>How to reverse losing positions to break even or get back to gain status. </li></ul></p>
          <p class="paragraph subphone2"><b>Full Access: Adjustment Manager</b> </p>
          <p class="paragraph subphone2">Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed options strategy. When open trades require rebalancing or adjustments, you’ll receive an At Risk or In Trouble alert that outlines how to get back on track.</p>
          <p class="paragraph subphone2">Each new trade contains <ul>
        <li>Option strategy</li>
        <li>Underlying stock name and price</li>
        <li>Detailed instructions on how to place the order</li> 
        <li>What entry price to use </li>
        <li>Target gain and risk profile</li></ul></p>
     <p class="paragraph subphone2"><b>An Options Strategy, 100% Modeled for You   </b> </p>
          <p class="paragraph subphone2">We model the trade or adjustment entirely, so all you have to do is submit them to your broker. Click the submit button included in each alert to send the fully modeled trade to your broker in seconds.  </p>
<br> <?php } ?>
            <p class="paragraph">SATISFACTION GUARANTEED!<br>
            If, for any reason, you are not 100% satisfied with your Grouca experience, <a href="index.php#contact">please let us know</a>. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts. Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used.  </p><br>
               
             <p class="paragraph">   
            ADDITIONAL INFO:<br>
All credit card charges will appear under the name Labtrade, LLC. Maurice Lichten, Grouca’s Managing Director, may have a financial interest in some or all of Grouca's recommendations as he trades on the same equities and options that are recommended.</p><br>
             <p class="paragraph">  
RISK DISCLOSURE: <br>
Past performance is not necessarily indicative of future results. All of the content on our website and in our email alerts is for informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Grouca is not registered or regulated as a broker-dealer. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts.</p><br>
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