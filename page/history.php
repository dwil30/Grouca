<?php require_once('include/navigation_bar_subpages.php');
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}

    $tradeID = $_GET["ID"]; 
    include("base.php");
    $i=0; $buy2=0; $sell2=0; $sell=0; $buy=0; $buy3=0; $sell3=0; $sell4=0; $buy4=0;
    $sql_history = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' ORDER BY DATE DESC, TIMESTAMP DESC;");
    $sql_sell = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell)>1;");
    $sql_sell2 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell2)>1;");
    $sql_buy = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy)>1;");
    $sql_buy2 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy2)>1;");
    $sql_sell3 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell3)>1;");
    $sql_sell4 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Sell4)>1;");
    $sql_buy3 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy3)>1;");
    $sql_buy4 = $mysqli->query("SELECT * FROM positions WHERE TradeID = '" . $tradeID . "' AND CHAR_LENGTH(Buy4)>1;");
    if (($t1 = mysqli_num_rows($sql_sell)) >0){$sell=1;}
    if (($t2 =mysqli_num_rows($sql_sell2)) >0){$sell2=1;}
    if (($t3 =mysqli_num_rows($sql_sell3)) >0){$sell3=1;}
    if (($t4 =mysqli_num_rows($sql_sell4)) >0){$sell4=1;}
    if (($t5 =mysqli_num_rows($sql_buy)) >0 ){$buy=1;}
    if (($t6 =mysqli_num_rows($sql_buy2)) >0){$buy2=1;}
    if (($t7 =mysqli_num_rows($sql_buy3)) >0){$buy3=1;}
    if (($t8 =mysqli_num_rows($sql_buy4)) >0){$buy4=1;}
?>
    
<?php require_once('include/navigation_bar_subpages.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:center;width:95%;">
                
                <a href="memb.php" style="color: #BCFFFF;">Go back to Services page</a>

				<!-- Header -->
				<h2 class="underline">
					<span>Trade History</span>
					<span></span>
				</h2>
				<!-- /Header -->
                <?php 
                 while ($new = $sql_history->fetch_assoc()){
                    if ($new['Status'] == "In Trouble"){$status = "Trouble";}
                    elseif ($new['Status'] == "At Risk"){$status = "Risk";} 
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
        echo '<tr>
          <td data-th="Date:">'.convertD($new['Date']).'</td>
         <td data-th="Status:">'.$status.'</td>
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
         <td data-th=" Max Loss:">'.$new['Loss'].'</td>
         <td data-th="Notes:">'.$new['Notes'].'</td></tr>';
            }
            }
        echo '</table><br>';
                ?>
          
			</div>
			
		</div>
</body>