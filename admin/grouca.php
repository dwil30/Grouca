<?php 
//error_reporting(E_ALL);ini_set('display_errors', 1);
session_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

if($_SESSION['logged_in']!="true")
{header( 'Location: error.html' );}

$_SESSION['Update'] = null;

function clean($value) {
   return preg_replace('/[^a-zA-Z0-9_.]/', '', $value);
}

function convertD ($date){
return date('n/j/Y', strtotime($date));
}

if(isset($_POST['Lookup'])) 
{
  $ticker = $_POST['ticker'];
  $quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q='.$ticker);
  if (empty($quote)){
      echo 'Stock symbol '.$ticker.' does not exist or there was an error. Please try again.';
  }
    else{
  $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  $price = $json_output['l'];
  $_SESSION['price'] = $price;
  $_SESSION['ticker'] = $ticker;    
  $name = $json_output['t']; 
    }
}  

if(isset($_POST['Lookup2'])) 
{
  $ticker = $_POST['up_ticker'];
  $quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q='.$ticker);
  if (empty($quote)){
      echo 'Stock symbol '.$ticker.' does not exist or there was an error. Please try again.';
  }
    else{
         $_SESSION['Update'] = 1;
  $json = str_replace("\n", "", $quote);
  $data = substr($json, 4, strlen($json) -5);
  $json_output = json_decode($data, true);
  $price = $json_output['l'];
  $update['Price'] = $price;        
  $_SESSION['price'] = $price;
  $_SESSION['ticker'] = $ticker;    
  $name = $json_output['t']; 
          echo '<div style="color:red;">Stock price updated. See below.</div>';
    }
} 

