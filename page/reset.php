<?php 
require_once('include/navigation_bar.php'); 
require 'PHPMailer/PHPMailerAutoload.php';
?>

<?php 

if ($_POST['contact-form-submit']){
    
$error = '';
    
$email = $_POST["contact-form-email"];
    
include("base.php");
    
$query = 'SELECT * FROM users Where user_email ="'.$email.'";'; 
$sql_query = $mysqli->query($query);
$number = $sql_query->num_rows;
    
if ($number == 0){$error = "No users found with that email address.";}
else {
    
    function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
    
$newPass = randomPassword();
$newPassMD5 = md5($newPass);
    
    
$query = 'Update users Set user_password_hash = "'.$newPassMD5.'" where user_email ="'.$email.'";'; 
    
$sql_query = $mysqli->query($query);
    
 
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.zoho.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@grouca.com';
    $mail->Password = 'Sergio123!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('support@grouca.com');
    $mail->addReplyTo('support@grouca.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = '[GROUCA] Password Reset';
    $mail->Body = '<html><body><img src="https://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br>
                <strong> Your new Grouca password</strong><br><br>
              Hello Grouca User! Your password was successfully reset. <br><br> 
              Your new Grouca password is: <b>'.$newPass.'</b><br><br>If you did not request a password reset please contact Grouca Support (support@grouca.com)</body></html>';
    $mail->send();   

$error = "Password successfully reset. Please check your email.";
    
}
}
?>

		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Password Reset</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
						
						
					
						<!-- Contact form -->
						<form action="" method="post">

							<div class="clear-fix">

								<ul class="list-0 clear-fix">
                                     <li>
										<p style="color:white;text-decoration:none;margin-left:12px;">Enter email address to receive new password.</p>
									</li>
									<!-- Name -->
									<li>
										<div class="block field-box">
											<label for="contact-form-email">Email Address</label>
											<input type="text" name="contact-form-email" id="contact-form-email" value=""/>
										</div>
									</li>
									<!-- /Name -->
									<!-- Submit button -->
									<li>
										<div class="block field-box field-box-button">
											<input type="submit" id="contact-form-submit" name="contact-form-submit" class="button" value="Reset my Password"/>
										</div>
									</li>
									<!-- /Submit button -->
								</ul>
                                <?php if (strlen($error) > 1): ?>
                                <p style="color:#822c2c;text-decoration:none;margin-left:12px;"><?php echo $error; ?></p>
                                <?php endif; ?>

							</div>

						</form>		
						<!-- /Contact form -->
					
					</div>
					<!-- /Left column -->

					<!-- Right column -->
					<div class="column-right">
						
						<p class="subheader padding-bottom-30">For any questions, please feel free to contact us any time.</p>
					
						
						<!-- Contact details -->
						<ul class="company-info feature-list feature-list-icon-small feature-list-icon-left feature-list-style-3">
							<li>
								<span class="icon icon-mappointer"></span>
								<p><strong>Grouca</strong></p>
								<p>4974 S. Rainbow Blvd</p>
								<p>Las Vegas, NV 89118</p>
								<p>United States</p>
							</li>
							<li>
								<span class="icon icon-mobile"></span>
								<p>Phone: 702-220-5500</p>
								<p>Email: support@grouca.com</p>
								
							</li>						
						</ul>
						<!-- /Contact details -->

						<!-- Social icon list -->
						<ul class="social-list social-list-style-2 clear-fix margin-top-50">
				            <li><a href="http://facebook.com/Grouca" class="social-list-facebook"></a></li>
							<li><a href="http://twitter.com/Grouca" class="social-list-twitter"></a></li>
						</ul>
						<!-- /Social icon list -->
						
					</div>
					<!-- /Right column -->

				</div>
				<!-- /Layout 50x50% -->

			</div>
			
		</div>
</body>