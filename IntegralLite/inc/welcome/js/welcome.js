jQuery(document).ready(function() {
	
	/* Tabs in welcome page */
	function integral_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("nav-tab-active");
        jQuery(event).parent().siblings().removeClass("nav-tab-active");
        var tab = jQuery(event).attr("href");
        jQuery(".integral-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var integral_actions_anchor = location.hash;
	
	if( (typeof integral_actions_anchor !== 'undefined') && (integral_actions_anchor != '') ) {
		integral_welcome_page_tabs('a[href="'+ integral_actions_anchor +'"]');
	}
	
    jQuery(".nav-tab-wrapper a").click(function(event) {
        event.preventDefault();
		integral_welcome_page_tabs(this);
    });

});