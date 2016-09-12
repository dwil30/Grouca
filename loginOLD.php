<?php 
session_start();

if(isset($_POST['continue'])) {
        $errors ='';
         if (empty($_POST['user_email'])) {
            $errors .= "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $errors .= "Password field was empty.";
        } elseif (!empty($_POST['user_email']) && !empty($_POST['user_password']))
         {
            include("base.php");
            $user_email = mysql_real_escape_string($_POST['user_email']);
            $user_password_hash = md5(mysql_real_escape_string($_POST['user_password']));
            $sql = "SELECT user_password_hash, user_email, JoinDate, AccountType
                    FROM users
                    WHERE user_email = '" . $user_email . "';";
             $result_of_login_check = mysql_query($sql);

                 if(mysql_num_rows($result_of_login_check) == 1){
                     $user_password_hash = md5(mysql_real_escape_string($_POST['user_password']));
                     $result_row = mysql_fetch_assoc($result_of_login_check);

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if ($user_password_hash == $result_row['user_password_hash']){
                        
                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['UserName'] = $result_row['user_email'];
                        $_SESSION['Join_Date'] = $result_row['JoinDate'];
                        $_SESSION['Account'] = $result_row['AccountType'];
                        $_SESSION['LoggedIn'] = 1;
                        if ($_SESSION['discount'] == 1)
                        {
                            header("location:signup.php?discount=grouca1");
                        }
                        else
                        {
                            header("location:services.php");
                        }
    

                    } else {
                        $errors .= "Wrong password. Try again.";
                    }
                } else {
                    $errors .= "No user with this email address.";
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
            <p class="loginheadline">Log in to your account</p>
             <center> <?php echo isset($errors) ? $errors: '';?>
                 <form action="" method="post">
                <input type="email" class="nav-email" id="email" placeholder="EMAIL" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email']: ''; ?>" required><br>
                <input type="password" class="nav-email" id="password" placeholder="PASSWORD" name="user_password" value="<?php echo isset($_POST['user_password']) ? $_POST['user_password']: ''; ?>" required><br>
                <input type="submit" class="nav-email nav-continue" id="continue" name="continue" value="Log In">
            </form></center><br>
                  <a class="contentlink" href="recovery.php">Forget your password?</a><br><br>
                <a class="button" href="personal.php">Sign Up For Free</a><br><br>
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