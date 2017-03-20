		<div class="footer">
			
			<div class="main">
				
				<!-- Layout 33x66% -->
				<div class="layout-p-33x66 clear-fix">
					
					<!-- Left column: copyright -->
					<div class="column-left">
						&copy; 2017  Grouca
					</div>
					<!-- /Left column: copyright -->
					
					<!-- Right column: menu -->
					<div class="column-right">
						<ul class="footer-menu list-0">
							<li><a href="index.php#home">Home</a></li>
							<li><a href="index.php#about">About</a></li>
							<li><a href="index.php#services">Services</a></li>
							<li><a href="index.php#team">Team</a></li>
							<li><a href="index.php#pricing-plans">Pricing</a></li>
							<li><a href="index.php#contact">Contact</a></li>
							<li><a href="perf.php">Performance</a></li>
                            <li><a href="legal.php">Legal</a></li>
							<?php if (empty($_SESSION['LoggedIn'])){ ?>
						<li><a href="log.php">Login<span></span></a></li>
						<li><a href="sign.php">Sign Up<span></span></a></li>
                        <?php }
                        else {
                            if (isset($_SESSION['Account'])){
                                    if ($_SESSION['Account'] == 'Trial') {
                                        /* $start= strtotime(date("Y-m-d"));// or your date as well
                                        $end = strtotime($_SESSION['Join_Date']);
                                        $days_between = 14 - ceil(abs($end - $start) / 86400); */
                                        echo '<li><a href="memb.php">Member Area<span></span></a></li>';
                                        echo '<li><a href="logout.php">Log Out</a></li>';
                                    }
                                    elseif ($_SESSION['Account'] == 'Expired') {
                                         echo '<li><a href="signupforgrouca.php">Trial Account Expired<br>Click to Upgrade</a></li>';
                                        echo '<li><a href="logout.php">Log Out</a></li>';
                                    }
                                    elseif ($_SESSION['Account'] == 'Paid') {
                                         echo '<li><a href="memb.php">Member Area<span></span></a></li>';
                                         echo '<li><a href="logout.php">Log Out</a></li>';
                                    }
                                }
                        }?>
                            
                     
						</ul>
					</div>	
					<!-- /Right column: Menu -->
					
				</div>
				<!-- /Layout 33x66% -->
				
			</div>
			
		</div>		

		<?php require_once('script_include.php'); ?>

<!--<script>

    $(function(){
      // bind change event to select
      $('#mobile-menu').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>-->
	
	</body>

</html>