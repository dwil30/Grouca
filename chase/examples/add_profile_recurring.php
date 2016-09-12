<?php

require_once('base.php');

/*
 * Example:
 * 
 * Add a new recurring profile
 * 
 */
$fields = array(
    'CustomerProfileAction' => 'C', // Create new Profile
    'CustomerName' => 'John Smith',
    'CustomerAddress1' => '123 Test Lane',
    'CustomerCity' => 'Phoenix',
    'CustomerState' => 'AZ', // 2 Characters Max
    'CustomerZIP' => '85002',
    'CustomerPhone' => '4445554444',
    'CustomerEmail' => 'john@testing.com',
    'CustomerCountryCode' => (in_array('US', array('US', 'CA', 'GB', 'UK'))) ? 'US' : ' ', //Chase only expects a country code for the 4 countries in the array
    'OrderDefaultDescription' => 'Billing Profile for Sandwich Shop',
    'OrderDefaultAmount' => number_format('1.00', 2, '', ''), //Chase expects $1.00 to be 100
    'CustomerProfileFromOrderInd' => 'A', //Auto-generate Customer Profile Number
    'CustomerProfileOrderOverrideInd' => 'NO', //No mapping can be done to retrieve customer info
    'Status' => 'A', // Set Profile to Active
    'CustomerAccountType' => 'CC',
    'CCAccountNum' => '4788250000028291',
    'CCExpireDate' => '1218',
    'MBType' => 'R',
    'MBOrderIdGenerationMethod' => 'DI', //Recurring OrderID's will be auto-generated
    'MBRecurringStartDate' => date('m01Y',strtotime('+1 months')), //Recurring billings will begin on the 1st of every month, starting the next month.
    'MBRecurringMaxBillings' => 12, // The profile will be charged 12 times
    'MBRecurringFrequency' => '1 * ?' //The first day of each month, See "Setting a Managed Billing Frequency Pattern" of the Orbital Gateway XML Spec. for more details,
);

$profile = new ChasePaymentech_Profile;
$profile->setTestMode(true);
$profile->setFields($fields);

$response = $profile->profileRequest();

print_r($profile->getPostString());
print_r($response);
exit();

?>
