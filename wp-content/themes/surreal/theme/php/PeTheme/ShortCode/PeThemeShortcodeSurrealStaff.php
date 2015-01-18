<?php

class PeThemeShortcodeSurrealStaff extends PeThemeShortcode {

	public function __construct($master) {
		parent::__construct($master);
		$temp = new PeThemeStaff($master);
		$this->trigger = "staff";
		$this->group = __pe("UI");
		$this->name = __pe("Staff Member");
		$this->description = __pe("Insert a Staff Member");
		$this->fields = array(
							  "staff" => 
								array(
									  "label"=>__pe("Staff Member"),
									  "type"=>"Select",
									  "options" => $temp->option(),
									  "description" => __pe("Select a staff member to insert into content."),
									  "default"=> ""
									  )
								);
		// add block level cleaning
		peTheme()->shortcode->blockLevel[] = $this->trigger;
	}

	public function output($atts,$content=null,$code="") {
		extract($atts);
		$t =& peTheme();
		$staff = $atts["staff"];
		$title = get_the_title($staff);
		$meta = get_post_meta($staff, 'pe_theme_Surreal', true);

		$content = get_post( $staff );
		$content = apply_filters('the_content',$content->post_content);

		$html = '
<div class="teamImage">
    <img class="scale-with-grid" src="';
    $html .= $t->image->resizedImgUrl(wp_get_attachment_url( get_post_thumbnail_id( $staff )),380,380);

    $html .= '" alt=""/> 
    <div class="teamName">
        <h2>';
        $html .= $title;
        $html .= '</h2><h3>';
        if ( !empty($meta->info->position)) $html .= $meta->info->position;

        $html .= '</h3><ul class="socialLinksTeam tooltips">';
            if ( !empty($meta->info->twitter)) $html .= '<li><a href="'.$meta->info->twitter.'" rel="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>';
            if ( !empty($meta->info->facebook)) $html .= '<li><a href="'.$meta->info->facebook.'" rel="tooltip" title="Facebook"><i class="icon-facebook"></i></a></li>';
            if ( !empty($meta->info->google)) $html .= '<li><a href="'.$meta->info->google.'" rel="tooltip" title="Google Plus"><i class="icon-google-plus"></i></a></li>';
            if ( !empty($meta->info->dribble)) $html .= '<li><a href="'.$meta->info->dribble.'" rel="tooltip" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
            if ( !empty($meta->info->linkedin)) $html .= '<li><a href="'.$meta->info->linkedin.'" rel="tooltip" title="LinkedIn"><i class="icon-linkedin"></i></a></li>';
            if ( !empty($meta->info->pinterest)) $html .= '<li><a href="'.$meta->info->pinterest.'" rel="tooltip" title="Pinterest"><i class="icon-pinterest"></i></a></li>';
        $html .= '</ul>
    </div>
</div>  
';
	$html .= $content;



	
        return trim($html);
	}


}

?>