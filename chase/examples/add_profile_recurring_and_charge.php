<?php

require_once('connect.php');

/*
 * Example:
 * 
 * Add a Customer Profile for Recurring Billing and Authorize and Capture
 * their first billing immediately.
 * 
 */
$fields = array(
    'AccountNum' => '4788250000028291',
    'Exp' => '1218',
    'CurrencyCode' => 840, //840: USD, 124: CAD
    'CurrencyExponent' => 2,
    'CardSecVal' => 222,
    'Amount' => number_format('1.00', 2, '', ''), //Chase expects $1.00 to be 100
    'AVSzip' => '85002',
    'AVSaddress1' => '123 Test Lane',
    'AVScity' => 'Phoenix',
    'AVSstate' => 'AZ', // 2 Characters Max
    'AVScountryCode' => (in_array('US', array('US', 'CA', 'GB', 'UK'))) ? 'US' : ' ', //Chase only expects a country code for the 4 countries in the array
    'AVSphoneNum' => '4804954706',
    'AVSname' => 'John Smith',
    'CustomerProfileFromOrderInd' => 'A', //Auto-generate Customer Profile Number
    'CustomerProfileOrderOverrideInd' => 'NO', //No mapping can be done to retrieve customer info
    'Status' => 'A', // Set Profile to Active
    'OrderID' => uniqid(), // Set your own custom Order ID, up to 22 characters in length
    'MBType' => 'R',
    'MBOrderIdGenerationMethod' => 'DI', //Recurring OrderID's will be auto-generated
    'MBRecurringStartDate' => date('m01Y',strtotime('+1 months')), //Recurring billings will begin on the 1st of every month, starting the next month.
    'MBRecurringMaxBillings' => 12, // The profile will be charged 12 times
    'MBRecurringFrequency' => '1 * ?' //The first day of each month, See "Setting a Managed Billing Frequency Pattern" of the Orbital Gateway XML Spec. for more details,
    //'RecurringInd' => 'RF' //Only required for Canadian merchants performing recurring transactions through BIN 000002
);

$sale = new ChasePaymentech_NewOrder;
$sale->setTestMode(true);
$sale->setFields($fields);

$response = $sale->authorizeAndCapture();

print_r($sale->getPostString());
print_r($response);
exit();

?>
