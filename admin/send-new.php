<?php
session_start();
include('connect.php');
$emails = $phone = array();
require 'PHPMailer/PHPMailerAutoload.php';
$sql = $mysqli->query("SELECT * FROM users");
while ($row = $sql->fetch_assoc()){
    
    if ($row['Subscribed'] == 1){
        
           $phonenumber = $row['Phone'];
        if (!in_array($phonenumber, $phone)){
            array_push($phone, $phonenumber);
        }
        
        $email = $row['user_email'];
       
        if (!in_array($email, $emails)) {
        
        array_push($emails,$email);
        }
    }
}

date_default_timezone_set('Etc/UTC');

$query = 'SELECT * , GROUP_CONCAT( 
TYPE , Number, FullCode, LowerPrice
SEPARATOR  ";" ) as Options 
FROM positions
WHERE Status = "New" and isCurrent = 1
GROUP BY UNIX_TIMESTAMP( TIMESTAMP ) DIV 70 
ORDER BY TIMESTAMP DESC';
$sql_new = $mysqli->query($query);


if(mysqli_num_rows($sql_new) > 0){
    
    $new = $sql_new->fetch_assoc();
    $stock = $new['Stock'];
    $gain = $new['Gain'];
        
    foreach ($emails as $recip){
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.zoho.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@grouca.com';
    $mail->Password = 'Sergio123!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('support@grouca.com');
    $mail->addReplyTo('support@grouca.com');
    $mail->addAddress($recip);
    $mail->isHTML(true);
    $mail->Subject = '[GROUCA] New Trade - '.date("m-d-Y");
    $mail->Body = '<html><body><img src="https://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br>
                <strong> Today&#39;s New Trade</strong><br><br>
                Grouca has generated a new trade on <b>'. $new['Stock'].'</b> with a target gain of <b>$'. $new['Gain'].'</b>.<br><br>
                <a href="https://grouca.com/memb.php">Click Here To Enter Grouca and See Today&#39;s New Trade! </a><hr>
                <br>Each day Grouca&#39;s ranking algorithm searches for stocks that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy. If it finds a candidate, it generates an alert to subscribers containing the new trade.<br><br>

Every trade includes: <br><br>

Detailed instructions on how to place the trade, when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk, how to reverse losing positions to break even or back to gain status.<br><br>

Every investor has different risk tolerances and you should make your own decision when you are ready to close a position. However, part of the experience is to expose you to Grouca&#39;s decision making process responsible in generating the current performance.
<hr><br>
As always&#44; if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>
To Mastering Options, <br>
Maurice Lichten<br>
Managing Director<br><br>

Don&#39;t forget to add <a href="mailto:support@grouca.com" target="_blank">support@grouca.com</a> to your address book so we&#39;ll be sure to get it.<br><br> 

DISCLAIMER: Option trading has inherent risk due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a degree of risk and is suitable only for persons who can assume the risk of loss. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our Daily New trade Alerts. 

<hr>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a></body></html>';
        
$mail->send();   
}
}


	require_once "Services/Twilio.php";
	
	// Set our AccountSid and AuthToken from twilio.com/user/account
	$AccountSid = "AC82e60008e8d2680d435c9f06c17a41ba";
	$AuthToken = "b13116a5726a17fddfdafd7184516b9b";

	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken);

	/* Your Twilio Number or Outgoing Caller ID */
	$from = '+17027613508';
    
    function isValidNumber($number) { 
        $AccountSid = "AC82e60008e8d2680d435c9f06c17a41ba";
	    $AuthToken = "b13116a5726a17fddfdafd7184516b9b";
        
        $client = new Lookups_Services_Twilio($AccountSid, $AuthToken); // Try performing a carrier lookup and return true if successful. 
    
        try { 
            $number = $client->phone_numbers->get($number, array("CountryCode" => "US", "Type" => "carrier"));
            $number->carrier->type; // Should throw an exception if the number doesn't exist.
            return true;
        } catch (Exception $e) {
            // If a 404 exception was encountered return false.
            if($e->getStatus() == 404) {
                return false;
            } else {
                throw $e;
            }
        }
    }
 
	foreach ($phone as $to) {
        if (strlen($to) > 1){ 
            if (isValidNumber($to)) {
                $body = "Grouca has generated a new trade on ".$stock." with a target gain of $".$gain.". Click Here To See Today's New trade! - https://grouca.com/memb.php";
		       $client->account->sms_messages->create($from, $to, $body);
            }
        }
    }
?>