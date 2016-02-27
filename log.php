<?php 

//handle the signup form
if(isset($_POST['contact-form-submit'])) {
    session_start();
    $errors ='';
    if (empty($_POST['contact-form-email'])) {
        $errors .= "Email address is empty.";
    } elseif (empty($_POST['contact-form-password'])) {
        $errors .= "Password is empty.";
    } elseif (!empty($_POST['contact-form-email']) && !empty($_POST['contact-form-password'])) {
        include("base.php");
        $user_email = $mysqli->real_escape_string($_POST['contact-form-email']);
        $user_password_hash = md5($mysqli->real_escape_string($_POST['contact-form-password']));
        $sql = "SELECT user_password_hash, user_email, JoinDate, AccountType FROM users WHERE user_email = '" . $user_email . "';";
        $result_of_login_check = $mysqli->query($sql);

        if(($result_of_login_check -> num_rows) == 1){
            $user_password_hash = md5($mysqli->real_escape_string($_POST['contact-form-password']));
            $result_row = $result_of_login_check->fetch_assoc();

            // using PHP 5.5's password_verify() function to check if the provided password fits
            // the hash of that user's password
            if ($user_password_hash == $result_row['user_password_hash']){

                // write user data into PHP SESSION (a file on your server)
                $_SESSION['UserName'] = $result_row['user_email'];
                $_SESSION['Join_Date'] = $result_row['JoinDate'];
                $_SESSION['Account'] = $result_row['AccountType'];
                $_SESSION['LoggedIn'] = 1;
                
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

                header("location:memb.php");

            } else {
                $errors .= "Wrong password. Please try again.";
            }
        } else {
            $errors .= "No user with this email address.";
        }
    } else {
        $errors .= "Database connection problem.";
    }
}?>
<style>
         @media only screen and (min-width:864px){
        #menu-selected {width: 85px !important;left: 587px !important;}
        }
</style>
<?php require_once('include/header.php'); 
?>

		<body>

			<ul class="page-list">


				<li class="page-contact" id="page-contact">
					<?php require_once('page/signin.php'); ?>
				</li>

			</ul>

			<?php require_once('include/contact_footer.php'); ?>