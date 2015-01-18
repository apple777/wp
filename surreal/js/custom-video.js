/*-------------------------------------------------------------------------

	Theme Name: Surreal Studio
	
-------------------------------------------------------------------------*/

jQuery(document).ready(function () {
	/*vars used throughout*/
	var wh,
		scrollSpeed = 1000,
		parallaxSpeedFactor = 0.6,
		scrollEase = 'easeOutExpo',
		targetSection,
		sectionLink = 'a.navigateTo',
	 	section = jQuery('.section');


//INIT --------------------------------------------------------------------------------/
	if (isMobile == true) {
		jQuery('.header').addClass('mobileHeader');	//add mobile header class
		jQuery('body').addClass('touch-device');
	} else {
		jQuery('.page').addClass('desktop');
		jQuery('.parallax').addClass('fixed-desktop');
	}


//MENU --------------------------------------------------------------------------------/
	jQuery(".menu a").click(function () {
        jQuery("html, body").animate({
            scrollTop: jQuery(jQuery(this).attr("href")).offset().top + "px"
        }, {
            duration: 1000,
            easing: "swing"
        });
        return false;
    });


//PARALLAX ----------------------------------------------------------------------------/
	jQuery(window).bind('load', function () {
		parallaxInit();						  
	});

	function parallaxInit() {
		if (isMobile == true) return false;
		jQuery('.parallax').each( function() {
			jQuery( this ).parallax();
		});
		/*add as necessary*/
	}


//HOMEPAGE SPECIFIC -----------------------------------------------------------------/
	function sliderHeight() {
		wh = jQuery(window).height();
		jQuery('#homepage').css({height: wh});
	}
	sliderHeight();


//	Accordion  ------------------------------------------------------------------------/

	(function () {

		var $container = jQuery('.accContainer'),
			$trigger   = jQuery('.accTrigger');
			fullWidth = $container.outerWidth(true);

		$container.hide();
		$trigger.first().addClass('active').next().show();

		$trigger.css('width', fullWidth - 2);
		$container.css('width', fullWidth - 2);

		$trigger.on('click', function (e) {
			if (jQuery(this).next().is(':hidden') ) {
			$trigger.removeClass('active').next().slideUp(300);
			jQuery(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		jQuery(window).on('resize', function () {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width());
			$container.css('width', $container.parent().width());
		});

	})();


//WINDOW EVENTS ---------------------------------------------------------------------/	
	 
	jQuery(window).bind('resize',function () {

		//Update slider height
		sliderHeight();

	});

	jQuery("#bgndVideo").on("YTPStart", function(){ jQuery("#eventListener").html("YTPStart")});
	jQuery("#bgndVideo").on("YTPEnd", function(){ jQuery("#eventListener").html("YTPEnd")});
	jQuery("#bgndVideo").on("YTPPause", function(){ jQuery("#eventListener").html("YTPPause")});
	jQuery("#bgndVideo").on("YTPBuffering", function(){ jQuery("#eventListener").html("YTPBuffering")});

	jQuery("#bgndVideo").mb_YTPlayer();

});