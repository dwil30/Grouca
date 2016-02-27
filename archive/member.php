<?php
function convertD ($date){
return date('n/j/Y', strtotime($date));
}

echo '<style>
    table {
  
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
    <div class="w-container">
            <div class="login_section">
            <div class="form-signin2"> 
            <p class="loginheadline" style="font-size: 23px;"><b>Today&#39;s New Trade</b></p>';
        include("base.php"); 
         $buy2 = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New' and s.Buy2 != ''");
         $buy2_number = mysql_num_rows($buy2);
        $sell2 = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New' and s.Sell2 != ''");
         $sell2_number = mysql_num_rows($sell2);
        $sql_query= mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New'");
        $number = mysql_num_rows($sql_query);
        if ($number > 0){ 
                    echo '<table id="history" style="border-collapse: collapse;width: 99%; border:1px solid black;tr:1px solid black;td:1px solid black;"><thead> 
        <tr>
            <th>Title</th>
            <th>Stock</th>
            <th>Action</th>
            <th>Trade</th>
            <th>Sell</th>';
            if ($sell2_number > 0){echo '<th>Sell2</th>';}
            echo '<th>Buy</th>';
            if ($buy2_number > 0){echo '<th>Buy2</th>';}
            echo '
            <th>Target Gain</th>
            <th>Max Loss</th>
            <th>Notes</th>
            </tr><tbody>';
              while ($item = mysql_fetch_assoc($sql_query)){
         echo '<tr>
        <td data-th="Title:">'.$item['Title'].'</td>
        <td data-th="Stock - Price:">'.$item['Stock'].'</td> 
        <td data-th="Action:">'.$item['Action'].'</td> 
        <td data-th="Trade:">'.$item['Trade'].'</td>
        <td data-th="Sell:">'.$item['Sell'].' for '.$item['PriceSell'].'</td>';
        if (strlen($item['Sell2']) > 1){echo '<td data-th="Sell2:">'.$item['Sell2'].' for '.$item['PriceSell2'].'</td>';}
        echo '
        <td data-th="Buy:">'.$item['Buy'].' for '.$item['PriceBuy'].'</td>';
        if (strlen($item['Buy2']) > 1){echo '<td data-th="Buy2:">'.$item['Buy2'].' for '.$item['PriceBuy2'].'</td>';}
        echo'
        <td data-th="Gain:">'.$item['Gain'].'</td> 
        <td data-th="Loss:">'.$item['Loss'].'</td>
        <td data-th="Notes:">'.$item['Notes'].'</td>';  
        echo '</tr>';}
            echo '</tbody></table><br>';
                    }          
        else {echo '<p>There are currently no new positions</p>';}
        
echo '  <p class="loginheadline" style="font-size: 23px;"><b>Trade Manager</b></p>';

            $open = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status not in ('New','Close');");
$open_rows = mysql_num_rows($open);
            if ($open_rows > 0){
                echo '<table style="width:99%;table:1px solid black;tr:1px solid black;td:1px solid black;"><thead> 
        <tr>
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Status</th>
            <th>Trade</th>
            <th>Gain</th>
        </tr></thead><tbody>';
             while ($row = mysql_fetch_assoc($open)){
                    echo '<tr>
        <td data-th="Date:">'.convertD($row['Date']).'</td>
        <td data-th="Stock:">'.$row['Stock'].'</td> 
        <td data-th="Action:">'.$row['Action'].'</td>
        <td data-th="Status:"><a href="history.php?ID='.$row['TradeID'].'">'.$row['Status'].'</a></td>
        <td data-th="Trade:">'.$row['Trade'].'</td> 
        <td data-th="Gain:">';
        if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
        else {echo 'TBD</td>';}
        echo '</tr>';
                     } 
                echo '</table><br>';
            }  
else {echo '<p>There are currently no new positions</p>';}
?>
        
        <p class="left">WHEN YOU RECEIVE AN ALERT...</p>
 <p class="left">1. Look at the trade status link under Adjustment Manager and follow the trade  directions. If the trade is New, we placed the order for the trade. If Open, the trade is active and performing well. If At risk, then the trade needs to be adjusted because an opportunity to protect the profit or increase the gain exists, or because the trade has become unbalanced and risk needs to be reduced. If In Trouble, a trade has reached a trigger point and requires immediate adjustment for repair of a losing position with goal of bringing it back to break even or generating a gain. For individual trades and portfolio performance results, see Closed Positions below.</p>

 <p class="left">2. Consider opening a trade as long as the entry price is not higher than...	2% from Grouca's original recommended entry price.</p>

 <p class="left">3. Determine the volume of options you wish to trade, If you are new to trading, consider allocating 3% of your portfolio for each new trade.</p>

 <p class="left">4. Keep 50% in cash at all times for adjusting until you grow comfortable and understand the process.</p>

<?php
        echo '<p class="loginheadline" style="font-size: 23px;"><b>Closed Positions</b></p>';
         $sql_close = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'Close';");
        if(mysql_num_rows($sql_close)> 0){
            echo '<table style="width:99%;table:1px solid black;tr:1px solid black;td:1px solid black;">
        <tr><thead>
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Status</th>
            <th>Trade</th>
            <th>Change</th>
        </tr><tbody> ';  
            while ($row = mysql_fetch_assoc($sql_close)) {
                echo '<tr>
        <td data-th="Date:">'.convertD($row['Date']).'</td>
        <td data-th="Stock:">'.$row['Stock'].'</td> 
        <td data-th="Action:">'.$row['Action'].'</td> 
        <td data-th="Status:">'.$row['Status'].'</td>
        <td data-th="Trade:">'.$row['Trade'].'</td> 
         <td data-th="Gain:">';
        if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
        else {echo 'TBD</td>';}
      echo '</tr>';
                }  echo '</table>';
            }
else {echo '<p>There are currently no closed positions.</p>';}

?>
<br>
<form action="signup.php" method="post">
<input name="Closed" id="send" type="submit" class="w-button button" value="Start Using Grouca"/><br><br>
</form>
    </div><br><br></div></div>';