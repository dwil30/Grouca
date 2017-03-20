<?php
error_reporting(E_ALL);ini_set('display_errors', 1);
$ibaccount = false;

require_once 'ib-sendorderandverification.php';
require_once 'ib-connector.php';

if (isset($_SESSION['UserName'])) {

    $ibaccount = getIBAccount($_SESSION['UserName']);
    $_SESSION['ibusername'] = $ibaccount['ibusername'];
    $_SESSION['ibpassword'] = $ibaccount['ibpassword'];

    if ($ibaccount !== false) {
        
        if ($ibaccount["ibverified"] == 0) {

            sendVerificationToIb();
        }
    }
}

if (isset($_POST['sendtoibbutton'])) {

    $ibconvalue = $_POST['sendtoibbutton'];
    unset($_POST['sendtoibbutton']);
    
    if ($ibconvalue === "ibconnected") {

        if (isset($_POST['sendtoiborderid'])) {

            sendOrderToIb($_POST['sendtoiborderid']);
        }     
        
        header('Location: memb.php');
        
    } else if ($ibconvalue === "ibnotconnected") {

        header('Location: account.php');
    }
}
?>

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
        <h2 class="underline">
            <span>New Trade</span>
            <span></span>
        </h2>
        <?php if ($number > 0) { ?>
        <table id="history"><thead id="thead"> 
                    <tr>
                        <th>Title</th>
                        <th>Stock - Price</th>
                        <th>Action</th>
                        <th>Trade</th>
                        <th>Buy</th>
                        <?php if ($buy2_number > 0){echo '<th>Buy2</th>';} ?>
                        <th>Sell</th>
                        <?php if ($sell2_number > 0){echo '<th>Sell2</th>';} ?>
                        <th>Target Gain</th>
                        <th>Max Loss</th>
                        <th>Notes</th>
                        <th>Broker</th>
                    </tr>
                <tbody>
                    <?php while ($item = $sql_query->fetch_assoc()) {
                        if($item['IBStatus'] == 'Unprocessed' || $item['IBStatus'] == 'Pending')
                        {
                        ?>
                        <tr>
                            <td data-th="Title:"><?php echo $item['Title']; ?></td>
                            <td data-th="Stock - Price:"><?php echo ($item['Stock'].' - '.$item['Price']); ?></td>
                            <td data-th="Action:"><?php echo $item['Action']; ?></td> 
                            <td data-th="Trade:"><?php echo $item['Trade']; ?></td>                            
                            <td data-th="Buy:"><?php echo $item['Buy']; if (strlen($item['PriceBuy']) > 1){echo ' for '.$item['PriceBuy'];} ?></td>
                            <?php if (strlen($item['Buy2']) > 1){echo '<td data-th="Buy2:">'.$item['Buy2'].' for '.$item['PriceBuy2'].'</td>';}
                            echo ('<td data-th="Sell:">'.$item['Sell']); if (strlen($item['PriceSell']) > 1){echo (' for '.$item['PriceSell']);} echo ('</td>');
                            if (strlen($item['Sell2']) > 1){echo ('<td data-th="Sell2:">'.$item['Sell2'].' for '.$item['PriceSell2'].'</td>');}?>                            
                            <td data-th="Target Gain:"><?php echo $item['Gain'];?></td> 
                            <td data-th="Max Loss:"><?php echo $item['Loss'];?></td>
                            <td data-th="Notes:"><?php echo $item['Notes'];?></td>
                            <?php echo '<td data-th="Send to IB:" class="alm-ib-background"> <form method="POST" class="alm-ib-background">';
                            if ($ibaccount == false) {
                                echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibnotconnected" style="margin-top:0px;">CONNECT IB ACCOUNT TO REPLICATE ' . $_SESSION['UserName'] . ' </button>';
                            } else {
                                if (isset($ibaccount["ibverified"])) {
                                    if ($ibaccount["ibverified"] == 0) {
                                        echo '<span class="w-button button alm-ib-background">Your IB Account Pending Verification</span>';
                                    } elseif ($ibaccount["ibverified"] == 11) {
                                        if ($item['IBStatus'] == 'Pending') {
                                            echo '<span class="alm-ib-background">Pending</span>';
                                        } else if ($item['IBStatus'] == 'Unprocessed') {
                                            echo '<input type="hidden" id="sendtoiborderid" name="sendtoiborderid" value="' . $item['ID'] . '">';
                                            echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibconnected" style="margin-top:0px;">REPLICATE IN IB</button>';
                                        }
                                    } else {
                                        echo '<span class="w-button button alm-ib-background" style="color: red;"><a href="account.php">Your IB Account Username or Password is Incorrect</a></span>';
                                    }
                                }
                            }
                            echo '</form></td>';?>
                        </tr>
                        <?php }} ?>
                </tbody></table><br>
            <?php
        } else {
            echo ('<p>There are currently no new trades.</p>');
        }
        ?>

        </br></br>
        <h2 class="underline">
            <span>Adjustments</span>
            <span></span>
        </h2>
        <?php
        $open = $mysqli->query("SELECT s. * 
FROM positions s
JOIN (

SELECT * , MAX( TIMESTAMP ) AS maxdate
FROM positions s
GROUP BY TradeID
)ss ON s.TradeID = ss.TradeID
AND s.Timestamp = ss.maxdate
ORDER BY TIMESTAMP DESC;");
        $header = $count = 0;
        $status = "";
        while ($row = $open->fetch_assoc()) {
            if(($row['IBStatus'] == 'Pending') || ($row['IBStatus'] == 'Unprocessed'))
            {
                if (($row['Status'] != 'Closed') and ( $row['Status'] != 'New')) {
                    $count = 1;
                    if ($row['Status'] == "In Trouble") {
                        $status = "Trouble";
                    } elseif ($row['Status'] == "At Risk") {
                        $status = "Risk";
                    }
                    else $status = $row['Status'];
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
                        $header = 1;
                    }

                    echo '<tr>
                                    <td data-th="Date:">' . convertD($row['Date']) . '</td>
                                    <td data-th="Stock:">' . $row['Stock'] . '</td>

                                    <td data-th="Status:"><a href="history.php?ID=' . $row['TradeID'] . '">' . $status . '</a></td>
                                    <td data-th="Action:">' . $row['Action'] . '</td>
                                    <td data-th="Trade:">' . $row['Trade'] . '</td>';
                    echo '<td data-th="Send to IB:" class="alm-ib-background"> <form method="POST" class="alm-ib-background">';
                    if ($ibaccount == false) {
                        echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibnotconnected" style="margin-top:0px;">CONNECT IB ACCOUNT TO REPLICATE</button>';
                    } else {
                        if (isset($ibaccount["ibverified"])) {
                            if ($ibaccount["ibverified"] == 0) {
                                echo '<span class="w-button button alm-ib-background">Your IB Account Pending Verification</span>';
                            } elseif ($ibaccount["ibverified"] == 11) {
                                if ($row['IBStatus'] == 'Pending') {
                                    echo '<span class="alm-ib-background">Pending</span>';
                                } else if ($row['IBStatus'] == 'Unprocessed') {
                                    echo '<input type="hidden" id="sendtoiborderid" name="sendtoiborderid" value="' . $row['ID'] . '">';
                                    echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibconnected" style="margin-top:0px;">REPLICATE IN IB</button>';
                                }
                            } else {
                                echo '<span class="w-button button alm-ib-background" style="color: red;"><a href="account.php">Your IB Account Username or Password is Incorrect</a></span>';
                            }
                        }
                    }
                    echo '</form></td>';
                    echo'</tr>';
                }
            }
        }
        if ($count > 0) {
            echo '</table>';
        } else {
            echo '<p>There are currently no open trades.</p>';
        }
        ?>

        </br></br>

        <a style="color:#BCFFFF;" href="video.php">Training Videos</a>
        <!-- Header -->
        <h2 class="underline">
            <span>Closed Positions</span>
            <span></span>
        </h2>
        <!-- /Header -->

<?php
$sql_close = $mysqli->query("select s.* from positions s join (select *, max(Timestamp) as maxdate from positions s group by TradeID) ss on s.TradeID = ss.TradeID and s.Timestamp = ss.maxdate where s.Status = 'Closed' ORDER BY Timestamp DESC;");

if ($sql_close->num_rows > 0) {
    ?>
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
                        <td data-th="Date:">' . convertD($row['Date']) . '</td>
                        <td data-th="Stock:">' . $row['Stock'] . '</td> 
                        <td data-th="Trade:">' . $row['Trade'] . '</td> 
                        <td data-th="Change:">' . $row['ChangeAmount'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>There are currently no closed trades.</p>';
}
?>

                </div>
                </div>
                </body>