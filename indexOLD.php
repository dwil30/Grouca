<?php 
session_start();
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
           <?php if (empty($_SESSION['LoggedIn'])){echo '
          <a class="w-nav-link menu menu-hide" href="login.php">Log In</a>';}?>
          <a class="w-nav-link menu" href="#about">About Us</a>
          <a class="w-nav-link menu" href="#trade">The Right Trade</a>
            <a class="w-nav-link menu" href="#risk">Risk Management</a>
          <a class="w-nav-link menu" href="#trouble">When to Intervene</a>
          <a class="w-nav-link menu" href="#contact">Contact</a>
          <?php if (empty($_SESSION['LoggedIn'])){
    echo '<a class="w-nav-link button-login log phone" id="login" href="login.php">Log In</a>
          <a class="w-nav-link button-login phone" id="signup" href="personal.php">Sign Up</a>';}
                elseif (!empty($_SESSION['LoggedIn'])){
                     if ($_SESSION['Account'] == 'Paid'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu" href="services.php"><b>Services</b></a>';}
                     elseif ($_SESSION['Account'] == 'Expired'){
                         echo '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu menu-hide" href="services.php">Services</a>';
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="services.php">Account Type:<b> Exp&#39;d</b><br>Days Remaining: <b>0</b></a>';
                     }
                     elseif ($_SESSION['Account'] == 'Trial'){ echo
                        '<a class="w-nav-link menu" href="logout.php">Log Out</a>
                        <a class="w-nav-link menu" href="services.php"><b>Services</b></a>';
                        }
                }   
?>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
      </div>
    </div>
   
    
  <div class="w-section top-section" id="home">
    <div class="w-container container">
      <h5>A better way to</h5>
      <h5 class="trade">TRADE&nbsp;OPTIONS</h5>
      <h5 style="font-size:27px;">Get data-driven, expertly selected trade options in a single click. </h5>    
        <a class="button btn-slider" style="border: 1px solid white;" href="https://grouca.com/personal.php">SIGN UP FOR FREE</a>
    </div>
  </div>
    
    <div class="section about" id="about" style="padding-bottom:0px;">
    <div class="w-container">
        <h3>Who We Are</h3>
        
        <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">As a leading provider of options strategies, Grouca makes it easy for you to instantly trade options, even on-the-go, with confidence. </p>
<p class="aboutinfo">
Developing the right options strategy takes time, a carefully honed financial skill set, and constant attention to timing. We have developed a ranking algorithm that zeroes in on trades with the highest statistical odds of success. This innovative technology leveraged with our expertise in the field, means that by the time you hear about a potential opportunity, we’ve already done 100 percent of the research and developed a winning strategy. We focus on getting you gains. You focus on what do with them.  </p>
            </div>
        </div>
          </div>
        
             <h3>How It Works</h3>
        <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
             Get New Trade, At Risk and In Trouble SMS and email alerts. Respond with the click of a button.
      <div class="w-row" style="margin-top:25px;margin-bottom:25px;">
        <div class="w-col w-col-4"><h3 style="font-size:34px;">Sign Up for Free</h3>
Enter your email and phone number for instant access to winning trades, then pick a password and you’re ready to go. </div>
          <div class="w-col w-col-4"><h3 style="font-size:34px;">Get Instant Alerts</h3>
The moment a high probability trade surfaces, current trades become at risk or when it’s time to make an adjustment, you’ll be notified via phone and email, right away.   </div>
          <div class="w-col w-col-4"><h3 style="font-size:34px;">Take Action in Seconds  </h3>
No matter whether, you’re placing a new trade or rebalancing an open one, one click takes you to your broker, with minimal interruption to your day.  </div>
        
        </div>
    </div>
    </div>              
<div class="section about spacing" id="trade">
    <div class="w-container" style="text-align:center">
        <div class="trade-section">
        <h3 class="trader">The Right Trade</h3>
        </div>
        <h2 class="subhead">Well-designed, high probability trades at your fingertips.</h2>  
        
 <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">The first step in successful options trading is pinpointing out how to model the right trade for the right outcome. When you receive a <b>New Trade Alert</b>, you’re getting a well-designed high probability trade delivered right to your inbox. We’ve done the research, so you don’t have to.  <br><br> 
<a class="nav-email nav-continue" href="performance.php" style="font-size:15px; line-height:26px;  width: 187px;">SEE PERFORMANCE</a><br><br>
        <div class="team-icons">
            <a class="w-inline-block" href="#"><img class="team-social" src="images/twitter.png" alt="52fff3238bcad05a780007a1_twitter.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/facebook.png" alt="52fff2593bedab0f7100079a_facebook.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/dribbble.png" alt="52fff3c2bbb9120e710005e0_dribbble.png">
            </a>
          </div>
        </div>
        <div class="w-col w-col-2"></div>
    </div>
  </div>
    </div></div>
    
    <div class="section dark about" id="risk">
    <div class="w-container">
     <div class="trade-section newpic">
        <h3 class="trader">Risk Management</h3>
        </div>
        <h2 class="subhead">Rest easy with around-the-clock risk monitoring. </h2> 
        <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">Every trade requires some rebalancing to deliver maximum gains. If a trade begins to deteriorate, you need to know right away so you can act before things get worse. That’s why we monitor your trades continuously, and send you <b>At Risk Alert</b> the moment it becomes necessary. Each alert tells you exactly how to rebalance your trade for the desired outcome.  <br><br>      
        <a class="nav-email nav-continue" href="performance.php" style="font-size:15px; line-height:26px;  width: 187px;">SEE PERFORMANCE</a><br><br>
            <div class="team-icons">
            <a class="w-inline-block" href="#"><img class="team-social" src="images/twitter.png" alt="52fff3238bcad05a780007a1_twitter.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/facebook.png" alt="52fff2593bedab0f7100079a_facebook.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/dribbble.png" alt="52fff3c2bbb9120e710005e0_dribbble.png">
            </a>
          </div>
        </div>
        <div class="w-col w-col-2"></div>
    </div>
  </div>
</div>
        </div>
        
        <div class="section about" id="trouble">
    <div class="w-container">
      <div class="trade-section newpic2">
        <h3 class="trader">When to Intervene</h3> 
        </div>
        <h2 class="subhead">Make trade adjustments at the first sign of trouble.  </h2> 
        <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">If the market goes against you and your trade goes from good to bad, time is of the essence. We’re here to help with instant <b>In Trouble Alerts</b>. We’ll formulate a high probability adjustment that lets you stop the loss and get the trade back on track. Then submit the adjustment to your broker in a single click. Problem solved. <br><br>
               <a class="nav-email nav-continue" href="performance.php" style="font-size:15px; line-height:26px;  width: 187px;">SEE PERFORMANCE</a><br><br>
            <div class="team-icons">
            <a class="w-inline-block" href="#"><img class="team-social" src="images/twitter.png" alt="52fff3238bcad05a780007a1_twitter.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/facebook.png" alt="52fff2593bedab0f7100079a_facebook.png">
            </a>
            <a class="w-inline-block" href="#"><img class="team-social" src="images/dribbble.png" alt="52fff3c2bbb9120e710005e0_dribbble.png">
            </a>
          </div>
        </div>
        <div class="w-col w-col-2"></div>
    </div></div></div></div>

   <div class="section dark about" id="legal">
    <div class="w-container">
      <h3>LEGAL</h3>
      <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row services">
          <div class="w-col w-col-2 service-col"></div>
        <div class="w-col w-col-8 service-col">
       <p class="aboutinfo legal">DISCLAIMER: Grouca is an educational site, and is not a financial advisor or broker. All of the content on our website and in our email alerts is for informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts. All stocks, ETFs, commodities, Indices and other securities mentioned in our trades are educational and for illustrative purposes only. An investment in option contracts is speculative, involves a high degree of risk and is suitable only for persons who can assume the risk of loss.</p>
            </div>
             <div class="w-col w-col-2 service-col"></div>
      </div>
    </div>
  </div>

 <div class="section contact" id="contact">
    <div class="w-container">
      <h3>contact</h3>
      <div class="spacer"></div>
      <p class="portfolio-text">For any questions, please feel free to contact us any time.</p><br>

      <div class="w-row">
        <div class="w-col w-col-6">
          <div class="w-form form">
			<form id="contactform" action="processForm.php" method="post">
				<table>
					<tr>
						<td><label for="email"></label></td>
						<td><input type="text" placeholder="Email Address" id="email" name="email" class="w-input email-text"></td>
					</tr>
                     <tr>
						<td><label for="code"></label></td>
						<td><input placeholder="Enter Captcha Code seen below" type="text" id="captcha" name="code" class="w-input email-text"></td>
					</tr>
                     <tr>
                        <td></td>
                        <td>
				<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?></td>
					</tr>
                   
					<tr>
						<td><label for="message"></label></td>
						<td><textarea id="message" placeholder="Enter Message here" name="message" class="w-input msg-text"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="Submit" id="send" type="submit" class="w-button button-send" value="Send Message"/>
					</tr>
				</table>
			</form>
			<div id="response"></div>
        </div>
		</div>
        <div class="w-col w-col-6">
          <ul class="w-list-unstyled">
            <li>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <h4>Office</h4>
                </div>
                <div class="w-col w-col-9">
                  <p class="team-info">4974 S. Rainbow Blvd Las Vegas, NV 89118</p>
                </div>
              </div>
            </li>
            <li>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <h4>email</h4>
                </div>
                <div class="w-col w-col-9">
                  <p class="team-info">support@grouca.com</p>
                </div>
              </div>
            </li>
            <li>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <h4>phone</h4>
                </div>
                <div class="w-col w-col-9">
                  <p class="team-info">702-220-5500</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
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
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
<script>
function pause(){
 if (document.getElementById('bgvid').paused){
     document.getElementById('bgvid').play();}
 else {document.getElementById('bgvid').pause();}
 }
</script>
</body>
</html>