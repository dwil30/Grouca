<?php
    $email = $_SESSION['UserName'];
    $to = $email;
    $subject = $headers = $message = '';    
    $subject = 'WELCOME TO THE GROUCA TRIAL';
    
    $headers = "From: support@grouca.com\r\n";
    $headers .= "Reply-To: support@grouca.com\r\n";
    $headers .= "Return-Path: support@grouca.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    // PREPARE THE BODY OF THE MESSAGE

	$message .= '<img src="https://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br><br>';
    $message .= '<strong><div style="font-size: 14px;color: rgb(21,89,214)">YOUR FREE GROUCA TRIAL BEGINS NOW</div></strong><br>';

    //$message .= 'A Grouca support person will be calling to help you get started.<br><br>';

    $message .= 'Thank you for signing up for your free 30-day Grouca trial. For a brief introduction on how to use both the daily trade and adjustment manager and organize your trading screen, you can watch this short <a href="https://grouca.com/video.php">Video</a>.<br><br>';

    //$message .= 'For a brief introduction on how to use the new daily trade, the adjustment manager, and how to set up your trading screen. <a href="http://grouca.com/video.php">See Video</a><br><br>';

    $message .= 'As always&#44; if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>';
    $message .= 'Maurice Lichten<br>
Managing Director<br><br>

DISCLAIMER: Option trading has inherent risk due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a degree of risk and is suitable only for persons who can assume the risk of loss. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our New trade Alerts. 

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a>';
            $message .= "</body></html>";
			mail($to, $subject, $message, $headers);
?>