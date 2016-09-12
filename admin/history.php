<?php
session_start();
date_default_timezone_set('UTC');
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
    <link rel="stylesheet" type="text/css" href="../css/grouca2.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" href="../favicons/apple-touch-icon-180x180.png">
  
    <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
        <script type="text/javascript" src="js/modernizr.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>
		<script type="text/javascript" src="js/contact.js"></script>
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
</head>
<body>
  <div class="w-nav navbar" data-collapse="medium" data-animation="over-right" data-duration="400" data-contain="1">
    <div class="w-container">
      <a class="w-nav-brand" href="#">
        <img class="brand-logo" src="../images/lgl_name.png" alt="logo">
      </a>
        
      <nav class="w-nav-menu nav-menu" role="navigation">
        <a class="w-hidden-main w-inline-block close-sidebar" href="#">
          <img src="images/close-mobile.png" width="20" alt="Logo.png">
        </a>
          <a class="w-nav-link menu" href="index.php#home">Hello</a>
           <?php if (empty($_SESSION['LoggedIn'])){echo '
          <a class="w-nav-link menu menu-hide" href="login.php">Log In</a>';}?>
          <a class="w-nav-link menu" href="index.php#about">About Us</a>
          <a class="w-nav-link menu" href="index.php#trade">New Trade</a>
            <a class="w-nav-link menu" href="index.php#risk">At Risk</a>
          <a class="w-nav-link menu" href="index.php#trouble">In Trouble</a>
          <a class="w-nav-link menu" href="index.php#legal">Legal</a>
          <a class="w-nav-link menu" href="index.php#contact">Contact</a>
          <?php if (empty($_SESSION['LoggedIn'])){
    echo '<a class="w-nav-link button-login log phone" id="login" href="login.php">Log In</a>
          <a class="w-nav-link button-login phone" id="signup" href="personal.php">Sign Up</a>';}
                elseif (!empty($_SESSION['LoggedIn'])){
                     if ($_SESSION['Account'] == 'Paid'){
                        echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b></a>';}
                     elseif ($_SESSION['Account'] == 'Expired'){
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b><br>Days Remaining: <b>Expired</b></a>';
                     }
                     elseif ($_SESSION['Account'] == 'Trial'){
                     $now = time();
                     $your_date = strtotime($_SESSION['Join_Date']);
                     $datediff = floor(($now - $your_date)/(60*60*24));
                        if ($datediff >=14){
                         $days_remaining = 'Expired';  
                         $sql = "UPDATE users SET AccountType ='Expired' WHERE user_email ='". $_SESSION['UserName']."'";
                         include("base.php");
                         $query_update_status = $mysqli->query($sql) or die(mysqli_error());
                         echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b><br>Days Remaining: <b>Expired</b></a>';
                        $_SESSION['Account'] == 'Expired';
                        }
                        elseif ($datediff <14){
                         $days_remaining = 14 - $datediff;
                        echo '<a class="w-nav-link button-login log3 phone" id="login" href="logout.php">Account Type:<b> '.$_SESSION['Account'].'</b><br>Days Remaining: <b>'.$days_remaining.'</b></a>';
                        }
                }   
            }
?>
          </nav> 
         <div class="w-nav-button menu-button">
        <div class="w-icon-nav-menu"></div>
      </div>
      </div>
    </div>
            <div class="w-container">
            <div class="login_section">
            <div class="form-signin2"> 
                <a href="grouca.php">Go back to Admin page</a>
            <p class="loginheadline" style="font-size: 23px;"><b>Adjustment History</b></p>
            <?php  
function convertD ($date){
return date('n/j/Y', strtotime($date));
}
            $tradeID = $_GET["ID"]; 
            include("connect.php");  
            $sql_history = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' ORDER BY DATE DESC, TIMESTAMP DESC;");$i=0; $buy2=0; $sell2=0; $sell=0; $buy=0;
$sql_sell = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell)>1;");
$sql_sell2 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell2)>1;");
$sql_buy = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy)>1;");
$sql_buy2 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy2)>1;");
$sql_sell3 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell3)>1;");
$sql_sell4 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell4)>1;");
$sql_buy3 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy3)>1;");
$sql_buy4 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy4)>1;");
if ($t1 = mysqli_num_rows($sql_sell)>0){$sell=1;}
if ($t2 = mysqli_num_rows($sql_sell2)>0){$sell2=1;}
if ($s1 = mysqli_num_rows($sql_sell3)>0){$sell3=1;}
if ($s2 = mysqli_num_rows($sql_sell4)>0){$sell4=1;}
if ($t3 = mysqli_num_rows($sql_buy)>0){$buy=1;}
if ($t4 = mysqli_num_rows($sql_buy2)>0){$buy2=1;}
if ($s3 = mysqli_num_rows($sql_buy3)>0){$buy3=1;}
if ($s4 = mysqli_num_rows($sql_buy4)>0){$buy4=1;}
    
            while ($new = $sql_history->fetch_assoc()){
                switch ($i){
                    case 0:
                        echo '<table id="history" style="width:99%;table:1px solid black;tr:1px solid black;td:1px solid black;"><thead id="thead">  
        <tr><th>Date</th>
            <th>Status</th>
            <th>Stock - Price</th>
            <th>Action</th>
            <th>Trade</th>';
                       if ($buy ==1){echo '<th>Buy</th>';}
            if ($buy2 ==1){echo'<th>Buy2</th>';}
            if ($buy3 ==1){echo '<th>Buy3</th>';}
            if ($buy4 ==1){echo'<th>Buy4</th>';}
            if ($sell==1){echo '<th>Sell</th>';}
            if ($sell2==1){echo'<th>Sell2</th>';}
            if ($sell3==1){echo '<th>Sell3</th>';}
            if ($sell4==1){echo'<th>Sell4</th>';}
         
            echo '<th>Target Gain</th>
            <th>Max Loss</th>
            <th>Notes</th></tr><tbody>';
                $i++;
                    case ($i > 0):
        echo '
          <tr>
          <td data-th="Date:">'.convertD($new['Date']).'</td>
         <td data-th="Status:">'.$new['Status'].'</td>
         <td data-th="Stock - Price:">'.$new['Stock'].' - '.$new['Price'].'</td> 
         <td data-th="Action:">'.$new['Action'].'</td> 
         <td data-th="Trade:">'.$new['Trade'].'</td>';
       
        if ($buy==1){echo '<td data-th="Buy:">'.$new['Buy'];} if(strlen($new['Buy'])>1){echo ' for '.$new['PriceBuy'].'</td>';}
        if ($buy2==1){echo '<td data-th="Buy2:">'.$new['Buy2'];} if(strlen($new['Buy2'])>1){echo ' for '.$new['PriceBuy2'].'</td>';}
        if ($buy3==1){echo '<td data-th="Buy3:">'.$new['Buy3'];} if(strlen($new['Buy3'])>1){echo ' for '.$new['PriceBuy3'].'</td>';}
        if ($buy4==1){echo '<td data-th="Buy4:">'.$new['Buy4'];} if(strlen($new['Buy4'])>1){echo ' for '.$new['PriceBuy4'].'</td>';}
                     if ($sell==1){echo '<td data-th="Sell:">'.$new['Sell'];} if(strlen($new['Sell'])>1){echo ' for '.$new['PriceSell'].'</td>';}
        if ($sell2==1){echo'<td data-th="Sell2:">'.$new['Sell2'];} if(strlen($new['Sell2'])>1){echo ' for '.$new['PriceSell2'].'</td>';}
        if ($sell3==1){echo '<td data-th="Sell3:">'.$new['Sell3'];} if(strlen($new['Sell3'])>1){echo ' for '.$new['PriceSell3'].'</td>';}
        if ($sell4==1){echo'<td data-th="Sell4:">'.$new['Sell4'];} if(strlen($new['Sell4'])>1){echo ' for '.$new['PriceSell4'].'</td>';}
         echo '<td data-th="Target Gain:">'.$new['Gain'].'</td> 
         <td data-th="Max Loss:">'.$new['Loss'].'</td>
         <td data-th="Notes:">'.$new['Notes'].'</td></tr>';
            }
            }
        echo '</table><br>';
                ?>
        
        
     <br></div></div></div>
    
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2016 Grouca&nbsp;</p>
          </div>
          <div class="w-col w-col-6">
            <div class="team-icons footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>