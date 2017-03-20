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
									<li>
                                            <input type="submit" id="continue" name="continue_off" class="button" value="Create Profile and Continue to Checkout Page" style="font-size: 14px;">
									</li>
							 <?php else : ?>
									<li>
                                            <input type="submit" id="continue" name="continue_log" class="button" value="Continue to Checkout Page" style="font-size: 14px;"/>
									</li>
                                <?php endif; ?>    
								
								</ul>

							</div>

						</form>		
						<!-- /Contact form -->
					 <p class="subheader" style="padding:0px;margin-top:20px;">Your subscription includes:</p>
                        <ul>
                            <li style="margin-top:10px;"><b>Grouca’s High Probability Trade Locator</b><br><br>We’ve developed innovative, data-driven technology that scours the market, then zeroes in on trades that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy.</li>
                            <li style="margin-top:10px;"><b>Full Access: Current & Future High Probability Trades</b><p>Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed options strategy. When open trades require re-balancing or adjustments, you’ll receive an Adjust alert that outlines how to get back on track.</p>
<p>Each Adjust alert tells you:</p>
                                <ul style="list-style-type: circle;padding-left: 20px;">
                                <li>When to book a profit</li>
                                <li>How to leverage current gains higher</li>
                                <li>How to adjust trades to minimize risk</li>
                                <li>How to reverse losing positions to break even or get back to gain status.</li>
                        </ul></li>
                            
                            <li style="margin-top:10px;"><b>Full Access: Adjustment Manager</b><p>Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed options strategy. When open trades require rebalancing or adjustments, you’ll receive an Adjust alert that outlines how to get back on track.</p><p>Each new trade contains:</p>
                                <ul style="list-style-type: circle;padding-left: 20px;">
                                    <li>Option strategy</li>
                                    <li>Underlying stock name and price</li>
                                    <li>Detailed instructions on how to place the order</li>
                                    <li>What entry price to use</li>
                                    <li>Target gain and risk profile</li>
                                </ul>
                            </li>
                            <li style="margin-top:10px;"><b>An Options Strategy, 100% Modeled for You</b><p>We model the trade or adjustment entirely, so all you have to do is submit them to your broker. Click the submit button included in each alert to send the fully modeled trade to your broker in seconds.</p></li>
                        
					</div>
					<!-- /Left column -->

					<!-- Right column -->
					<div class="column-right">
						
						<p class="subheader" style="padding:0px;">Expertly Selected Trades, Executed in Seconds.</p>
                        <p style="padding-bottom:10px;">Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</p>
                        
                        <p class="subheader" style="padding:0px;">No long-term commitment required.</p>
                        <p style="padding-bottom:10px;">Cancel your monthly or annual subscription at any time.</p>
                        
                        <p class="subheader" style="padding:0px;">Cancel your monthly or annual subscription at any time.</p>
                        <p style="padding-bottom:10px;">Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</p>
                        
                        <p class="subheader" style="padding:0px;">SATISFACTION GUARANTEED!</p>
                        <p style="padding-bottom:10px;">If, for any reason, you are not 100% satisfied with your Grouca experience, <a href="index.php#contact">please let us know</a>. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts. Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used. </p>
                        
                        <p class="subheader" style="padding:0px;"> ADDITIONAL INFO:</p>
                        <p style="padding-bottom:10px;">All credit card charges will appear under the name Labtrade, LLC. Maurice Lichten, Grouca’s Managing Director, may have a financial interest in some or all of Grouca's recommendations as he trades on the same equities and options that are recommended. </p>
                        
                        <p class="subheader" style="padding:0px;">RISK DISCLOSURE: </p>
                        <p style="padding-bottom:10px;">Past performance is not necessarily indicative of future results. Grouca is not registered or regulated as a broker-dealer. Grouca  is a educational site designed to empower option traders. While our trading strategies have performed well for our students in the past, it is not necessarily indicative of future results. All of the content on our website and in our email alerts is for educational and informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts.</p>
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