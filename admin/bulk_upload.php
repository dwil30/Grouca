<?php 
session_start();
include("connect.php");  

function rndfunc($x){
  return round($x,1);
}

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
            $import[$row] = array((trim(isset($data[1]) ? $data[1]: '')),
                                  (trim(isset($data[3]) ? $data[3]: '')),
                                  (trim(isset($data[4]) ? $data[4]: '')),
                                  (trim(isset($data[5]) ? $data[5]: '')),
                                  (trim(isset($data[6]) ? $data[6]: '')),
                                  (trim(isset($data[7]) ? $data[7]: '')),
                                  (trim(isset($data[8]) ? $data[8]: '')),
                                  (trim(isset($data[9]) ? $data[9]: '')),
                                  (trim(isset($data[10]) ? $data[10]: '')),
                                  (trim(isset($data[11]) ? $data[11]: '')),
                                  (trim(isset($data[12]) ? $data[12]: '')),
                                  (trim(isset($data[13]) ? $data[13]: '')),
                                  (trim(isset($data[14]) ? $data[14]: '')),
                                  (trim(isset($data[15]) ? $data[15]: '')));
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
  
    foreach ($import as $key => $value){
        $import[$key][1] = str_replace("Sel", "Sell", $import[$key][1]);
    }
    
    $import = str_replace(".STK", "", $import);
    

    $_SESSSION['import'] = json_encode($import);
    $price_array = array();
    
    
    //Put negative sign in front of Sell 
    /*
    foreach ($import as $key => $value){
        if ($value[1] == 'Sell'){
            $import[$key][2] = '-'.$import[$key][2];
        }
    }*/
    
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
    //If there's a blank IV column 
    foreach ($import as $key => $value ){
        if (count($value) <13){
            $import[$key][13] = 'No Iv';
        }
    }
  
    
    $stocks = array();
    foreach ($import as $key => $value){
        
        $symbol = substr($value[3], 0, strpos($value[3], ' '));
        
        if (!in_array_r($symbol, $stocks))
        {
            $quote = file_get_contents('http://finance.google.co.uk/finance/info?client=ig&q='.$symbol);
    
            if (empty($quote)) {
                $price_array[] = 'Not Found'; 
                array_push($stocks, array($symbol, 'Not Found')); 
            }
            else {
                $json = str_replace("\n", "", $quote);
                $json = str_replace(utf8_decode("£"),"&pound;",utf8_decode($json));
                $data = substr($json, 4, strlen($json) -5);
                $json_output = json_decode($data, true);
                $price = $json_output['l'];  
                $import[$key][] = $price;
                array_push($stocks, array($symbol, $price));   
            }
        }
        else 
        {
            foreach ($stocks as $target)
            {
                if ($symbol == $target[0])
                {
                   $import[$key][] = $target[1];
                }
            }
        }
    }
 
    
    foreach ($import as $key => $value){
             
        $date = date_create_from_format('m/d/y', $import[$key][0]); 
        $import[$key][0] = date_format($date, 'Y/m/d');
        
        $var = $value[9];

        $array = explode(" ",$var);

        if (count($array) == 7){
            array_splice($array, 5, 1);
            $datearray = $array[1].' '.$array[2].' '.$array[3];
            $new_date = date('ymd', strtotime($datearray));
            $array[0] .= 'W'; //add W to weekly options
        }
        else {
            $datearray = $array[1].' '.$array[2].' '.$array[3];
            $new_date = date('ymd', strtotime('-1 day', strtotime($datearray)));
        }

        if ($array[5][0] == "P"){
            $symbol='P';
        }
        else $symbol='C';
        
        $priceX1000 = $array[4] * 1000;
     
        $pad = str_pad($priceX1000, 8, "0", STR_PAD_LEFT);
        
        $code = str_pad($array[0], 6);  

        $new_var = $code.$new_date.$symbol.$pad;

        $import[$key][]= $new_var;
        
        $import[$key][5] = number_format(rndfunc($import[$key][5]), 2, '.', ',');
    }

    $_SESSION['final'] = $import;
    
    
    $colNames = array('Date','Buy or Sell','Qty','for','Description','Stock','Price','New or Adjustment','Status','Title', 'Target Gain', 'Max Loss', 'Margin', 'Notes', 'Action','Trade');
}

