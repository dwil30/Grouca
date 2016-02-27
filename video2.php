<?php
session_start();
include("base.php"); 
function convertD ($date){
return date('n/j/y', strtotime($date));
}
?>
<?php include 'header.php'; ?>
    
<div class="section2" style="background-color:white;">
    <div class="w-container"><br><br>
    <h3 style="margin-top:0px;margin-bottom: 20px;">Grouca Training Video</h3><br> 
        <style>
            .videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
        </style>
 
        <div class="videoWrapper">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/ScMzIvxBSi4" frameborder="0" allowfullscreen></iframe>
            </div>
        <br><br>
    </div>
</div>
    <div>
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
  </div>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
 <script type="text/javascript" src="js/class.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>