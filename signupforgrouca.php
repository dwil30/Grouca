    <style>
         @media only screen and (min-width:864px){
        #menu-selected {width: 79px !important;left: 678px !important;}
        }
    </style>    
<?php
session_start();

if(isset($_GET['discount'])) 
{
  if ($_GET['discount'] == 'grouca1')
  {
      $_SESSION['discount'] = 1;
  }
}

if(isset($_POST['continue_off'])) {
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
            $user_email = mysql_real_escape_string($_POST['user_email']);
            $user_password_hash = md5(mysql_real_escape_string($_POST['user_password_new']));
            $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
            $query_check_user_name = mysql_query($sql);

                 if(mysql_num_rows($query_check_user_name) == 1){
                    $errors .= "Sorry, that email address is already in use.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_password_hash, user_email, JoinDate, AccountType, Subscribed)
                            VALUES('" . $user_password_hash . "', '" . $user_email . "', CURDATE(), 'Trial', '1');";
                    $query_new_user_insert = mysql_query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $_SESSION['UserName'] = $_POST['user_email'];
                        $_SESSION['Join_Date'] = date('Y-m-d');
                        $_SESSION['Account'] = 'Trial';
                        $_SESSION['LoggedIn'] = 1;    
                        $_SESSION['price'] = $_POST['price'];
                        header("location:payment.php");
                        
                    } else {
                        $errors .= "Sorry, your registration failed. Please go back and try again.";
						$errors .= '<br/>'.mysql_error($query_new_user_insert);
                    }
                }
            } else {
                $errors .= "Sorry, no database connection.";
            }
        } 

if(isset($_POST['continue_log'])) {
    $_SESSION['price'] = $_POST['price'];
    header("location:payment.php");
}

require_once('include/header.php');
?>

		<body>

			<ul class="page-list">


				<li class="page-contact" id="page-contact">
					<?php require_once('page/signupforgrouca.php'); ?>
				</li>

			</ul>

			<?php require_once('include/contact_footer.php'); ?>