;( function( $ ){

    //Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$('#page').css('background-color', to );
		} );
    } );

    //Update site background color...
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			$('#page').css('background-image', to );
		} );
    } );

    // Update site text color.
    wp.customize( 'probd_text_color', function( value ) {
        value.bind( function( to ) {
            $('#page').css('color', to );
        });
    });
    
    // Link Color scheme.
    wp.customize( 'probd_theme_options_link_color', function( value ) {
        value.bind( function( to ) {
            console.log(to);
            $('.wrapper a').css('color', to );
        } );
    } );


} )( jQuery );