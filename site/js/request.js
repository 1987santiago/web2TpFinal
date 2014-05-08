/**
 * @name .js
 * @author smarchioni
 * @date 2014/07/05 (AAAA/DD/MM)
 * @namespace 
 */

(function(window, $) {
    'use strict';
    
        // save <a> elements
    var links = document.getElementsByTagName('a'),
        $links = $(links),
        $linksToSection = $("a[data-section]");

    // Properties 

    // Methods 
    $linksToSection.on('click', function(event){

        event.preventDefault();
        event.stopPropagation();

        var section = $(this).attr('data-section');

        getSection(section);

    });

    /**
     * @param String section
     */
    var getSection = function(section) {

        var params = {
            url : '/unlam/web2/tpFinal/web2TpFinal/site/sections/' + section + '.php',
            context : document.body,
            type : 'POST',

            complete: function(data) {
                console.log('request complete : ', data);
            },
            success: function(data) {
                if ($('main section').length > 0) {
                    $('main section').eq(0).remove();
                }
                $('main').append(data);
            },
            error: function(error) {
                console.log('request error : ', error);
            }
        };

        $.ajax(params);

    }

    // Exposse aero 
    window.aero = aero;

}(this, jQuery));