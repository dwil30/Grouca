<?php 


session_start();
$errors = '';
$password = '';
$repassword = '';
$visitor_email = '';

if(isset($_POST['submit']))
{
	
	
	$visitor_email = $_POST['email'];
	
	///------------Do Validations-------------
	if(empty($visitor_email))
	{
		$errors .= "\n Email is required ";	
	}
	
	
	
	///input OK
	if(empty($errors))
	{
		$con=mysql_connect("localhost", "lglab_admin", "LGLab12$") or die(mysql_error());
		mysql_select_db("lglab_lglab2") or die(mysql_error());
		$sqlquery="SELECT * from login_table where email='".$visitor_email."'";
		$result = mysql_query($sqlquery);
		if (!$result) {
				$errors.="Something was wrong. Please try again";
				
				}
		
		if(mysql_num_rows($result)==0){
			$errors.="The email is not present in our database.";
			
		}
		$row = mysql_fetch_array($result);
		//all Ok -> save record
		if(empty($errors))
		{
		
		$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < 6) { 
		$code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
		$i++;
		}
		
		$sqlinsert="Update login_table set pass='".md5($code)."' where email='".$visitor_email."'";
		mysql_query($sqlinsert);
		
		$from = 'sales@lglab.com';
		$to = $visitor_email;
		$subject = 'Labtrade Password Recovery';
		$body= "LGLab.com has received a request to reset the password for your account.<br><br>Your new password is <b>".$code."</b>";
		@mail($to, $subject, $body, "MIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1\r\nFrom: $from\r\n\r\n");
		
		$errors.="<b style='color:green;'> An email was sent to ".$visitor_email."</b>";
            header("Location:http://www.lglab.com/index.php#order");
		
		}
		
		mysql_close($con);
		
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Labtrade - A Gemological Company</title>
  <meta name="description" content="Borshi Template is a clean and responsive one-page creative portfolio that is perfect to promote your work in a very professional and pleasant way. Easy to edit and make it your own.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/labtrade-a-gemological-company.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="images/favivon.png">
  <link rel="apple-touch-icon" href="images/favivon-mobile.png">
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-50007502-1'], ['_trackPageview']);
    (function() {
      var ga = document.createElement('script');
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
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
          <a class="w-nav-link menu" href="index.php#home">HOME</a>
          <a class="w-nav-link menu" href="index.php#about">ABOUT US</a>
          <a class="w-nav-link menu" href="index.php#legal">LEGAL</a>
          <a class="w-nav-link menu" href="index.php#programs">PROGRAMS</a>
          <a class="w-nav-link menu" href="index.php#reports">REPORTS</a>
          <a class="w-nav-link menu" href="index.php#contact">CONTACT</a>
          <a class="w-nav-link menu" href="index.php#order">ORDER NOW</a>
      </nav>
      <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="section2">
    <div class="w-container"><br>
      <h3>Recover your Password:</h3>
          <img class="spacer" src="images/space.jpg" alt="52ff0566f1634a134e00096d_space.jpg">
        
            
						<?php
							if(!empty($errors)){
								echo "<p class='err'>".nl2br($errors)."</p>";
								}
						?>
						<div id='contact_form_errorloc' class='err'></div>
						<form method="POST" name="contact_form"  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
                             <div class="w-row">
                  <div class="w-col w-col-4"></div>
                                 <div class="w-col w-col-4">
						<center>Type in your email address and you will receive a new password by email.<p></p>
						<div class="header">Email:</div>
                                  
						<input  class="w-input email-text" type="text" name="email" value='' style="background-color:white; color:"><p></p>
				        <input class="w-button button" name='submit' type="submit" value="Submit" data-wait="Please wait..."> </center></div>
                                  <div class="w-col w-col-4"></div>
                           
						</form><br><br><p></p></div>
        <div class="w-row">
                  <div class="w-col w-col-12">&nbsp;</div>
      </div></div>
						
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2014 LabTrade&nbsp;</p>
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
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>