if(isset($_POST['final'])){
    
        function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
    
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
    $_SESSION['adjustID'] = array();
    
    $sent = $sent2 = 0;
    
    foreach ($_SESSION['final'] as $val){
        
        $error=$ignore=0;
        
        if ($val[16] == 'Ignore'){$ignore = 1;}
        
        //NEW TRADE
        if ($val[16] == 'New'){
            
            $query = "INSERT INTO positions (Status, IBStatus, Title, Stock, Price, Type, Number, Code, Letter, LowerPrice, UpperPrice, HighPrice, FullCode, StockSymbol, IV, Gain, Loss, Margin, Notes, Action, Trade, Date, OptionSymbol, isCurrent) VALUES (
            'New','Unprocessed','". $val[17]. "','". $val[12]. "','". $val[14]. "','". $val[1]. "','". $val[2]. "','". $val[3]. "','". $val[4]. "','". $val[5]. "','". $val[6]. "','". $val[7]. "','". $val[9]. "','". $val[12]. "','". $val[13]. "','". $val[18]. "','". $val[19]. "','". $val[20]. "','". $val[21]. "','". $val[22]. "','". $val[23]. "','". $val[0]. "','". $val[15]. "','1');";
            
            $sql_insert = $mysqli->query($query);
            
            if (in_array_r($val[12], $_SESSION['trackID'])){ //if stock is in array, update TradeID
                
                foreach ($_SESSION['trackID'] as $item)
                    {
                        if ($val[12] == $item[0])
                            {
                            $sql_tradeID = $item[1];
                            
                            $upate_row = $mysqli->query("UPDATE positions SET TradeID = '".$sql_tradeID."' WHERE TradeID = 0;");  
                            
                            }
                    }
            }
            else { //otherwise update TradeID to be ID
                
                $tradeID =  mysqli_fetch_row($mysqli->query("SELECT ID FROM positions WHERE TradeID = 0;")); 
                $sql_tradeID = $mysqli->query("UPDATE positions SET TradeID = ID WHERE TradeID = 0;"); 
                array_push($_SESSION['trackID'], array($val[12], $tradeID[0]));
                
            }
            if ($sent == 0){
                include('send-new.php');
                $sent++;
            }
        }
        //Adjustments
        elseif (($val[16] != 'New')&&(($val[16] != 'Ignore'))) { 
            
                if (in_array_r($val[16], $_SESSION['adjustID'])){ //This TradeID has already been adjusted
                    
                }
                else {
                    
                    $update_old_rows = $mysqli->query("UPDATE positions SET isCurrent = '0' WHERE TradeID = ".$val[16].";");
                    
                    array_push($_SESSION['adjustID'], array($val[16]));
                    
                }
                    
                $query = "INSERT INTO positions (TradeID, Status, IBStatus, Title, Stock, Price, Type, Number, Code, Letter, LowerPrice, UpperPrice, HighPrice, FullCode, StockSymbol, IV, Gain, Loss, Margin, Notes, Action, Trade, Date, OptionSymbol, isCurrent) VALUES ( '". $val[16]. "','". $val[24]. "','Unprocessed','". $val[17]. "','". $val[12]. "','". $val[14]. "','". $val[1]. "','". $val[2]. "','". $val[3]. "','". $val[4]. "','". $val[5]. "','". $val[6]. "','". $val[7]. "','". $val[9]. "','". $val[12]. "','". $val[13]. "','". $val[18]. "','". $val[19]. "','". $val[20]. "','". $val[21]. "','". $val[22]. "','". $val[23]. "','". $val[0]. "','". $val[15]. "','1');";
                
            
                $insert =  $mysqli->query($query);
                    
                if ($sent2 == 0){
                    include('send-adjustment.php');
                    $sent2++;
                }
            }
    }
    print_r('Database successfully updated');
    
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
   <div class="w-container"><br>
   <h3>Bulk New Trade Upload</h3>
       <?php echo isset($_SESSION['errors']) ? '<div class="subtitle errors">'.$_SESSION['errors'].'</div>': ''; ?>
     <form id="upload" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile" required>  
        <input class="w-button button-send" name="submit" id="upload" type="submit" value="Upload New Trades" style="color:black;">
        <div class="w-button button-send button2" style="display:none;"><img id="loading-image" src="ajax-loader.gif" alt="Loading..." /></div><br><br><br>
    </form>
       
       <?php if (isset($import)) { ?>
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
           echo '<td>'.$row[0].'</td>';
           echo '<td>'.$row[1].'</td>';
           echo '<td>';if ($row[1] == 'Sell')echo '-'; echo $row[2].'</td>';
           echo '<td>'.$row[5].'</td>';
           echo '<td>'.$row[9].'</td>';
           echo '<td>'.$row[12].'</td>';
           echo '<td>'.$row[14].'</td>';
           
           $stock = $row[12];
            
           $sql = 'SELECT * FROM (SELECT * FROM positions Where Stock = "'.$stock.'" ORDER BY DATE DESC) AS foo GROUP BY TradeID;';
           $history = $mysqli->query($sql);
           echo "<td><select id='dropdown' class='".$key."' name='new[".$key."]'><option value='New'>New</option>";
           $y=0;
           while ($lookup = $history->fetch_assoc()){
               if ($lookup['Status'] != 'Closed'){
                   $y=1;
                   echo '<option value='.$lookup['TradeID'].'>'.$lookup['Title'].'</option>';
                       
                       //. ' - '.date("m/d/Y", strtotime($lookup['Date']))
                }
           }
           echo "<option value='Ignore' selected>Ignore</option></select></td>";
           if ($y==1){
           echo "<td><select id='optionpick' class='".$key."' name='status[".$key."]' style='display:none;'><option value='Adjust'>Adjust</option></td>";
           }
           else {echo '<td>New</td>';}
           echo "<td><input class=".$key." style='width:80%;' type='text' name='title[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='target[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='maxloss[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='margin[".$key."]'></td>";
           echo "<td><input style='width:80%;' type='text' name='notes[".$key."]'></td>";
           echo "<td><select name='action[".$key."]'>
           <option value=''></option>
           <option value='Buy'>Buy</option>
           <option value='Sell'>Sell</option>
           <option value='Close'>Close</option>
           <option value='None'>None</option>
           </select></td>";
           echo "<td><select name='trade[".$key."]'>
           <option value=''></option>
           <option value='Single'>Single</option>
           <option value='Backspread'>Backspread</option>
           <option value='Straddle'>Straddle</option>
           <option value='Strangle'>Strangle</option>
           <option value='Butterfly'>Butterfly</option>
           <option value='Calendar'>Calendar</option>
           <option value='Vertical'>Vertical</option>
           <option value='Backspread'>Backspread</option>
           <option value='Condor'>Condor</option>
           <option value='Iron Condor'>Iron Condor</option>
           <option value='Diagonal'>Diagonal</option>
           <option value='Custom'>Custom</option>
           </select></td>";
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
    
     if ($mysqli->error) {
                printf("Errormessage: %s\n", $mysqli->error);
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
    <script> 
    $('select').change(function(){
        var className = $(this).attr('class');
        var selection = $(this).val();
        console.log(className);
        console.log(selection);
        if (selection != "Ignore"){
            $("input."+className).prop('required',true);
        }
        else {
            $("input."+className).prop('required',false);
        }
    }); 
    </script>
    
</body>
</html>