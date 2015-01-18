<?php

class PeThemeShortcodeSurrealService extends PeThemeShortcode {

	public function __construct($master) {
		parent::__construct($master);
		$this->trigger = "service";
		$this->group = __pe("UI");
		$this->name = __pe("Service");
		$this->description = __pe("Add a service");
		$this->fields = array(
							  "title"=> 
							   array(
									"label" => __pe("Title"),
									"type" => "Text",
									"description" => __pe("Enter a service title."),
									"default" => __pe("Title")
									),
							  "content" =>
							  array(
									"label" => __pe("Description"),
									"type" => "TextArea",
									"description" => __pe("Enter service description here."),
									"default" => __pe("Description")
									),
							  "icon" => 
							  array(
									"label" => __pe("Icon"),
									"type" => "Select",
									"description" => __pe("Enter service description here."),
									"options" => array(
										"Location" => "icon-location", 
										"Envelop" => "icon-envelop", 
										"Phone" => "icon-phone", 
										"Print" => "icon-print", 
										"Clock" => "icon-clock", 
										"Arrow Right" => "icon-arrow-right", 
										"Arrow Left" => "icon-arrow-left", 
										"Twitter" => "icon-twitter", 
										"Google Plus" => "icon-google-plus", 
										"Facebook" => "icon-facebook", 
										"Flickr" => "icon-flickr", 
										"Skype" => "icon-skype", 
										"LinkedIn" => "icon-linkedin", 
										"Pinterest" => "icon-pinterest", 
										"YouTube" => "icon-youtube", 
										"Vimeo" => "icon-vimeo", 
										"Dribbble" => "icon-dribbble", 
										"Feed" => "icon-feed", 
										"Plus" => "icon-plus", 
										"Arrow Left 2" => "icon-arrow-left-2",
										"Arrow Down" => "icon-arrow-down", 
										"Arrow Up" => "icon-arrow-up", 
										"Arrow Right 2" => "icon-arrow-right-2", 
										"Quote" => "icon-quote", 
										"Search" => "icon-search", 
										"Brush" => "icon-brush", 
										"Share" => "icon-share", 
										"Mobile" => "icon-mobile", 
										"Camera" => "icon-camera",
										"Camera 2" => "icon-camera-2", 
										"Quill" => "icon-quill"
									),
									"default" => "icon-location"
									),
							  "image" => 
							  array(
									"label" => __pe("Image"),
									"type" => "Upload",
									"description" => __pe("Upload service image used for background."),
									"default" => ""
									),
							  );
		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = $this->trigger;
	}

	public function output($atts,$content=null,$code="") {
		extract($atts);
		$t =& peTheme();
		$image = $t->image->resizedImgUrl($image,236,236);
		$content = $content ? $this->parseContent($content) : '';
		$html = 
		"<div class='serviceItem' style='background-image:url(\"$image\")'>
            <div class='serviceInfoWrap'>
                <div class='serviceInfo'>
                    <div class='serviceInfoFront'></div>
                    <div class='serviceInfoBack'>
                        <div class='serviceIcon'><i class='$icon'></i></div>
                        <h3>$title</h3>
                        <p>$content</p>
                    </div>
                </div>
            </div>
        </div>";

        return trim($html);
	}


}

?>