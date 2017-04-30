<?php
$ibaccount = false; 
ini_set("display_startup_errors", 1);ini_set("display_errors", 1);
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

<?php
require_once('include/navigation_bar.php');
include("base.php");

function convertD($date) {
    return date('n/j/y', strtotime($date));
}

$query = 'SELECT * , GROUP_CONCAT( 
TYPE , Number, FullCode, LowerPrice
SEPARATOR  ";" ) as Options 
FROM positions
WHERE Status = "New" and isCurrent =1
GROUP BY UNIX_TIMESTAMP( TIMESTAMP ) DIV 500 
ORDER BY TIMESTAMP DESC';
$sql_query = $mysqli->query($query);
$number = $sql_query->num_rows;

while ($new = $sql_query->fetch_assoc()) {
    $history[] = array($new['Date'], $new['Status'], $new['Stock'] . ' - ' . $new['Price'], $new['Action'], $new['Type'], $new['Number'], $new['FullCode'], $new['LowerPrice'], $new['Trade'], $new['Gain'], $new['Loss'], $new['Notes'], $new['Timestamp'], $new['Options'], $new['Title']);
}
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

                        <?php
                        $maxbuy = $maxsell = 0;
                        foreach ($history as $item) {
                            
                            $buy = $sell = 0;
                            $temp = $item[13];
                            if (strpos($temp, ';') !== false) {
                                $temp = explode(';', $temp);

                                foreach ($temp as $move) {
                                    if (substr($move, 0, 4) == "Sell") {
                                        $sell++;
                                    } elseif (substr($move, 0, 3) == "Buy") {
                                        $buy++;
                                    }
                                }
                            } else {
                                if ($item[4] == "Buy") {
                                    $buy++;
                                } elseif ($item[4] == "Sell") {
                                    $sell++;
                                }
                            }
                            if ($buy > $maxbuy) {
                                $maxbuy = $buy;
                            }
                            if ($sell > $maxsell) {
                                $maxsell = $sell;
                            }
                        }

                        $number = $number2 = 0;
                        for ($count = 0; $count < $maxbuy; $count++) {
                            echo '<th>Buy' . ($count > 0 ? $count + 1 : '') . '</th>';
                        }
                        for ($count2 = 0; $count2 < $maxsell; $count2++) {
                            echo '<th>Sell' . ($count2 > 0 ? $count2 + 1 : '') . '</th>';
                        }
                        ?>
                        <th>Target Gain</th>
                        <th>Max Loss</th>
                        <th>Notes</th>
                        <th>Broker</th>
                    </tr>
                <tbody>
                    <?php
                    $query = 'SELECT * , GROUP_CONCAT( 
                        TYPE , Number, FullCode, LowerPrice
                        SEPARATOR  ";" ) as Options, max(Action) as Action, max(Trade) as Trade, max(Notes) as Notes, max(Gain) as Gain, max(Loss) as Loss, max(Title) as Title 
                        FROM positions
                        WHERE Status = "New" and isCurrent =1
                        GROUP BY UNIX_TIMESTAMP( TIMESTAMP ) DIV 500 
                        ORDER BY TIMESTAMP DESC';
                    $sql_query = $mysqli->query($query);

                    while ($item = $sql_query->fetch_assoc()) {

                        $rowibstatusnew = -1;
                        $useremail = $_SESSION['UserName'];
                        $sql_sentpositions_str = "SELECT * FROM `sentpositions` WHERE tradeid=" . $item["TradeID"] . " AND useremail='" . $useremail . "';";
                        $sql_sentpositions_result = mysqli_query($mysqli, $sql_sentpositions_str);
                        if ($sql_sentpositions_result != FALSE) {

                            if (mysqli_num_rows($sql_sentpositions_result) > 0) {

                                $rowsub = mysqli_fetch_assoc($sql_sentpositions_result);
                                $rowibstatusnew = $rowsub['status'];
                            }
                        }
                        if (TRUE) {
                            ?>
                            <tr>
                                <td data-th="Title:"><?php echo $item['Title']; ?></td>
                                <td data-th="Stock - Price:"><?php echo $item['Stock'] . ' - ' . $item['Price']; ?></td> 
                                <td data-th="Action:"><?php echo $item['Action']; ?></td>
                                <td data-th="Trade:"><?php echo $item['Trade']; ?></td>
                                <?php
                                $trades = $item['Options'];
            
                                $buycount = $sellcount = 0;

                                if (strpos($trades, 'Puts') !== false) {
                                    $trades = str_replace("Puts", "Puts for ", $trades);
                                } else {
                                    $trades = str_replace("Put", "Put for ", $trades);
                                }

                                if (strpos($trades, 'Calls') !== false) {
                                    $trades = str_replace("Calls", "Calls for ", $trades);
                                } else {
                                    $trades = str_replace("Call", "Call for ", $trades);
                                }

                                $trades = preg_replace('/(?<=[a-z])(?=\d)|(?<=\d)(?=[a-z])/i', ' ', $trades);


                                if (strpos($trades, ';') !== false) {
                                    $trades = explode(';', $trades);
                                    sort($trades);
                                    
                                    $buycount = $sellcount = 0;
                                    foreach ($trades as $move) { 
                                    
                                        if (substr($move, 0, 3) == "Buy") {
                                            $move = str_replace("Sell", "-", $move);
                                            $move = str_replace("Buy", "", $move);
                                            echo '<td data-th="Buy:">' . $move . '</td>';
                                            $buycount++; 
                                        } elseif (substr($move, 0, 4) == "Sell") {
                                            if ($buycount < $maxbuy) {
                                                $diff = $maxbuy - $buycount;
                                                for ($count = 0; $count < $diff; $count++) {
                                                    echo '<td data-th="Buy:"></td>';
                                                    $buycount++;
                                                }
                                            }
                                            $move = str_replace("Sell", "-", $move);
                                            $move = str_replace("Buy", "", $move);
                                            echo '<td data-th="Sell:">' . $move . '</td>';
                                            $sellcount++;
                                        }
                                    }
                                    
                                    if ($sellcount < $maxsell) {
                                        $diff = $maxsell - $sellcount;
                                        for ($count = 0; $count < $diff; $count++) {
                                            echo '<td data-th="Sell:"></td>';
                                            $sellcount++;
                                        }
                                    }
                                } else {
                                    $buycount = $sellcount = 0;
                                    
                                    $trades = str_replace("Sell", "-", $trades);
                                    $trades = str_replace("Buy", "", $trades);
                                    if ($item['Type'] == "Buy") {
                                        echo '<td data-th="Buy:">' . $trades . '</td>';
                                        $buycount++;
                                        
                                          if ($buycount < $maxbuy) {
                                                $diff = $maxbuy - $buycount;
                                                for ($count = 0; $count < $diff; $count++) {
                                                    echo '<td data-th="Buy:"></td>';
                                                    $buycount++;
                                                }
                                          }
                                        
                                        for ($coun = 0; $coun < $maxsell; $coun++) {
                                            echo '<td data-th="Sell:"></td>';
                                        }
                                    } elseif ($item['Type'] == "Sell") {
                                        for ($coun = 0; $coun < $maxbuy; $coun++) {
                                            echo '<td data-th="Buy:"></td>';
                                        }
                                        echo '<td data-th="Sell:">' . $trades . '</td>';
                                    } else {
                                        echo '<td></td>';
                                    }
                                }
                                ?>

                                <td data-th="Target Gain:"><?php echo $item['Gain']; ?></td> 
                                <td data-th="Max Loss:"><?php echo $item['Loss']; ?></td>
                                <td data-th="Notes:"><?php echo $item['Notes']; ?></td>

                                <?php
                            $showmessage = $showmessage2 = 0;
                                echo '<td data-th="Send to IB:" class="alm-ib-background"> <form method="POST" class="alm-ib-background">';
                                if ($ibaccount == false) {
                                    echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibnotconnected" style="margin-top:0px;">CONNECT IB ACCOUNT TO REPLICATE ' . $_SESSION['UserName'] . ' </button>';
                                } else {
                                    if (isset($ibaccount["ibverified"])) {
                                        if ($ibaccount["ibverified"] == 0) {
                                            echo '<span class="w-button button alm-ib-background">Your IB Account Pending Verification</span>';
                                        } elseif ($ibaccount["ibverified"] == 11) {
                                            if ($rowibstatusnew == 11) {
                                                echo '<span class="alm-ib-background" style="color: white;">Your Order is Sent</span>';
                                            } else if ($rowibstatusnew == 0) {
                                                $showmessage2 =1;
                                                echo '<span class="alm-ib-background" style="color: yellow;">Your Order is Pending</span>';
                                            } else if ($rowibstatusnew == -1) {
                                                echo '<input type="hidden" id="sendtoiborderid" name="sendtoiborderid" value="' . $item['TradeID'] . '">';
                                                echo ('<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibconnected" style="margin-top:0px;">REPLICATE IN IB</button>');
                                            }
                                        } else {
                                            $showmessage = 1;
                                            echo '<span class="w-button button alm-ib-background" style="color: red;"><a href="account.php">Problem connecting with your IB account*</a></span>';
                                        }
                                    }
                                }
                                echo '</form></td>';
                                ?>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody></table><br>
            <?php
    if ($showmessage == 1){echo '<p>*Your IB account username or password is incorrect OR you are logged into IB on another computer. Please logout from IB on other computers and try again.</p>';}
            if ($showmessage2 == 1){echo '<p>*Order typically take just a few minutes to process in IB. Only refresh this page after 3 minutes to view latest broker status. Only log in to IB after your broker message shows "Your Order is Sent".</p>';}
    
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
        $open = $mysqli->query("SELECT *, max(Action) as Action, max(Trade) as Trade, max(Notes) as Notes, max(Gain) as Gain, max(Loss) as Loss FROM positions Where isCurrent = 1 Group By TradeID");
        /* $open = $mysqli->query("SELECT s. * 
          FROM positions s
          JOIN (

          SELECT * , MAX( TIMESTAMP ) AS maxdate
          FROM positions s
          GROUP BY TradeID
          )ss ON s.TradeID = ss.TradeID
          AND s.Timestamp = ss.maxdate
          ORDER BY TIMESTAMP DESC;"); */
        $header = $count = 0;
        $status = "";
        while ($row = $open->fetch_assoc()) {

            $rowibstatusadj = -1;
            $useremail = $_SESSION['UserName'];
            $sql_sentpositions_str = "SELECT * FROM `sentpositions` WHERE tradeid=" . $row["TradeID"] . " AND useremail='" . $useremail . "';";
            $sql_sentpositions_result = mysqli_query($mysqli, $sql_sentpositions_str);
            if ($sql_sentpositions_result != FALSE) {

                if (mysqli_num_rows($sql_sentpositions_result) > 0) {

                    $rowsub = mysqli_fetch_assoc($sql_sentpositions_result);
                    $rowibstatusadj = $rowsub['status'];
                }
            }

            if (TRUE) {
                if (($row['Status'] != 'Closed') and ( $row['Status'] != 'New')) {
                    $count = 1;
                    if ($row['Status'] == "In Trouble") {
                        $status = "Trouble";
                    } elseif ($row['Status'] == "At Risk") {
                        $status = "Risk";
                    } else
                        $status = $row['Status'];
                    if ($header == 0) {
                        echo '<table id="history"><thead id="thead"> 
                                    <tr>
                                        <th>Date</th>
                                         <th>Title</th>
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
                                    <td data-th="Title:">' . $row['Title'] . '</td>
                                    <td data-th="Stock:">' . $row['Stock'] . '</td>

                                    <td data-th="Status:"><a href="history.php?ID=' . $row['TradeID'] . '">' . $status . '</a></td>
                                    <td data-th="Action:">' . $row['Action'] . '</td>
                                    <td data-th="Trade:">' . $row['Trade'] . '</td>';
                    echo '<td data-th="Send to IB:" class="alm-ib-background"> <form method="POST" class="alm-ib-background">';
                    $showmessage = $showmessage2 = 0;
                    if ($status == 'Open') {
                        echo '<span class="alm-ib-background">Cannot replicate Open trades</span>';
                    } else {
                        if ($ibaccount == false) {
                            echo '<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibnotconnected" style="margin-top:0px;">CONNECT IB ACCOUNT TO REPLICATE</button>';
                        } else {
                                    if (isset($ibaccount["ibverified"])) {
                                        if ($ibaccount["ibverified"] == 0) {
                                            echo '<span class="w-button button alm-ib-background">Your IB Account Pending Verification</span>';
                                        } elseif ($ibaccount["ibverified"] == 11) {
                                            if ($rowibstatusadj == 11) {
                                                echo '<span class="alm-ib-background" style="color: white;">Your Order is Sent</span>';
                                            } else if ($rowibstatusadj == 0) {
                                                $showmessage2 =1;
                                                echo '<span class="alm-ib-background" style="color: yellow;">Your Order is Pending</span>';
                                            } else if ($rowibstatusadj == -1) {
                                                echo '<input type="hidden" id="sendtoiborderid" name="sendtoiborderid" value="' . $row['TradeID'] . '">';
                                                echo ('<button class="w-button button" id="sendtoibbutton" name="sendtoibbutton" value="ibconnected" style="margin-top:0px;">REPLICATE IN IB</button>');
                                            }
                                        } else {
                                            $showmessage = 1;
                                            echo '<span class="w-button button alm-ib-background" style="color: red;"><a href="account.php">Problem connecting with your IB account</a></span>';
                                        }
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
            if ($showmessage == 1){echo '<p>*Your IB account username or password is incorrect OR you are logged into IB on another computer. Please logout from IB on other computers and try again.</p>';}
            if ($showmessage2 == 1){echo '<p>*Order typically take just a few minutes to process in IB. Only refresh this page after 3 minutes to view latest broker status. Only log in to IB after your broker message shows "Your Order is Sent".</p>';}
            
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
                <th>Title</th>
                <th>Symbol</th>
                <th>Trade</th>
                <th>Annualized %</th>
                </tr>
                <tbody>
                    <?php
                    while ($row = $sql_close->fetch_assoc()) {
                        echo '<tr>
                        <td data-th="Date:">' . convertD($row['Date']) . '</td>
                         <td data-th="Title:">' . $row['Title'] . '</td> 
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