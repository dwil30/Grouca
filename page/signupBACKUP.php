<?php 
include("simple-php-captcha.php"); $_SESSION['captcha'] = simple_php_captcha(); ?>
<?php require_once('include/navigation_bar.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Sign Up</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
						
						
					
						<!-- SignUp form -->
						<form action="#" method="post" class="contact-form clear-fix">
                        <?php echo isset($errors) ? '<div style="color:rgb(187, 4, 4);padding: 10px 0px 0px 30px;">'.$errors.'</div>': '';?>
							<div class="clear-fix">

								<ul class="list-0 clear-fix">
									<!-- Name -->
									<li>
										<div class="block field-box">
											<label for="contact-form-email">Email Address</label>
											<input type="text" name="user_email" id="contact-form-email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required/>
										</div>
									</li>
									<!-- /Name -->
									<!-- E-mail address -->
									<li>
										<div class="block field-box">
											<label for="contact-form-password">Password</label>
											<input type="password" name="user_password_new" id="contact-form-password" value="<?php echo isset($_POST['user_password_new']) ? $_POST['user_password_new']: ''; ?>" required/>
										</div>
									</li>
									<!-- /E-mail address -->
									<!-- E-mail address -->
									<li>
										<div class="block field-box">
											<label for="contact-form-confirm_password">Confirm Password</label>
											<input type="password" name="user_password_repeat" id="contact-form-confirm_password" value="<?php echo isset($_POST['user_password_repeat']) ? $_POST['user_password_repeat']: ''; ?>" required/>
										</div>
									</li>
									<!-- /E-mail address -->
									
									<!-- E-mail address -->
                                    <li>
                                    	<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?>
                                    </li>
									<li>
										<div class="block field-box">
											<label for="contact-form-code">Enter Code Above</label>
											<input type="text" name="security_code" id="contact-form-code" value="" required/>
										</div>
									</li>
									<!-- /E-mail address -->
								<div style="color:white;">
                                    Enter Cell phone to receive SMS alerts when trades occur:</div>		
                                    <!-- E-mail address -->
									<li>
										<div class="block field-box">
											<label for="contact-form-cell">Cell Phone Number (optional)</label>
											<input type="text" name="tel" id="contact-form-cell" value="<?php echo isset($_POST['tel']) ? $_POST['tel']: ''; ?>">
										</div>
									</li>
									<!-- /E-mail address -->
									<!-- Submit button -->
									<li>
										<div class="block field-box field-box-button">
											<input type="submit" id="contact-form-submit" name="continue" class="button" value="Sign Up"/>
										</div>
									</li>
									<!-- /Submit button -->
								</ul>

							</div>

						</form>		
						<!-- /Contact form -->
					
					</div>
					<!-- /Left column -->

					<!-- Right column -->
					<div class="column-right" style="text-align:left;">
						
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