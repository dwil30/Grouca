<?php 
session_start();
include("base.php");
$query = "UPDATE users SET Browser = 'Nothing' WHERE user_email = '".$_SESSION['UserName']."';";
$mysqli->query($query);
session_unset();
session_destroy();
header("location:index.php");
exit();    
?>
