// store the hash (DON'T put this code inside the $() function, it has to be executed 
// right away before the browser can start scrolling!
/*
var target = window.location.hash,
    target = target.replace('#', '');

// delete hash so the page won't scroll to it
window.location.hash = "";

*/

$(document).ready(function() 
{

	/**************************************************************************/
	/*	Template options													  */
	/**************************************************************************/
	

	var optionDefault={}
	
	var option=$.extend(optionDefault,optionTemplate);

	/**************************************************************************/
	/*	Template create														  */
	/**************************************************************************/
	
	var template=new Template(option);
	
	template.preloadPage();

	template.createHomeCarousel();

	template.createGoogleMaps('googleMap');
	template.createTwitterUserTimeline('.twitter-user-timeline-list');
	
	template.createMenu();
	template.createMenuResponsive();
	
	template.createStickyNavigationBar();
	
	template.createNavigation();
	
	template.createImageOverlay();
	
	template.createImageFancybox();
	template.createVideoFancybox();
	
	template.createImage();
	template.createGallery();
	
	template.createNivoSlider();
		
	template.createAccordion();
	template.createQuotationCarousel();
	
	template.createForm();
	
	template.createCarousel();

	template.createCarouselPricing();
	
	template.createWaypoints();
	
	template.createPricingList();
	
	template.updateCarouselSize();
	$(window).bind('resize',function() 
	{
		template.updateCarouselSize();
		template.updateWaypoints();
	});
	
	template.createParallax();
	
});


