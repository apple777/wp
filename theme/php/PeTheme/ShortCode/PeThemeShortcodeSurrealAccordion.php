<?php

class PeThemeShortcodeSurrealAccordion extends PeThemeShortcodeBS_Tabs {

	public function __construct($master) {
		parent::__construct($master);
		$this->trigger = "item";
		$this->group = __pe("LAYOUT");
		$this->name = __pe("Accordion");
		$this->description = __pe("Accordion");
		$this->fields = array(
							  "size" =>
							  array(
									"label" => __pe("Number of items"),
									"type" => "Select",
									"single" => true,
									"description" => __pe("Select the number of items in the accordion."),
									"options" => range(1,10)
									)
							  );

	}

	public function parentTrigger() {
		add_shortcode("accordion",array(&$this,"container"));

		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = "item";
		peTheme()->shortcode->blockLevel[] = "accordion";
	}

	protected function script() {
		$html = <<<EOT
<script type="text/javascript">
jQuery.pixelentity.shortcodes.$this->trigger = jQuery("#{$this->trigger}_size_").peShortcodeProperties({parent:"accordion",tag:"{$this->trigger}",title:"Title"});
</script>
EOT;
		echo $html;
	}

	public function container($atts,$content=null,$code="") {
		$this->instances++;
		$content = $this->parseContent($content);
		
		if (!is_array($this->items) || count($this->items) == 0) {
			return "";
		}

		$count = 1;
		$commonID = "accordion".$this->instances;
		$html = "";

		if (peTheme()->template->exists("shortcode","accordion")) {
			$items = $this->items;
			$conf = (object) compact("atts","content","items");
			ob_start();
			peTheme()->template->get_part($conf,"shortcode","accordion");
			$html = ob_get_clean();
		} else {

			while ($item = array_shift($this->items)) {
				$html .= '<span class="accTrigger question"><a href="#">' . $item->title . '</a></span>
                <div class="accContainer">
                    <div class="accContent">' . $item->body . '</div>
                </div>';
			}

		}

		$html = sprintf('<div id="%s" class="accordion">%s</div>',$commonID,$html);
		return apply_filters("pe_theme_shortcode_accordion",$html,$atts,$content,$commonID);
	}


}

?>
