<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<div class="section blog page" id="<?php $content->slug(); ?>">
		<div class="container">
			<div class="eleven columns">			
				<?php $t->content->loop(); ?>
			</div>
			
			<?php get_sidebar(); ?>
		</div>
</div>

<?php get_footer(); ?>
