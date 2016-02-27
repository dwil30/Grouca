<?php
/*
 * You need to have an SSL certificate installed on your domain to submit
 * transaction in a production setting. The forceHTTPS function will 
 * redirect the user to an SSL enabled page. Typically you will want to
 * de-activate this function in a local environment.
 * 
 */
//forceHTTPS();

$test_mode = false;

if ($_POST) {

    $values = $_POST;

    $values['card_number'] = preg_replace('/[^0-9]/', '', $values['card_number']);
    $values['amount'] = preg_replace('/[^\d\.]/', '', $values['amount']);

    $validate_request = validate($values);

    if ($validate_request === true) {

        require_once(dirname(__FILE__).'/../lib/ChasePaymentech.php');

        /*
         * These can also be passed into the constructor:
         * ChasePaymentech_NewOrder($username, $password, $merchant_id);
         * 
         */
        define('CHASEPAYMENTECH_USERNAME', 'username_here');
        define('CHASEPAYMENTECH_PASSWORD', 'password_here');
        define('CHASEPAYMENTECH_MERCHANT_ID', 'merchant_id_here');

        $test_mode = false;

        /****************************************************/

        $errors = array();
        $billed = false;

        $order_id = time();

        $fields = array(
            'AccountNum' => $values['card_number'],
            'Exp' => date('my',strtotime($values['expire_year'] . '-' .$values['expire_month'] . '-01')), //0113
            'CurrencyCode' => 840, //840: USD, 124: CAD
            'CurrencyExponent' => 2,
            'CardSecVal' => $values['ccv_number'],
            'Amount' => number_format($values['amount'], 2, '', ''), //Chase expects $1.00 to be 100
            'AVSzip' => $values['zip'],
            'AVSaddress1' => $values['address'],
            'AVScity' => $values['city'],
            'AVScountryCode' => (in_array($values['country'], array('US', 'CA', 'GB', 'UK'))) ? 'US' : ' ', //Chase only expects a country code for the 4 countries in the array
            'AVSname' => $values['name'],
            'OrderID' => $order_id// Set your own custom Order ID, up to 22 characters in length the first 8 need to be unique.
        );
        
        /*
         * State must be in two character abbreviated format:
         * 
         * Arizona = AZ
         * Texas = TX
         * 
         * etc...
         * 
         */
        if (isset($values['state']) && !empty($values['state'])) {
            $fields['AVSstate'] = substr($values['state'], 0, 2);
        }

        $sale = new ChasePaymentech_NewOrder;
        $sale->setTestMode($test_mode);
        $sale->setLogFile('transaction-log.txt');
        $sale->setLogRequests($logging = true, $force = true);
        $sale->setFields($fields);

        $response = $sale->authorizeAndCapture();

        //echo $sale->getPostString();
        //print_r($response);
        
        if ($response->approved == true) {
            $billed = true;
            $returned_approval = "Thank you for your purchase!  Click here to visit your <a href=\"members/index.php\">Member Area</a> and access the tools now available to you.";
        } else if ($response->declined == true) {
            $billed = false;
            $errors[] = array('error' => 'Your card was declined while processing your payment. Please contact us for support or try again.');
        } else {
            $billed = false;
            $errors[] = array('error' => 'An error occurred while processing your payment with the merchant processor.');
        }
    } else {

        $errors = $validate_request;
    }

    /*
     * At this point, you can check the $billed variable for true/false
     * 
     * If there were any errors when validating the request, or with the
     * request sent to Chase, you will have errors in the $error array.
     * 
     * $errors = array(
     *   array('field' => 'field-name', 'error' => 'This is the error message.'),
     *   array('error' => 'This is a returned error from the processor')
     * );
     * 
     */
}

/**
 * validate
 * 
 * Method returns true on valid form post, an array of errors will return
 * otherwise.
 * 
 * @return mixed
 * 
 */
function validate($values) {

    $errors = array();

    $required = array(
        'amount',
        'name',
        'address',
        'city',
        'zip',
        'card_number',
        'expire_month',
        'expire_year',
        'ccv_number'
    );

    /*
     * Loop through required fields and make sure they are
     * set and not empty.
     * 
     */
    foreach ($required as $r) {
        if (!isset($values[$r]) || empty($values[$r])) {
            $errors[] = array(
                'field' => $r,
                'error' => 'The ' . ucwords(str_replace('-', ' ', $r)) . ' field is required.'
            );
        }
    }

    if (!isset($values['state']) || empty($values['state'])) {
        $errors[] = array(
            'field' => 'state',
            'error' => 'Please select a state.'
        );
    }

    if (!is_email($values['email'])) {
        $errors[] = array(
            'field' => 'email',
            'error' => 'The email address you entered is not valid.'
        );
    }

    /*
     * Validate the amount is greater than $0.00
     * 
     */
    if (isset($values['amount'])) {

        $values['amount'] = preg_replace('/[^\d\.]/', '', $values['amount']);

        if ($values['amount'] < 1.00) {
            $errors[] = array(
                'field' => 'amount',
                'error' => 'The amount you entered is invalid.'
            );
        }
    }

    /*
     * Validate credit card expiration
     * 
     */
    if (isset($values['expire_month']) && isset($values['expire_year'])) {

        if (strtotime($values['expire_year'] . '-' . $values['expire_month'] . '-15') < strtotime(date('Y-m-01'))) {
            $errors[] = array(
                'field' => 'expire_month',
                'error' => 'Invalid expiration date. Your card has expired.'
            );
        }
    }

    if (isset($values['ccv_number'])) {
        if (!is_numeric($values['ccv_number'])) {
            $errors[] = array(
                'field' => 'ccv_number',
                'error' => 'Invalid Card Security Code.'
            );
        }
    }

    if (count($errors) > 0) {
        return $errors;
    }


    return true;
}

