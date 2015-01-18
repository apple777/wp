<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php $contact =& $meta->contact; ?>
<?php $gmap =& $t->content->meta()->gmap; ?>
<?php $hasFeatImage = $content->hasFeatImage(); ?>


<div id="<?php $content->slug(); ?>" class="page contact-section section">
     
<div class="container contactContainer">

	<div class="sixteen columns">
    	<h1><?php $content->title(); ?></h1>
        <?php $content->content(); ?>
    </div> 
       
	<?php if (!empty($contact->info)): ?>		
	<?php echo $contact->info; ?>
	<?php endif; ?>   
            

    
    <div id="contact_form">
        <div class="two-thirds column marginTop formWrap">
            <?php if ($gmap->show == "yes"): ?>
            <!-- Google Map -->
            <div class="gmap-wrap">
                <div id="google-map" class="gmap" data-latitude="<?php echo $gmap->latitude; ?>" data-longitude="<?php echo $gmap->longitude; ?>" data-title="<?php echo esc_attr($gmap->title); ?>" data-zoom="<?php echo $gmap->zoom; ?>" >
                    <div class="description"><?php echo $gmap->description; ?></div>
                </div>
            </div>
            <!-- /Google Map -->
            <?php endif; ?>
            <form action="#" method="post" class="contactForm peThemeContactForm">
                <div class="formSecWrap">
                    <label for="form_name"><?php e__pe("Name"); ?></label>
                        <input type="text" id="form_name" name="form_name" value="" required />
   
                    <label for="form_email"><?php e__pe("Email"); ?></label>
                        <input type="text" name="form_email" id="form_email" value="" required />
              
                    <label for="form_subject"><?php e__pe("Subject"); ?></label>
                        <input type="text" name="form_subject" id="form_subject" value="" required />
                </div>
                <div class="formSecWrap formSecWrap2">
                    <label for="form_message"><?php e__pe("Message"); ?></label>
                        <textarea class="textarea" name="form_message" id="form_message" required></textarea>
                
                        <input class="button submit" id="submit-form" type="submit" name="submit" value="<?php e__pe("Send"); ?>" />
                </div>
                <!--alert success-->
				<div id="contactFormSent" class="formSent hide">
					<?php echo $contact->msgOK; ?>
				</div>
			
				<!--alert error-->
				<div id="contactFormError" class="formError hide">
					<?php echo $contact->msgKO; ?>
				</div>
            </form>
        </div>
    </div>
    
    <!-- Social -->
    <div class="sixteen columns">
    	<?php if (!empty($contact->socialLinksTitle)): ?>
        <h3 class="sectionTitle"><?php echo $contact->socialLinksTitle ?></h3>
        <ul class="socialLinks">
            <?php $t->content->socialLinks($contact->socialLinks); ?>
        </ul>
    	<?php endif; ?>
    </div>
    <!-- Social -->
   </div>

</div>