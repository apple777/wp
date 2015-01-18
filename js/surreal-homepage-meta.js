jQuery( window ).load( function() {

	if ( jQuery( 'label[for="pe_theme_meta_home__type__0"]' ).hasClass( 'ui-state-active') ) {

		jQuery( '#pe_theme_meta_home__gallery_' ).closest( '.option' ).fadeIn(0);
		jQuery( '#pe_theme_meta_home__video_' ).closest( '.option' ).fadeOut(0);

	} else {

		jQuery( '#pe_theme_meta_home__gallery_' ).closest( '.option' ).fadeOut(0);
		jQuery( '#pe_theme_meta_home__video_' ).closest( '.option' ).fadeIn(0);

	}

	jQuery( 'label[for="pe_theme_meta_home__type__0"], label[for="pe_theme_meta_home__type__1"]' ).on( 'click', function() {

		if ( jQuery( 'label[for="pe_theme_meta_home__type__0"]' ).hasClass( 'ui-state-active') ) {

			jQuery( '#pe_theme_meta_home__gallery_' ).closest( '.option' ).fadeIn(0);
			jQuery( '#pe_theme_meta_home__video_' ).closest( '.option' ).fadeOut(0);

		} else {

			jQuery( '#pe_theme_meta_home__gallery_' ).closest( '.option' ).fadeOut(0);
			jQuery( '#pe_theme_meta_home__video_' ).closest( '.option' ).fadeIn(0);

		}

	});


});