<?php
session_start(); 

if (isset($_GET['clear'])){
    include("base.php");
    $query = "UPDATE users SET Browser = 'Nothing' WHERE user_email = '".$_SESSION['UserName']."';";
    $mysqli->query($query);
}

if (!isset($browser)){
    $browser = $_SERVER['HTTP_USER_AGENT'];
}

if(isset($_POST['contact-form-submit'])) {
  
    $errors ='';
    if (empty($_POST['contact-form-email'])) {
        $errors .= "Email address is empty.";
    } elseif (empty($_POST['contact-form-password'])) {
        $errors .= "Password is empty.";
    } elseif (!empty($_POST['contact-form-email']) && !empty($_POST['contact-form-password'])) {
        include("base.php");
        $user_email = $mysqli->real_escape_string($_POST['contact-form-email']);
        $user_password_hash = md5($mysqli->real_escape_string($_POST['contact-form-password']));
        $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
        $result_of_login_check = $mysqli->query($sql);

        if(($result_of_login_check -> num_rows) == 1){
            
            $user_password_hash = md5($mysqli->real_escape_string($_POST['contact-form-password']));
            $result_row = $result_of_login_check->fetch_assoc();
            $_SESSION['UserName'] = $result_row['user_email'];
            
            if (($result_row['Browser'] == $browser) || ($result_row['Browser'] == "Nothing")){

            // using PHP 5.5's password_verify() function to check if the provided password fits
            // the hash of that user's password
                if ($user_password_hash == $result_row['user_password_hash']){

                    // write user data into PHP SESSION (a file on your server)
        
                    $_SESSION['Join_Date'] = $result_row['JoinDate'];
                    $_SESSION['Account'] = $result_row['AccountType'];
                    $_SESSION['LoggedIn'] = 1;
                  
                    $query = "UPDATE users SET Browser = '".$browser."' WHERE user_email = '".$_SESSION['UserName']."';";
                    $mysqli->query($query);

                    //update trial account time remaining
                    if ($_SESSION['Account'] == 'Trial'){
                        $now = time();
                        $your_date = strtotime($_SESSION['Join_Date']);
                        $datediff = floor(($now - $your_date)/(60*60*24));
                        if ($datediff >=30){
                            $sql = "UPDATE users SET AccountType ='Expired' WHERE user_email ='". $_SESSION['UserName']."'";
                            include("base.php");
                            $query_check_user_name = $mysqli->query($sql);
                            $_SESSION['Account'] = 'Expired';
                        }
                    }

                    if ((isset($_GET['discount'])) and ($_GET['discount'] == 'grouca1')) {
                        header("location:signup.php?discount=grouca1");
                    } elseif ((isset($_GET['discount'])) and ($_GET['discount'] == 'normal')) {
                        header("location:signup.php");
                    }
                      elseif ((isset($_GET['price']))) {  
                          $_SESSION['price'] = $_GET['price'];
                          header("location:payment.php");
                    }
                     /* elseif ($_SESSION['GoTo'] == "member"){
                          header("location:memb.php");
                      } */

                    else {
                        header("location:memb.php");
                    }


                }
                else {
                $errors .= "Wrong password. Please try again.";
                }
            }
                else {
                      $errors .= "You can only be logged into one browser at a time. <a href='log.php?clear=1'>Click here to log out everywhere else</a>. Then try logging in again.";
                }
            
                
        } else {
            $errors .= "No user with this email address.";
        }
    } else {
        $errors .= "Database connection problem.";
    }
}

require_once('include/header.php'); 

?>
<style>
         @media only screen and (min-width:864px){
        #menu-selected {width: 85px !important;left: 587px !important;}
        }
</style>

		<body>

			<ul class="page-list">


				<li class="page-perf" id="page-perf">
					<?php require_once('page/signin.php'); ?>
				</li>

			</ul>

			<?php require_once('include/footer.php'); ?>