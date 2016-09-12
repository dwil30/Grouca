<?php
session_start();
?>
<?php include 'header.php'; ?>
    <div class="w-container">
        <div class="personal_section">
    <div class="w-row">
      <div class="w-col w-col-6">
        <h1 class="below-image sales">We have made it even easier for you to subscribe to Grouca, we’ve deeply discounted the already-low subscription price for a limited time. That’s 50% off our standard price.</h1>
          <h1 class="below-text">No commitments. Cancel at any time.</h1>
      </div>
      <div class="w-col w-col-6 left">
        <div class="w-container right-container">
          <div>
            <div id="servicesform">
               <?php echo isset($errors) ? '<div class="errors">'.$errors.'</div>': '';?>
                <h1 class="below-image CC">Grouca Trade Intelligence Utility</h1>
                 <h1 class="below-text CC">*Discount Pricing*</h1>

                <h1 class="below-image CC" style="color:red;"><br>Thank you! Payment successfully processed. <br>You may now access the <a href="services.php">Services page</a></h1>.
                <?php 
                    include("base.php");
                    $update = "UPDATE users SET AccountType = 'Paid' WHERE user_email ='".$_SESSION['UserName']."';";
                    $execute = mysql_query($update);
                    $_SESSION['Account'] = 'Paid';
                    $email = $_SESSION['UserName'];
                    include 'send-upgrade.php';
                ?>
                </div>
              </div>
            </div>
          </div>
      </div>
    
           <br>   <p style="text-align: left;"><b>YOUR SUBSCRIPTION INCLUDES:</b><br>
Daily notification alerts containing the new option trade idea our utility has generate after evaluating the stocks that provides the highest statistical chances of success based on price momentum, fundamentals and option strategy. Full access to all our current and future high probability trades. Included with each trade you will get an option strategy, underling stock name and price, detailed instructions on how to place the order, what entry prices to use, target gain and risk profile. Full access to the Adjustment Manager, Groucas intelligent tool for instructions on when to book a profit, how to leverage current gains higher, how to adjust trades to minimize risk and how to reverse losing positions to break even or back to gain status.
<br><br>
            <b>INFORMATION:</b><br>
All credit card charges will appear under the name Labtrade, LLC. Maurice Lichten, the Managing Director may have a financial interest in some or all of Grouca's recommendations as he trades on the same equities and options that are recommended.
<br><br>
            <p style="text-align: left;"><b>SATISFACTION GUARANTEED!</b><br>
            If for any reason you are not 100% satisfied with Grouca's Performance, simply notify us using our Contact Us page. At Grouca, there are no long-term commitments. Monthly subscriptions are month to month and can be cancelled at any time. Annual subscriptions can also be cancelled at any time and you will receive a prorated refund based on the monthly rate for months unused.  <br><br>
        

<b>RISK DISCLOSURE:</b> <br>
Past performance is not necessarily indicative of future results. All of the content on our website and in our email alerts is for informational purposes only, and should not be construed as an offer, or solicitation of an offer, to buy or sell securities. Grouca is not registered or regulated as a broker-dealer. Remember, you should always consult with a licensed securities professional before purchasing or selling securities of companies profiled or discussed on Grouca.com or in our service alerts.</p>
            </div>
          </div>
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
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>