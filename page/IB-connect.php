<?php require_once('include/navigation_bar_subpages.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline" style="margin-bottom:20px;">
					<span>Connect Interactive Brokers</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
                        <p>Connect to your IB account to replicate live trades with a single click. To open a broker option account in IB, <a href="https://www.interactivebrokers.com/en/home.php" target="_blank">click here</a>.</p>		
                    <img style="margin: 15px 0px;" src="images/ConnectGrouca.jpg">
                    <form action="memb.php" method="post">
                    <div class="nav-email nav-continue" id="Connect" name="Connect" value="Connect Interactive Brokers" style="color:white;cursor:pointer;text-align:center;padding:15px;">CONNECT INTERACTIVE BROKERS</div>   
                    <div class="hidden" style="display:none;">
                        	<ul class="list-0 clear-fix">
                                <li>
                        <div class="block field-box">    
                        <input type="text" placeholder="Interactive Brokers Username" value="" required/>  
                        </div>
                                </li>
                                <li>
                        <div class="block field-box">
                        <input type="text" placeholder="Interactive Brokers Password" value="" required/>    
                        </div>
                                    </li>
                                      <li>
                        <div class="block field-box">
                        <input type="submit" value="Connect Accounts" class="button" required/>    
                        </div>
                                    </li>
                    </div> 
                        </form>
                     <form action="memb.php" method="post">   
                    <input type="submit" class="nav-email nav-continue" style="background-color:grey;" id="continue" name="NoConnect" value="Not Right Now">
                </form>    
                        
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                    <script>
                        $(function () {
                        $('#Connect').click (function () {
                            $('.hidden').slideDown();
                        });
                              });
                                            </script>    
					
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