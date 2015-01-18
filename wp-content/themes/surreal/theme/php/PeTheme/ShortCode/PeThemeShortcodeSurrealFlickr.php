<?php

class PeThemeShortcodeSurrealFlickr extends PeThemeShortcode {

	public function __construct($master) {
		parent::__construct($master);
		$this->trigger = "flickr";
		$this->group = __pe("MEDIA");
		$this->name = __pe("Flickr");
		$this->description = __pe("Add a flickr stream");
		$this->fields = array(
							  "username"=> 
							   array(
									"label" => __pe("Flick Username"),
									"type" => "Text",
									"description" => __pe("Please enter your Flickr username."),
									"default" => ""
									),
							   "section"=> 
							   array(
									"label" => __pe("Section Title"),
									"type" => "Text",
									"description" => __pe("Title displayed above thumbnails stream."),
									"default" => __pe("Flickr")
									),
							  "count" =>
							  array(
									"label" => __pe("Count"),
									"type" => "Text",
									"description" => __pe("Number of thumbs displayed in content."),
									"default" => "8"
									),
							  );
		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = $this->trigger;
	}

	public function output($atts,$content=null,$code="") {
		extract($atts);

		$count = absint( $count );

		$html = "
			<div class='latestFlickr'>
				<h3 class='sectionTitle'>$section</h3>
			    <div class='flickrListing'>
			        <script type='text/javascript' src='http://www.flickr.com/badge_code_v2.gne?count=$count&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=$username'></script>
			        <div class='clearfix'></div>
			    </div>
			</div>";


        return trim($html);
	}


}

?>