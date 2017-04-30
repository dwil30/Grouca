<?php 
include("simple-php-captcha.php"); $_SESSION['captcha'] = simple_php_captcha(); ?>
<?php require_once('include/navigation_bar.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Sign Up For Grouca</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
					
						<!-- SignUp form -->
						<form class="contact-form clear-fix" name='credit' id="form-style" action="" method="post">
                        <?php echo isset($errors) ? '<div style="color:rgb(187, 4, 4);padding: 10px 0px 0px 30px;">'.$errors.'</div>': '';?>
							<div class="clear-fix">

								<ul class="list-0 clear-fix">
									<!-- Name -->
                                    <?php if ((isset($_GET['discount'])) and ($_GET['discount'] == 'grouca1')){ ?>
									<li>
										<div class="block field-box">
											<input required id="radio-button" type="radio" name="price" value="1" style="width: auto;margin-right: 5px;"><b>$79 per month recurring</b> (normally $99/month) 20% Discount.<br>
                                             <input required id="radio-button2" type="radio" name="price" value="2" style="width: auto;margin-right: 5px;"><b> $869 per year</b> - 27% Discount.
										</div>
									</li>
                                    <?php } else { ?>
                                    <li>
										<div class="block field-box">
											<input required id="radio-button" type="radio" name="price" value="3" style="width: auto;
    margin-right: 5px;" <?php if ((isset($_GET['price'])) and ($_GET['price']=='monthly')) {echo 'checked="checked"';}?>>$99 per month recurring<br>
                                            <input required id="radio-button2" type="radio" name="price" value="5" style="width: auto;
    margin-right: 5px;" <?php if ((isset($_GET['price'])) and ($_GET['price']=='yearly')) {echo 'checked="checked"';}?>>$1089 per year
										</div>
									</li>
                                    <?php } ?>
                                    
                                    <?php if (empty($_SESSION['LoggedIn'])) : ?>
                                    <p class="subheader" style="margin-left: 0px;">Create New Profile or 
                                    <?php if ((isset($_GET['discount'])) and ($_GET['discount'] == 'grouca1')){ ?>
                                    	<a id="loglink" href='log.php'>Log In</a>
                                    <?php } else { ?>
                                    	<a id="loglink" href='log.php'>Log In</a>
                                    <?php } ?>
									<li>
										<div class="block field-box">
                                            <label for="email">Email Address</label>
									        <input type="email" class="w-input email-text" id="email" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required>		
										</div>
									</li>
								
									<li>
										<div class="block field-box">
											<label for="password">Password</label>
											 <input type="password" class="w-input email-text" id="password" name="user_password_new"   value="<?php echo isset($_POST['user_password_new']) ? $_POST['user_password_new']: ''; ?>" required>
										</div>
									</li>
                                    
									<li>
										<div class="block field-box">
											<label for="confirm">Confirm Password</label>
											<input type="password" class="w-input email-text" id="confirm" name="user_password_repeat" value="<?php echo isset($_POST['user_password_repeat']) ? $_POST['user_password_repeat']: ''; ?>" required>
										</div>
									</li>
                                    <li>
                                    	<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?>
                                    </li>
									<li>
										<div class="block field-box">
											<label for="security_code">Enter Code Above</label>
											<input type="text" id="security_code" name="security_code" autocomplete="off" class="w-input email-text" required>
										</div>
									</li>
                                        <style>
                                            #continue {font-size:14px;}
                                            @media (max-width: 579px) {
                                            #continue {
                                            font-size: 10px!important;width: 100%;padding: 8px;padding-left: 4px; padding-right:4px;}}</style>
									<li>
                                            <input type="submit" id="continue" name="continue_off" class="button" value="Create Profile and Continue to Checkout">
									</li>
							 <?php else : ?>
									<li>
                                            <input type="submit" id="continue" name="continue_log" class="button" value="Continue to Checkout"/>
									</li>
                                <?php endif; ?>    
								
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
        <script>
        $( document ).ready(function() {
            var price = $('input[name=price]:checked').val();
            $("#loglink").attr('href', 'log.php?price='+price);
        
            $('input[type=radio][name=price]').change(function() {
                var price = $('input[name=price]:checked').val();
            $("#loglink").attr('href', 'log.php?price='+price);
            });
            });
            
            </script>    
</body>