<?php 
session_start();
include("connect.php");  

if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!="true"))
{header( 'Location: error.html' );}

if(isset($_POST['submit'])){
    
    //reset final session array
    $_SESSION['final']=array();
    
    //clear error variable
    unset($_SESSION['errors']); 

    //validate uploaded file
    if (!empty($_FILES["myFile"])) {
    
        $myFile = $_FILES["myFile"];
 /*
        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            $_SESSION['errors'] .= "<p>An error occurred while uploading the file. Please try again</p>";
            header("location:index.php");
        }
        else {
            // ensure a safe filename
            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
   
             // verify the file is a CSV
            $mimes = array('text/csv');
            if(!in_array($_FILES['myFile']['type'],$mimes)){
                $_SESSION['errors'] .=  "<p>File is not a CSV. Please try again.</p>";
                header("location:index.php");
                exit;
                
            // virus scan file (not needed)
                
            // move file to another directory on the server (not needed)    
                
            }
        }
    }
    
    else {
        $_SESSION['errors'] .=  "<p>File was empty. Please try again</p>";
        header("location:index.php");
        exit;
    }
  */
    }
    //parse CSV into an array
    $row=0;
    ini_set('auto_detect_line_endings',TRUE);
    if (($handle = fopen($myFile["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000,',','"')) !== FALSE) {
            if (array(null) !== $data) {
            $import[$row] = array((trim(isset($data[1]) ? $data[1]: '')),(trim(isset($data[3]) ? $data[3]: '')),(trim(isset($data[4]) ? $data[4]: '')),(trim(isset($data[7]) ? $data[7]: '')),(trim(isset($data[11]) ? $data[11]: '')),(trim(isset($data[14]) ? $data[14]: '')));
            $row++;}
        }
        fclose($handle);
    }
   
    $import = array_map('array_filter', $import);
    $import = array_filter( $import );
     
    foreach ($import as $key => $value){
        if (($value[1] == 'Sel') || ($value[1] == 'Buy')){
        }
        else {unset($import[$key]);}
    }
    $import = array_values($import);
    
    $import = json_decode(str_replace(".STK", "", json_encode($import)));
    $import = json_decode(str_replace("Sel", "Sell", json_encode($import)));
    $_SESSSION['import'] = json_encode($import);
    $price_array = array();
    
    
    foreach ($import as $key => $value){
        if ($value[1] == 'Sell'){
            $import[$key][2] = '-'.$import[$key][2];
        }
    }
    
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
    
    $stocks = array();
    foreach ($import as $key => $value){
        if (!in_array_r($value[5], $stocks))
        {
            $quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q='.$value[5]);
            if (empty($quote))
            {
                $price_array[] = 'Not Found'; 
                array_push($stocks, array($value[5], 'Not Found')); 
            }
            else {
                $json = str_replace("\n", "", $quote);
                $data = substr($json, 4, strlen($json) -5);
                $json_output = json_decode($data, true);
                $price = $json_output['l'];    
                $price_array[]= $price;
                array_push($stocks, array($value[5], $price));    
            }
        }
        else 
        {
            foreach ($stocks as $target)
            {
                if ($value[5] == $target[0])
                {
                    $price_array[] = $target[1];
                }
            }
        }
    }
    
    foreach ($import as $key => $value){
        $date = date_create_from_format('m/d/y', $import[$key][0]); 
        $import[$key][0] = date_format($date, 'Y/m/d');
    }
    
    $colNames = array('Date','Buy or Sell','Quantity','for','Description','Stock','Price','New or Adjustment','Status','Title', 'Target Gain', 'Max Loss', 'Margin', 'Notes', 'Action','Trade');
}

if(isset($_POST['final'])){
    
    $target = $maxloss = $margin = $notes = $title = $new = $action = $trade = $status = array();
    $action = $_POST['action'];
    if(isset($_POST['status'])){$status = $_POST['status'];}
    $trade = $_POST['trade'];
    $new = $_POST['new'];
    $title = $_POST['title'];
    $target = $_POST['target'];
    $maxloss = $_POST['maxloss'];
    $margin = $_POST['margin'];
    $notes = $_POST['notes'];
    
    foreach ($new as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    
    foreach ($title as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    foreach ($target as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
     foreach ($maxloss as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
     foreach ($margin as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
     foreach ($notes as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    
    foreach ($action as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    
    foreach ($trade as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    
    if(isset($status)){
    foreach ($status as $key => $value){
        array_push($_SESSION['final'][$key], $value);
    }
    }
    
    $_SESSION['trackID'] = array();
    
   
    foreach ($_SESSION['final'] as $val){
        $error=$ignore=0;
        
        if ($val[7] == 'Ignore')
        {$ignore = 1;}
        
        if (($val[7] == 'New')&&($val[1] == 'Sell')){
        $sql_insert = mysql_query("INSERT INTO positions (Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $val[8] . "','New', '" . $val[5] . "', '" . $val[6]. "','" . $val[2] . " x ". $val[4] ."', '". $val[3] . "','','','', '','','','" . $val[9]. "','" . $val[10]. "','" . $val[11] . "','" . $val[12]. "','" . $val[0]. "','" . $val[13]. "','" . $val[14]. "','')");
        $sql_tradeID =   mysql_query("UPDATE positions SET TradeID = ID WHERE TradeID = 0;");  
        
        include('send-new.php');    
        }
        
        elseif (($val[7] == 'New')&&($val[1] == 'Buy')){
        $sql_insert = mysql_query("INSERT INTO positions (Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $val[8] . "','New', '" . $val[5] . "', '" . $val[6]. "','', '','','','" . $val[2] . " x ". $val[4] ."', '". $val[3] . "','','','" . $val[9]. "','" . $val[10]. "','" . $val[11] . "','" . $val[12]. "','" . $val[0]. "','" . $val[13]. "','" . $val[14]. "','')");
        $sql_tradeID =   mysql_query("UPDATE positions SET TradeID = ID WHERE TradeID = 0;");  
     
        include('send-new.php');    
        }
        
        elseif (($val[7] != 'New')&&($val[1] == 'Sell')&&($val[7] != 'Ignore')){
            if (!in_array($val[7], $_SESSION['trackID'])){
                
                $sql = "INSERT INTO positions (TradeID, Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $val[7] . "','" . $val[8] . "','" . $val[15] . "', '" . $val[5] . "', '" . $val[6]. "','" . $val[2] . " x ". $val[4] ."', '". $val[3] . "','','','', '','','','" . $val[9]. "','" . $val[10]. "','" . $val[11] . "','" . $val[12]. "','" . $val[0]. "','" . $val[13]. "','" . $val[14]. "','')";
               
               $sql_insert = mysql_query("INSERT INTO positions (TradeID, Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $val[7] . "','" . $val[8] . "','" . $val[15] . "', '" . $val[5] . "', '" . $val[6]. "','" . $val[2] . " x ". $val[4] ."', '". $val[3] . "','','','', '','','','" . $val[9]. "','" . $val[10]. "','" . $val[11] . "','" . $val[12]. "','" . $val[0]. "','" . $val[13]. "','" . $val[14]. "','')");
                
                $sql2 = mysql_query("Select max(ID) as ID from positions where TradeID = '".$val[7]."';");
                while ($ID = mysql_fetch_assoc($sql2)){
                $rowID = $ID['ID'];
                }
                
                array_push($_SESSION['trackID'], $val[7]);
            }
            else {   
                $sql = "SELECT Sell, Sell2, Sell3, Sell4 FROM positions WHERE TradeID = '".$val[7]."' and ID = ".$rowID.";";
                $check = mysql_query($sql);
                while ($look = mysql_fetch_assoc($check)){
                    if (strlen($look['Sell'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Sell='" . $val[2] . " x ". $val[4] ."', PriceSell='" . $val[3]. "' WHERE TradeID = '" . $val[7]. "' and ID = ".$rowID.";");
                    }
                    elseif (strlen($look['Sell2'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Sell2='" . $val[2] . " x ". $val[4] ."', PriceSell2='" . $val[3]. "' WHERE TradeID = '" . $val[7]."' and ID = ".$rowID.";");
                    }
                     elseif (strlen($look['Sell3'] == 0 )){
                         $s = "UPDATE positions SET Sell3='" . $val[2] . " x ". $val[4] ."', PriceSell3='" . $val[3]. "' WHERE TradeID = '" . $val[7]."' and ID = ".$rowID.";";
                        $sql_update = mysql_query($s);
                    }
                     elseif (strlen($look['Sell4'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Sell4='" . $val[2] . " x ". $val[4] ."', PriceSell4='" . $val[3]. "' WHERE TradeID = '" . $val[7]."' and ID = ".$rowID.";");
                    }
                    else {
                        echo 'Error - More than 4 sell positions on a single upload.<br>';
                        $error=1;
                    }
                } 
            } 
        }
                    
            elseif (($val[7] != 'New')&&($val[1] == 'Buy')&&($val[7] != 'Ignore')){
            if (!in_array($val[7], $_SESSION['trackID'])){
                $sql_insert = mysql_query("INSERT INTO positions (TradeID, Title, Status, Stock, Price, Sell, PriceSell, Sell2, PriceSell2, Buy, PriceBuy, Buy2, PriceBuy2, Gain, Loss, Margin, Notes, Date, Action, Trade, SetPrice) VALUES('" . $val[7] . "','" . $val[8] . "','" . $val[15] . "', '" . $val[5] . "', '" . $val[6]. "','', '','','','" . $val[2] . " x ". $val[4] ."', '". $val[3] . "','','','" . $val[9]. "','" . $val[10]. "','" . $val[11] . "','" . $val[12]. "','" . $val[0]. "','" . $val[13]. "','" . $val[14]. "','')");
             
                $sql3 = mysql_query("Select max(ID) as ID from positions where TradeID = '".$val[7]."';");
                while ($ID3 = mysql_fetch_assoc($sql3)){
                $rowID = $ID3['ID'];
                }
                
                array_push($_SESSION['trackID'], $val[7]);
            }
            else {
                
                $sql2 = mysql_query("SELECT Buy, Buy2, Buy3, Buy4 FROM positions WHERE TradeID = '".$val[7]."' and ID = ".$rowID.";");
                while ($look2 = mysql_fetch_assoc($sql2)){
                    if (strlen($look2['Buy'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Buy='" . $val[2] . " x ". $val[4] ."', PriceBuy='" . $val[3]. "' WHERE TradeID = '" . $val[7]. "' and ID = ".$rowID.";");
                    }
                    elseif (strlen($look2['Buy2'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Buy2='" . $val[2] . " x ". $val[4] ."', PriceBuy2='" . $val[3]. "' WHERE TradeID = '" . $val[7]. "' and ID = ".$rowID.";");
                       
                    }
                     elseif (strlen($look2['Buy3'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Buy3='" . $val[2] . " x ". $val[4] ."', PriceBuy3='" . $val[3]. "' WHERE TradeID = '" . $val[7]. "' and ID = ".$rowID.";");
                         
                    }
                     elseif (strlen($look2['Buy4'] == 0 )){
                        $sql_update = mysql_query("UPDATE positions SET Buy4='" . $val[2] . " x ". $val[4] ."', PriceBuy4='" . $val[3]. "' WHERE TradeID = '" . $val[7]."' and ID = ".$rowID.";");
                    }
                    else {
                        echo 'Error - More than 4 Buy positions on a single upload.<br>';
                        $error=1;
                    }
                }
            }
        }
        
        if ($ignore ==1){echo '<div style="color:red;">Row Ignored</div>';}
        elseif ($error !=1){
            echo '<div style="color:green;">Database Successfully Updated - ';
            if ($val[7] == "New"){echo 'New';}
            else {echo 'Adjustment';}
            echo '</div>';
        }
    }
    foreach ($_SESSION['trackID'] as $value){
        $_SESSION['ID'] = $value;
     //   include 'send-adjustment.php';
    }
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
      <!--  <button><a href="prices.php">Update Prices</a></button>-->
   <div class="w-container"><br>
   <h3>Bulk New Trade Upload</h3>
       <?php echo isset($_SESSION['errors']) ? '<div class="subtitle errors">'.$_SESSION['errors'].'</div>': ''; ?>
     <form id="upload" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile" required>  
        <input class="w-button button-send" name="submit" id="upload" type="submit" value="Upload New Trades" style="color:black;">
        <div class="w-button button-send button2" style="display:none;"><img id="loading-image" src="ajax-loader.gif" alt="Loading..." /></div><br><br><br>
    </form>
       
       <? if (isset($import)) { ?>
       <h3 style='font-size:21px;color:#BE1D1D;'>Trades Uploaded</h3>
    </div>
 <table border="1">
 <tr>
    <?php
    
       //print the header
       foreach($colNames as $colName)
       {
          echo "<th>".$colName."</th>";
       }
    ?>
 </tr>
     <form action="" method="post">
    <?php
    
       //print the rows
       foreach($import as $key => $row){
            
            $numItems = count($row);
            $i = 0;
            array_push($_SESSION['final'], $row);

            foreach ($row as $value){
                echo "<td>".$value."</td>";
                
                if(++$i === $numItems) {
                    $stock = $value; 
                }
            }
           
                   
            echo "<td>".$price_array[$key]."</td>"; 
            
           $sql = 'SELECT * FROM (SELECT * FROM positions Where Stock = "'.$stock.'" ORDER BY DATE DESC) AS foo GROUP BY TradeID;';
           $history = mysql_query($sql);
           echo "<td><select id='dropdown' class='".$key."' name='new[".$key."]'><option value='New'>New</option>";
           $y=0;
           while ($lookup = mysql_fetch_assoc($history)){
               if ($lookup['Status'] != 'Closed'){
                   $y=1;
                   echo '<option value='.$lookup['TradeID'].'>'.$lookup['Stock']. ' - '.date("m/d/Y", strtotime($lookup['Date'])).'</option>';
                }
           }
           echo "<option value='Ignore' selected>Ignore</option></select></td>";
           if ($y==1){
           echo "<td><select id='optionpick' class='".$key."' name='status[".$key."]' style='display:none;'><option value='In Trouble'>In Trouble</option><option value='At Risk'>At Risk</option><option value='Open'>Open</option></select></td>";
           }
           else {echo '<td>New</td>';}
           echo "<td><input style='width:80%;' type='text' name='title[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='target[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='maxloss[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='margin[".$key."]'></td>";
           echo "<td><select name='notes[".$key."]'><option value=''></option><option value='Adjust'>Adjust</option><option value='Adjust And Book Gain'>Adjust and book gain</option><option value='Adjust And Book Loss'>Adjust and book loss</option></select></td>";
            echo "<td><select name='action[".$key."]'><option value=''></option><option value='Short'>Short</option><option value='Neutral'>Neutral</option><option value='Long'>Long</option><option value='Adjust'>Adjust</option></select></td>";
            echo "<td><select name='trade[".$key."]'><option value=''></option><option value='Call Spread'>Call Spread</option><option value='Call'>Call</option><option value='Call Combo'>Call Combo</option><option value='Put Spread'>Put spread</option><option value='Put'>Put</option><option value='Put Combo'>Put Combo</option><option value='Combo'>Combo</option></select></td>";
           echo "</tr>";
           
           echo "<script>
   $('#dropdown.".$key."').change(function(){
   if ($('#dropdown.".$key."').val() > 0){
       $('#optionpick.".$key."').show();
       }
    else { $('#optionpick.".$key."').hide();
    }
});
</script>";
       }
        
    foreach($_SESSION['final'] as $k => $val){
        array_push($_SESSION['final'][$k], $price_array[$k]);
    }
    ?>
 </table><br>
        <input class="w-button button-send" name="final" type="submit" value="Submit to Database" style="color:black;">  <br><br>
    </form>
       <?php } ?>
    </div>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
    
      <script type="text/javascript">
    $('#upload').submit(function() {
        $('.button-send').hide();
        $('.button2').show(); 
    });
    </script>
</body>
</html>