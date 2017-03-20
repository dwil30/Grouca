<?php require_once('include/navigation_bar.php');
include("base.php"); 

function convertD ($date){
    return date('n/j/y', strtotime($date));
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

$tradeID = $_GET["ID"]; 
include("base.php");

$query = 'SELECT * , GROUP_CONCAT( 
TYPE , Number, FullCode, LowerPrice
SEPARATOR  ";" ) as Options, max(Action) as Action, max(Trade) as Trade, max(Notes) as Notes, max(Gain) as Gain, max(Loss) as Loss 
FROM positions
WHERE TradeID = "' . $tradeID . '"
GROUP BY UNIX_TIMESTAMP( TIMESTAMP ) DIV 50 
ORDER BY TIMESTAMP DESC';

$sql_history = $mysqli->query($query);

?>
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

                 $history[] = array($new['Date'], $new['Status'], $new['Stock'].' - '.$new['Price'], $new['Action'], $new['Type'], $new['Number'], $new['FullCode'], $new['LowerPrice'], $new['Trade'], $new['Gain'], $new['Loss'], $new['Notes'], $new['Timestamp'],  $new['Options'], $new['Title']);
                }
            
                ?>

                <table id="history" style="width:99%;table:1px solid black;tr:1px solid black;td:1px solid black;">
                    <thead id="thead">  
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Stock - Price</th>
                        <th>Action</th>
                        <th>Trade</th>
                        
                        <?php $maxbuy = $maxsell = 0;
                        foreach ($history as $item){
                            $buy = $sell = 0;
                            $temp = $item[13];
                            if (strpos($temp, ';') !== false) {
                                $temp = explode(';',$temp);

                                foreach ($temp as $move){
                                    if (substr($move, 0, 4) == "Sell"){$sell++;}
                                    elseif (substr($move, 0, 3) == "Buy"){$buy++;}
                                }    
                            }
                            else {
                                if ($item[4] == "Buy"){$buy++;}
                                elseif ($item[4] == "Sell"){$sell++;}        
                            }
                            if ($buy > $maxbuy){$maxbuy = $buy;}
                            if ($sell > $maxsell){$maxsell = $sell;}      
                        }
                      
                      
                        for ($count = 0; $count < $maxbuy; $count++){
                            if ($count > 0){$number = $count;}
                            echo '<th>Buy'.$number.'</th>';
                        }
                         for ($count = 0; $count < $maxsell; $count++){
                             if ($count > 0){$number2 = $count;}
                            echo '<th>Sell'.$number2.'</th>';
                        }
                    
                        ?>
                        <th>Target Gain</th>
                        <th>Max Loss</th>
                        <th>Notes</th>
                    </tr>
                    </thead>    
                    <tbody>
                        <?php foreach ($history as $key => $item): ?>
                        <tr>
                            <td data-th="Date:"><?php echo convertD($item[0]); ?></td>
                            <td data-th="Title:"><?php echo $item[14]; ?></td>
                            <td data-th="Status:"><?php echo $item[1]; ?></td>
                            <td data-th="Stock - Price:"><?php echo $item[2]; ?></td> 
                            <td data-th="Action:"><?php echo $item[3]; ?></td>
                            <td data-th="Trade:"><?php echo $item[8]; ?></td>
                            <?php 
                            $trades = $item[13];
                            
                            if (strpos($trades, 'Puts') !== false) {
                            $trades = str_replace("Puts","Puts for ",$trades);
                            }
                            else {$trades = str_replace("Put","Put for ",$trades);}
    
                            if (strpos($trades, 'Calls') !== false) {
                            $trades = str_replace("Calls","Calls for ",$trades);
                            }
                            else {$trades = str_replace("Call","Call for ",$trades);}
                                
                            $trades = preg_replace('/(?<=[a-z])(?=\d)|(?<=\d)(?=[a-z])/i', ' ', $trades);
                            
                            if (strpos($trades, ';') !== false) {
                                $trades = explode(';',$trades);
                                sort($trades);
                                    
                                $buys = $sells = 0;
                             
                                foreach ($trades as $move){
                                    if (substr($move, 0, 3) == "Buy"){
                                        $move = str_replace("Sell","-",$move);
                                        $move = str_replace("Buy","",$move);
                                        echo '<td data-th="Buy:">'.$move.'</td>';
                                        $buys++;
                                    }
                                    elseif (substr($move, 0, 4) == "Sell"){
            
                                        $move = str_replace("Sell","-",$move);
                                        $move = str_replace("Buy","",$move);
                                        if ($buys == $maxbuy){
                                            echo '<td data-th="Sell:">'.$move.'</td>';
                                            $sells++;  
                                        }
                                        else {
                                            for ($z = 0; $z < $maxbuy; $z++){
                                                echo '<td data-th="Buy:"></td>';
                                            }
                                            $buys++;
                                            echo '<td data-th="Sell:">'.$move.'</td>';
                                            $sells++;
                                        }
                                         
                                    }
                                }
                                if ($sells < $maxsell){
                                        echo '<td data-th="Sell:"></td>';
                                        $sells++; 
                                    }
                            }
                            else {
                                $trades = str_replace("Sell","-",$trades);
                                $trades  = str_replace("Buy","",$trades);
                                if ($item[4] == "Buy"){
                                    echo '<td data-th="Buy:">'.$trades.'</td>';
                                }
                                elseif ($item[4] == "Sell"){
                                    for ($coun = 0; $coun < $maxbuy; $coun++){
                                        echo '<td data-th="Buy:"></td>';  
                                    }
                                    echo '<td data-th="Sell:">'.$trades.'</td>';     
                                }
                                else {echo '<td></td>';}
                            }
                            ?>
                     
                            <td data-th="Target Gain:"><?php echo $item[9]; ?></td> 
                            <td data-th="Max Loss:"><?php echo $item[10]; ?></td>
                            <td data-th="Notes:"><?php echo $item[11]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>
          
			</div>
			
		</div>
</body>