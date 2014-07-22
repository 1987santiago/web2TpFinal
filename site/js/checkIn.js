/**
 * checkIn.js
 */

var form = document.querySelector('#checkIn form'),
    reservationCode = form.reservationCode,

reservationCode.onchange = function(event) {

    // datos que le pasamos al achivo que valida el codigo
    var data = {
            reservationCode : reservationCode.value
        },
        
        // parametros que necesitamos para hacerl el request por ajax
        params = {
            data : data,
            url : STATICS_PATH + "/processors/validateReservationStatus.php",
            type : 'POST', 
            callback : skinField
        };

    function skinField(response, status, requestObj) {

        // console.log('response', response);
        // console.log('status', status);
        // console.log('requestObj', requestObj);
        if (response) { // si valida 
            inputClass = 'valid';
            form.querySelector('[type=submit]').removeAttribute('disabled');
        } else {
            inputClass = 'invalid';
            form.querySelector('[type=submit]').setAttribute('disabled',true);
        }
        reservationCode.setAttribute('class', inputClass);

    }

    window.skynet.request.getDocument(params);

}; 