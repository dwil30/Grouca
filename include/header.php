<?php
session_start(); 

if((isset($_SESSION['UserName'])) and (isset($_SESSION['LoggedIn'])) and ($_SESSION['LoggedIn'] == 1)){
    
if (!isset($browser)){
    $browser = $_SERVER['HTTP_USER_AGENT'];
}
    
    include("base.php");
    $query = "SELECT * FROM users WHERE user_email = '".$_SESSION['UserName']."';";
    $results = $mysqli->query($query);
    $data = $results->fetch_assoc();
    
    if ($data['Browser'] != $browser){
        session_unset();
        session_destroy();
        header("location:index.php");
        exit();  
    }
}

require_once('process.php');
//error_reporting(E_ALL);ini_set('display_errors', 1); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>

		<title>Grouca | Leading provider of options trading strategies</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="format-detection" content="telephone=no"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="shortcut icon" type="image/x-icon" href="favicons/favicon-32x32.png">
		<link rel="apple-touch-icon" href="favicons/apple-touch-icon-180x180.png">
		
		<script defer type="text/javascript" src="script/jquery.min.js"></script>
		<script defer type="text/javascript" src="script/jquery.migrate.min.js"></script>
		
		<script type="text/javascript">
			<?php echo 'var optionTemplate='.json_encode($option).';'; ?>
		</script>
		<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed') === false): ?>
	        <script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-71438801-1', 'auto');
			  ga('send', 'pageview');

			  $(function(){
			  	var target = window.location.hash
			  	setTimeout(function(){
			  		$(document).scrollTop($(target).offset().top);
			  	}, 500);
			  	

			  })

			</script>
		<?php endif; ?>

		<style type="text/css">
			.sf-menu, .sf-menu *{ margin: 0px; padding: 0px; list-style: none; } .sf-menu li{ position: relative; }  .sf-menu > li{ float: left; }  .sf-menu a{ display: block; position: relative; }  .sf-menu{ float: left; margin-bottom: 1em; }  .sf-menu a{ border-left: 1px solid rgb(255, 255, 255); border-top: 1px solid rgba(255, 255, 255, 0.5); padding: 0.75em 1em; text-decoration: none; zoom: 1; } .sf-menu a{ color: rgb(17, 51, 170); } .sf-menu li{ background: rgb(189, 210, 255); white-space: nowrap; transition: background 0.2s; } html, body, div, span, h2, p, a, img, i, ul, li, form{ border: 0px; margin: 0px; padding: 0px; font-size: 100%; vertical-align: baseline; }  .desktop{ display: block; } body{ margin: 0px; padding: 0px; } body, input, textarea{ color: rgb(195, 195, 195); font-size: 16px; }  a, textarea, input{ outline: none; } p{ line-height: 150%; padding: 10px 0px; } br{ clear: both; height: 10px; display: block; } img{ height: auto; max-width: 100%; } a{ text-decoration: none; color: deepskyblue; }                                      .padding-bottom-30{ padding-bottom: 30px !important; }       .layout-p-50x50 > .column-left{ overflow: hidden; margin-bottom: 30px; }   .layout-p-50x50{ } .layout-p-50x50 > .column-left{ clear: both; float: left; }  .layout-p-50x50 > .column-left{ width: 48.4848%; }             div.column-left{ width: 22.7272%; }               h2{ color: rgb(72, 76, 84); }  ul.page-list > li.page-services p.subheader{ color: rgb(185, 184, 183); } ul.pricing-list > li > div > h2{ color: rgb(21, 163, 70); } form input, form textarea, div.section-background, div.section-background *, #navigation-bar #menu ul li a{ color: rgb(255, 255, 255); }    #navigation-bar #menu-responsive > select{ color: rgb(136, 136, 136); }   form, h2.underline > span + span, #navigation-bar{ background-color: rgb(21, 163, 70); }    .field-box, #navigation-bar #menu #menu-selected{ background-color: rgb(19, 150, 65); }           #navigation-bar #menu > ul > li > a > span{ border-color: rgb(19, 150, 65); }     body, input, textarea{ font-family: "Source Sans Pro"; } p.subheader{ font-family: "Droid Serif"; }  h2{ margin: 0px; padding: 0px; font-weight: 400; line-height: 130%; }  h2{ text-transform: uppercase; }  h2{ font-size: 60px; font-weight: 200; margin-bottom: 80px; }     h2.underline{ margin-top: 70px; } h2.underline{ text-align: center; } h2.underline > span + span{ height: 4px; width: 100px; display: block; margin-top: 10px; margin-left: auto; margin-right: auto; }    .main{ width: 960px; margin-left: auto; margin-right: auto; } ul.page-list{ margin: 0px; padding: 0px; list-style-type: none; } ul.page-list > li{ padding: 80px 0px 0px; } @media screen and (max-width: 600px){  ul.page-list > li{ padding: 0px; } } ul.page-list > li.page-home{ padding: 0px; } ul.page-list > li.page-about{ }         div.section-background{ margin-top: 80px; padding: 60px 0px 80px; background-position: 50% 50%; background-repeat: no-repeat; }     div.section-background-4{ margin-top: 40px; background-image: url("../_sample/home_carousel/image_02.jpg"); }    #navigation-bar{ opacity: 1; margin-top: 0px; }  #navigation-bar div.logo{ float: left; padding-top: 25px; } #navigation-bar div.logo a{ display: block; } #navigation-bar #menu{ float: right; position: relative; } #navigation-bar #menu ul{ margin: 0px; padding: 0px; list-style-type: none; } #navigation-bar #menu ul li{ border: none; background: none; } #navigation-bar #menu > ul > li{ float: left; } #navigation-bar #menu ul li a{ border: none; } #navigation-bar #menu > ul > li > a{ z-index: 2; display: block; font-size: 15px; position: relative; text-transform: uppercase; padding: 40px 20px; }  #navigation-bar #menu > ul > li > a > span{ width: 0px; top: 2px; left: 55%; height: 0px; display: block; position: relative; border-style: solid; border-width: 0px 0px 3px; }  #navigation-bar #menu > ul > li > a > span{ transition: all 0.3s ease-in-out; }    #navigation-bar #menu #menu-selected{ top: 0px; left: 0px; width: 0px; z-index: 1; height: 100%; position: absolute; } #navigation-bar  #navigation-bar #menu-responsive > select{ width: 100%; border: none; padding: 10px; cursor: pointer; font-size: 12px; text-transform: uppercase; } .nivo-slider-box{ position: relative; }  p.subheader{ font-size: 20px; }         div.home-carousel-title-box, div.home-carousel-title-box span{ display: block; text-align: center; } div.home-carousel-title-box{ top: 33%; left: 50%; position: absolute; } div.home-carousel-title-box > .main{ margin-left: -50%; position: relative; }    div.home-carousel-title-box > .main > div > span{ padding: 50px; border-width: 6px; border-style: solid; }  div.home-carousel-title-box > .main > div > span > span{ line-height: 1; }  div.home-carousel-title-box > .main > div > span > span{ font-size: 68px; font-weight: 700; text-transform: uppercase; }                       ul.pricing-list > li > div > h2{ font-weight: 700; margin-top: 20px; margin-bottom: 0px; }                                 form{ width: 100%; } form, input, select, textarea{ margin: 0px; padding: 0px; }     form .block{ display: block; } form .field-box{ padding: 15px; }   form input, form textarea{ width: 100%; border: none; background: transparent; } form textarea{ height: 150px; resize: none; display: block; } form input[type="submit"]{ padding: 15px; cursor: pointer; font-size: 16px; text-transform: uppercase; } div.section-background.section-background-4{ margin-top: 0px; background-position: 50% 0%; position: relative; height: 600px; background-size: cover; background-image: url("../_sample/home_carousel/image_02.jpg"); } ul.feature-list.feature-list-icon-medium.feature-list-icon-left li p{ margin-left: 100px; } @media screen and (max-width: 600px){ .subheader.padding-bottom-30{ font-size: 21px; } }  @media screen and (max-width: 600px){ .page-about{ padding-top: 16px !important; } h2.underline{ margin-bottom: 15px; padding-top: 50px; padding-bottom: 10px !important; } .column-left{ margin-bottom: 0px !important; } textarea#message.w-input.msg-text{ height: 115px !important; } }    @media screen and (max-width: 600px){ div.home-carousel-title-box{ top: 50%; }  div.home-carousel-title-box > .main > div > span{ border-width: 3px !important; } }  @media (max-width: 767px){ div.home-carousel-title-box > .main > div > span{ padding: 25px; } div.home-carousel-title-box > .main > div > span > span{ font-size: 50px; } } @media (max-width: 479px){ div.home-carousel-title-box > .main > div > span > span{ font-size: 30px; } div.home-carousel-title-box > .main > div > span{ padding: 10px; } #videoForm{ width: auto !important; } div.section-background.section-background-4{ height: 300px; } form input[type="submit"]{ border-radius: 0px !important; } ul.feature-list.feature-list-icon-medium.feature-list-icon-left li p{ margin-left: 0px; } } p.subheader{ color: white; }         .layout-p-50x50 > .column-left{ clear: both; float: none; width: 100%; } #navigation-bar div.logo{ padding-top: 10px; padding-bottom: 10px; } #navigation-bar #menu-responsive{ display: block; }      h2{ font-size: 52px; }     .main{ width: 750px; } #navigation-bar #menu ul li a{ padding-left: 10px; padding-right: 10px; }          h2{ font-size: 52px; }     .main{ width: 460px; }            h2{ font-size: 34px; font-weight: 300; }     .main{ width: 300px; } #navigation-bar div.logo{ float: none; } #navigation-bar div.logo a{ text-align: center; } #navigation-bar #menu-responsive{ width: 100%; float: none; clear: both; padding-top: 0px; padding-bottom: 15px; } #navigation-bar #menu-responsive > select{ }  div.home-carousel-title-box{ top: 15%; }     p.subheader{ font-size: 16px; } 
			ul.page-list>li {
    padding: 80px 0px 0px 0px;
}
		</style>
	</head>