if(isset($_POST['Post'])) 
{
    if(!isset($_SESSION['price']))
    {echo '<div style="color:red;">Please perform stock price lookup</div>';}
    else{
      include("connect.php");  
      $price = $_SESSION['price'];
      $ticker = $_SESSION['ticker'];
      $title = $mysqli->real_escape_string($_POST['title']);
      $sell = $mysqli->real_escape_string($_POST['sell']);
      $sell2= $mysqli->real_escape_string($_POST['sell2']);
      $buy = $mysqli->real_escape_string($_POST['buy']);
      $buy2= $mysqli->real_escape_string($_POST['buy2']);
      $price1 = $mysqli->real_escape_string(clean($_POST['price1']));
      $price2= $mysqli->real_escape_string(clean($_POST['price2']));
      $price3 = $mysqli->real_escape_string(clean($_POST['price3']));
      $price4= $mysqli->real_escape_string(clean($_POST['price4']));
      $gain = $mysqli->real_escape_string(clean($_POST['gain']));
      $loss= $mysqli->real_escape_string(clean($_POST['loss']));
      $margin = $mysqli->real_escape_string(clean($_POST['margin']));
      $notes= $mysqli->real_escape_string($_POST['notes']);
      $action= $mysqli->real_escape_string($_POST['action']);
      $trade= $mysqli->real_escape_string($_POST['trade']);
      $setprice = $mysqli->real_escape_string(clean($_POST['setprice']));    
      $sql_insert =  $mysqli->query("INSERT INTO positions (Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $title . "','New', '" . $ticker . "', '" . $price. "','" . $sell . "','" . $price1 . "','" . $sell2 . "','" . $price2. "','" . $buy. "', '" . $price3. "','" . $buy2. "','" . $price4. "','" . $gain. "','" . $loss. "','" . $margin . "','" . $notes. "',CURDATE(),'" . $action. "','" . $trade. "','" . $setprice. "')") or die(mysqli_error());
      $sql_tradeID =   $mysqli->query("UPDATE positions SET TradeID = ID WHERE TradeID = 0;");  
      echo '<div style="color:red;">New Post Successfully Created</div>';
        $_SESSION['price'] = $_SESSION['ticker'] = null;
        include('send-new.php');    
    }
}   

if(isset($_POST['Open'])) 
{
    $_SESSION['Update'] = 1;
    $ID = $_POST['group1']; 
    $_SESSION['ID'] = $ID;
    include("connect.php");  
    $sql_search = $mysqli->query("SELECT * FROM (SELECT * FROM positions Where TradeID = '".$ID."' ORDER BY Timestamp DESC) AS foo GROUP BY TradeID");
    $update = $sql_search->fetch_assoc(); 
    $_SESSION['results'] = $update;
    echo '<div style="color:red;">Record Found. See Update Position section below to update.</div>';
    
}  

if(isset($_POST['Closed'])) 
{
    $_SESSION['Update'] = 1;
    $ID = $_POST['group2']; 
    $_SESSION['ID'] = $ID;
     include("connect.php");  
    $sql_search = $mysqli->query("SELECT * FROM (SELECT * FROM positions Where TradeID = '".$ID."' ORDER BY Timestamp DESC) AS foo GROUP BY TradeID");
    $update = $sql_search->fetch_assoc(); 
    $_SESSION['results'] = $update;
      echo '<div style="color:red;">Record Found. See Update Position section below to update.</div>';
}  

if(isset($_POST['Change'])) 
{   
    include("connect.php"); 
    $status = $mysqli->real_escape_string($_POST['up_status']);
    
    if ($status == 'Delete'){
         
         $sql_delete = $mysqli->query("DELETE FROM positions Where TradeID = '".$_SESSION['ID']."'");
        echo '<div style="color:red;">Trade Position Successfully Removed</div>';
        $_SESSION['Update'] = null;
    }
    else
{
        $sell = $mysqli->real_escape_string($_POST['up_sell']);
        $buy = $mysqli->real_escape_string($_POST['up_buy']); 
        $price = $_SESSION['price'];
        $ticker = $mysqli->real_escape_string($_POST['up_ticker']);
        $title = $mysqli->real_escape_string($_POST['up_title']);
        $sell2= $mysqli->real_escape_string($_POST['up_sell2']);
        $buy2= $mysqli->real_escape_string($_POST['up_buy2']);
        $price1 = $mysqli->real_escape_string(clean($_POST['up_price1']));
        $price2 = $mysqli->real_escape_string(clean($_POST['up_price2']));
        $price3 = $mysqli->real_escape_string(clean($_POST['up_price3']));
        $price4 = $mysqli->real_escape_string(clean($_POST['up_price4']));
        $gain = $mysqli->real_escape_string(clean($_POST['up_gain']));
        $loss= $mysqli->real_escape_string(clean($_POST['up_loss']));
        $margin = $mysqli->real_escape_string(clean($_POST['up_margin']));
        $notes= $mysqli->real_escape_string($_POST['up_notes']);
        $action= $mysqli->real_escape_string($_POST['up_action']);
        $trade= $mysqli->real_escape_string($_POST['up_trade']);
        $setPrice = $mysqli->real_escape_string(clean($_POST['up_setprice'])); 
        $change = $mysqli->real_escape_string($_POST['up_change']);
    if (($_SESSION['results']['Status'] == $status) and ($_SESSION['results']['Sell'] == $sell) and ($_SESSION['results']['Buy'] == $buy)) 
    {
        $sql_update = "UPDATE positions 
SET Title = '" . $title . "', Status = '" . $status . "', Stock = '".$ticker."', Price = '".$price."', Sell = '".$sell."', PriceSell = '".$price1."', Sell2 = '".$sell2."', PriceSell2 = '".$price2. "', Buy = '". $buy."', PriceBuy = '".$price3."', Buy2 = '".$buy2."', PriceBuy2 = '".$price4."', Gain = '" .$gain."', Loss = '".$loss."', Margin = '".$margin. "', Notes = '".$notes."', Date = CURDATE(), Action = '".$action."', Trade = '".$trade."', SetPrice = '".$setPrice."', ChangeAmount = '".$change."' WHERE ID = ".$_SESSION['results']['ID']."";
       // print_r($_SESSION['price']); echo '<br>';
       // print_r($sql_update);
        
       $new = $mysqli->query($sql_update);
        echo '<div style="color:red;">Trade Position Successfully Updated</div>';
    $_SESSION['Update'] = null;
    }   
    else {    
    $sql_update = $mysqli->query("INSERT INTO positions (Title, TradeID, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $title . "','" . $_SESSION['ID'] . "','" . $status . "', '" . $ticker . "', '" . $price. "','" . $sell . "','" . $price1 . "','" . $sell2 . "','" . $price2. "','" . $buy. "', '" . $price3. "','" . $buy2. "','" . $price4. "','" . $gain. "','" . $loss. "','" . $margin . "','" . $notes. "',CURDATE(),'" . $action. "','" . $trade. "','" . $setPrice. "')") or die(mysqli_error());
        if (($status == 'At Risk') or ($status == 'In Trouble')) {
            include 'send-adjustment.php';
            }
        echo '<div style="color:red;">Trade Position Successfully Updated</div>';
    $_SESSION['Update'] = null;
    }
}
}

if(isset($_POST['OpenPosition'])) 
{
    $ID = $_POST['group0']; 
    include("connect.php");  
    $new_row_query = $mysqli->query("SELECT * FROM positions WHERE ID = '".$ID."'");
    $new_row = $new_row_query->fetch_assoc(); 
    
        echo '<div style="color:red;">Trade Position Successfully Updated</div>';
    $_SESSION['Update'] = null;
} 
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
<button><a href="users.php">Go to User Info</a></button> 
<button><a href="bulk_upload.php">Bulk Upload</a></button>
<!--<button><a href="prices.php">Update Prices</a></button>-->
   <div class="w-row">
         <div class="w-col w-col-6">
   <h3>New Daily Trade</h3>
    <form method="post" action="">
    <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr><th>Title</th>
        <td><input style="width:100%"type="text" name="title" value="<?PHP echo htmlspecialchars($_POST['title']); ?>"></td></tr>
        <tr><th>Stock</th>
        <td><input  required style="width:20%" type="text" name="ticker" value="<?PHP echo htmlspecialchars($_POST['ticker']); ?>">&nbsp;&nbsp;<input name="Lookup" id="Lookup" type="submit" class="w-button button-send" value="Get Price" style="color:black;"/>&nbsp;<b><?php echo isset($price) ? $price : '' ?></b></td></tr>
         <tr><th>Action</th>
        <td><input style="width:100%" type="text" name="action" value="<?PHP echo htmlspecialchars($_POST['action']); ?>"></td></tr>
          <tr><th>Trade</th>
        <td><input style="width:100%" type="text" name="trade" value="<?PHP echo htmlspecialchars($_POST['trade']); ?>"></td></tr>
         <tr><th>Price</th>
        <td><input style="width:100%" type="text" name="setprice" value="<?PHP  echo htmlspecialchars($_POST['setprice']); ?>"></td></tr>
        <tr><th>Sell</th>
        <td> <input  style="width:50%" type="text" name="sell" value="<?PHP echo htmlspecialchars($_POST['sell']); ?>"> for <input  style="width:25%" type="text" name="price1" value="<?PHP echo htmlspecialchars($_POST['price1']); ?>"></td></tr>
          <tr><th>Sell 2</th>
        <td> <input style="width:50%" type="text" name="sell2" value="<?PHP echo htmlspecialchars($_POST['sell2']); ?>"> for <input style="width:25%" type="text" name="price2" value="<?PHP echo htmlspecialchars($_POST['price2']); ?>"></td></tr>
               <tr><th>Buy</th>
        <td> <input style="width:50%" type="text" name="buy" value="<?PHP echo htmlspecialchars($_POST['buy']); ?>"> for <input style="width:25%" type="text" name="price3" value="<?PHP echo htmlspecialchars($_POST['price3']); ?>"></td></tr>
          <tr><th>Buy 2</th>
        <td> <input  style="width:50%" type="text" name="buy2" value="<?PHP echo htmlspecialchars($_POST['buy2']); ?>">for <input  style="width:25%" type="text" name="price4" value="<?PHP echo htmlspecialchars($_POST['price4']); ?>"></td></tr>
        <tr><th>Target Gain</th>
            <td><input   style="width:100%" type="text" name="gain" value="<?PHP echo htmlspecialchars($_POST['gain']); ?>"></td></tr>
             <tr><th>Max Loss</th>
            <td><input   style="width:100%" type="text" name="loss" value="<?PHP echo htmlspecialchars($_POST['loss']); ?>"></td></tr>
         <tr><th>Margin</th>
            <td><input    style="width:100%" type="text" name="margin" value="<?PHP echo htmlspecialchars($_POST['margin']); ?>"></td></tr>
        <tr><th>Notes</th>
            <td> <textarea id="message" name="notes" class="w-input msg-text"><?PHP echo htmlspecialchars($_POST['notes']); ?></textarea></td></tr>
        </table>
        <br>
      <input name="Post" id="send" type="submit" class="w-button button-send" value="Post" style="color:black;"/>
             <input name="Reset" id="send" type="reset" class="w-button button-send" value="Reset" style="color:black;"/>
		</form>
    </div>
    
    <div class="w-col w-col-6">       
        <h3>Open Positions</h3>
       <form method="post" action="">
    <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr>
            <th>Update</th>
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Status</th>
            <th>Trade</th>
            <th>Change</th>
            <th>Price</th>
        </tr>
      <?php 
            include("connect.php");  
            $sql_new = $mysqli->query("SELECT * FROM (SELECT * FROM positions ORDER BY Timestamp DESC) AS foo GROUP BY TradeID ORDER BY Timestamp DESC");
            while ($row = $sql_new->fetch_assoc()) {
                if ($row['Status'] != 'Closed'){
                echo '<tr>
        <td><input type="radio" name="group1" value="'.$row['TradeID'].'"></td>  
        <td>'.convertD($row['Date']).'</td>
        <td>'.$row['Stock'].'</td> 
        <td>'.$row['Action'].'</td> 
        <td><a href="history.php?ID='; echo $row['TradeID']; echo'">'.$row['Status'].'</a></td>
        <td>'.$row['Trade'].'</td> 
        <td>';      
        if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
            else {echo 'TBD';}
        echo '            
        <td>'.$row['SetPrice'].'</td> 
      </tr>';
                }
            }?>   
</table>
             <br><input name="Open" id="send" type="submit" class="w-button button-send" value="Update" style="color:black;"/>
           </form>
        <br>
                <h3>Closed Positions</h3>
        <form method="post" action="">
    <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr>
            <th>Update</th>
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Status</th>
            <th>Trade</th>
            <th>Change</th>
        </tr>
     <?php 
            include("connect.php");  
            $sql_close = $mysqli->query("SELECT * FROM (SELECT * FROM positions ORDER BY TIMESTAMP DESC) AS foo GROUP BY TradeID ORDER BY Timestamp DESC");
            while ($row = $sql_close->fetch_assoc()) {
                if ($row['Status']=="Closed"){
                echo '<tr>
        <td><input type="radio" name="group2" value="'.$row['TradeID'].'"></td>  
        <td>'.convertD($row['Date']).'</td>
        <td>'.$row['Stock'].'</td> 
        <td>'.$row['Action'].'</td>
        <td>'.$row['Status'].'</td>
        <td>'.$row['Trade'].'</td>
        <td>'.$row['ChangeAmount'].'</td>';
        /*  if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
         else {echo 'TBD';} */
      echo '</tr>';
                }
                }?>   
</table>
     <br><input name="Closed" id="send" type="submit" class="w-button button-send" value="Update" style="color:black;"/>
            </form>
    
        
    </div>
    
    
    </div>
    <hr>
          <h3>Update Position</h3>
       <?php if (isset($_SESSION['Update'])){?>
      <div class="w-row">
         <div class="w-col w-col-6">
    <form method="post" action="">
    <table style="width:100%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr><th>Status</th>
        <td><select required name="up_status">
            <option value="New" <?php if (($update['Status'] == 'New') or ($_POST['up_status'] == "New")) {echo 'selected="selected"';} ?>>New</option>
            <option value="Open" <?php if (($update['Status'] == 'Open') or ($_POST['up_status'] == "Open")){echo 'selected="selected"';} ?>>Open</option>
            <option value="At Risk" <?php if (($update['Status'] == 'At Risk') or ($_POST['up_status'] == "At Risk")){echo 'selected="selected"';} ?>>At Risk Adjustment</option>
            <option value="In Trouble" <?php if (($update['Status'] == 'In Trouble') or ($_POST['up_status'] == "In Trouble")){echo 'selected="selected"';} ?>>In Trouble Adjustment</option>
            <option value="Closed" <?php if (($update['Status'] == 'Closed') or ($_POST['up_status'] == "Closed")){echo 'selected="selected"';} ?>>Closed</option>
            <option value="Delete">Delete</option>
            </select></td>    
        <tr><th>Title</th>
        <td><input style="width:100%"type="text" name="up_title" value="<?PHP if(empty($update['Title'])){echo  htmlspecialchars($_POST['up_title']);} else {echo $update['Title'];} ?>"></td></tr>
        <tr><th>Stock</th>
        <td><input required style="width:20%" type="text" name="up_ticker" value="<?PHP if(empty($update['Stock'])){echo  htmlspecialchars($_POST['up_ticker']);} else {echo $update['Stock'];} ?>">&nbsp;<b><?PHP if(isset($update['Price'])){echo $update['Price']; $update['Price'] = $_SESSION['price'];} ?>&nbsp;</b><input name="Lookup2" id="Lookup2" type="submit" class="w-button button-send" value="Get Price" style="color:black;"/></td></tr>
          <tr><th>Trade</th>
        <td><input style="width:100%" type="text" name="up_trade" value="<?PHP if(empty($update['Trade'])){echo  htmlspecialchars($_POST['up_trade']);} else {echo $update['Trade'];} ?>"></td></tr>
        <tr><th>Action</th>
        <td><input style="width:100%" type="text" name="up_action" value="<?PHP if(empty($update['Action'])){echo  htmlspecialchars($_POST['up_action']);} else {echo $update['Action'];} ?>"></td></tr>
         <tr><th>Price</th>
        <td><input style="width:100%" type="text" name="up_setprice" value="<?PHP if(empty($update['SetPrice'])){echo  htmlspecialchars($_POST['up_setprice']);} else {echo $update['SetPrice'];} ?>"></td></tr>
        <tr><th>Sell</th>
        <td> <input  style="width:50%" type="text" name="up_sell" value="<?PHP if(empty($update['Sell'])){echo  htmlspecialchars($_POST['up_sell']);} else {echo $update['Sell'];} ?>"> for <input  style="width:25%" type="text" name="up_price1" value="<?PHP if(empty($update['PriceSell'])){echo  htmlspecialchars($_POST['up_price1']);} else {echo $update['PriceSell'];} ?>"></td></tr>
          <tr><th>Sell 2</th>
        <td> <input style="width:50%" type="text" name="up_sell2" value="<?PHP if(empty($update['PriceSell2'])){echo  htmlspecialchars($_POST['up_sell2']);} else {echo $update['Sell2'];} ?>"> for <input style="width:25%" type="text" name="up_price2" value="<?PHP if(empty($update['PriceSell2'])){echo  htmlspecialchars($_POST['up_price2']);} else {echo $update['PriceSell2'];} ?>"></td></tr>
               <tr><th>Buy</th>
        <td> <input style="width:50%" type="text" name="up_buy" value="<?PHP if(empty($update['PriceBuy'])){echo  htmlspecialchars($_POST['up_buy']);} else {echo $update['Buy'];} ?>"> for <input style="width:25%" type="text" name="up_price3" value="<?PHP if(empty($update['PriceBuy'])){echo  htmlspecialchars($_POST['up_price3']);} else {echo $update['PriceBuy'];} ?>"></td></tr>
          <tr><th>Buy 2</th>
        <td> <input  style="width:50%" type="text" name="up_buy2" value="<?PHP if(empty($update['PriceBuy2'])){echo  htmlspecialchars($_POST['up_buy2']);} else {echo $update['Buy2'];} ?>">&nbsp;for <input  style="width:25%" type="text" name="up_price4"value="<?PHP if(empty($update['PriceBuy2'])){echo  htmlspecialchars($_POST['up_price4']);} else {echo $update['PriceBuy2'];} ?>"></td></tr>
        <tr><th>Target Gain</th>
            <td><input   style="width:100%" type="text" name="up_gain" value="<?PHP if(empty($update['Gain'])){echo  htmlspecialchars($_POST['up_gain']);} else {echo $update['Gain'];} ?>"></td></tr>
             <tr><th>Max Loss</th>
            <td><input   style="width:100%" type="text" name="up_loss" value="<?PHP if(empty($update['Loss'])){echo  htmlspecialchars($_POST['up_loss']);} else {echo $update['Loss'];} ?>"></td></tr>
         <tr><th>Margin</th>
            <td><input    style="width:100%" type="text" name="up_margin" value="<?PHP if(empty($update['Margin'])){echo  htmlspecialchars($_POST['up_margin']);} else {echo $update['Margin'];} ?>"></td></tr>
        <tr><th>Notes</th>
            <td> <textarea id="message" name="up_notes" class="w-input msg-text"><?PHP if(empty($update['Notes'])){echo  htmlspecialchars($_POST['up_notes']);} else {echo $update['Notes'];} ?></textarea></td></tr>
         <tr><th>Change</th>
            <td> <input style="width:100%" type="text" name="up_change" value="<?PHP if(empty($update['ChangeAmount'])){echo  htmlspecialchars($_POST['up_change']);} else {echo $update['ChangeAmount'];} ?>"></td></tr>
        </table>
             <br><input name="Change" type="submit" class="w-button button-send" value="Update" style="color:black;"/>
     <input name="Reset" type="submit" class="w-button button-send" value="Cancel" style="color:black;"/>
        </form>
            
    <br><br></div></div>
 <?php
}
else
{
?>
                  <p>Select a position above to update</p>        
                <?php
}
?>
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2014 Grouca&nbsp;</p>
          </div>
          <div class="w-col w-col-6">
            <div class="team-icons footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>