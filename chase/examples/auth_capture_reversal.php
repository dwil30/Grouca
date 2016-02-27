<?php

require_once('base.php');

/*
 * Example: 
 * 
 * Authorize followed by a separate Mark for Capture and finally a reversal (void)
 * 
 */


/*
 * Authorize
 * 
 */
$auth_fields = array(
    'AccountNum' => '4788250000028291',
    'Exp' => '1218',
    'CurrencyCode' => 840, //840: USD, 124: CAD
    'CurrencyExponent' => 2,
    'CardSecVal' => 222,
    'Amount' => number_format('85.00', 2, '', ''), //Chase expects 1.00 to be 100
    'AVSzip' => '22222',
    'AVSaddress1' => '123 Test Lane',
    'AVScity' => 'Phoenix',
    'AVSstate' => 'AZ', // 2 Characters Max
    'AVScountryCode' => (in_array('US', array('US', 'CA', 'GB', 'UK'))) ? 'US' : ' ', //Chase only expects a country code for the 4 countries in the array
    'AVSphoneNum' => '5554443333',
    'AVSname' => 'John Smith',
    'OrderID' => uniqid() // Set your own custom Order ID, up to 22 characters in length
);

$auth = new ChasePaymentech_NewOrder;
$auth->setTestMode(true);
$auth->setFields($auth_fields);

$auth_response = $auth->authorize();

print_r($auth->getPostString());
print_r($auth_response);


if($auth_response->approved == 1){

    /*
     * Mark for Capture
     * 
     */
    $capture_fields = array(
        'OrderID' => $auth_fields['OrderID'], // Retrieve OrderID used for auth
        'Amount' => $auth_fields['Amount'], // Retrieve Amount used for auth
        'TxRefNum' => $auth_response->TxRefNum // Retrieve TxRefNum returned on auth
    );

    $capture = new ChasePaymentech_MarkForCapture;
    $capture->setTestMode(true);
    $capture->setFields($capture_fields);

    $capture_response = $capture->capture();

    print_r($capture->getPostString());
    print_r($capture_response);

    if($capture_response->approved == 1){

        /*
         * Reversal (Void)
         * 
         */
        $reversal_fields = array(
            'OrderID' => $auth_fields['OrderID'], // Retrieve OrderID used for auth/capture
            'TxRefNum' => $capture_response->TxRefNum // Retrieve TxRefNum returned on capture
        );

        $reversal = new ChasePaymentech_Reversal;
        $reversal->setTestMode(true);
        $reversal->setFields($reversal_fields);

        $reversal_response = $reversal->void();

        print_r($reversal->getPostString());
        print_r($reversal_response);
        
    }
    
}

?>
