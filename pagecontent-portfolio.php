<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $project =& $t->project; ?>

<?php $meta =& $content->meta(); ?>

<div class="page section" id="<?php $content->slug(); ?>">

	<?php if (!post_password_required()): ?>
	<?php $t->project->portfolio($content->meta()->portfolio,false) ?>
	<?php else: ?>
	<?php get_template_part("password"); ?>
	<?php endif; ?>
	
</div>