/**
 * forceHTTPS
 * 
 * Reloads to https url if page is not loaded as such.
 * 
 */
function forceHTTPS() {
    if ($_SERVER['HTTPS'] != "on") {
        $new_url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        header("Location: $new_url");
        exit;
    }
}

/**
 * 
 * getCreditCardBrand
 * 
 * Returns the card type based on the credit card number
 * 
 * @param type $account_number
 * @return boolean
 * 
 */
function getCreditCardBrand($account_number) {

    if (!empty($account_number)) {

        $account_number = preg_replace('/\D/', '', $account_number);

        $cards = array(
            'Visa' => '^4[0-9]{12}(?:[0-9]{3})?$',
            'MasterCard' => '^5[1-5][0-9]{14}$',
            'Discover' => '^6(?:011|5[0-9]{2})[0-9]{12}$',
            'American Express' => '^3[47][0-9]{13}$',
            'JCB' => '^(?:2131|1800|35\d{3})\d{11}$',
            'Diners Club' => '^3(?:0[0-5]|[68][0-9])[0-9]{11}$'
        );

        foreach ($cards as $type => $match) {
            if (preg_match('/' . $match . '/', $account_number) === 1) {
                return $type;
            }
        }
    }

    return false;
}

?>

<html>
    
    <head>
        <style type="text/css">
            form {width:500px;}
            form span {float:left;margin:5px 0}
            form label {font-weight:bold;}
            form input, form select {float:left;clear:left;}
            form span.clear {clear:left;}
            form button {float:left;clear:left;margin:20px 0}
        </style>
    </head>
    
    <body>
        <form id="form-checkout" name="checkout" method="POST">
            <span>
                <label for="name">Full Name</label>
                <input name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            </span>
            <span class="clear">
                <label for="address">Address</label>
                <input name="address" type="text" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
            </span>
            <span class="clear">
                <label for="city">City</label>
                <input name="city" type="text" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>">
            </span>
            <span>
                <label for="state">State</label>
                <input name="state" maxlength="2" type="text" value="<?php echo isset($_POST['state']) ? $_POST['state'] : ''; ?>">
            </span>
            <span class="clear">
                <label for="zip">Zip</label>
                <input name="zip" type="text" value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : ''; ?>">
            </span>
            <span>
                <label for="country">Country</label>
                <select name="country">
                    <option value="CA" <?php echo (isset($_POST['country']) && $_POST['country'] == 'CA') ? 'selected="selected"' : ''; ?>>Canada</option>
                    <option value="US" <?php echo (isset($_POST['country']) && $_POST['country'] == 'US') ? 'selected="selected"' : ''; ?>>United States</option>
                </select>
            </span>
            <span class="clear">
                <label for="amount">Amount</label>
                <input name="amount" type="text" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>">
            </span>
            <span class="clear">
                <label for="card_number">Credit Card Number</label>
                <input name="card_number" type="text" value="<?php echo isset($_POST['card_number']) ? $_POST['card_number'] : ''; ?>">
            </span>
            <span class="clear">
                <label for="ccv_number">CCV</label>
                <input name="ccv_number" type="text" value="<?php echo isset($_POST['ccv_number']) ? $_POST['ccv_number'] : ''; ?>">
            </span>
            <span>
                <label for="expire_month">Month</label>
                <select name="expire_month">
                    <option value="01" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '01') ? 'selected="selected"' : ''; ?>>01</option>
                    <option value="02" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '02') ? 'selected="selected"' : ''; ?>>02</option>
                    <option value="03" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '03') ? 'selected="selected"' : ''; ?>>03</option>
                    <option value="04" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '04') ? 'selected="selected"' : ''; ?>>04</option>
                    <option value="05" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '05') ? 'selected="selected"' : ''; ?>>05</option>
                    <option value="06" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '06') ? 'selected="selected"' : ''; ?>>06</option>
                    <option value="07" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '07') ? 'selected="selected"' : ''; ?>>07</option>
                    <option value="08" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '08') ? 'selected="selected"' : ''; ?>>08</option>
                    <option value="09" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '09') ? 'selected="selected"' : ''; ?>>09</option>
                    <option value="10" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '10') ? 'selected="selected"' : ''; ?>>10</option>
                    <option value="11" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '11') ? 'selected="selected"' : ''; ?>>11</option>
                    <option value="12" <?php echo (isset($_POST['expire_month']) && $_POST['expire_month'] == '12') ? 'selected="selected"' : ''; ?>>12</option>
                </select>
            </span>
            <span>
                <label for="expire_year">Year</label>
                <select name="expire_year">
                    <?php
                    $today = (int) date('Y', time());
                    for ($i = 0; $i < 8; $i++) {
                        ?>
                        <option value="<?php echo $today; ?>" <?php echo (isset($_POST['expire_year']) && $_POST['expire_year'] == $today) ? 'selected="selected"' : ''; ?>><?php echo $today; ?></option>
                        <?php
                        $today++;
                    }
                    ?>
                </select>
            </span>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
