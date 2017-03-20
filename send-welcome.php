<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
$mail->SMTPDebug  = 1;
    $mail->Host = 'smtp.zoho.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@grouca.com';
    $mail->Password = 'Sergio123!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('support@grouca.com');
    $mail->addReplyTo('support@grouca.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'WELCOME TO THE GROUCA TRIAL';
    $mail->Body = '<html><body><img src="https://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br><br><strong><div style="font-size: 14px;color: rgb(21,89,214)">YOUR FREE GROUCA TRIAL BEGINS NOW</div></strong><br><br>
    
    Thank you for signing up for your free 30-day Grouca trial.<br><br>

We will be in touch soon for a brief tutorial on how to use the new daily trade, the adjustment manager, and how to set up your trading screen.<br><br>

As always&#44; if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>Maurice Lichten<br>
Managing Director<br><br>

DISCLAIMER: Option trading has inherent risk due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a degree of risk and is suitable only for persons who can assume the risk of loss. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our New trade Alerts. 

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a></body></html>';

$mail->send();   
		
?>