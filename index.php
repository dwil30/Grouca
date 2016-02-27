		<?php require_once('include/header.php'); ?>

		<body>

			<ul class="page-list">
                    
				<li class="page-home" id="page-home">
                    <div id="home">
					<?php require_once('page/home.php'); ?>
                    </div>     
				</li>
                
				<li class="page-about" id="page-about">
                    <div id="about">    
					   <?php require_once('page/about.php'); ?>
                    </div>     
				</li>

				<li class="page-services" id="page-services">
                    <div id="services"> 
					   <?php require_once('page/services.php'); ?>
                    </div>
				</li>
                
				<li class="page-team" id="page-team">
                    <div id="team"> 
					   <?php require_once('page/team.php'); ?>
                    </div>   
				</li>	
                  

				<li class="page-pricing-plans" id="page-pricing-plans">
                    <div id="pricing-plans"> 
					   <?php require_once('page/pricing_plans.php'); ?>
                    </div>
				</li>	

				<li class="page-contact" id="page-contact">
                    <div id="contact"> 
					   <?php require_once('page/contact.php'); ?>
                    </div>
				</li>
			</ul>

			<?php require_once('include/footer.php'); ?>