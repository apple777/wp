<!DOCTYPE html>
<?php $t =& peTheme();?>
<?php $class = ""; ?>
<!--[if IE 7 ]><html class="lt-ie9 lt-ie8 ie7 no-js desktop <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="lt-ie9 ie8 no-js desktop <?php echo $class ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js desktop <?php echo $class ?>" <?php language_attributes(); ?>><![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js desktop <?php echo $class ?>" <?php language_attributes();?>><!--<![endif]-->
   
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php $t->header->title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo $t->options->get("favicon") ?>" />

		<?php $t->font->load(); ?>

		<!-- wp_head() here -->
		<?php $t->header->wp_head(); ?>
	</head>

	<body <?php $t->content->body_class(); ?>>
		
		<?php $template = is_page() ? $t->content->pageTemplate() : false; ?>
		<?php if ($template === "page-home.php"): ?>
		<?php get_template_part("headlines"); ?>
		<?php endif; ?>

		<?php get_template_part("menu"); ?>
		
			

