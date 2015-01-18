<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>

<div id="<?php $content->slug(); ?>" class="page section">
     
<div class="container aboutContainer">

    <div class="sixteen columns">
    	<h1><?php $content->title(); ?></h1>
    </div>

	<div class="pe-wp-default">
		<?php $content->content(); ?>
		<?php $content->linkPages(); ?>
	</div>

</div>

</div>