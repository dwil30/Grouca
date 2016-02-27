<?php 
session_start();

if(isset($_POST['continue'])) {
        $errors ='';
         if (empty($_POST['user_email'])) {
            $errors .= "Username field was empty.";
        } elseif (!empty($_POST['user_email']))
         {
            include("base.php");
            $user_email = mysql_real_escape_string($_POST['user_email']);
             $sql_check = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
             $result_of_login_check = mysql_query($sql_check);
             
                 if(mysql_num_rows($result_of_login_check) == 1){
                     $sql_update =  mysql_query("UPDATE users SET Subscribed = 0 WHERE user_email = '" . $user_email . "';");
                     $errors .= 'The email address - '.$user_email.' - has been unsubscribed from Grouca&#39;s Daily emails.';    
    

                    } else {
                        $errors .= "No user exists with this email address.";
                    }
                } else {
                $errors .= "Database connection problem.";
                }
            }
?>

<?php include 'header.php'; ?>
      
        <div class="w-container">
            <div class="login_section">
            <div class="form-signin"> 
            <p class="loginheadline">Unsubscribe from Daily Emails</p>
             <center> <?php echo isset($errors) ? $errors: '';?>
                 <form action="" method="post">
                <input type="email" class="nav-email" id="email" placeholder="EMAIL" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required><br>
                <input type="submit" class="nav-email nav-continue" id="continue" name="continue" value="Unsubscribe">
            </form></center><br>
                </div>
                    </div>
                </div>

  
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2014 Grouca&nbsp;</p>
          </div>
          <div class="w-col w-col-6">
            <div class="team-icons footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>