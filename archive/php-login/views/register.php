<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<form method="post" action="register.php" name="registerform">

    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">User's email</label>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />

    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" required autocomplete="off" />

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" required autocomplete="off" />
    
  <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?>
    <input id="login_input_password_repeat" class="login_input" type="text" name="security_code" required>
    <input type="submit"  name="register" value="Register" />

</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
