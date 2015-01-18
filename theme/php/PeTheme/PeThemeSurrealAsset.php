<?php

class PeThemeSurrealAsset extends PeThemeAsset  {

	public function __construct(&$master) {
		$this->minifiedJS = "theme/compressed/theme.min.js";
		$this->minifiedCSS = "theme/compressed/theme.min.css";
		parent::__construct($master);
	}

	public function registerAssets() {

		//add_filter("pe_theme_minified_js_deps",array(&$this,"pe_theme_minified_js_deps_filter"));
		//add_filter("pe_theme_flare_css_deps",array(&$this,"pe_theme_flare_css_deps_filter"));

		parent::registerAssets();

		$options =& $this->master->options->all();		

		// override projekktor skin
		//wp_deregister_style("pe_theme_projekktor");
		//$this->addStyle("framework/js/pe.flare/video/theme/style.css",array(),"pe_theme_projekktor");

		if ($this->minifyCSS) {
			$deps = 
				array(
					  "pe_theme_compressed"
					  );
		} else {

			// theme styles
			$this->addStyle("styles/skeleton.css",array(),"pe_theme_surreal_skeleton");
			$this->addStyle("styles/layout.css",array(),"pe_theme_surreal_layout");
			$this->addStyle("styles/white.css",array(),"pe_theme_surreal_layout_white");
			//$this->addStyle("styles/layout-video.css",array(),"pe_theme_surreal_layout_video");
			$this->addStyle("styles/prettyPhoto.css",array(),"pe_theme_surreal_pretty_photo");
			$this->addStyle("styles/custom.css",array(),"pe_theme_surreal_custom");
		
			$deps = 
				array(
					  "pe_theme_surreal_skeleton",
					  //"pe_theme_video",					  
					  //"pe_theme_volo",
					  "pe_theme_surreal_layout",
					  //"pe_theme_surreal_layout_video",
					  "pe_theme_surreal_pretty_photo",
					  "pe_theme_surreal_custom"
					  );
		}

		$this->addStyle("style.css",$deps,"pe_theme_init");

		$this->addScript("js/modernizr-2.6.2.js",array(),"pe_theme_surreal_modernizr");
		$this->addScript("js/iOS-timer.js",array(),"pe_theme_surreal_ios_timer");
		$this->addScript("js/jquery.prettyPhoto.js",array(),"pe_theme_surreal_pretty_photo");
		$this->addScript("js/jquery.isotope.min.js",array(),"pe_theme_surreal_isotope");
		$this->addScript("js/jquery.isotope.run.js",array(),"pe_theme_surreal_isotope_run");
		$this->addScript("js/jquery.easing.min.js",array(),"pe_theme_surreal_easing");
		$this->addScript("js/jquery.mobile-touch-swipe-1.0.js",array(),"pe_theme_surreal_mobile_touch_swipe");
		$this->addScript("js/jquery.flexslider.js",array(),"pe_theme_surreal_flexslider");
		$this->addScript("js/jquery.parallax-1.1.3.js",array(),"pe_theme_surreal_parallax");
		$this->addScript("js/supersized.3.2.7.min.js",array(),"pe_theme_surreal_supersized");
		$this->addScript("js/supersized.shutter.min.js",array(),"pe_theme_surreal_supersized_shutter");
		$this->addScript("js/tinynav.min.js",array(),"pe_theme_surreal_tinynav");
		//$this->addScript("js/custom-video.js",array(),"pe_theme_surreal_custom_video");
		$this->addScript("js/jquery.mb.YTPlayer.js",array(),"pe_theme_surreal_ytplayer");
		$this->addScript("js/custom.js",array(),"pe_theme_surreal_custom");
		$this->addScript("js/tooltip.js",array(),"pe_theme_surreal_tooltip");
		$this->addScript("js/jquery.sticky.js",array(),"pe_theme_surreal_sticky");
		$this->addScript("js/prefixfree.min.js",array(),"pe_theme_surreal_prefixfree");
		$this->addScript("js/surreal.js",array(),"pe_theme_surreal_surreal");

		$this->addScript("theme/js/pe/pixelentity.controller.js",
						 array(
							   "pe_theme_surreal_modernizr",
							   "pe_theme_surreal_ios_timer",
							   "pe_theme_surreal_pretty_photo",
							   "pe_theme_surreal_isotope",
							   "pe_theme_surreal_isotope_run",
							   "pe_theme_surreal_easing",
							   "pe_theme_surreal_mobile_touch_swipe",
							   "pe_theme_surreal_flexslider",
							   "pe_theme_surreal_parallax",
							   "pe_theme_surreal_supersized",
							   "pe_theme_surreal_supersized_shutter",
							   "pe_theme_surreal_tinynav",
							   "pe_theme_surreal_custom",
							   //"pe_theme_surreal_custom_video",
							   "pe_theme_surreal_ytplayer",
							   "pe_theme_surreal_tooltip",
							   "pe_theme_surreal_sticky",
							   "pe_theme_surreal_prefixfree",
							   "pe_theme_surreal_surreal",
							   "pe_theme_utils",
							   "pe_theme_utils_browser",
							   "pe_theme_widgets_contact",
							   "pe_theme_widgets_gmap"

							   ),"pe_theme_controller");		

		wp_localize_script($this->minifyJS ? "pe_theme_init" : "pe_theme_surreal_modernizr", 'peThemeVideoOptions',array(
								 "imgurl" => get_template_directory_uri() . '/images/icons/'
								 ));

	}

	public function localizeScripts() {
		//parent::localizeScripts();
		wp_localize_script($this->minifyJS ? "pe_theme_init" : "pe_theme_contactForm", 'peContactForm',array("url"=>urlencode(admin_url("admin-ajax.php"))));
		
	}
	
	public function pe_theme_minified_js_deps_filter($deps) {
		return array("jquery");
	}

	public function pe_theme_flare_css_deps_filter($deps) {
		return 	array(
					  "pe_theme_flare_common"
					  );
	}
	
	public function style() {
		bloginfo("stylesheet_url"); 
	}

	public function enqueueAssets() {
		$this->registerAssets();
		
		if ($this->minifyJS && file_exists(PE_THEME_PATH."/preview/init.js")) {
			$this->addScript("preview/init.js",array("jquery"),"pe_theme_preview_init");
			wp_localize_script("pe_theme_preview_init", 'o',
							   array(
									 "light" => PE_THEME_URL."/styles/white.css",
									 "css" => $this->master->color->customCSS(true,"color1")
									 ));
			wp_enqueue_script("pe_theme_preview_init");
		}	
		
		wp_enqueue_style("pe_theme_init");
		wp_enqueue_script("pe_theme_init");

		if ( is_admin() ) {

			$screen = get_current_screen();
			if ( 'page' === $screen->post_type )
				wp_enqueue_script("pe_theme_surreal_homepage_meta");
		}

		if ($this->minifyJS && file_exists(PE_THEME_PATH."/preview/preview.js")) {
			$this->addScript("preview/preview.js",array("pe_theme_init"),"pe_theme_skin_chooser");
			wp_localize_script("pe_theme_skin_chooser","pe_skin_chooser",array("url"=>urlencode(PE_THEME_URL."/")));
			wp_enqueue_script("pe_theme_skin_chooser");
		}
		$t = PeTheme();
		if ( $t->options->get("skin") == "light" )
				wp_enqueue_style("pe_theme_surreal_layout_white");
	}


}

?>