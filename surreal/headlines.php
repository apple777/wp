<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>
<?php $isSlider = (! empty( $meta->home->type ) && $meta->home->type == 'slider') ? true : false;  ?>
<?php //$isSlider = true; ?>

<?php if ($isSlider): ?>
<div id="<?php $content->slug(); ?>" class="homepage section">
	<?php $loop = $t->gallery->getSliderLoop($meta->home->gallery); ?>
	<?php if ( $loop ): ?>
	<?php while ($slide =& $loop->next()): ?>
	<?php $caption = ""; ?>
	<?php if ($slide->caption_title) $caption .= sprintf("<span>%s</span> ",$slide->caption_title); ?>
	<?php if ($slide->caption_description) $caption .= $slide->caption_description; ?>
	<div class="hiddenslide" data-title="<?php echo esc_attr("<h2>{$caption}</h2>"); ?>" data-src="<?php echo $slide->img; ?>"></div>
	<?php endwhile; ?>
	<?php else: ?>
	<p><?php e__pe("Gallery you selected as a Slider Gallery in Home page settings contains no slides, make sure to upload at least one image for selected gallery."); ?></p>
	<?php endif; ?>

	<div class="container">
		<div class="sixteen columns">
			<img alt="" class="logo" src="<?php echo $t->options->get("logo"); ?>" />
		</div>
		
		<div class="slider-text">
			<div class="sixteen columns">
				<div class="line"></div>
			</div>
			
			<div class="twelve columns">
				<div id="slidecaption"></div>
			</div>
			
			<div class="four columns">
				<a id="prevslide" class="load-item"><i class="icon-arrow-up"></i></a>
				<a id="nextslide" class="load-item"><i class="icon-arrow-down"></i></a>
			</div>
		</div>
		
	</div>

</div>
<?php else: ?>
	<div id="<?php $content->slug(); ?>" class="homepage section">
	<?php $video = get_post_meta($meta->home->video, 'pe_theme_Surreal', true); ?>
		
		<div class="container">
			<div class="sixteen columns">
				<img alt="" class="logo" src="<?php echo $t->options->get("logo"); ?>" />
			</div>
            
			<a id="bgndVideo" href="<?php echo $video->video->url; ?>" class="movie {opacity:1, isBgndMovie:{width:'window',mute:false}, optimizeDisplay:true, showControls:true, ratio:'16/9',startAt:3,quality:'hd720',addRaster:true,lightCrop:true}"></a>
			
		</div>
	</div>
<?php endif; ?>