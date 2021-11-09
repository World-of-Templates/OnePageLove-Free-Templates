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
            if(response){
            jQuery.post(response, { url: '' }, function(data) { 
            //jQuery('.button-large.flactvate').css('display','none');
            setTimeout(function() {
           location.reload(true);

            }, 1000);

            });

            }else{
                   setTimeout(function() {
                     location.reload(true);

            }, 1000);

            }

        });
    });
return false;
}