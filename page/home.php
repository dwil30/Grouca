<?php require_once('include/navigation_bar.php'); ?>

<style>
    .submit {
        background-color:#333;
    }
.submit:hover {
background-color:#666;
    }
    
    @media screen and (max-width: 600px) {
    
    div.home-carousel-title-box>.main>div>span {
        
    border-width:3px!important;
    }
}
</style>

<?php 

$a = 0;

if (isset($_POST['submit'])){
    require 'PHPMailer/PHPMailerAutoload.php';
      
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.zoho.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@grouca.com';
    $mail->Password = 'Sergio123!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('support@grouca.com');
    $mail->addReplyTo('support@grouca.com');
    $mail->addAddress('support@grouca.com');
    $mail->isHTML(true);
    $mail->Subject = '[GROUCA] Request for Videos';
    $mail->Body = '<html><body><img src="https://grouca.com/images/blue_without_circle.jpg" alt="Grouca Logo"><br>
                <strong> New Request for Videos</strong><br><br>
                The following email has requested the videos: <b>'.$_POST['email'].'</b>
                </body></html>';
        
    $mail->send();   
    
    $a = 1;
}
?>
<div class="section-background section-background-4">
			
		<div class="home-carousel-title-box" style="width:100%;position: initial;text-align: center;">
							<div class="main" style="margin:auto;">
								<div class="home-carousel-title-box" style="position:relative;margin:auto;left:0%;">
									<span>
										<!-- Title -->
                                        <span>EARN 25% WHILE LEARNING TO TRADE OPTIONS</span>
										<!--<span>Request your free video</span>-->
									
                                         <form id="videoForm" method="POST" action="#" style="width:400px;margin:auto;margin-top:25px;">
                                             
                                             <input type="text" id="email" name="email" class="w-input" placeholder="Email Address..." required style="height: 50px;text-align: center;">
                                             
                                             <input name="submit" class="submit" type="submit" value="Request Your Free Video">
                
                                        </form>
                                        
                                        <span class='message' style="color:red;font-style: italic;font-size:15px;margin-top:20px;font-weight:300;<?php if ($a ==0):?>display:none;<?php else:?> display:block;<?php endif; ?>">Check your email for the video</span>
									</span>
								</div>
							</div>
						</div>
</div>

	