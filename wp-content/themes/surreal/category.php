<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<div class="section blog page" id="<?php $content->slug(); ?>">
		<div class="container">
			<div class="sixteen columns blogTitle">
		    	<h3><?php printf(__pe("Category: %s"),single_cat_title("",false)); ?></h3>
				<?php if (category_description()): ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
		    </div>
			<div class="eleven columns">
				<?php $t->content->loop(); ?>
			</div>
			
			<?php get_sidebar(); ?>
		</div>
</div>

<?php get_footer(); ?>
