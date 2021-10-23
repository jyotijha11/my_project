/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Main slider / image height
	wp.customize( 'main_slider_height', function( value ) {
	    value.bind( function( to ) {
	        $( ".slider-layout-one .banner-img" ).css( "height", to + 'px' );
	        $( ".slider-layout-two .slide-item" ).css( "height", to + 'px' );
	        $( ".main-banner .banner-img" ).css( "height", to + 'px' );
	    } );
	} );

} )( jQuery );