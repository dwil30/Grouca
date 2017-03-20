<?php

$ibsaltiv = "IamTemporarySalt";
$ibencdecmethod = "AES-128-OFB";
$ibencdecpas = "IamTemporaryPassword";

function getEncDecMethod() {
    global $ibencdecmethod;

    return $ibencdecmethod;
}

function encryptIB($decstring) {

    global $ibsaltiv, $ibencdecpas;
    $encdecmethod = getEncDecMethod();

    $encstring = "";
    if ($encdecmethod != "") {
        $encstring = openssl_encrypt($decstring, $encdecmethod, $ibencdecpas, NULL, $ibsaltiv);
    }

    return $encstring;
}

function decryptIB($encstring) {

    global $ibsaltiv, $ibencdecpas;
    $encdecmethod = getEncDecMethod();

    $decstring = "";
    if ($encdecmethod != "") {
        $decstring = openssl_decrypt($encstring, $encdecmethod, $ibencdecpas, NULL, $ibsaltiv);
    }

    return $decstring;
}

function addIBAccount($email, $ibusername, $ibpassword) {

    try {
        require 'base.php';

        $encibusername = addslashes(encryptIB($ibusername));
        $encibpassword = addslashes(encryptIB($ibpassword));
        $mysql_datetime_now = date("Y-m-d H:i:s");

        $sql_insert = "INSERT INTO ibaccounts (email, ibusername, ibpassword, ibcondatetime) VALUES('" . $email . "', '" . $encibusername . "', '" . $encibpassword . "', '" . $mysql_datetime_now . "');";
        $result_of_sql_insert = mysqli_query($mysqli, $sql_insert);
        mysqli_close($mysqli);

        return $result_of_sql_insert;
        
    } catch (Exception $e) {

        return 0;
    }
}


function updateIBAccount($email, $ibusername, $ibpassword) {

    try {
        require 'base.php';

        $sql_select = "DELETE FROM ibaccounts WHERE email='" . $email . "';";
        $result_of_sql_delete = mysqli_query($mysqli, $sql_select);

        if ($result_of_sql_delete != false) {

        }        
        
        $encibusername = addslashes(encryptIB($ibusername));
        $encibpassword = addslashes(encryptIB($ibpassword));
        $mysql_datetime_now = date("Y-m-d H:i:s");

        $sql_insert = "INSERT INTO ibaccounts (email, ibusername, ibpassword, ibcondatetime) VALUES('" . $email . "', '" . $encibusername . "', '" . $encibpassword . "', '" . $mysql_datetime_now . "');";
        $result_of_sql_insert = mysqli_query($mysqli, $sql_insert);
        mysqli_close($mysqli);

        return $result_of_sql_insert;
        
    } catch (Exception $e) {

        return 0;
    }
}

function getIBAccount($email) {

    $ibaccountdata = false;

    try {        
        require 'base.php';

        $sql_select = "SELECT ibusername, ibpassword, ibverified FROM ibaccounts WHERE email='" . $email . "';";
        $result_of_sql_select = mysqli_query($mysqli, $sql_select);

        if ($result_of_sql_select != false) {
            
            $rowsnum = mysqli_num_rows($result_of_sql_select);
            if ($rowsnum === 1) {
                $result_row = mysqli_fetch_assoc($result_of_sql_select);

                if (isset($result_row['ibusername']) && isset($result_row['ibpassword']) && isset($result_row['ibverified'])) {
                    $ibusername = decryptIB(stripslashes($result_row['ibusername']));
                    $ibpassword = decryptIB(stripslashes($result_row['ibpassword']));
                    $ibverified = $result_row['ibverified'];

                    $ibaccountdata = array(
                        "ibusername" => $ibusername,
                        "ibpassword" => $ibpassword,
                        "ibverified" => $ibverified,
                    );
                }
            }
        }
        
        mysqli_close($mysqli);
        
    } catch (Exception $e) {

        $ibaccountdata = false;
    }

    return $ibaccountdata;
}

?>