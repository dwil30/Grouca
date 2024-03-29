
		<div id="navigation-bar" class="clear-fix">
			
			<div class="main clear-fix">

				<!-- Logo from nav bar SUB! -->
				<div class="logo">
					<a href="index.php">
						<img src="image/logo.png" alt="Grouca Logo"/>
					</a>
				</div>
				<!-- /Logo nav bar SUB! -->
                
                <?php 
                $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                if (isset($_GET['id'])){$id = $_GET['id'];}
                else $id = 0; ?>

				<!-- Menu nav bar SUB! -->
				<div id="menu">
					<div id="menu-selected"></div>
					<ul class="sf-menu">
						<li><a href="index.php#about">About<span></span></a></li>
						<li><a href="index.php#services">Services<span></span></a></li>
						<li><a href="index.php#team">Team<span></span></a></li>
						<li><a href="index.php#pricing-plans">Pricing<span></span></a></li>
						<li><a href="index.php#contact">Contact<span></span></a></li>
                        <li><a href="perf.php">Performance<span></span></a></li>
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
                                        echo '<li><a href="memb.php">Member Area<br><div style="color:#9CFFFF;">Trial</div><span></span></a></li>';
                                        echo '<li><a href="account.php"><img src="image/AccountIcon.png"><span></span></li></a>';
                                    }
                                    elseif ( $_SESSION['Account'] == 'Expired' ){
                                         echo '<li><a style="margin-top:-8px;color:#CCCCCC;font-size: 13px;" href="signupforgrouca.php">Trial Account Expired<br>Click to Upgrade</a></li>';
                                    }
                                    elseif ($_SESSION['Account'] == 'Paid'){
                                         echo '<li><a href="memb.php">Member Area<span></span></a></li>';
                                        echo '<li><a href="account.php"><img src="image/AccountIcon.png"><span></span></li></a>';
                                    }
                                }
                        }
                     ?>
					</ul>
				</div>
				<!-- /Menu nav bar SUB! -->
				
				<!-- Responsive menu  nav bar SUB! -->
				<div id="menu-responsive" class="clear-fix">
					<select>
						<option value="index.php#about">About</option>
						<option value="index.php#services">Services</option>
						<option value="index.php#team">Team</option>
						<option value="index.php#pricing-plans">Pricing</option>
						<option value="index.php#contact">Contact</option>
                        <option value="perf.php"<?php if (strpos($actual_link,'perf') !== false) {echo 'Selected';}?> >Performance</option>
						
                        <?php if (empty($_SESSION['LoggedIn'])){ ?>
						<option value="log.php" <?php if (strpos($actual_link,'log') !== false) {echo 'Selected';}?> >Login</option>
						<option value="sign.php" <?php if (strpos($actual_link,'sign') !== false) {echo 'Selected';}?> >Sign Up</option>
                        <?php }
                        else {
                            if (isset($_SESSION['Account'])){
                                    if ($_SESSION['Account'] == 'Trial') {?>    
                                        <option value="memb.php" <?php if (strpos($actual_link,'memb') !== false) {echo 'Selected';}?> >Member Area - Trial</option>';
                                        <option value="logout.php">Log Out</option>
                                    <?php }
                                elseif ($_SESSION['Account'] == 'Expired'){
                                     echo '<option value="expired.php">Upgrade Account</option>';
                                     echo '<option value="logout.php">Log Out</option>';
                                }
                                  elseif ($_SESSION['Account'] == 'Paid'){ ?>
                                      <option value="memb.php" <?php if (strpos($actual_link,'memb') !== false) {echo 'Selected';}?> >Member Area</option>
                        <option value="logout.php">Log Out</option> 
                               <?php }
                            }
                        } ?>
					</select>
				</div>
				<!-- /Responsive menu  nav bar SUB! -->
				
			</div>
							
		</div>

