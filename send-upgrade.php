<?php
    $email = $_SESSION['UserName'];
    $to = $email;
    $subject = $headers = $message = '';    
    $subject = 'WELCOME TO GROUCA';

    $headers = "From: support@grouca.com\r\n";
    $headers .= "Reply-To: support@grouca.com\r\n";
    $headers .= "Return-Path: support@grouca.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // PREPARE THE BODY OF THE MESSAGE

    $message .= '<img src="http://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br><br>';
    $message .= '<strong><div style="font-size: 14px;color: rgb(21,89,214)">WELCOME TO THE GROUCA</div></strong><br>';
    $message .= 'Thank you for upgrading your membership. We’re happy you’re here. We’ll give you a call soon to schedule your free private coaching session with our top trader ($200 value).<br><br>';

    $message .= 'If you have any questions at the moment, please do not hesitate to contact us at support@grouca.com.<br><br>';
    $message .= 'Sincerely,<br>Maurice Lichten<br>
Managing Director<br><br>

SATISFACTION GUARANTEED!<br>

If you are not 100% satisfied with your Grouca experience, please let us know. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts.  Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used.


DISCLAIMER: Option trading has inherent risk due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a degree of risk and is suitable only for persons who can assume the risk of loss. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our Daily New trade Alerts. 

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a>';
            $message .= "</body></html>";
			mail($to, $subject, $message, $headers);
?>