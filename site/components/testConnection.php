<?php
    // guardamos la nueva ruta base del site
    $SITE_PATH = "/Applications/XAMPP/htdocs/unlam/web2/tpFinal/web2TpFinal/site";
    // guardamos la url de los recursos estaticos
    $static_url = "/unlam/web2/tpFinal/web2TpFinal/site";
?>

<!doctype html>
<html>

    <!-- se incluye el <head> -->
    <?php require $SITE_PATH . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/header.php'; ?> 

            <main id="main" role="main">

                <section id="testConnect">
                    
                    <h2>Test connections</h2>

                    <form action="" method="post" >

                        <div>
                            <label for="serverConnect">Conectarse al servidor </label>
                            <input id="serverConnect" name="serverConnect" type="button" value="conectar" />
                            <div class="response"></div>
                        </div>
                        <div>
                            <label for="dbSelector">Seleccionar DB </label>
                            <select id="dbSelector">
                                <option value="test">test</option>
                                <option value="autos">autos</option>
                                <option value="phpmyadmin">phpmyadmin</option>
                            </select>
                            <input id="selectDB" name="selectDB" type="button" value="Seleccionar" />
                            <div class="response"></div>
                        </div>

                    </form>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/footer.php'; ?> 

        <script type="text/javascript">

            var form = document.querySelectorAll('#testConnect form'),
                serverConnect = document.getElementById('serverConnect'),
                selectDB = document.getElementById('selectDB');

            serverConnect.onclick = function(event) {

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                    serverName : 'localhost',
                    user : 'root',
                    pass : 'root'
                },

                // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : "<?php echo $static_url; ?>/processors/testConnectToServer.php",
                        type : 'POST', 
                        callback : showResponse
                    };

                function showResponse(response, status, requestObj) {
                    event.target.nextElementSibling.innerHTML = response;
                }

                window.skynet.request.getDocument(params);

            }; 

            selectDB.onclick = function(event) {

                var dbName = document.getElementById('dbSelector').value;
                // datos que le pasamos al achivo que valida el codigo
                var data = {
                    dbName : dbName
                },

                // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : "<?php echo $static_url; ?>/processors/testSelectDataBase.php",
                        type : 'POST', 
                        callback : showResponse
                    };

                function showResponse(response, status, requestObj) {
                    event.target.nextElementSibling.innerHTML = response;
                }

                window.skynet.request.getDocument(params);

            }; 


        </script>

    </body>

</html>
