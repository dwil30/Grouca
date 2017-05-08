		<!-- <link rel="stylesheet" type="text/css" href="style/superfish.css"/>  -->
		<!-- <link rel="stylesheet" type="text/css" href="style/nivo-slider.css"/>  -->
		<!-- <link rel="stylesheet" type="text/css" href="style/jquery.qtip.min.css"/>  -->
		<!-- <link rel="stylesheet" type="text/css" href="style/jquery-ui/jquery-ui.css"/>  -->
		<!-- <link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css"/>  -->
		<!-- <link rel="stylesheet" type="text/css" href="style/fancybox/helpers/jquery.fancybox-buttons.css"/>  -->

		<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed') === false): ?>
	        <script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-71438801-1', 'auto');
			  ga('send', 'pageview');

			  jQuery(function(){
			  	var target = window.location.hash
			  	setTimeout(function(){
			  		jQuery(document).scrollTop(jQuery(target).offset().top);
			  	}, 500);
			  	

			  })

			</script>
		<?php endif; ?>
		
		<link rel="stylesheet" type="text/css" href="style/style.css"/> 
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic"/>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic"/>
		
		<style type="text/css" media="screen and (max-width:959px)">
			#respond,
			#comments
			{
				margin-left:0px;
			}
		</style>

		<style type="text/css" media="screen and (max-width:767px)">
						
			.layout-p-100>.column-left,
			.layout-p-50x50>.column-left,
			.layout-p-50x50>.column-right,	
			.layout-p-33x33x33>.column-left,
			.layout-p-33x33x33>.column-right,
			.layout-p-33x33x33>.column-center,
			.layout-p-25x25x25x25>.column-left,
			.layout-p-25x25x25x25>.column-center-left,
			.layout-p-25x25x25x25>.column-center-right,
			.layout-p-25x25x25x25>.column-right,
			.layout-p-20x20x20x20x20>.column-left,
			.layout-p-20x20x20x20x20>.column-center-left,
			.layout-p-20x20x20x20x20>.column-center,
			.layout-p-20x20x20x20x20>.column-center-right,
			.layout-p-20x20x20x20x20>.column-right,
			.layout-p-66x33>.column-left,
			.layout-p-66x33>.column-right,
			.layout-p-33x66>.column-left,
			.layout-p-33x66>.column-right
			{
				clear:both;
				float:none;
				width:100%;
			}

			#navigation-bar div.logo
			{
				padding-top:10px;
				padding-bottom:10px;
			}

			#navigation-bar #menu
			{
				display:none;
			}

			#navigation-bar #menu-responsive
			{
				display:block;
			}
		</style>

		<style type="text/css" media="screen and (min-width:480px) and (max-width:959px)">
			ul.post-list.post-list-1 li div.post-list-image
			{
				float:none;
				margin-left:80px;
			}
				
			ul.post-list.post-list-1 li div.post-list-content
			{
				float:none;
				clear:both;
				min-height:0;
				margin-left:80px;
			}
		</style>

		<style type="text/css" media="screen and (min-width:768px) and (max-width:959px)">
						
			h1,h1 a	{	font-size:55px;	}
			h2,h2 a	{	font-size:52px;	}
			h3,h3 a	{	font-size:35px;	}
			h4,h4 a	{	font-size:24px;	}
			h5,h5 a	{	font-size:20px;	}
			h6,h6 a	{	font-size:18px;	}

			.main
			{
				width:750px;
			}

			#navigation-bar #menu ul li a
			{
				padding-left:10px;
				padding-right:10px;
			}

			div.home-carousel-title-box>.main>a>span
			{
				padding:40px;
			}

			div.home-carousel-title-box>div.main>a>span>span
			{
				font-size:55px;
			}

			div.home-carousel-title-box>div.main>a>span>span+span
			{
				font-size:20px;
			}

			div.post-date-box h3,
			div.post-date-box h4,
			div.post-comment-count-box h3,
			div.post-comment-count-box h4
			{
				padding-top: 12px;
			}

			ul.post-list.post-list-1 li div.post-list-image
			{
				width:670px;
			}

			ul.post-list.post-list-1 li div.post-list-content
			{
				width:670px;
			}

			ul.info-list li h2 span
			{
				font-size:100px;
			}
		</style>

		<style type="text/css" media="screen and (min-width:480px) and (max-width:767px)">
						
			h1,h1 a	{	font-size:55px;	}
			h2,h2 a	{	font-size:52px;	}
			h3,h3 a	{	font-size:35px;	}
			h4,h4 a	{	font-size:24px;	}
			h5,h5 a	{	font-size:20px;	}
			h6,h6 a	{	font-size:18px;	}

			.main
			{
				width:460px;
			}

			div.home-carousel-bar
			{
				top:20px;
			}

			div.home-carousel-title-box>div.main>a>span
			{
				padding:25px;
				border-width:4px;
			}

			div.home-carousel-title-box>div.main>a>span>span
			{
				font-size:36px;
			}

			div.home-carousel-title-box>div.main>a>span>span+span
			{
				font-size:15px;
				margin-top:15px;
			}

			div.home-carousel-pagination
			{
				bottom:30px;
			}

			div.post-date-box h3,
			div.post-date-box h4,
			div.post-comment-count-box h3,
			div.post-comment-count-box h4
			{
				padding-top: 12px;
			}

			ul.post-list.post-list-1 li div.post-list-image
			{
				width:380px;
			}


			ul.post-list.post-list-1 li div.post-list-content
			{
				width:380px;
			}


			ul.info-list li h2 span
			{
				font-size:100px;
			}
		</style>

		<style type="text/css" media="screen and (max-width:479px)">
			
			h1,h1 a	{	font-size:42px;	}
			h2,h2 a	{	font-size:34px; font-weight:300;	}
			h3,h3 a	{	font-size:30px;	}
			h4,h4 a	{	font-size:22px;	}
			h5,h5 a	{	font-size:20px;	}
			h6,h6 a	{	font-size:18px;	}

			.main
			{
				width:300px;
			}

			#navigation-bar div.logo
			{
				float:none;
			}

			#navigation-bar div.logo a
			{
				text-align:center;
			}

			#navigation-bar #menu-responsive
			{
				width:100%;
				float:none;
				clear:both;
				padding-top:0px;
				padding-bottom:15px;
			}

			#navigation-bar #menu-responsive>select
			{

			}

			div.home-carousel-bar
			{
				display:none;
			}

			div.home-carousel-title-box
			{
				top:15%;
			}

			div.home-carousel-title-box>div.main>a>span
			{
				padding:15px;
				border-width:2px;
			}

			div.home-carousel-title-box>div.main>a>span>span
			{
				font-size:24px;
			}

			div.home-carousel-title-box>div.main>a>span>span+span
			{
				font-size:15px;
				margin-top:10px;
			}

			div.home-carousel-pagination
			{
				bottom:20px;
			}

			p.subheader
			{
				font-size:16px;
			}

			ul.quotation-list li span.quotation-list-text
			{
				font-size:18px;
			}

			a.button-browse
			{
				font-size: 22px;
			}

			div.post-date-box h3,
			div.post-date-box h4,
			div.post-comment-count-box h3,
			div.post-comment-count-box h4
			{
				padding-top:14px;
			}

			div.post div.post-list-image,
			div.post div.post-list-content,
			ul.post-list li div.post-list-image,
			ul.post-list li div.post-list-content,
			ul.post-list.post-list-1 li div.post-list-image,
			ul.post-list.post-list-1 li div.post-list-content,
			ul.post-list.post-list-2 li div.post-list-image,
			ul.post-list.post-list-2 li div.post-list-content
			{
				float:none;
				clear:both;
				width:300px;
				margin-left:0px;
			}

			div.post div.post-list-image,
			ul.post-list li div.post-list-image
			{
				overflow:visible;
			}

			div.post div.post-list-image div.post-comment-count-box,
			ul.post-list li div.post-list-image div.post-comment-count-box
			{
				top:-80px;
				left:80px;
			}

			#comments #comments-list ul li
			{
				position:relative;
				margin-bottom:50px;
			}

			#comments #comments-list ul ul,
			#comments #comments-list ul li div.comment-content
			{
				margin-left:0px;
			}

			#comments #comments-list ul li div.comment-avatar
			{
				display:none
			}

			#comments #comments-list ul li a.comment-reply-link
			{
				top:100%;
				float:none;
				width:100%;
				text-align:right;
				position:absolute;
			}

			#comments #comments-list ul li div.comment-content
			{
				min-height:none;
			}

			#comments #comments-list ul li div.comment-content>div
			{
				padding:10px;
			}

			ul.info-list li h2 span
			{
				font-size:72px;
			}
		</style>

		<script defer type="text/javascript" src="script/script.js"></script>
		<script defer type="text/javascript" src="script/superfish.js"></script>
		<script defer type="text/javascript" src="script/jquery.easing.js"></script>
		<script defer type="text/javascript" src="script/jquery-ui.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.blockUI.js"></script>
		<script defer type="text/javascript" src="script/jquery.timeago.js"></script>
		<script defer type="text/javascript" src="script/jquery.qtip.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.parallax.js"></script>
		<script defer type="text/javascript" src="script/jquery.ba-bbq.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.actual.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.isotope.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.linkify.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.scrollTo.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.waypoints.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.touchSwipe.min.js"></script>	
		<script defer type="text/javascript" src="script/jquery.elastic.source.js"></script>
		<script defer type="text/javascript" src="script/jquery.infieldlabel.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.nivo.slider.pack.js"></script>	
		<script defer type="text/javascript" src="script/jquery.waypoints-sticky.js"></script>
		<script defer type="text/javascript" src="script/jquery.carouFredSel.packed.js"></script>	
		
		<script defer type="text/javascript" src="script/jquery.fancybox.js"></script>	
		<script defer type="text/javascript" src="script/jquery.fancybox-media.js"></script>	
		<script defer type="text/javascript" src="script/jquery.fancybox-buttons.js"></script>	
		
		<script defer type="text/javascript" src="plugin/contact-form/contact-form.js"></script>
		<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed') === false): ?>
		<script defer type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>   
		<?php endif; ?>
		<script defer type="text/javascript" src="script/template.class.js"></script>
		<script defer type="text/javascript" src="script/main.js"></script>