(function ($)
{
    wp.customize('address', function ( value ) {
        value.bind(function ( newVal ) {
            $( '#contacts' ).text( newVal );
        })
        
    })

    wp.customize('phone', function ( value ) {
        value.bind(function ( newVal ) {
            $( '#phone' ).text( newVal );
        })

    })

    wp.customize('mail', function ( value ) {
        value.bind(function ( newVal ) {
            $( '#home_mail' ).text( newVal );
        })

    })

    
})(jQuery);

