jQuery(document).ready(function() {
    var ministudio_aboutpage = ministudioWelcomeScreenCustomizerObject.aboutpage;
    var ministudio_nr_actions_required = ministudioWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof ministudio_aboutpage !== 'undefined') && (typeof ministudio_nr_actions_required !== 'undefined') && (ministudio_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + ministudio_aboutpage + '"><span class="ministudio-actions-count">' + ministudio_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".ministudio-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section ministudio-upsells">');
    }
    if (typeof ministudio_aboutpage !== 'undefined') {
        jQuery('.ministudio-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + ministudio_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', ministudioWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".ministudio-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});