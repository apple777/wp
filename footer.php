<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $template = is_page() ? $t->content->pageTemplate() : false; ?>
	<div id="footer">
    
        <div class="container">
            <?php if ( $t->options->get("clientsTitle") && $t->options->get("clients") && $template === "page-home.php" && $t->gallery->getSliderLoop($t->options->get("clients")) ):?>
            <div class="sixteen columns">
                <h3 class="sectionTitle"><?php echo $t->options->get("clientsTitle"); ?></h3>
            </div>
            
            <div class="sixteen columns">
                 <section class="slider">
                    <div id="carouselSlider" class="flexslider carousel">
                       <ul class="slides">
						   <?php $loop = $t->gallery->getSliderLoop($t->options->get("clients")); ?>
						   <?php while ($slide =& $loop->next()): ?>
						   <li>
							   <img src="<?php echo $t->image->resizedImgUrl($slide->img,180,100); ?>" alt="<?php echo esc_attr($slide->caption_title); ?>" />
						   </li>
						   
						   <?php endwhile; ?>

                       </ul>
                    </div>
                 </section>
            </div>
			<?php endif; ?>
            
            <?php if ( $t->options->get("footerText") ):?>
            <div class="sixteen columns">	
                <p class="copyright"><?php echo $t->options->get("footerText"); ?></p>
            </div>
        	<?php endif; ?>
        </div>
    </div>
<?php $t->footer->wp_footer(); ?>
</body>
</html>