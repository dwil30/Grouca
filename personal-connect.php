<?php
session_start();

if(isset($_POST['continue'])) {
        $errors ='';
        $captcha = $_SESSION['captcha']['code'];
        if (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $errors .= "Empty Password";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $errors .= "Password and confirm password are not the same";
        } elseif ($_POST['security_code'] !== $captcha) {
            $errors .= "Captcha code does not match. Please try again";
        } elseif (strlen($_POST['user_password_new']) < 4) {
            $errors .= "Password has a minimum length of 4 characters";
        } elseif (empty($_POST['user_email'])) {
            $errors .= "Email cannot be empty"; 
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors .= "Your email address is not in a valid email format";
        } elseif (!empty($_POST['user_email'])
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
            && ($_POST['security_code'] == $captcha)
        ) {
            include("base.php");
            $user_email = $mysqli->real_escape_string($_POST['user_email']);
            $user_password_hash = md5($mysqli->real_escape_string($_POST['user_password_new']));
            $phone =  $mysqli->real_escape_string($_POST['tel']);
            $phone = str_replace("-","",$phone);
            $phone = str_replace(".","",$phone);
            $phone = str_replace("/","",$phone);
            $phone = str_replace("(","",$phone);
            $phone = str_replace(")","",$phone);
            $phone = str_replace(" ","",$phone);

            $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
            $query_check_user_name = $mysqli->query($sql);

                 if(mysqli_num_rows($query_check_user_name) == 1){
                    $errors .= "Sorry, that email address is already in use.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_password_hash, user_email, JoinDate, AccountType, Subscribed, Phone)
                            VALUES('" . $user_password_hash . "', '" . $user_email . "', CURDATE(), 'Trial','1','" . $phone . "');";
                    $query_new_user_insert = $mysqli->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $_SESSION['UserName'] = $_POST['user_email'];
                        $_SESSION['Join_Date'] = date('Y-m-d');
                        $_SESSION['Account'] = 'Trial';
                        $_SESSION['LoggedIn'] = 1;    
                        $email = $_SESSION['UserName'];
                        include 'send-welcome.php';
                        
                        header("location: http://dev.grouca.com/services.php");
                    } else {
                        $errors .= "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $errors .= "Sorry, no database connection.";
            }
        } 

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
<?php include 'header.php'; ?>
    <div class="w-container">
        <div class="personal_section">
    <div class="w-row">
      <div class="w-col w-col-7"><img class="social-image" src="images/image_pseudo_social.jpg" alt="546e4b05c740bddf740cebaa_image_pseudo_social.jpg">
        <h1 class="below-image">See for yourself why Grouca outperforms the market!</h1>
          <h1 class="below-text">Free 14-day trial. No credit card necessary.</h1>
      </div>
      <div class="w-col w-col-5">
        <div class="w-container right-container">
          <div>
            <div id="servicesform" style="text-align: center;">
               <h1 class="below-text">Connect your Grouca account to Interactive Brokers to make trades without leaving Grouca.com</h1>
                <img src="images/ConnectGrouca.jpg">
                <form>
                    <input type="submit" class="nav-email nav-continue" id="continue" name="Connect" value="Connect Interactive Brokers">
                <input type="submit" class="nav-email nav-continue" style="background-color:grey;" id="continue" name="NoConnect" value="Not Right Now">
                </form>    
            </div>
          </div>
        </div>
      </div>
    </div>
            </div>
          </div>
    <!--<div class="section footer">
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
    </div>-->
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>