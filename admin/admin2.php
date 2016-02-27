<?
session_start();
if($_POST['username']=="admin" && $_POST['pass']=="Sergio123!")
	{
	$_SESSION['logged_in']="true";
	header( 'Location: grouca.php' ) ;
	}
else header( 'Location: error.html' ) ;
?>