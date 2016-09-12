<?php
function convertD ($date){
return date('n/j/y', strtotime($date));
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
            <p class="loginheadline" style="font-size: 23px;"><b>New Trade</b></p>';
        include("base.php"); 
         $buy2 = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New' and s.Buy2 != ''");
         $buy2_number = mysql_num_rows($buy2);
        $sell2 = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New' and s.Sell2 != ''");
         $sell2_number = mysql_num_rows($sell2);
        $sql_query= mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'New'");
        $number = mysql_num_rows($sql_query);
        if ($number > 0){ 
                    echo '<table id="history"><thead id="thead"> 
        <tr>
            <th>Title</th>
            <th>Stock - Price</th>
            <th>Action</th>
            <th>Trade</th>';
            echo '<th>Buy</th>';
            if ($buy2_number > 0){echo '<th>Buy2</th>';}
            echo '<th>Sell</th>';
            if ($sell2_number > 0){echo '<th>Sell2</th>';}
            echo '
            <th>Target Gain</th>
            <th>Max Loss</th>
            <th>Notes</th>
            </tr><tbody>';
              while ($item = mysql_fetch_assoc($sql_query)){
         echo '<tr>
        <td data-th="Title:">'.$item['Title'].'</td>
        <td data-th="Stock - Price:">'.$item['Stock'].' - '.$item['Price'].'</td>
        <td data-th="Action:">'.$item['Action'].'</td> 
        <td data-th="Trade:">'.$item['Trade'].'</td>';
        echo '
        <td data-th="Buy:">'.$item['Buy']; if (strlen($item['PriceBuy']) > 1){echo ' for '.$item['PriceBuy'];} echo '</td>';
        if (strlen($item['Buy2']) > 1){echo '<td data-th="Buy2:">'.$item['Buy2'].' for '.$item['PriceBuy2'].'</td>';}
        echo '<td data-th="Sell:">'.$item['Sell']; if (strlen($item['PriceSell']) > 1){echo ' for '.$item['PriceSell'];} echo '</td>';
        if (strlen($item['Sell2']) > 1){echo '<td data-th="Sell2:">'.$item['Sell2'].' for '.$item['PriceSell2'].'</td>';}
        echo '
        <td data-th="Target Gain:">'.$item['Gain'].'</td> 
        <td data-th="Max Loss:">'.$item['Loss'].'</td>
        <td data-th="Notes:">'.$item['Notes'].'</td>';  
        echo '</tr>';}
            echo '</tbody></table><br>';
                    }          
        else {echo '<p>There are currently no new trades.</p>';}
        
echo '  <p class="loginheadline" style="font-size: 23px;"><b>Adjustment Manager</b></p>';

          //  $open = mysql_query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status not in ('New','Closed') ORDER BY s.date DESC;");

    $open = mysql_query("SELECT * 
FROM (

SELECT * 
FROM positions
ORDER BY TIMESTAMP DESC
) AS foo
GROUP BY TradeID
ORDER BY DATE DESC");
$header = $count = 0;
  while ($row = mysql_fetch_assoc($open)) {
                if (($row['Status'] != 'Closed') and ($row['Status'] != 'New')){
                $count = 1;
                if ($header == 0) {
                echo '<table id="adjustment"><thead id="thead"> 
        <tr>
            <th>Date</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Action</th>
            <th>Trade</th>
        </tr></thead><tbody>';
                    $header = 1;}
            
                    echo '<tr>
        <td data-th="Date:">'.convertD($row['Date']).'</td>
        <td data-th="Stock:">'.$row['Stock'].'</td>
        <td data-th="Status:"><a href="history.php?ID='.$row['TradeID'].'">'.$row['Status'].'</a></td>
        <td data-th="Action:">'.$row['Action'].'</td>
        <td data-th="Trade:">'.$row['Trade'].'</td>';
        /*<td data-th="Change:">';
        if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
        else {echo 'TBD</td>';} */
        echo '</tr>';
                     }
  }
if ($count > 0 ) {
                echo '</table><br>';
            }  
else {echo '<p>There are currently no open trades.</p>';}
?>
        
        <p class="left smaller" style="margin-top: 20px;"><a href="video.php">ACTION TO TAKE WHEN YOU RECEIVE AN ALERT</a></p>

<!--
<ul style="list-style-type: none;">
<li><a href="" class="new">New trade</a></li>
<li><a href="" class="adjust">Adjustment</a></li>
<li><a href="" class="trading">Trading terms</a></li>

    </ul>        
<div id="new" style="display:none;"><br>
<p class="left">If a new trade has been issued, enter the new trade today. Consider opening the trade as long as the entry price is not higher than..10% from Grouca's original recommended price. All trades should match the recommendation for quantity of unit’s to trade. Keep 70% in cash in the account at all times to use when adjusting and trade no more than 3 stocks at a time until you understand the adjustment process. If you are new to trading; consider allocating 3% of your portfolio for each new trade. We tend to rotate our favorite stocks so eventually they become our portfolio. If you want to trade larger, <a href="index.php#contact">Contact Support</a>.</p><img src="images/close.png" class="hide-all" style="float:right;cursor:pointer;margin-right: 10px;">
</div>
<div id="adjust" style="display:none;"><br>
<p class="left">Go to the adjustment manager status link. If the trade is open, the order has been placed and the trade is performing normal. If at risk, the trade needs to be adjusted because an opportunity to protect the profit or increase the gain exists, or because the trade has become unbalanced and risk needs to be reduced. If in trouble, a trade has reached a trigger point and requires adjustment for repair of a losing position with the goal of bringing it back to break even, generating a gain, or closing the trade.&nbsp;<a href="services.php#closed">Performance Results</a></p><img src="images/close.png" class="hide-all" style="float:right;cursor:pointer;margin-right: 10px;">
</div>
<div id="trading" style="display:none;"><br>
    <p class="left">
        Weekly - Look for month (Jan-Dec) and in what friday of the month the weekly falls (W1-2-3-4 ), that's how you find the weekly option contract<br>
Monthly -  Look for month (Jan-Dec) and for the 3rd friday of the month that's how you find the monthly option contract<br>
New trade - A option trade idea generated by Grouca's smart algorithm.<br>
Adjustment - A option trade strategy designed to increase a gain, reduce a loss, break even or generate a gain.<br>
Margin - Extra money your stock broker holds on your account to protect his overall risk.<br>
Long - In the context of options, the buying of an options contract.<br>
Short - In the context of options, the selling of an options contract.<br>
Call - An agreement that gives an investor the right (but not the obligation) to buy a stock at a specified price within a specific time period.<br>
Put - An agreement that gives an investor the right (but not the obligation) to sell a stock at a specified price within a specific time period.<br>
Interactive Brokers - Best for commission and for trade execution. <a href="https://www.interactivebrokers.com/en/index.php?f=4695&amp;gclid=CIT3gI380MQCFcVhfgodoTwAeQ">Click here</a>
    </p><img src="images/close.png" class="hide-all" style="float:right;cursor:pointer;margin-right: 10px;">
</div>

<!--
<p class="left">3. Consider opening a trade as long as the entry price is not higher than... 5% from Grouca's original recommended entry option price. All trades are best when placed one hour before the market closes.</p>

<p class="left">4. If you are new to trading; consider allocating 3% of your portfolio for each new trade. All trades should match Grouca’s recommendations for quantity of unit’s traded. To learn how to place larger trades, <a href="index.php#contact">Contact Support</a>.</p>

<p class="left">5. Keep 70% in cash at all times for adjustments and trade no more than 3 stocks at a time until you understand the process and grow comfortable.</p>-->


<?php
        echo '<p id="closed" class="loginheadline" style="font-size: 23px;"><b>Closed Positions</b></p>';
         $sql_close = mysql_query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'Closed' ORDER BY Timestamp DESC;");
        if(mysql_num_rows($sql_close)> 0){
            echo '<table id="adjustment">
        <tr><thead id="thead">
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Trade</th>
            <th>Change</th>
        </tr><tbody> ';  
            while ($row = mysql_fetch_assoc($sql_close)) {
                echo '<tr>
        <td data-th="Date:">'.convertD($row['Date']).'</td>
        <td data-th="Stock:">'.$row['Stock'].'</td> 
        <td data-th="Action:">'.$row['Action'].'</td> 
        <td data-th="Trade:">'.$row['Trade'].'</td> 
        <td data-th="Change:">'.$row['ChangeAmount'].'</td>' ;
      /*  if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
        else {echo 'TBD</td>';} */
      echo '</tr>';
                }  echo '</table>';  
            }
else {echo '<p>There are currently no closed trades.</p>';}

?>
<br>
<form action="signup.php" method="post">
<input name="Closed" id="send" type="submit" class="w-button button" value="Start Using Grouca"/><br><br>
</form>
    </div><br><br></div></div>