<?php
session_start();
include('connect.php');
$sql = mysql_query("SELECT * FROM users");
while($row = mysql_fetch_array($sql)) {
    $emails = array();
    
    if ($row['Subscribed'] == 1){
        $email = $row['user_email'];
        if (!in_array($email, $emails)) {
        
        array_push($emails,$email);
    
    $to = $email;
        $subject = $headers = $message = '';    
    $subject = '[GROUCA] Adjustment - '.date("m-d-Y") ;
        
        $headers = "From: support@grouca.com\r\n";
        $headers .= "Reply-To: support@grouca.com\r\n";
        $headers .= "Return-Path: support@grouca.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // PREPARE THE BODY OF THE MESSAGE
	
			$message .= '<img src="http://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br>';
            $message .= '<strong> Today&#39;s New Adjustment</strong><br><br>';
            $sql_new = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.TradeID = '" .$_SESSION['ID']. "';");
                if(mysql_num_rows($sql_new) > 0){
                    $new = mysql_fetch_assoc($sql_new);
            $message .= 'Grouca has generated a new <b>'. $new['Status'].'</b> adjustment for the <b>'.$new['Stock'].'</b> position.<br><br>';
}
        
     $message .= '<a href="http://grouca.com/services.php">Click Here To See Today&#39;s Adjustment Setup! </a><hr>';
      $message .= '<br>In the event our utility triggers an adjustment on an open position, Grouca will email subscribers an alert about the adjustment by noon.<br><br> ';
        $message .= 'Every adjustment includes: <br><br>';
    $message .= 'Detailed instructions on when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk, how to reverse losing positions to break even or back to gain status.<br><br>';
    $message .= 'Every investor has different risk tolerances and you should make your own decision when you are ready to close a position. However, part of the experience is to expose you to Grouca&#39;s decision making process responsible in generating the current performance.  <br><br>';
     $message .= '<hr><br>';
            $message .= 'As always&#44; if you have any questions, do not hesitate to contact us at support@grouca.com<br><br>';
            
    $message .= 'To Mastering Options,<br>

Maurice Lichten<br>
Managing Director<br><br>

Don&#39;t forget to add support@grouca.com to your address book so we&#39;ll be sure to get it.<br><br> 

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
?>