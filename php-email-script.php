<?php
include('base.php');
//Search for the users with the account type on Trial and the amount of days from subcription is 5
$result = $mysqli->query("SELECT *, DATEDIFF(CURDATE(),`JoinDate`) AS days 
                    FROM `users` 
                    WHERE `AccountType`= 'Trial' and DATEDIFF(CURDATE(),`JoinDate`) = 5;");
$email_list = array();
while($row = $result->fetch_assoc()) {

    $email = $row['user_email'];
    $to = $email;
    array_push($email_list, $to);
    $subject = $headers = $message = '';    
    $subject = 'GROUCA TRIAL SPECIAL UPGRADE';
    $headers = "From: support@grouca.com\r\n";
    $headers .= "Reply-To: support@grouca.com\r\n";
    $headers .= "Return-Path: support@grouca.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    // PREPARE THE BODY OF THE MESSAGE

    $message = '<html><body>';
    $message .= '<img src="http://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo">';
    $message .= '<br><br><div style="color:#1559D6;"><b>WE INVITE YOU TO UPDATE YOUR MEMBERSHIP.</b></div><br><br> Thank you for signing up for Grouca. We&#39;d like to extend a special offer to you to make subscribing even easier. For a limited time, we&#39;re making our already low monthly fee even lower.<br><br>

Subscribe now and get access to the full Grouca service for just $79 per month (normally $99/month). That&#39;s 20% off our standard price—no long-term commitment required. You can cancel your subscription at any time. And there&#39;s a bonus: sign up now and get a one-on-one, private coaching session with our top trader ($200 value) for free!<br><br>

With a full membership, you get access to Grouca&#39;s proven ranking algorithm, created to zero in on stocks that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy. When it identifies a candidate, you get an alert about the new trade right away.<br><br>

Each alert includes a detailed trade set up and all the tools you need to manage your trade to its profitable conclusion:
<ol>
<li>Option strategy</li>
<li>Underlying stock name and price</li>
<li>Detailed instructions on how to place the order</li>
<li>What entry price to use</li>
<li>Target gain and risk profile</li>
</ol><br><br>

You&#39;ll also receive full access to all of our current and future trades.<br><br>

And the new trade alert is just the beginning. We continually monitor each open trade. If we find that a trade needs an adjustment, you’ll receive a new alert that includes detailed instructions on when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk, and how to reverse losing positions to break even or back to gain status.<br><br>
            
<b>Redeem your special offer.</b><br><br>';
        
$message .= '<table cellspacing="0" cellpadding="0"> <tr> 
<td align="center" width="200" height="40" bgcolor="#3378F6" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
<a href="https://www.grouca.com/signup.php?discount=grouca1" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF;text-decoration: none;line-height:40px;">UPGRADE NOW</span></a>
</td> 
</tr> </table><br>';
        $message .= 'As always, if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>';
        $message .= 'SATISFACTION GUARANTEED!<br>If you are not 100% satisfied with your Grouca experience, please let us know. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts.  Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used.<br><br>

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a>';
            
            
        
            $message .= "</body></html>";
			mail($to, $subject, $message, $headers);
    }

if (empty($email_list)){
    $email = '';
    $to = 'support@grouca.com';
           $subject = 'GROUCA TRIAL SPECIAL UPGRADE';
        $headers = "From: support@grouca.com\r\n";
        $headers .= "Reply-To: support@grouca.com\r\n";
        $headers .= "Return-Path: support@grouca.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // PREPARE THE BODY OF THE MESSAGE

        $message = '<html><body>';
        $message .= '<img src="http://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo">';
        $message .= '<br><br><div style="color:#1559D6;"><b>WE INVITE YOU TO UPDATE YOUR MEMBERSHIP.</b></div><br><br> We have made it even easier for you to subscribe to Grouca, we&#39;ve deeply discounted the already-low subscription price for a limited time.<br><br>

Subscribe now and get access to the full Grouca tool for just $79 per month (normally $158/month). That&#39;s 50% off our standard price. No commitments. Cancel at any time. Also receive a Free bonus, your own private coaching session by our top option trader ($200 Value).<br><br>

For less than a nice meal, you can take a seat alongside your friends, the most successful traders in town.<br><br>

With a full membership you benefit from Grouca&#39;s ranking algorithm that continually searches for stocks that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy. If it finds a candidate, it generates an alert to subscribers containing the new option trade. Included with your alert you get a detailed trade set up and all the tools you will need to manage your trade to its profitable conclusion. With each trade you will get an option strategy, underling stock name and price, detailed instructions on how to place the order, what entry prices to use and the target gain and risk profile, you also receive full access to all our current and future trades.<br><br>

We also continually monitor the open trades and if we see that a trade needs adjustment we issue a trade alert to our subscribers with detailed introductions on when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk, how to reverse losing positions to break even or back to gain status.<br><br>

<b>Click the button below to redeem your special offer.</b><br><br>';
        $message .= '<table cellspacing="0" cellpadding="0"> <tr> 
<td align="center" width="200" height="40" bgcolor="#3378F6" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
<a href="http://www.grouca.com/signup.php?discount=grouca1"" style="font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block"><span style="color: #FFFFFF;text-decoration: none;line-height:40px;">SEE UPGRADE OFFER</span></a>
</td> 
</tr> </table><br>';
        $message .= 'As always, if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>';
        $message .= 'SATISFACTION GUARANTEED!<br>If for any reason you are not 100% satisfied with Grouca&#39;s Performance, simply notify us at support@grouca.com. At Grouca, there are no long-term commitments. Monthly subscriptions are month to month and can be cancelled at any time. Annual subscriptions can also be cancelled at any time and you will receive a prorated refund based on the monthly rate for months unused.<br><br>

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a>';
            
            $message .= "</body></html>";
			mail($to, $subject, $message, $headers);
    }
else {
    $to = 'support@grouca.com';
    mail($to, $subject, $message, $headers);
}
?>