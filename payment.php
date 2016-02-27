<?php

require_once('include/header.php');
?>

		<body>

			<ul class="page-list">


				<li class="page-contact" id="page-contact">
					<?php require_once('page/payment.php'); ?>
				</li>

			</ul>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    function whatCVV2(){
alert("Visa®, Mastercard®, and Discover® cardholders:\nTurn your card over and look at the signature box. You should see either the entire 16-digit credit card number or just the last four digits followed by a special 3-digit code. This 3-digit code is your CVV number / Card Security Code.\n\nAmerican Express® cardholders:\nLook for the 4-digit code printed on the front of your card just above and to the right of your main credit card number. This 4-digit code is your Card Identification Number (CID). The CID is the four-digit code printed just above the Account Number.")
      }
function cancelCREPayment(){
window.location.replace("http://grouca.com/signupforgrouca.php");
}
    
function creHandleErrors(errorCode) {
$("[id^=errorCode]").removeClass("Show");    
var t=errorCode;
var Var = t.split('|');    
    for (index = 0; index < Var.length; ++index) {
         console.log(Var);
        if (Var[index]) {
         document.getElementById("errorCode" + Var[index]).className += " Show";}
    }
}
    
function completeCREPayment(transaction){
window.location.replace("http://grouca.com/success.php");
}
    
function startCREPayment(){
}

</script>
			<?php require_once('include/contact_footer.php'); ?>