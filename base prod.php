<?php

$dbhost = "mysql51-127.wc1.ord1.stabletransit.com"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "943880_grouca"; // the name of the database that you are going to use for this project
$dbuser = "943880_grouca"; // the username that you created, or were given, to access your database
$dbpass = "Sergio123!"; // the password that you created, or were given, to access your database
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>