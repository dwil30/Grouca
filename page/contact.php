<?php require_once('config.php');?>    

<?php include("simple-php-captcha.php"); $_SESSION['captcha'] = simple_php_captcha(); ?>

		<!-- Google Map -->
		<!--<div id="googleMap"></div>-->
		<!-- /Google Map -->
		
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Contact Us</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
						
						
					       
						<!-- Contact form -->
            <form id="myForm" method="POST" action="#">
                <div class="clear-fix">
				<ul class="list-0 clear-fix">
                    <!-- Name -->
                    <li>
                        <div class="block field-box">
						  
						  <input type="text" id="email" name="email" class="w-input email-text" placeholder="Email Address..." required>
                        </div>
					</li>
                     <li>
                         <div class="block field-box">
						  <input type="text" id="code" name="code" class="w-input email-text" placeholder="Enter code below..." required>
                        </div>
					</li>
                     <li>
				<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?>
					</li>
                   
					<li>
                        <div class="block field-box">
						  <textarea id="message" name="message" class="w-input msg-text" required placeholder="Message..."></textarea>
                        </div>
					</li>
					<li>
                        <div class="block field-box">
				        <input type="submit" name="myFormSubmitted" value="Send Message">
                        </div>        
					</li>
                    <div id="formResponse" style="display: none;"></div>
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
							<li><a href="#" class="social-list-facebook"></a></li>
							<!--<li><a href="http://twitter.com/Grouca" class="social-list-twitter"></a></li>-->
						</ul>
						<!-- /Social icon list -->
						
					</div>
					<!-- /Right column -->

				</div>
				<!-- /Layout 50x50% -->

			</div>
			
		</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
$("#myForm").submit(function() {
    $.post('processForm.php', {code: $('#code').val(), email: $('#email').val(), message: $('#message').val(), myFormSubmitted: 'yes'}, function(data) {
        $("#formResponse").html(data).fadeIn('100');
        $('#code, #email, #message').val(''); /* Clear the inputs */
    }, 'text');
    return false;
});
    </script>