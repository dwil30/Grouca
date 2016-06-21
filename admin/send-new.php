<?php
session_start();
include('connect.php');
$emails = $phone = array();
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
    
    
    $to = $email;        
    $subject = $headers = $message = '';    
    $subject = '[GROUCA] New Trade - '.date("m-d-Y") ;
        
        $headers = "From: support@grouca.com\r\n";
        $headers .= "Reply-To: support@grouca.com\r\n";
        $headers .= "Return-Path: support@grouca.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // PREPARE THE BODY OF THE MESSAGE
	
			$message .= '<img src="http://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br>';
            $message .= '<strong> Today&#39;s New Trade</strong><br><br>';
            $sql_new = $mysqli->query("SELECT * FROM positions where Status='New' ORDER BY ID Desc Limit 1");
            
                if($sql_new->num_rows > 0){
                    $new = $sql_new->fetch_assoc();
                    $stock = $new['Stock'];
                    $gain = $new['Gain'];
            $message .= 'Grouca has generated a new trade on <b>'. $new['Stock'].'</b> with a target gain of <b>$'. $new['Gain'].'</b>.<br><br>';
}
        
    $message .= '<a href="http://grouca.com/services.php">Click Here To Enter Grouca and See Today&#39;s New Trade! </a><hr>';
    $message .= '<br>Each day Grouca&#39;s ranking algorithm searches for stocks that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy. If it finds a candidate, it generates an alert to subscribers containing the new trade.<br><br>

Every trade includes: <br><br>

Detailed instructions on how to place the trade, when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk, how to reverse losing positions to break even or back to gain status.<br><br>

Every investor has different risk tolerances and you should make your own decision when you are ready to close a position. However, part of the experience is to expose you to Grouca&#39;s decision making process responsible in generating the current performance.';
    
    $message .= '<hr><br>';
    
    $message .= 'As always&#44; if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>';
    
    $message .= 'To Mastering Options, <br>
Maurice Lichten<br>
Managing Director<br><br>

Don&#39;t forget to add support@grouca.com to your address book so we&#39;ll be sure to get it.<br><br> 

DISCLAIMER: Option trading has inherent risk due to market conditions, risk allocation, and other factors. An investment in option contracts is speculative, involves a degree of risk and is suitable only for persons who can assume the risk of loss. Remember, you should always consult with licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our Daily New trade Alerts. 

<hr>
This email was sent to '.$email.' by support@grouca.com.<br><br>

GROUCA | 4974 South Rainbow Blvd. | Suite 135 | Las Vegas | NV | 89118<br>
<a href="http://grouca.com/unsubscribe.php">Unsubscribe from Grouca&#39;s Daily Trades Emails</a>';
            $message .= "</body></html>";
			mail($to, $subject, $message, $headers);
    }
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

	foreach ($phone as $to) {
        if (strlen($to) > 1){ 
		// Send a new outgoing SMS */
		$body = "Grouca has generated a new trade on ".$stock." with a target gain of $".$gain.". Click Here To See Today's New trade! - https://grouca.com/services.php";
		$client->account->sms_messages->create($from, $to, $body);
	}
    }

?>