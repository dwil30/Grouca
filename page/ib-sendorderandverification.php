<?php

require 'phpmailer\PHPMailerAutoload.php';

//session_start();

function sendOrderToIb($orderId) {

    if (isset($_SESSION['UserName']) && isset($_SESSION['ibusername']) && isset($_SESSION['ibpassword'])) {

        try {
            require 'base.php';

            $sql_select = 'SELECT * FROM positions WHERE ID=' . $orderId . ';';
            $sql_select_result = mysqli_query($mysqli, $sql_select);

            if ($sql_select_result != false) {

                if (mysqli_num_rows($sql_select_result) == 1) {

                    $row = mysqli_fetch_assoc($sql_select_result);

                    if (isset($row['Status'])) {
                        
                        if ($row['Status'] != 'Pending') {

                            $email = $_SESSION['UserName'];
                            $ibusername = $_SESSION['ibusername'];
                            $ibpassword = $_SESSION['ibpassword'];

                            $sql_insert = 'INSERT INTO `iborders`(`posid`, `email`, `username`, `password`, `symbol`, `receivetime`, `status`,'
                                    . ' `Price`, `Buy`, `PriceBuy`, `Sell`, `PriceSell`, `Buy2`, `PriceBuy2`, `Sell2`, `PriceSell2`, `Buy3`,'
                                    . ' `PriceBuy3`, `Sell3`, `PriceSell3`, `Buy4`, `PriceBuy4`, `Sell4`, `PriceSell4`, `Trade`) VALUES ('
                                    . $orderId . ", '" . $email . "', '" . $ibusername . "', '" . $ibpassword . "', '" . $row['Stock'] . "', '"
                                    . date("Y-m-d H:i:s") . "', -1, '" . $row['Price'] . "', '" . $row['Buy'] . "', '" . $row['PriceBuy'] . "', '"
                                    . $row['Sell'] . "', '" . $row['PriceSell'] . "', '" . $row['Buy2'] . "', '" . $row['PriceBuy2'] . "', '"
                                    . $row['Sell2'] . "', '" . $row['PriceSell2'] . "', '" . $row['Buy3'] . "', '" . $row['PriceBuy3'] . "', '"
                                    . $row['Sell3'] . "', '" . $row['PriceSell3'] . "', '" . $row['Buy4'] . "', '" . $row['PriceBuy4'] . "', '"
                                    . $row['Sell4'] . "', '" . $row['PriceSell4'] . "', '" . $row['Trade'] . "');";

                            $sql_insert_result = mysqli_query($mysqli, $sql_insert);

                            if ($sql_insert_result !== false) {

                                $sql_update = "UPDATE positions SET Status='Pending' WHERE ID=" . $row['ID'] . ";";
                                $sql_update_result = mysqli_query($mysqli, $sql_update);

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
                                $mail->addAddress($email);
                                $mail->addReplyTo('damon.d.wilson@gmail.com');
                                $mail->isHTML(false);
                                $mail->Subject = "You requested sending of your order " . $orderId . " to IB.";
                                $mail->Body = "You requested sending of your order " . $orderId . " to IB. You will receive a confirmation email when your order will be sent to IB.";
                                $mail->send();
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

            $email = $_SESSION['UserName'];
            $ibusername = $_SESSION['ibusername'];
            $ibpassword = $_SESSION['ibpassword'];

            $sql_select = "SELECT * FROM iborders WHERE username='" . $ibusername . "' AND symbol='ibverification' AND status=-1;";
            $sql_select_result = mysqli_query($mysqli, $sql_select);

            if ($sql_select_result != false) {

                if (mysqli_num_rows($sql_select_result) == 0) {

                    $sql_insert = 'INSERT INTO `iborders`(`posid`, `email`, `username`, `password`, `symbol`, `receivetime`, `status`,'
                            . ' `Price`, `Buy`, `PriceBuy`, `Sell`, `PriceSell`, `Buy2`, `PriceBuy2`, `Sell2`, `PriceSell2`, `Buy3`,'
                            . ' `PriceBuy3`, `Sell3`, `PriceSell3`, `Buy4`, `PriceBuy4`, `Sell4`, `PriceSell4`, `Trade`) VALUES ('
                            . 0 . ", '" . $email . "', '" . $ibusername . "', '" . $ibpassword . "', 'ibverification', '"
                            . date("Y-m-d H:i:s") . "', -1, '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1');";

                    $sql_insert_result = mysqli_query($mysqli, $sql_insert);
                }
            }

            mysqli_close($mysqli);
        } catch (Exception $e) {
            
        }
    }
}

?>