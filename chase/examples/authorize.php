<?php

require_once('base.php');

/*
 * Example: 
 * 
 * Authorize
 * 
 */
$fields = array(
    'AccountNum' => '4788250000028291',
    'Exp' => '1218',
    'CurrencyCode' => 840, //840: USD, 124: CAD
    'CurrencyExponent' => 2,
    'CardSecVal' => 222,
    'Amount' => number_format('1.00', 2, '', ''), //Chase expects 1.00 to be 100
    'AVSzip' => '85002',
    'AVSaddress1' => '123 Test Lane',
    'AVScity' => 'Phoenix',
    'AVSstate' => 'AZ', // 2 Characters Max
    'AVScountryCode' => (in_array('US', array('US', 'CA', 'GB', 'UK'))) ? 'US' : ' ', //Chase only expects a country code for the 4 countries in the array
    'AVSphoneNum' => '5553332222',
    'AVSname' => 'John Smith',
    'OrderID' => uniqid() // Set your own custom Order ID, up to 22 characters in length
);

$sale = new ChasePaymentech_NewOrder;
$sale->setTestMode(true);
$sale->setFields($fields);

$response = $sale->authorize();

print_r($sale->getPostString());
print_r($response);

?>
