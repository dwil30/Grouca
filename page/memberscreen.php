<?php require_once('include/navigation_bar.php');
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}


$buy2 = $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'New' and s.Buy2 != ''");
$buy2_number = $buy2->num_rows;
$sell2 = $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'New' and s.Sell2 != ''");
$sell2_number = $sell2->num_rows;
$sql_query= $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'New'");
$number = $sql_query->num_rows;
?>
    
<?php require_once('include/navigation_bar.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:center;width:auto;margin-left:15px;margin-right:15px;">

				<!-- Header -->
				<h2 class="underline">
					<span>New Trade</span>
					<span></span>
				</h2>
				<!-- /Header -->
                
            <?php if ($number > 0){ ?>
                <table id="history"><thead id="thead"> 
                    <tr>
                        <th>Title</th>
                        <th>Stock - Price</th>
                        <th>Action</th>
                        <th>Trade</th>
                        <th>Buy</th>
                        <?php if ($buy2_number > 0){echo '<th>Buy2</th>';}?>
                        <th>Sell</th>
                        <?php if ($sell2_number > 0){echo '<th>Sell2</th>';} ?>
                        <th>Target Gain</th>
                        <th>Max Loss</th>
                        <th>Notes</th>
                    </tr>
                    <tbody>
                    <?php while ($item = $sql_query->fetch_assoc()) { 
            echo '
                    <tr>
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
                        <td data-th="Notes:">'.$item['Notes'].'</td>
                        </tr>';
                   } ?>
                    </tbody></table><br>
                    <?php }           
                    else {echo '<p>There are currently no new trades.</p>';} ?>
            
				</br></br>
				<h2 class="underline">
					<span>Adjustments</span>
					<span></span>
				</h2>
                <?php 
                
                $open = $mysqli->query("SELECT * FROM (SELECT * FROM positions ORDER BY TIMESTAMP DESC) AS foo GROUP BY TradeID ORDER BY DATE DESC");
                $header = $count = 0;

                while ($row = $open->fetch_assoc()) {
                    if (($row['Status'] != 'Closed') and ($row['Status'] != 'New')){
                        $count = 1;
                        if ($row['Status'] == "In Trouble"){$status = "Trouble";}
                        elseif ($row['Status'] == "At Risk"){$status = "Risk";}
                        if ($header == 0) {
                           echo '<table id="adjustment"><thead id="thead"> 
                                <tr>
                                    <th>Date</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Trade</th>
                                    <th>Broker</th>
                                </tr></thead><tbody>';
                                            $header = 1;}

                                            echo '<tr>
                                <td data-th="Date:">'.convertD($row['Date']).'</td>
                                <td data-th="Stock:">'.$row['Stock'].'</td>
                                
                                <td data-th="Status:"><a href="history.php?ID='.$row['TradeID'].'">'.$status.'</a></td>
                                <td data-th="Action:">'.$row['Action'].'</td>
                                <td data-th="Trade:">'.$row['Trade'].'</td>
                                <td data-th="Send Trade"><a href="#">Send Trade</a></td>            
                                </tr>';
                    }
                }
                if ($count > 0 ) {echo '</table>';}
                else {echo '<p>There are currently no open trades.</p>';}
?>
    					
  				</br></br>

                <a style="color:#BCFFFF;" href="video.php">Training Videos</a>
				<!-- Header -->
				<h2 class="underline">
					<span>Closed Positions</span>
					<span></span>
				</h2>
				<!-- /Header -->
        
                <?php $sql_close = $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'Closed' ORDER BY Timestamp DESC;");

        if($sql_close->num_rows > 0){ ?>
            <table id="adjustment">
                <tr><thead id="thead">
                    <th>Date</th>
                    <th>Symbol</th>
                    <th>Trade</th>
                    <th>Change</th>
                </tr>
                <tbody>
            <?php         
            while ($row = $sql_close->fetch_assoc()) {
                echo '<tr>
                        <td data-th="Date:">'.convertD($row['Date']).'</td>
                        <td data-th="Stock:">'.$row['Stock'].'</td> 
                        <td data-th="Trade:">'.$row['Trade'].'</td> 
                        <td data-th="Change:">'.$row['ChangeAmount'].'</td>' ;
                echo '</tr>';
            }  
            echo '</table>';
            } else {echo '<p>There are currently no closed trades.</p>';} ?>

			</div>
		</div>
</body>