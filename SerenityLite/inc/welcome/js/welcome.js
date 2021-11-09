jQuery(document).ready(function() {
	
	/* Tabs in welcome page */
	function serenity_lite_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("nav-tab-active");
        jQuery(event).parent().siblings().removeClass("nav-tab-active");
        var tab = jQuery(event).attr("href");
        jQuery(".serenity-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var serenity_lite_actions_anchor = location.hash;
	
	if( (typeof serenity_lite_actions_anchor !== 'undefined') && (serenity_lite_actions_anchor != '') ) {
		serenity_lite_welcome_page_tabs('a[href="'+ serenity_lite_actions_anchor +'"]');
	}
	
    jQuery(".nav-tab-wrapper a").click(function(event) {
        event.preventDefault();
		serenity_lite_welcome_page_tabs(this);
    });

});