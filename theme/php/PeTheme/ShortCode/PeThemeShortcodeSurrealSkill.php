<?php

class PeThemeShortcodeSurrealSkill extends PeThemeShortcode {

	public function __construct($master) {
		parent::__construct($master);
		$this->trigger = "skill";
		$this->group = __pe("UI");
		$this->name = __pe("Skill");
		$this->description = __pe("Add a skill");
		$this->fields = array(
							  "title"=> 
							   array(
									"label" => __pe("Skill Title"),
									"type" => "Text",
									"description" => __pe("Enter a skill title."),
									"default" => __pe("Title")
									),
							  "amount" =>
							  array(
									"label" => __pe("Percentage"),
									"type" => "Text",
									"description" => __pe("Enter skill percentage (number from 1-100, without %)."),
									"default" => __pe("50")
									),
							  );
		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = $this->trigger;
	}

	public function output($atts,$content=null,$code="") {
		extract($atts);

		$html = "
			<ul>
				<li>
					<p class='skill'>$title</p>
					<div class='bar' data-width='$amount%'>
					<p class='percent'>$amount%</p></div>
				</li>
			</ul>";


        return trim($html);
	}


}

?>