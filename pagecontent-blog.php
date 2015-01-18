<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<div class="page section">
	<div class="container">
	    <div class="sixteen columns blogTitle">
	    	<h1><?php $content->title(); ?></h1>
	    </div>
	    <div class="eleven columns">
	    	<?php $content->blog($meta->blog,false); ?>
	    </div>
	    <?php get_sidebar(); ?>
	</div>
</div>