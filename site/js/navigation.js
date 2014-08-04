/**
 * @name Navigation.js
 * @date 2014/19/05 (AAAA/DD/MM)
 * @namespace navigation
 */

var skynet = window.skynet || {};

skynet.navigation = skynet.navigation || function() {
    'use strict';

<<<<<<< HEAD
    var navigation = skynet.navigation ||  {};
=======
    var navigation = skynet.navigation || {};
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6

    // save <a> elements
    var links = document.getElementsByTagName('a'),
        $links = $(links),
        $linksToSection = $("[data-section]"),
        $linksToComponent = $("[data-component]");

    // Properties 

    // Methods 
    $linksToSection.on('click', function(event){

        event.preventDefault();
        event.stopPropagation();

        var name = $(this).attr('data-section'),
            section = {
                name : name,
                context : '#' + name
            };

        skynet.request.getSection(section);

    });

    $linksToComponent.on('click', function(event){

        event.preventDefault();
        event.stopPropagation();

        var component = { 
            name : $(this).attr('data-component')
        }

        skynet.request.getComponent(component);

    });

    var processForm = function(form) {

        $(form).on('submit', function(event){

            event.preventDefault();
            event.stopPropagation();

            var action = $(this).attr('action');

            skynet.request.processForm(action);

        });

    };

    // Define properties

    // Define methods

    // Exposse methods
    navigation.processForm = processForm;

    // Exposse request 
    // window.skynet.navigation = navigation;

    return navigation;

};