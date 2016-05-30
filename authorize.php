<?php    
session_start();

if(isset($_POST['continue'])) 
{
    if ($_POST['price'] == 1){$_SESSION['price'] = 7900;}
    else {$_SESSION['price'] = 57900;}
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['zip'] = $_POST['zip'];
    $_SESSION['CC'] = $_POST['CC'];
    $_SESSION['CVV'] = $_POST['CVV'];
    $_SESSION['year'] = substr($_POST['Year'], -2);
    $_SESSION['expiration'] = $_POST['Month'].$_SESSION['year'];   
    
    if ($_POST['price'] == 1){
        include 'add_profile_recurring_and_charge.php';
    }
    else {include 'authorize_card.php';}
}
?>
