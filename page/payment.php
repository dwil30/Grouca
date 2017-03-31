<?php 
include("simple-php-captcha.php"); $_SESSION['captcha'] = simple_php_captcha(); ?>
<?php require_once('include/navigation_bar.php'); ?>
		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:left;">

				<!-- Header -->
				<h2 class="underline">
					<span>Payment</span>
					<span></span>
				</h2>
				<!-- /Header -->

				<!-- Layout 50x50% -->
				<div class="layout-p-50x50 clear-fix animate-layout">

					<!-- Left column -->
					<div class="column-left">
					
						<!-- Payment form -->
						            <div id="servicesform" class="contact-form" style="background-color: #15A346;padding:0px 15px 15px 15px;">
                <p class="subheader" style="font-size:30px;margin-top:0px;">Payment Information</p>
                <!-- <h1 class="below-text CC">*Discount Pricing*</h1>-->
<div id="errorCode100" class="noShow">Merchant Identifier left blank or not valid. The transaction was not processed.</div>
            <div id="errorCode110" class="noShow">Session Identifier left blank. The transaction was not processed.</div>
            <div id="errorCode200" class="noShow">Please complete Name Field.</div>
                <style>
                    .noShow {color: red; display: none;}
                    #hpfFrame{
min-height: 700px; 
border: 0;
margin-left: 15px;
margin-top: -11px;
width:100%;
}
                    .hpfLabel
{
	font-family: Georgia;
	font-size: 18px;
	color: #943415;
	padding: 3px;
}
                    label {color:white;}
                      .subphone1{display:none;}
                    @media (max-width: 479px) {
                    .subphone1{display:block;}
                    .subphone2{display:none;}
                    }
                  
                </style>
                <div id="errorCode300" class="noShow">Amount not specified or invalid value entered</div>
                <div id="errorCode310" class="noShow">Invalid credit card number. Please retry.</div>
                <div id="errorCode315" class="noShow">Invalid credit card number. Please retry.</div>
                <div id="errorCode330" class="noShow">Please complete Expiration month.</div>
                <div id="errorCode340" class="noShow">Please complete Expiration year.</div>
                 <div id="errorCode350" class="noShow">CVV2 field submitted but does not match the card.</div>
                 <div id="errorCode355" class="noShow">Please complete CVC/CVV field.</div>
                 <div id="errorCode357" class="noShow">An invalid character was entered, such as a letter in a numeric field.</div>
                 <div id="errorCode360" class="noShow">Payment declined by financial institution, or some other error has occurred.</div>
                 <div id="errorCode370" class="noShow">Expiration date invalid.</div>
                 <div id="errorCode500" class="noShow">Address one field required but left blank.</div>
                 <div id="errorCode510" class="noShow">City field required but left blank.</div>
                 <div id="errorCode520" class="noShow">State field required but left blank.</div>
                <div id="errorCode530" class="noShow">ZIP/postal code field required but left blank.</div>
                <div id="errorCode531" class="noShow">Invalid ZIP/postal code format received.</div>
                <div id="errorCode516" class="noShow">Merchant account is inactive or invalid.</div>
                <div id="errorCode521" class="noShow">Transaction Data is badly formatted.</div>
                <div id="errorCode839" class="noShow">Account number has failed a MOD 10 check and is invalid.</div>
                <div id="errorCode20412" class="noShow">Security information is not configured.</div>
                <div id="errorCode9582" class="noShow">Cannot create profile – Profile ID already exists.</div>
                        
        <?php echo isset($errors) ? '<div class="errors" style="color:red;">'.$errors.'</div>': '';?>
<?php $url = "https://www.chasepaymentechhostedpay.com/hpf/1_1?";
      // $url = "https://www.chasepaymentechhostedpay.com/securepayments/a1/cc_collection.php?";
      // $url = "https://www.chasepaymentechhostedpay-var.com/hpf/1_1?";
      $url .= "hostedSecureID=cpt280695546837&";
      $url .= "hostedSecureAPIToken=314463a4134943a1df89146ca9d34571&";
      //$url .= "hostedSecureID=cpt412581415334SB&";  
      $url .= "callback_url=https://www.grouca.com/Callback.html&";
      $url .= "cancel_url=https://www.grouca.com/signup.php&";
      $url .= "css_url=https://www.grouca.com/css/form.css&";
      $url .= "return_url=https://www.grouca.com/success.php&";
      $url .= "content_template_url=https://www.grouca.com/payment.php&";
      $url .= "action=buildForm&";
if(isset($_SESSION['UserName'])){$url .= "customer_email=".$_SESSION['UserName']."&";}
   //$uniqid = $prefix . uniqid();
   $uniqid = uniqid(rand(), true);
      $url .= "sessionId=".$uniqid."&";
      $url .= "payment_type=Credit_Card&";
      $url .= "formType=1&";
      $url .= "cardIndicators=N&";
      $url .= "max_user_retries=3&";
      $url .= "orderId=".$uniqid."&";
      $url .= "trans_type=auth_capture&";
      $url .= "collectAddress=1&";
      //$url .= "submit=Create payment form&"; 
      $url .= "CRE_Tokenize=store_authorize&";
      $url .= "allowed_types=Visa|MasterCard&";
      $url .= "required=minimum&";
