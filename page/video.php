<?php require_once('include/navigation_bar.php'); ?>

		<div class="section-background-color section-background-color-2">
		
			<div class="main" style="text-align:center;">

				<!-- Header -->
				<h2 class="underline">
					<span>Training Video</span>
					<span></span>
				</h2>
				<!-- /Header -->
                
                <style>
                .videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper video {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
                    video {
  width: 100%    !important;
  height: auto   !important;
}
video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Adjust as needed */
}
                    video {
                        margin-bottom:45px;margin-top:10px;
                    }
                </style>
                
<span style="display:block">Using Grouca</span> 
                <div class="videoWrapper">
<video src="videos/UsingGrouca.mp4" controls style="width:700px;"></video></div>
                
    
   
        <span style="display:block">Price Rules</span>   
    <div class="videoWrapper">
        <video src="videos/Bidding.mp4" controls style="width:700px;"></video>
                </div>
                
<span style="display:block">Connecting</span>       
                    <div class="videoWrapper">
<video src="videos/Connecting.mp4" controls style="width:700px;"></video> </div>             
              
		</div>
</body>