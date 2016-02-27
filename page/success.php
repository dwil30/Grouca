<?php 
include("simple-php-captcha.php"); $_SESSION['captcha'] = simple_php_captcha(); ?>
<?php require_once('include/navigation_bar_subpages.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Payment Success!</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
                        <div style="background-color: #15A346;padding:0px 15px 15px 15px;width:100%;">
								<ul class="list-0 clear-fix">
									<p class="subheader">You can now access the <a href="memb.php">Paid Membership Area</a></p>
                                    <p>Or <a href="IB-connect.php">connect your account to Interactive Brokers</a> to initiate trades without leaving Grouca</p>
                                </ul>
                        </div>
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