jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About Ministudio page -> Actions required tab */
    var ministudio_nr_actions_required = ministudioWelcomeScreenObject.nr_actions_required;

    if ( (typeof ministudio_nr_actions_required !== 'undefined') && (ministudio_nr_actions_required != '0') ) {
        jQuery('li.ministudio-w-red-tab a').append('<span class="ministudio-actions-count">' + ministudio_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".ministudio-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'ministudio_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : ministudioWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.ministudio-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + ministudioWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var ministudio_actions_count = jQuery('.ministudio-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof ministudio_actions_count !== 'undefined' ) {
                    if( ministudio_actions_count == '1' ) {
                        jQuery('.ministudio-actions-count').remove();
                        jQuery('.ministudio-tab-pane#actions_required').append('<p>' + ministudioWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.ministudio-actions-count').text(parseInt(ministudio_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function ministudio_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".ministudio-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var ministudio_actions_anchor = location.hash;

	if( (typeof ministudio_actions_anchor !== 'undefined') && (ministudio_actions_anchor != '') ) {
		ministudio_welcome_page_tabs('a[href="'+ ministudio_actions_anchor +'"]');
	}

    jQuery(".ministudio-nav-tabs a").click(function(event) {
        event.preventDefault();
		ministudio_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.ministudio-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
