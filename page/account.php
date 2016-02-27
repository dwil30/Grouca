<?php

require_once('include/navigation_bar_subpages.php'); 

?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Grouca Acccount Info</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
                        
                    <?php
                        include("base.php");
                        $sql = "SELECT * FROM users WHERE user_email = '" . $_SESSION['UserName'] . "';";
                        $results = $mysqli->query($sql);
                        $result_row = $results->fetch_assoc();
                        ?>
						
					
						<!-- Contact form -->
						<form action="" method="post" class="contact-form clear-fix">

							<div class="clear-fix">

								<ul class="list-0 clear-fix">
                                    <?php echo isset($errors) ? '<div style="color:rgb(187, 4, 4);margin-bottom:10px;">'.$errors.'</div>': '';?>
									<!-- Name -->
									<li>
										<div class="block field-box">
											<b>User Name:</b> <?php echo $result_row['user_email'];?>
                                        </div>
                                           
									</li>
                                    <li>
										<div class="block field-box">
								            <b>Password:</b> <a href="reset.php">Click here to update password</a>
                                        </div>
									</li>
									<li>
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
							<li><a href="#" class="social-list-facebook"></a></li>
							<li><a href="#" class="social-list-twitter"></a></li>
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
                        $(function () {
                        $('#Connect').click (function () {
                            $('.hidden').slideDown();
                        });
                              });
                                            </script>   
</body>