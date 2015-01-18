<?php $t =& peTheme(); ?>
<?php $title = get_the_title(); ?>
<?php $pcontent = get_the_content(); ?> 
<?php $pcontent = apply_filters( 'the_content', $pcontent ); ?>
<?php $project =& $t->project; ?>
<?php list($portfolio) = $t->template->data(); ?>

<?php $content =& $t->content; ?>
	
	<div class="container">
                
        <div class="sixteen columns">
            <h1><?php echo $title; ?></h1>
            <?php echo $pcontent; ?>
           
        </div>
        
    </div>

    <div class="gallerySelector">
        <ul class="gallerySelectorList">
            <?php $project->filter('',"keyword"); ?>
        </ul>
    </div>

    <section class="portfolio_container">

    	<?php while ($content->looping()): ?>
		<?php $meta =& $content->meta(); ?>
    	<?php switch($content->format()): case "gallery": // Gallery post ?>

    		<?php $first = true; ?>
    		<?php $slider = $t->gallery->getSliderLoop($meta->gallery->id); ?>
			<?php if ($slider): ?>

				<article class="portfolio <?php $project->filterClasses(); ?>" data-category="<?php $project->filterClasses(); ?>">
					<section class="thumbImage">
					    <img src="<?php echo $t->image->resizedImgUrl($content->get_origImage(),350,0); ?>" alt="" class="fullwidth">
					    <div class="thumbTextWrap">
					        <div class="thumbText">
					            <a href="<?php echo get_permalink(); ?>"><h3 class="sectionTitle"><?php $content->title(); ?></h3></a>
					            <?php 
					            	$text = get_the_excerpt();
					            	if (strlen($text) > 40)
					            		$text = substr($text, 0, 40) . '...';

					            	echo '<p>' . $text . '</p>';
					             ?>

					            <?php while ($slide =& $slider->next()): ?>
								
									<?php $img = $slide->img; ?>
									<?php
									if ( $first ) { 
									?>
										<a class="thumbLink" href="<?php echo $img; ?>" rel="prettyPhoto['<?php $content->slug(); ?>']" title=""><i class="icon-search"></i></a>
									<?php
										$first = false;
									} else {
									?>
										<a href="<?php echo $img; ?>" rel="prettyPhoto['<?php $content->slug(); ?>']" title=""></a>
									<?php
									}
									?>

								<?php endwhile; ?>
					        </div>
					    </div>
					</section>
				</article>

			<?php endif; ?>

			<?php break; case "video": // Video post ?>

			<?php $videoID = $t->content->meta()->video->id; ?>
			<?php if ($video = $t->video->getInfo($videoID)): ?>
			<article class="portfolio <?php $project->filterClasses(); ?>" data-category="<?php $project->filterClasses(); ?>">
                <section class="thumbImage">
                    <img src="<?php echo $t->image->resizedImgUrl($content->get_origImage(),350,0); ?>" alt="" class="fullwidth">
                    <div class="thumbTextWrap">
                        <div class="thumbText">
                            <a href="<?php echo get_permalink(); ?>"><h3 class="sectionTitle"><?php $content->title(); ?></h3></a>
					            <?php 
					            	$text = get_the_excerpt();
					            	if (strlen($text) > 40)
					            		$text = substr($text, 0, 40) . '...';

					            	echo '<p>' . $text . '</p>';
					             ?>
                            <a class="thumbLink" href="<?php echo $video->url; ?>" rel="prettyPhoto" title=""><i class="icon-search"></i></a>
                        </div>
                    </div>
                </section>
            </article>
        	<?php endif; ?>

			<?php break; default: // Standard post ?>

			<article class="portfolio <?php $project->filterClasses(); ?>" data-category="<?php $project->filterClasses(); ?>">
                <section class="thumbImage">
                	<img src="<?php echo $t->image->resizedImgUrl($content->get_origImage(),350,0); ?>" alt="" class="fullwidth">
                    <div class="thumbTextWrap">
                        <div class="thumbText">
                        	<a href="<?php echo get_permalink(); ?>"><h3 class="sectionTitle"><?php $content->title(); ?></h3></a>
					            <?php 
					            	$text = get_the_excerpt();
					            	if (strlen($text) > 40)
					            		$text = substr($text, 0, 40) . '...';

					            	echo '<p>' . $text . '</p>';
					             ?>
                            <a class="thumbLink" href="<?php echo $content->get_origImage(); ?>" rel="prettyPhoto[gallery1]" title=""><i class="icon-search"></i></a>
                        </div>
                    </div>
                </section>
            </article>
		<?php endswitch; ?>
		<?php endwhile; ?>
    </section>











