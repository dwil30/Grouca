
		<div id="navigation-bar" class="clear-fix">
			
			<div class="main clear-fix">

				<!-- Logo -->
				<div class="logo">
					<a href="#home">
						<img src="image/logo.png" alt=""/>
					</a>
				</div>
				<!-- /Logo -->

				<!-- Menu -->
				<div id="menu">
					<div id="menu-selected"></div>
					<ul class="sf-menu">
						<li><a href="#about">About<span></span></a></li>
						<li><a href="#services">Services<span></span></a></li>
						<li><a href="#team">Team<span></span></a></li>
						<li><a href="#pricing-plans">Pricing<span></span></a></li>
						<li><a href="#contact">Contact<span></span></a></li>
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
                                         echo '<li><a style="margin-top:-8px;color:#CCCCCC;font-size: 13px;" href="signupforgrouca.php">Trial Account Expired<br>Click to Upgrade<span></span></a></li>';
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
				<!-- /Menu -->
               <?php if (isset($_GET['id'])){$id = $_GET['id'];}
                else $id = 0; ?>
                <!-- Responsive menu  -->
				<div id="menu-responsive" class="clear-fix">
							<select>
						<option value="https://grouca.com#about?id=about" <?php if ($id == 'about') echo 'selected';?>>About</option>
						<option value="https://grouca.com#services?id=services" <?php if ($id == 'services') echo 'selected';?>>Services</option>
						<option value="https://grouca.com#team?id=team" <?php if ($id == 'team') echo 'selected';?>>Team</option>
						<option value="https://grouca.com#pricing-plans?id=pricing-plans" <?php if ($id == 'pricing-plans') echo 'selected';?>>Pricing</option>
						<option value="https://grouca.com#contact?id=contact" <?php if ($id == 'contact') echo 'selected';?>>Contact</option>
                        <option value="perf.php?id=performance">Performance</option>
						
                        <?php if (empty($_SESSION['LoggedIn'])){ ?>
						<option value="log.php?id=log">Login</option>
						<option value="sign.php?id=sign">Sign Up</option>
                        <?php }
                        else {
                            if (isset($_SESSION['Account'])){
                                    if ($_SESSION['Account'] == 'Trial') {    
                                        echo '<option value="memb.php?id=memb">Member Area - Trial</option>';
                                        echo '<option value="logout.php">Log Out</option>';
                                    }
                                elseif ($_SESSION['Account'] == 'Expired'){
                                     echo '<option value="expired.php">Upgrade Account</option>';
                                     echo '<option value="logout.php">Log Out</option>';
                                }
                                  elseif ($_SESSION['Account'] == 'Paid'){
                                      echo '<option value="memb.php?id=memb">Member Area</option>';
                                      echo '<option value="logout.php">Log Out</option>';
                                }
                            }
                        } ?>
					</select>
				</div>
				<!-- /Responsive menu  -->
				
			</div>
							
		</div>

