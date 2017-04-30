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
                          <style> 
                            @media (max-width: 600px) {
                                #sub {margin-top:20px;}
                            }
                        </style>
						<!-- /Contact form -->
                        <div class="desktop">
                         <p class="subheader" style="padding:0px;margin-top:20px;">RISK DISCLOSURE: </p>
                        <p style="padding-bottom:10px;">Grouca is a educational site designed to empower new option traders with ideas. You are fully responsible for any investment decision you make. Evaluate any strategy prior to use to understand risk and suitability. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts. Use this content at your own risk without guarantee or warranty of any kind from Grouca. Grouca makes no investment recommendations and do not provide financial, tax or legal advice. Grouca is a service provided by Labtrade,LLC.</p>
                            </div>
                        
					
                        
					</div>
					<!-- /Left column -->

					<!-- Right column -->
					<div class="column-right">
                        
                         <p id="sub" class="subheader" style="padding:0px;">Your subscription includes:</p>
                        <ul>
                            <li style="margin-top:10px;"><b>Grouca’s High Probability Trade</b><br><br>We’ve developed innovative, data-driven technology that scours the market, then zeroes in on trades that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy.</li>
                            <li style="margin-top:10px;"><b>Full Access: Current & Future Trades and Adjustments</b><p>Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed strategy. When open trades require rebalancing, you’ll receive an Adjustment alert that outlines how to get back on track.</p>
<p><b>Each new trade contains:</b></p>
                                <ul style="list-style-type: disc;padding-left: 20px;">
                                <li>Option strategy</li>
                                <li>Underlying name and price</li>
                                <li>Detailed information of options</li>
                                <li>What entry value to use</li>
                                <li>Target gain and loss profile</li>
                        </ul></li>
                            
        
                            <li style="margin-top:10px;"><b>An Options Strategy, 100% Modeled for You</b><p>We model the trade or adjustment entirely, so all you have to do is submit them to your broker by clicking a button. Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</p></li>
                            
                            <p><b>Each Adjustment alert tells you:</b></p>
                                <ul style="list-style-type: disc;padding-left: 20px;">
                                <li>When to book a profit</li>
                                    <li>How to leverage current gains higher</li>
                                    <li>How to adjust trades to minimize risk</li>
                                    <li>When to close a trade</li>
                            </ul>
                        <li>
                        <p class="subheader" style="padding:0px;margin-top:20px;">SATISFACTION GUARANTEED!</p>
                        <p style="padding-bottom:10px;">If, for any reason, you are not 100% satisfied with your Grouca experience, <a href="index.php#contact">please let us know</a>. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts. Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used. </p>
                            </li>
                        </ul>
                        <div class="mobile">
                          <p class="subheader" style="padding:0px;margin-top:20px;">RISK DISCLOSURE: </p>
                        <p style="padding-bottom:10px;">Grouca is a educational site designed to empower new option traders with ideas. You are fully responsible for any investment decision you make. Evaluate any strategy prior to use to understand risk and suitability. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts. Use this content at your own risk without guarantee or warranty of any kind from Grouca. Grouca makes no investment recommendations and do not provide financial, tax or legal advice. Grouca is a service provided by Labtrade,LLC.</p>
                            </div>
                       
					</div>
					<!-- /Right column -->

				</div>
				<!-- /Layout 50x50% -->

			</div>
			
		</div>
</body>