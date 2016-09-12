<?php
		require_once('config.php');
		require_once('library/mobileDetect/Mobile_Detect.php');
		
		$option=array();
		$detect=new Mobile_Detect();
		
		$option['parallax']['enable']=(int)PARALLAX_ENABLE;
		$option['animation']['enable']=(int)WAYPOINT_ANIMATION_ENABLE;
		
		if($detect->isMobile())
		{
			$option['parallax']['enable']=(int)PARALLAX_MOBILE_ENABLE;
			$option['animation']['enable']=(int)WAYPOINT_ANIMATION_TABLET_ENABLE;
		}
		elseif($detect->isTablet())
		{
			$option['parallax']['enable']=(int)PARALLAX_TABLET_ENABLE;
			$option['animation']['enable']=(int)WAYPOINT_ANIMATION_MOBILE_ENABLE;
		}
		
		$option['googleMap']['coordinates_lat']=GOOGLE_MAPS_COORDINATES_LAT;
		$option['googleMap']['coordinates_lng']=GOOGLE_MAPS_COORDINATES_LNG;	
?>