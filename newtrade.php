<?php
session_start();
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}
?>
<?php include 'header.php'; ?>
    
<div class="section2" style="background-color:white;">
    <div class="w-container aboutus"><br>
      <h3 style="margin-top:0px; margin-bottom: 20px;">Trade Performance</h3>
 
    <?php
        //echo '<p id="closed" class="loginheadline" style="font-size: 23px;"><b>Closed Positions</b></p>';
         $sql_close = $mysqli->query("select s.* from positions s join (select *, max(Date) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.date = ss.maxdate where s.Status = 'Closed' ORDER BY DATE DESC ;");
        if(mysqli_num_rows($sql_close)> 0){
            echo '<table id="adjustment">
        <tr><thead id="thead">
            <th>Date</th>
            <th>Symbol</th>
            <th>Action</th>
            <th>Trade</th>
            <th>Change</th>
        </tr><tbody> ';  
            while ($row = $sql_close->fetch_assoc()) {
                echo '<tr>
        <td data-th="Date:">'.convertD($row['Date']).'</td>
        <td data-th="Stock:">'.$row['Stock'].'</td> 
        <td data-th="Action:">'.$row['Action'].'</td> 
        <td data-th="Trade:">'.$row['Trade'].'</td> 
         <td data-th="Change:">';
        if ($row['SetPrice'] > 0){echo round(($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2'] + $row['SetPrice'])/abs($row['PriceBuy']*(-1) + $row['PriceBuy2']*(-1) + $row['PriceSell'] + $row['PriceSell2']), 2, PHP_ROUND_HALF_UP)*100 .'%</td>';}
        else {echo 'TBD</td>';}
      echo '</tr>';
                }  echo '</table>';
            }
else {echo '<p>There are currently no closed positions.</p>';}

?>
        <br>
        <img class="spacer" src="images/space.jpg" alt="space.jpg" style="margin: 10px auto;">
   </div></div>

<div class="w-container">
      <div class="w-row">
          <div class="team-box" style="margin-top: 10px;">
              <p class="team-info" style="margin-bottom:0px;">Each day, Grouca's ranking algorithm searches for stocks that provide the highest statistical chances of success based on price momentum and fundamentals, when it finds a candidate, it models an option trade strategy followed by an alert to subscribers. Included with your alert you get detailed instructions on how to place the new trade.</p>
        </div>
    </div>
    </div>
 <div class="team-icons">
            <a class="nav-email nav-continue" href="personal.php" style="font-size:15px; line-height:26px;  width: 187px;">SIGN UP FOR FREE</a><br><br>
          </div>
 <div>
    <div class="section footer">
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-6 copyright">
            <p class="copyright-text">© 2016 Grouca&nbsp;</p>
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