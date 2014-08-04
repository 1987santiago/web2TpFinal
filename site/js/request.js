/**
 * @name Request.js
 * @date 2014/07/05 (AAAA/DD/MM)
 * @namespace 
 */

(function(window, $) {
    'use strict';

<<<<<<< HEAD
    var request = skynet.request || {}; 
=======
    var request = skynet.request || {}; 
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6


    /**
     * @param component {JSON} with
     *
     * @param section.name String with section name
     * @param section.container String with jQuery object that will contain the response
     * @param section.context String with css selector of HTML object to needed
     *  
     * Implementation example
     * getSection({
     *      name: 'home', 
     *      container: $('#main'),
     *      context: '#someID'
     * });
     * });
     */
    var getSection = function(section) {

        var params = {
            url : STATICS_PATH + '/sections/' + section.name + '.php',
            container : section.container || $('#main'),
            context : section.context || '',
            callback : showSection
        };

        function showSection(response, status, requestObj) {

            var $context = params.container.find(params.context);

            if ($context.length > 0) {
                $context.eq(0).remove();
            }
            $(params.container).append(response);

        }

        // llamamos al metodo que hace la peticion del contenido .load()
        request.getData(params);

    };

    /**
     * @param component {JSON} with
     *
     * @param component.name String with component name
     * @param component.data {JSON} with data to pass
     * @param component.context String with css selector of HTML object to needed 
     *  
     * Implementation example
     * getComponent({
     *      name: 'footer', 
     *      data: {someKey: someValue}, 
     *      context: '#someID'
     * });
     */
    var getComponent = function(component) {

        var data = (component.data)? component.data : {};

        var params = {
            data : data,
            url : STATICS_PATH + '/components/' + component.name + '.php',
            container: component.container,
            context : component.context,
            callback : showComponent
        };

        function showComponent(response, status, requestObj) {

            if ($('#main section').length > 0) {
                $('#main section').eq(0).remove();
            }
            $('#main').append(response);

        }

        // llamamos al metodo que hace la peticion del contenido .load()
        request.getData(params);

    };

    /**
     * @param data {JSON} with
     *
     * @param data.url String with url to get content
     * @param data.type String with conect type [POST/GET]
     * @param data.callback Function() to process response
     *
     */
    var getDocument = function(data) {

        var params = {
            data : data.data,
            url : data.url,
            context : document.body,
            type : data.type,

            complete: function(res) {
                console.log('request complete : ', res);
            },
            success: function(res) {
                // se invoca a la funcion que procesa los datos recibidos
                if (data && data.callback) {
                    if (res == 'true') {
                        data.callback(true); 
                    } else { 
                        data.callback(false);
                    }
                } else {
                    console.error('No hay asientos disponibles');
                }
            },
            error: function(error) {
                console.log('request error : ', error);
            }
            
        };

        $.ajax(params);

    };

    /**
     * @param data {JSON} with
     *
     * @param data.url String with url to get content
     * @param data.data {JSON} with any data to pass 
     * @param data.callback Function() to process response
     * @param data.context String with css selector of HTML object to needed
     *  
     * Implementation example
     * getData({
     *      url: '../component/footer.php', 
     *      data: {someKey: someValue}, 
     *      context: '#someID',
     *      callback: function(res) { console.log('respuesta del server: ', res); }
     * });
     */
    var getData = function(data) {

        var _data = data.data || {},
            container = data.container,
            context = data.context || '',
            url  = data.url + ' ' + context || STATICS_PATH + 'error.php',
            callback  = function(response, status, requestObj) {
                // se invoca a la funcion que procesa los datos recibidos
                (data && data.callback) ? data.callback(response, status, requestObj, data.context) : 'false';
            };

        container.load(url, _data, callback);

    };

    // Exposse methods
    request.getSection = getSection;
    request.getComponent = getComponent;
    request.getDocument = getDocument;
    request.getData = getData;

    // Exposse request 
    window.skynet.request = request;

}(this, jQuery));