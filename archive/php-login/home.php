<?php 
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>

<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca - Options Trading Utility</title>
  <meta name="description" content="Grouca is a option trading utility that gives you step by step directions for setting up trades that generate above average returns, it shows you how to rebalance portfolio risk, and it intervenes with adjustments when existing trades get in trouble.">
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
          <a class="w-nav-link menu" href="#home">Hello</a>
          <a class="w-nav-link menu menu-hide" href="login.php">Log In</a>
          <a class="w-nav-link menu" href="#about">About Us</a>
          <a class="w-nav-link menu" href="#trade">New Trade</a>
            <a class="w-nav-link menu" href="#risk">At Risk</a>
          <a class="w-nav-link menu" href="#trouble">In Trouble</a>
          <a class="w-nav-link menu" href="#legal">Legal</a>
          <a class="w-nav-link menu" href="#contact">Contact</a>
          <a class="w-nav-link button-login log phone" id="login" href="login.php">Log In</a>
          <a class="w-nav-link button-login phone" id="signup" href="register.php">Sign Up</a>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
        
      </div>
    </div>
  <div class="w-slider slider">
    <div class="w-slider-mask">
      <div class="w-slide slide" id="home">
        <div class="w-container">
          <h5 class="slidertext">A better way to</h5>
          <h1 class="title">ADJUST&nbsp;TRADES</h1><a class="button btn-slider" id="button" href="personal.php">SIGN UP FOR FREE</a><br>
                    </div>
                </div>
            </div>
      </div>
    
    <div class="section about top-class" id="about">
    <div class="w-container">
      <h3>About Us</h3><img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">Grouca is a option trading utility that gives you step by step directions for setting up trades that generate above average returns, it shows you how to rebalance portfolio risk, and it intervenes with adjustments when existing trades get in trouble. It’s a powerful tool that provides professional techniques to help you maneuver the complexities of option trading.</p>
             
            <div class="w-row">
              <div class="w-col">
                 <img src="images/newtrade.JPG" alt="New Trade">
              </div>
              <div class="w-col w-col-6">
                <h4 class="team-do"></h4>
              </div>
            </div>
            </div>
        </div>
          </div></div></div>
                
<div class="section about spacing" id="trade">
    <div class="w-container">
      <h3>new trade</h3><img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">It's important that every new trade gets modeled correctly so it
can generate above average returns. With new trade you have a better chance of outperforming the market by starting with a well designed high probability trade.</p>
             
            <div class="w-row">
              <div class="w-col">
                 <img src="images/newtrade.JPG" alt="New Trade">
              </div>
              <div class="w-col w-col-6">
                <h4 class="team-do"></h4>
              </div>
            </div>
            <div class="team-icons">
                <a class="button" href="newtrade.html">read more</a>
            </div>
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
      <h3>At Risk</h3><img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">There are times when a trade starts losing money because its now
unbalanced and it brings the total return of your portfolio down. You need to rebalance your position as soon as possible so things don't turn bad. With at risk you receive the steps to take to rebalance your portfolio.</p>
             
            <div class="w-row">
              <div class="w-col">
                 <img src="images/atrisk.JPG" alt="At Risk">
              </div>
              <div class="w-col w-col-6">
                <h4 class="team-do"></h4>
              </div>
            </div>
            
            <div class="team-icons">
                <a class="button" href="atrisk.html">read more</a>
            </div>
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
      <h3>In Trouble</h3><img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
      <div class="w-row">
        <div class="w-col w-col-2"></div>
        <div class="w-col w-col-8">
          <div class="team-box">
              <p class="aboutinfo">When the market goes against you and your trade goes from bad to
worse and starts losing big money, you have to do something fast. In trouble will quickly intervene by formulating a high probability adjustment so you can stop the loss and eliminate risk.</p>
             
            <div class="w-row">
              <div class="w-col">
                 <img src="images/newtrade.JPG" alt="In Trouble">
              </div>
              <div class="w-col w-col-6">
                <h4 class="team-do"></h4>
              </div>
            </div>
            <div class="team-icons">
                <a class="button" href="introuble.html">read more</a>
            </div>
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
       <p class="aboutinfo">DISCLAIMER:The risk of loss in trading options is substantial, therefore only genuine "risk" funds should be used in such trading. Option trading has inherent risk due to due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a high degree of risk and is suitable only for persons who can assume the risk of loss in excess of their margin deposits. You should carefully consider whether option trading is appropriate for you in light of your investment experience, trading objectives, financial resources, and other relevant circumstances. You may lose all or more of your initial investment. </p>
            <div class="team-icons">
                <a class="button" href="legal.html">read more</a>
            </div>
            
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
						<td><input name="Submit" id="send" type="submit" class="w-button button" value="Send Message"/>
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
                  <p class="team-info">+555-555-5555</p>
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
</body>
</html>