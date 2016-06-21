<?php 
session_start();
unset($_SESSION['errors']);
include("connect.php"); 

if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!="true"))
{header( 'Location: error.html' );}

if(isset($_POST['submit'])){
    
    $MR = mysqli_real_escape_string($_POST['MonthReg']);
    $YR = mysqli_real_escape_string($_POST['YearReg']);
    $MD = mysqli_real_escape_string($_POST['MonthDis']);
    $YD = mysqli_real_escape_string($_POST['YearDis']);
 
$sql = $mysqli->query("Update prices Set MonthReg = ".$MR.", YearlyReg = ".$YR.", MonthlyDis = ".$MD.",  YearlyDis = ".$YD.";");
    $_SESSION['errors'] = "Prices Successfully Updated.";
}

 
$price_query = $mysqli->query("SELECT * FROM prices");
$price = $price_query->fetch_assoc();


?>

<!DOCTYPE html>
<html data-wf-site="541b82a7c42f775924361e9a" data-wf-page="541b82a7c42f775924361e9c">
<head>
  <meta charset="utf-8">
  <title>Grouca | The very best Trade Intelligence Platform</title>
  <meta name="description" content="Grouca is an option trading utility that gives you step-by-step directions for setting up trades that generate above average returns.  It shows you how to rebalance portfolio risk, and intervenes with adjustments when existing trades get in trouble.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../css/webflow.css">
  <link rel="stylesheet" type="text/css" href="../css/labtrade-a-gemological-company.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" href="favicons/apple-touch-icon-180x180.png">
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
    table {
  border-collapse: collapse;
  width: 100%;
}
th, td, tr {
  padding: 0.25rem;
  text-align: center;
  border: 1px solid #ccc;
    
}
        
        tr td:first-child {
            text-align:center;
        }
    </style>
  
    <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
</head>
<body>
    <div class="w-section" style="padding:0px 5px;">
<button><a href="users.php">Go to User Info</a></button> 
<button><a href="grouca.php">Admin Home Page</a></button>
<button><a href="bulk_upload.php">Bulk Upload</a></button>
        
   <div class="w-container"><br>
   <h3>Update Grouca Prices</h3>
    <?php echo isset($_SESSION['errors']) ? '<div class="subtitle errors">'.$_SESSION['errors'].'</div>': ''; ?>   
    
    <form method="post" action="">
    <table style="width:50%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr><th>Normal Monthly Price</th>
        <td><input required style="width:100%" type="text" name="MonthReg" value="<?PHP echo $price['MonthReg']; ?>"></td></tr>
        <tr><th>Normal Yearly Price</th>
        <td><input required style="width:100%" type="text" name="YearReg" value="<?PHP echo $price['YearlyReg']; ?>"></td></tr>
        <tr><th>Discount Monthly Price</th>
        <td><input required style="width:100%" type="text" name="MonthDis" value="<?PHP echo $price['MonthlyDis']; ?>"</td></tr>
        <tr><th>Discount Yearly Price</th>
        <td><input required style="width:100%" type="text" name="YearDis" value="<?PHP echo $price['YearlyDis']; ?>"</td></tr>
        </table><br>
         <input name="submit" id="send" type="submit" class="w-button button-send" value="Update Prices" style="color:black;"/>
       </form>
</body>
</html>