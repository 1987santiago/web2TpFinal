/**
 * @name seatSelection.js
 * @date 2014/21/05 (AAAA/DD/MM)
 * @namespace seat
 */

(function(window, $) {
    'use strict';

    var seat = skynet.seat || {};

    // Get seats
    var seats = document.querySelectorAll('input'), // Guardamos todos los asientos
        disabledSeats = document.querySelectorAll('input[disabled]'), // Guardamos solo los asientos deshabilitados 
        availableSeats = document.querySelectorAll('input:not([disabled^="disabled"])'), // Guardamos solo los asientos disponibles
        // $availableSeats = $(availableSeats); 
        $availableSeats = $('input:not([disabled^="disabled"])'); 

    $availableSeats.on('click', function(){

        $availableSeats.removeClass('selected');
        $(this).addClass('selected');

    });

    // Methods 

    // Define properties

    // Define methods

    // Exposse methods

    // Exposse request 

    console.info('seatSelection has loaded');

}(this, jQuery));