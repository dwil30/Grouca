<?php

require 'PHPMailer/PHPMailerAutoload.php';

//session_start();

function sendOrderToIb($tradeid) {

    if (isset($_SESSION['UserName']) && isset($_SESSION['ibusername']) && isset($_SESSION['ibpassword'])) {

        try {
            require 'base.php';

            $sql_select_positions_str = "SELECT * FROM `positions` WHERE isCurrent='1' AND TradeID=" . $tradeid . " ORDER BY ID ASC;";
            $sql_select_positions_result = mysqli_query($mysqli, $sql_select_positions_str);
            if ($sql_select_positions_result != FALSE) {

                if (mysqli_num_rows($sql_select_positions_result) > 0) {

                    $useremail = $_SESSION['UserName'];
                    $ibusername = $_SESSION['ibusername'];
                    $ibpassword = $_SESSION['ibpassword'];

                    while ($row = mysqli_fetch_assoc($sql_select_positions_result)) {

                        if (isset($row['ID'])) {

                            $positionid = $row['ID'];
                            $sql_sentpositions_str = "SELECT * FROM `sentpositions` WHERE positionid=" . $positionid . " AND useremail='" . $useremail . "';";
                            $sql_sentpositions_result = mysqli_query($mysqli, $sql_sentpositions_str);

                            if ($sql_sentpositions_result != FALSE) {
                                if (true) {//mysqli_num_rows($sql_sentpositions_result) == 0) {
                                    $sql_insert_sentpositions_str = "INSERT INTO `sentpositions`(`tradeid`, `positionid`, `useremail`, `status`) VALUES (" . $tradeid . ", " . $positionid . ", '" . $useremail . "', 0);";
                                    $sql_insert_sentpositions_result = mysqli_query($mysqli, $sql_insert_sentpositions_str);

                                    $ordaction = 1;
                                    $row['Action'] = strtolower($row['Action']);
                                    if ($row['Action'] == "buy")
                                        $ordaction = 2;

                                    $sql_iborders_insert_str = 'INSERT INTO `iborders`(`Action`, `Currency`, `IBUserName`, `IBUserPass`, `OptionSymbol`, '
                                            . '`PositionID`, `Price`, `Quantity`, `SendTime`, `Status`, `TradeID`, `UserEmail`) VALUES ('
                                            . $ordaction . ", 'USD', '" . $ibusername . "', '" . $ibpassword . "', '" . $row['OptionSymbol'] . "', "
                                            . $positionid . ", " . $row['LowerPrice'] . ", " . $row['Number'] . ", '" . date("Y-m-d H:i:s") . "', -1, " . $tradeid . ", '" . $useremail . "');";

                                    $sql_iborders_insert_result = mysqli_query($mysqli, $sql_iborders_insert_str);

                                    if ($sql_iborders_insert_result !== false) {

                                        unset($_SESSION['ibusername']);
                                        unset($_SESSION['ibpassword']);

                                        $mail = new PHPMailer;
                                        $mail->isSMTP();
                                        $mail->Host = 'smtp-pulse.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'damon.d.wilson@gmail.com';
                                        $mail->Password = '4E3D7SCiHtqa53Y';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = 465;
                                        $mail->setFrom('damon.d.wilson@gmail.com');
                                        $mail->addAddress($useremail);
                                        $mail->addReplyTo('damon.d.wilson@gmail.com');
                                        $mail->isHTML(false);
                                        $mail->Subject = "You requested sending of your order " . $tradeid . " to IB.";
                                        $mail->Body = "You requested sending of your order " . $tradeid . " to IB. You will receive a confirmation email when your order will be sent to IB.";
                                        $mail->send();
                                    }
                                }
                            }
                        }
                    }
                }
            }

            mysqli_close($mysqli);
        } catch (Exception $e) {
            
        }
    }
}

function sendVerificationToIb() {

    if (isset($_SESSION['UserName']) && isset($_SESSION['ibusername']) && isset($_SESSION['ibpassword'])) {

        try {
            require 'base.php';

            $useremail = $_SESSION['UserName'];
            $ibusername = $_SESSION['ibusername'];
            $ibpassword = $_SESSION['ibpassword'];

            $sql_iborders_insert_str = 'INSERT INTO `iborders`(`Action`, `Currency`, `IBUserName`, `IBUserPass`, `OptionSymbol`, '
                    . '`PositionID`, `Price`, `Quantity`, `SendTime`, `Status`, `TradeID`, `UserEmail`) VALUES ('
                    . "-1, 'USD', '" . $ibusername . "', '" . $ibpassword . "', 'ibverification', "
                    . "-1, -1, -1, '" . date("Y-m-d H:i:s") . "', -1, -1, '" . $useremail . "');";

            $sql_iborders_insert_result = mysqli_query($mysqli, $sql_iborders_insert_str);


            mysqli_close($mysqli);
        } catch (Exception $e) {
            
        }
    }
}

?>