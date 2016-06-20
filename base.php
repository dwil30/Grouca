<?php

$dbhost = "23.253.3.10"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "943880_grouca"; // the name of the database that you are going to use for this project
$dbuser = "943880_grouca"; // the username that you created, or were given, to access your database
$dbpass = "Sergio123!"; // the password that you created, or were given, to access your database
 
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>