if ($_SESSION['price'] == "1"){$url .= "hosted_tokenize=store_authorize&";}
if (($_SESSION['price'] == "1") or ($_SESSION['price'] == "3")){$url .= "order_desc=monthly&";} else {$url .= "order_desc=yearly&";}
if ($_SESSION['price'] == "1"){$url .= "customerRefNum=".$uniqid."&";}
if ($_SESSION['price'] == "1"){$url .= "amount=79.00";} 
elseif ($_SESSION['price'] == "2"){$url .= "amount=869.00";}
elseif ($_SESSION['price'] == "3"){$url .= "amount=99.00";} 
elseif ($_SESSION['price'] == "4"){$url .= "amount=1189.00";} 
elseif ($_SESSION['price'] == "5"){$url .= "amount=1089.00";}                                         
//else {$url .= "amount=99.00";} 
else {$url .= "amount=1.00";} 

      //$url .= $amount; 
//print_r($url);
echo '<iframe class="iframeStyle" id="hpfFrame" src="'.$url.'"></iframe>';
?>
                </div>
						<!-- /Contact form -->
					 <p class="subheader" style="padding:0px;margin-top:20px;">Your subscription includes:</p>
                        <ul>
                            <li style="margin-top:10px;"><b>Grouca’s High Probability Trade Locator</b><br><br>We’ve developed innovative, data-driven technology that scours the market, then zeroes in on trades that provide the highest statistical chances of success based on price momentum, fundamentals and option strategy.</li>
                            <li style="margin-top:10px;"><b>Full Access: Current & Future High Probability Trades</b><p>Whenever an open trade requires rebalancing or adjusting to get back on trade, you will receive an Adjustment alert from Grouca’s intelligent risk management tool.</p>
<p>Each Adjustment alert tells you:</p>
                                <ul style="list-style-type: disc;padding-left: 20px;">
                                <li>When to book a profit</li>
                                <li>How to leverage current gains higher</li>
                                <li>How to adjust trades to minimize risk</li>
                                <li>How to reverse losing positions to break even or get back to gain status.</li>
                        </ul></li>
                            
                            <li style="margin-top:10px;"><b>Full Access: Adjustment Manager</b><p>Once we identify a new high probability trade, you receive a New Trade alert, complete with a detailed options strategy. When open trades require rebalancing or adjustments, you’ll receive an At Risk or In Trouble alert that outlines how to get back on track.</p><p>Each new trade contains:</p>
                                <ul style="list-style-type: disc;padding-left: 20px;">
                                    <li>Option strategy</li>
                                    <li>Underlying stock name and price</li>
                                    <li>Detailed instructions on how to place the order</li>
                                    <li>What entry price to use</li>
                                    <li>Target gain and risk profile</li>
                                </ul>
                            </li>
                            <li style="margin-top:10px;"><b>An Options Strategy, 100% Modeled for You</b><p>We model the trade or adjustment entirely, so all you have to do is submit them to your broker. Click the submit button included in each alert to send the fully modeled trade to your broker in seconds.</p></li>
                        
					</div>
					<!-- /Left column -->

					<!-- Right column -->
					<div class="column-right">
						
						<p class="subheader" style="padding:0px;">Expertly selected trades, executed in seconds.</p>
                        <p style="padding-bottom:10px;">Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</p>
                        
                        <p class="subheader" style="padding:0px;">No long-term commitment required.</p>
                        <p style="padding-bottom:10px;">Cancel your monthly or annual subscription at any time.</p>
                        
                        <p class="subheader" style="padding:0px;">Cancel your monthly or annual subscription at any time.</p>
                        <p style="padding-bottom:10px;">Trade options like the experts, without the time commitment. Grouca lets you navigate the complex world of options trading with ease, even on the go.</p>
                        
                        <p class="subheader" style="padding:0px;">SATISFACTION GUARANTEED!</p>
                        <p style="padding-bottom:10px;">If, for any reason, you are not 100% satisfied with your Grouca experience, <a href="index.php#contact">please let us know</a>. We value your input and stand behind our guarantee. We’re confident about the performance of the trades we handpick. That’s why we don’t ask you to sign any long-term contracts. Month-to-month subscriptions can be canceled at any time. And so can annual subscriptions. We’re happy to provide a prorated refund, based on the monthly rate, for time used. </p>
                        
                        <p class="subheader" style="padding:0px;"> ADDITIONAL INFO:</p>
                        <p style="padding-bottom:10px;">All credit card charges will appear under the name Labtrade, LLC. Maurice Lichten, Grouca’s Managing Director, may have a financial interest in some or all of Grouca's recommendations as he trades on the same equities and options that are recommended. </p>
                        
                        <p class="subheader" style="padding:0px;">RISK DISCLOSURE: </p>
                        <p style="padding-bottom:10px;">Past performance is not necessarily indicative of future results. Grouca is not registered or regulated as a broker-dealer. Grouca  is a educational site designed to empower option traders. While our trading strategies have performed well for our students in the past, it is not necessarily indicative of future results. All of the content on our website and in our email alerts is for educational and informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts.</p>
					</div>
					<!-- /Right column -->

				</div>
				<!-- /Layout 50x50% -->

			</div>
			
		</div>
</body>