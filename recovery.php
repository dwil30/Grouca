<?php
session_start();

if(isset($_POST['submit']))
{
    $errors = '';
    $password = '';
    $repassword = '';
    $visitor_email = '';
	$visitor_email = $_POST['email'];
	
	///------------Do Validations-------------
	if(empty($visitor_email))
	{
		$errors .= "\n Email is required ";	
	}
	
	///input OK
	if(empty($errors))
	{
		include("base.php");
		$sqlquery="SELECT * from users where user_email='".$visitor_email."'";
		$result = $mysqli->query($sqlquery);
		if (!$result) {
				$errors.="Something was wrong. Please try again.";
				}
		
		if(mysqli_num_rows($result)==0){
			$errors.="The email is not present in our database.";
			
		}
		$row = $result->fetch_array();
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
		
		$sqlinsert="Update users set user_password_hash='".md5($code)."' where user_email='".$visitor_email."'";
        $mysqli->query($sqlinsert);
		
		$from = 'support@grouca.com';
		$to = $visitor_email;
		$subject = 'Grouca Password Recovery';
		$body= "Grouca.com has received a request to reset the password for your account.<br><br>Your new password is <b>".$code."</b>";
		@mail($to, $subject, $body, "MIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1\r\nFrom: $from\r\n\r\n");
		
		$errors.="<b style='color:green;'> An email with a new password was sent to ".$visitor_email."</b>";
		}
		mysqli_close($con);
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
<?php include 'header.php'; ?>
      
        <div class="w-container">
            <div class="login_section">
            <div class="form-signin"> 
            <p class="loginheadline">Password Recovery</p>
                <?php echo isset($errors) ? $errors: '';?>
                <p>Enter your email and new password will be sent to you.</p>
               <center><form action="" method="post">   
                <input type="email" class="nav-email" id="email" placeholder="EMAIL" name="email" required><br>
       
                <input type="submit" class="nav-email nav-continue" id="continue" name="submit" value="Submit">
            </form></center><br><br><br>
                </div>
                    </div>
                </div>
  
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2015 Grouca&nbsp;</p>
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