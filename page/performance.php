<?php 
require_once('include/navigation_bar.php');
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}

$sql_close = $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'Closed' ORDER BY Timestamp DESC ;");
    
?>

		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:center;">

				<!-- Header -->
				<h2 class="underline">
					<span>Performance</span>
					<span></span>
				</h2>
				<!-- /Header -->
				<table id="adjustment" style="width:99%">
  					<tr>
  						<th>Date</th>
  						<th>Symbol</th>
  						<th>Trade</th>
   						<th>Change</th>
  					</tr>
                <?php while ($row = $sql_close->fetch_assoc()) { ?>    
  					<tr>
    					<td><?php echo convertD($row['Date']); ?></td>
    					<td><?php echo $row['Stock']; ?></td> 
    					<td><?php echo $row['Trade']; ?></td>
    					<td><?php echo $row['ChangeAmount']; ?></td>
  					</tr>
                <?php } ?>    
  					
				</table>
                
                 <a href="sign.php" class="bottom-button" style="display: block;margin: 20px auto;width: 248px;border-radius: 5px;background-color: #15a346;font-size: 26px;padding: 10px;color: white;">Sign Up For Free</a>
            
			</div>
			
		</div>
</body>
