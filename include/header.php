<?php 
session_start(); 
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
		
		<link rel="stylesheet" type="text/css" href="style/superfish.css"/> 
		<link rel="stylesheet" type="text/css" href="style/nivo-slider.css"/> 
		<link rel="stylesheet" type="text/css" href="style/jquery.qtip.min.css"/> 
		<link rel="stylesheet" type="text/css" href="style/jquery-ui/jquery-ui.css"/> 
		<link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css"/> 
		<link rel="stylesheet" type="text/css" href="style/fancybox/helpers/jquery.fancybox-buttons.css"/> 
		
		<link rel="stylesheet" type="text/css" href="style/style.css"/> 
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic"/>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic"/>
		
		<link rel="stylesheet" type="text/css" media="screen and (max-width:959px)" href="style/responsive/width-0-959.css"/>
		<link rel="stylesheet" type="text/css" media="screen and (max-width:767px)" href="style/responsive/width-0-767.css"/>
		
		<link rel="stylesheet" type="text/css" media="screen and (min-width:480px) and (max-width:959px)" href="style/responsive/width-480-959.css"/>
		<link rel="stylesheet" type="text/css" media="screen and (min-width:768px) and (max-width:959px)" href="style/responsive/width-768-959.css"/>
		<link rel="stylesheet" type="text/css" media="screen and (min-width:480px) and (max-width:767px)" href="style/responsive/width-480-767.css"/>
		<link rel="stylesheet" type="text/css" media="screen and (max-width:479px)" href="style/responsive/width-0-479.css"/>

 <link rel="shortcut icon" type="image/x-icon" href="favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" href="favicons/apple-touch-icon-180x180.png">
		
		<script type="text/javascript" src="script/jquery.min.js"></script>
		<script type="text/javascript" src="script/jquery.migrate.min.js"></script>
		
		<script type="text/javascript">
			<?php echo 'var optionTemplate='.json_encode($option).';'; ?>
		</script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71438801-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>