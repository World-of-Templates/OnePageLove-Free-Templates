function featuredlite_install(newLocation) {
    jQuery('.loader,.flactvate-activating').css('display','block');
    jQuery('.button-large').css('display','none');
    jQuery.post(newLocation, { url: '' }, function(data) {
// home page settings
                jQuery('.loader,.flactvate-activating').css('display','none');
                jQuery('.button-large.flactvate').css('display','block');

        var data = {
            'action': 'featuredlite_default_home',
            'home': 'saved'
        };
        jQuery.post(ajaxurl, data, function(response) {
            jQuery('.button-large.flactvate').css('display','none');

            setTimeout(function() {
                            location.reload(true);
            }, 1000);
        });
    });
return false;
}

jQuery(document).ready(function() {    
    /* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );
// background-choose
wp.customize('parallax_image_video', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slider'){
            jQuery( '#customize-control-featured_slider_speed' ).css('display','block' );
            jQuery( '#customize-control-first_slider_image' ).css('display','block' );
            jQuery( '#customize-control-second_slider_image' ).css('display','block' );
            jQuery( '#customize-control-third_slider_image' ).css('display','block' );
            jQuery( '#customize-control-fourth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-fifth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-sixth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-parallax_image_upload' ).css('display','none' );
            jQuery( '#customize-control-for_more_slide' ).css('display','block' );
             
            } else if(to=='image'){
            jQuery( '#customize-control-featured_slider_speed' ).css('display','none' );
            jQuery( '#customize-control-first_slider_image' ).css('display','none' );
            jQuery( '#customize-control-second_slider_image' ).css('display','none' );
            jQuery( '#customize-control-third_slider_image' ).css('display','none' );
            jQuery( '#customize-control-fourth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-fifth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-sixth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-parallax_image_upload' ).css('display','block' );
            jQuery( '#customize-control-for_more_slide' ).css('display','none' );
            }
           
        } );
if(filter_type()=='slider'){
              jQuery( '#customize-control-featured_slider_speed' ).css('display','block' );
            jQuery( '#customize-control-first_slider_image' ).css('display','block' );
            jQuery( '#customize-control-second_slider_image' ).css('display','block' );
            jQuery( '#customize-control-third_slider_image' ).css('display','block' );
            jQuery( '#customize-control-fourth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-fifth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-sixth_slider_image' ).css('display','block' );
            jQuery( '#customize-control-parallax_image_upload' ).css('display','none' );
            jQuery( '#customize-control-for_more_slide' ).css('display','block' );
                
            } else if(filter_type()=='image'){
             jQuery( '#customize-control-featured_slider_speed' ).css('display','none' );
            jQuery( '#customize-control-first_slider_image' ).css('display','none' );
            jQuery( '#customize-control-second_slider_image' ).css('display','none' );
            jQuery( '#customize-control-third_slider_image' ).css('display','none' );
            jQuery( '#customize-control-fourth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-fifth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-sixth_slider_image' ).css('display','none' );
            jQuery( '#customize-control-parallax_image_upload' ).css('display','block' );
            jQuery( '#customize-control-for_more_slide' ).css('display','none' );
            } 
            

    } );

});