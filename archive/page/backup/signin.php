<?php

require_once('include/navigation_bar.php'); 
$price = $_GET['price'];

?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Sign In</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
						
						
					
						<!-- Contact form -->
						<form action="" method="post" class="contact-form clear-fix">

							<div class="clear-fix">

								<ul class="list-0 clear-fix">
                                    <?php echo isset($errors) ? '<div style="color:rgb(187, 4, 4);margin-bottom:10px;">'.$errors.'</div>': '';?>
									<!-- Name -->
									<li>
										<div class="block field-box">
											<label for="contact-form-email">Email Address</label>
											<input type="text" name="contact-form-email" id="contact-form-email" value=""/>
                                            <?php if(isset($price)): ?>
                                            <input type='hidden' value='<?php echo $price; ?>' name='price'>
                                            <?php endif; ?>
										</div>
									</li>
									<!-- /Name -->
									<!-- E-mail address -->
									<li>
										<div class="block field-box">
											<label for="contact-form-password">Password</label>
											<input type="password" name="contact-form-password" id="contact-form-password" value=""/>
										</div>
									</li>
									<!-- /E-mail address -->
									
									<!-- Submit button -->
									<li>
										<div class="block field-box field-box-button">
											<input type="submit" id="contact-form-submit" name="contact-form-submit" class="button" value="Sign In"/>
										</div>
									</li>
									<!-- /Submit button -->
                                    <li>
										<a style="color:white;text-decoration:none;" href="reset.php">Reset Password</a>
									</li>
								</ul>

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