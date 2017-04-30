<?php
if(isset($_POST['myFormSubmitted'])) {
session_start();
include("simple-php-captcha.php");
// Clean up the input values
foreach($_POST as $key => $value) {
	if(ini_get('magic_quotes_gpc'))
		$_POST[$key] = stripslashes($_POST[$key]);
	
	$_POST[$key] = htmlspecialchars(strip_tags($_POST[$key]));
}

// Assign the input values to variables for easy reference
$errors='';    
$email = $_POST["email"];
$message = $_POST["message"];
$code = $_POST["code"];
$captcha = $_SESSION['captcha']['code'];

// Test input values for errors
$errors = array();
if(!$email) {
	$errors[] = "You must enter an email.";
} else if(!validEmail($email)) {
	$errors[] = "You must enter a valid email.";
}
if(strlen($message) < 10) {
	if(!$message) {
		$errors[] = "You must enter a message.";
	} else {
		$errors[] = "Message must be at least 10 characters.";
	}
}
if($code != $captcha){
    $errors[] = "Captcha code did not match.";
}

if($errors) {
	// Output errors and die with a failure message
	$errortext = "";
	foreach($errors as $error) {
		$errortext .= "<li>".$error."</li>";
	}
    echo "The following errors occured:<ul>". $errortext ."</ul>";
}
else {
// Send the email
$to = "damon.d.wilson@gmail.com";
$subject = "Contact Form from Grouca.com";
$message = "$message";
$headers = "From: $email";

mail($to, $subject, $message, $headers);
echo "Your message was successfully sent. We'll be in contact shortly!";

// A function that checks to see if
// an email is valid
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}
}
}

?>