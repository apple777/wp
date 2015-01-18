<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>


<!--start parallax 1-->
<div id="<?php $content->slug(); ?>" class="parallax fixed" style="background-image: url(<?php echo $content->get_origImage(); ?>);">
	<div class="quoteWrap">
		<div class="quote">
			<div class="container">
				<div class="sixteen columns">
					<?php $content->content(); ?>
				</div>
			</div>  
		</div>
	</div>
</div>
<!--end parallax-->