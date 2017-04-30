<?php

require_once('base.php');

/*
 * Example:
 * 
 * Delete an existing profile
 * 
 */
$fields = array(
    'CustomerRefNum' => '13000827',// You will need to set this to a ProfileID in your account
    'CustomerProfileAction' => 'D'
);

$profile = new ChasePaymentech_Profile;
$profile->setTestMode(true);
$profile->setFields($fields);

$response = $profile->profileRequest();

print_r($profile->getPostString());
print_r($response);
exit();


?>
