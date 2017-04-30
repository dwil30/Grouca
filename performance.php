    <style>
         @media only screen and (min-width:864px){
        #menu-selected {width: 119px !important;left: 463 !important;}
        }
    </style>    
<?php
session_start();
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}
?>
<?php include 'header.php'; ?>
    
<div class="section2" style="background-color:white;">
    <div class="w-container"><br>
      <h3 style="margin-top:0px;margin-bottom: 20px;">Trade Performance</h3>
 
    <?php
        //echo '<p id="closed" class="loginheadline" style="font-size: 23px;"><b>Closed Positions</b></p>';

         $sql_close = mysql_query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'Closed' ORDER BY Timestamp DESC ;");
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
      echo '</tr>';
                }  echo '</table>';
             }
else {echo '<p>There are currently no closed positions.</p>';}

?>
        <img class="spacer" src="images/space.jpg" alt="space.jpg" style="margin: 20px auto 5px auto;">
 </div></div>
    <div class="w-container">
      <div class="w-row">
          <div class="team-box" style="margin-top: 10px;">
              <p class="team-info" style="margin-bottom:10px;margin-top:10px;">Every day, our ranking algorithm searches for stocks that provide the highest statistical chances of success based on price momentum and fundamentals, when it finds a candidate, it models a new option strategy followed by an alert to subscribers. Included with your alert you get detailed instructions on how to place the new trade.<br><br>

Our open trades are monitored around the clock and if we see that a trade has become unbalanced we issue our at risk alert. Included with your alert you get a detailed adjustment to rebalance your trade.<br><br>

In the event a trade gets is in trouble, we issue our in trouble alert. Included with your alert you get a detailed adjustment to mitigate the risk with the goal of bringing it back to a sustainable path, break even, back to a profit, or if the trade does not work anymore, we close the trade and cut our losses early.
              
        </div>
          </div>
   
   <div class="team-icons">
           <a class="nav-email nav-continue" href="personal.php" style="font-size:15px; line-height:26px;  width: 187px;">SIGN UP FOR FREE</a><br><br>
          </div>
         </div>
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
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>