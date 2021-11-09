/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @see https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29
 */
( function( $ ) {

	wp.customize( 'serenity_lite_onepage_brands_layout', function( value ) {
		value.bind( function( newval ) {
			var classData = {
			  1: '1',
			  2: '2',
			  3: '3',
			  4: '4',
			  5: '5',
			  6: '6',
			  7: '7',
			  8: '8',
			  9: '9',
			  10: '10'
			},
			$widgets = $( '.brands .widgets .widget_media_image' );

			$widgets.each(function() {
			var className = $(this).attr('class'),
			    val = className.replace(/\s?col-[a-zA-Z0-9-]*\s?/g, ' ' + newval + ' ');
			$(this).attr( 'class', val );
			});
		} );
	} );

	wp.customize( 'serenity_lite_onepage_features_layout', function( value ) {
		value.bind( function( newval ) {
			var classData = {
			  1: 'col-sm-12 col-md-12 col-lg-12',
			  2: 'col-sm-12 col-md-6 col-lg-6',
			  3: 'col-sm-12 col-md-6 col-lg-4',
			  4: 'col-sm-12 col-md-6 col-lg-3',
			  6: 'col-sm-12 col-md-6 col-lg-2',
			},
			$widgets = $( '.features .widgets .serenity-feature-widget' );

			$widgets.each(function() {
			var className = $(this).attr('class'),
			    val = className.replace(/\s?col-[a-zA-Z0-9-]*\s?/g, ' ' + newval + ' ');
			$(this).attr( 'class', val );
			});
		} );
	} );

	wp.customize( 'serenity_lite_onepage_services_layout', function( value ) {
		value.bind( function( newval ) {
			var classData = {
			  1: 'col-sm-12 col-md-12 col-lg-12',
			  2: 'col-sm-12 col-md-6 col-lg-6',
			  3: 'col-sm-12 col-md-6 col-lg-4',
			  4: 'col-sm-12 col-md-6 col-lg-3',
			  6: 'col-sm-12 col-md-6 col-lg-2',
			},
			$widgets = $( '.services .widgets .serenity-service-widget' );

			$widgets.each(function() {
			var className = $(this).attr('class'),
			    val = className.replace(/\s?col-[a-zA-Z0-9-]*\s?/g, ' ' + newval + ' ');
			$(this).attr( 'class', val );
			});
		} );
	} );

	wp.customize( 'serenity_lite_onepage_team_layout', function( value ) {
		value.bind( function( newval ) {
			var classData = {
			  1: 'col-sm-12 col-md-12 col-lg-12',
			  2: 'col-sm-12 col-md-12 col-lg-6',
			  3: 'col-sm-12 col-md-12 col-lg-4',
			  4: 'col-sm-12 col-md-12 col-lg-3',
			  6: 'col-sm-12 col-md-12 col-lg-2',
			},
			$widgets = $( '.team .widgets .serenity-team-widget' );

			$widgets.each(function() {
			var className = $(this).attr('class'),
			    val = className.replace(/\s?col-[a-zA-Z0-9-]*\s?/g, ' ' + newval + ' ');
			$(this).attr( 'class', val );
			});
		} );
	} );

	wp.customize( 'serenity_lite_onepage_testimonials_layout', function( value ) {
		value.bind( function( newval ) {
			var classData = {
			  1: '1',
			  2: '2',
			  3: '3',
			  4: '4',
			  5: '5',
			  6: '6',
			  7: '7',
			  8: '8',
			  9: '9',
			  10: '10'
			},
			$widgets = $( '.testimonials .widgets .serenity-testimonial-widget' );

			$widgets.each(function() {
			var className = $(this).attr('class'),
			    val = className.replace(/\s?col-[a-zA-Z0-9-]*\s?/g, ' ' + newval + ' ');
			$(this).attr( 'class', val );
			});
		} );
	} );
} )( jQuery );