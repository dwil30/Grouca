<?php 
session_start();

if(isset($_POST['continue'])) {
    $errors ='';
    if (empty($_POST['user_email'])) {
        $errors .= "Username field was empty.";

    } elseif (!empty($_POST['user_email'])) {
        include("base.php");
        $user_email = $mysqli->real_escape_string($_POST['user_email']);
        $sql_check = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
        $result_of_login_check = $mysqli->query($sql_check);
         
        if(($result_of_login_check->num_rows) == 1){
            $sql_update =  $mysqli->query("UPDATE users SET Subscribed = 0 WHERE user_email = '" . $user_email . "';");
            $errors .= 'The email address - '.$user_email.' - has been unsubscribed from Grouca&#39;s Daily emails.';    
        } else {
            $errors .= "No user exists with this email address.";
        }
    } else {
        $errors .= "Database connection problem.";
    }
}

?>
<!--
    <p class="loginheadline">Unsubscribe from Daily Emails</p>-->
<?php require_once('include/header.php'); ?>
</style> 
<body>

<?php require_once('include/navigation_bar.php'); ?>       


<ul class="page-list">
  <li class="page-contact" id="page-contact" style="padding-bottom:0px;"> 
<!--  ?php require_once('include/navigation_bar.php'); ?> -->
    <div class="section-background-color section-background-color-2">
        <div class="main" style="text-align:left;">

            <!-- Header -->
            <h2 class="underline">
                <span>Unsubscribe from Daily Emails</span>
                <span></span>
            </h2>
            <!-- /Header -->

            <!-- Layout 50x50% -->
            <div class="layout-p-50x50 clear-fix animate-layout">

                <!-- Left column -->
                <div class="column-left">
                    <?php echo isset($errors) ? $errors: '';?>
                    <form action="unsubscribe.php" method="post">
                        <div class="clear-fix">
                            <ul class="list-0 clear-fix">
                            <li>
                            <div class="block field-box">
                                <input type="email" class="nav-email" id="user_email" placeholder="EMAIL" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required>
                            </div>
                            </li>
                            <li>
                            <div class="block field-box">
                                <input type="submit" class="nav-email nav-continue" id="continue" name="continue" value="Unsubscribe">
                            </div>
                            </li>
                            </ul>
                        </div>
                    </form>
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
        </div>
    </div>
  </li>
</ul>
<?php require_once('include/footer.php'); ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/webflow.js"></script>
    <script type="text/javascript" src="js/class.js"></script>
    <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>