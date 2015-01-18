<?php

class PeThemeShortcodeSurrealNumber extends PeThemeShortcode {

	public function __construct($master) {
		parent::__construct($master);
		$this->trigger = "number";
		$this->group = __pe("UI");
		$this->name = __pe("Number");
		$this->description = __pe("Add a styled number");
		$this->fields = array(
							  "number"=> 
							   array(
									"label" => __pe("Number Title"),
									"type" => "Text",
									"description" => __pe("This should be a number"),
									"default" => __pe("123")
									),
							  "description" =>
							  array(
									"label" => __pe("Description"),
									"type" => "Text",
									"description" => __pe("This should be a number description."),
									"default" => __pe("Client Satisfaction")
									),
							  );
		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = $this->trigger;
	}

	public function output($atts,$content=null,$code="") {
		extract($atts);

		$html = "
			<div class='statsWrap'>
            	<div class='stats'>
                    <div class='statDummy'></div>
                    <div class='statInfo'>
                        <p class='statNumber statNumberSmall'>$number</p>
                        <p class='statText'>$description</p>
                    </div>
                </div>
            </div>";


        return trim($html);
	}


}

?>