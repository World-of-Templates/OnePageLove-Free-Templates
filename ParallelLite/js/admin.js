jQuery(document).ready( function(){
    // Uploading files

    var wcp_image_widget;

    function bindGalleryClick(){

        jQuery('.clear_image_button').on('click', function( event ){
            var this_widget = '#' + jQuery(this).closest('.widget').attr('id');
            jQuery(this_widget).find('.img-prev').html('');
            jQuery(this_widget).find('.image-url').val('');
        });


        jQuery('.upload_image_button').on('click', function( event ){

            event.preventDefault();
            var this_widget = '#' + jQuery(this).closest('.widget').attr('id');

            // Create the media frame.
            //console.log(wp.media.editor);
            wcp_image_widget = wp.media.frames.wcp_image_widget = wp.media({
                title: jQuery( this ).data( 'title' ),
                button: {
                    text: jQuery( this ).data( 'btntext' ),
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            wcp_image_widget.on( 'select', function() {
                // We set multiple to false so only get one image from the uploader
                attachment = wcp_image_widget.state().get('selection').first().toJSON();

                jQuery(this_widget).find('.image-url').val(attachment.url);
                jQuery(this_widget).find('.image-title').val(attachment.title);
                jQuery(this_widget).find('.alttext').val(attachment.alt);
                jQuery(this_widget).find('.img-prev').html('<img src="'+attachment.url+'" width="100%">')
            });

            // Finally, open the modal
            wcp_image_widget.open();
        });

        jQuery('.upload_gallery_button').click(function(event){

         var current_gallery = jQuery( this ).closest( 'fieldset' );
         if ( event.currentTarget.id === 'clear-gallery' ) {
             //remove value from input

             var rmVal = current_gallery.find( '.gallery_values' ).val( '' );

             //remove preview images
             current_gallery.find( ".screenshot" ).html( "" );

             return;

         }

         // Make sure the media gallery API exists
         if ( typeof wp === 'undefined' || !wp.media || !wp.media.gallery ) {
             return;
         }
         event.preventDefault();

         // Activate the media editor
         var $$ = jQuery( this );

         var val = current_gallery.find( '.gallery_values' ).val();
         var final;

         if ( !val ) {
             final = '[gallery ids="0"]';
         } else {
             final = '[gallery ids="' + val + '"]';
         }
         var frame = wp.media.gallery.edit( final );

         frame.state( 'gallery-edit' ).on(
             'update', function( selection ) {

                 //clear screenshot div so we can append new selected images
                 current_gallery.find( ".screenshot" ).html( "" );

                 var element, preview_html = "", preview_img;
                 var ids = selection.models.map(
                     function( e ) {
                         element = e.toJSON();
                         preview_img = typeof element.sizes.thumbnail !== 'undefined' ? element.sizes.thumbnail.url : element.url;
                         preview_html = "<img src='" + preview_img + "' alt='' />";
                         current_gallery.find( ".screenshot" ).append( preview_html );
                         return e.id;
                     }
                 );

                 current_gallery.find( '.gallery_values' ).val( ids.join( ',' ) );
                 //redux_change( current_gallery.find( '.gallery_values' ) );

             }
         );
         return false;
     });
 }

    function unBindGalleryClick(){
        jQuery('.clear_image_button').off("click");
        jQuery('.upload_image_button').off("click");
        jQuery('.upload_gallery_button').off("click");
    }


    jQuery(document).on('widget-added', function(event,widget){
        unBindGalleryClick();
        bindGalleryClick();

    });
    
    bindGalleryClick();

});