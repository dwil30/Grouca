<?php
error_reporting(-1); ini_set('display_errors','on');
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
        }
    }
}

date_default_timezone_set('Etc/UTC');


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
    // Your Account Sid and Auth Token from twilio.com/user/account $sid = "{{account_sid}}"; $token = "{{ auth_token }}"; 
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
    echo "Phone number is valid";
} else {
    echo "Phone number is not valid";
}
        }
    }
?>