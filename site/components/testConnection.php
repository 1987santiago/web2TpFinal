<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require $local_path . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

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
                                <option value="reserva">reserva</option>
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
        <?php require $local_path . '/components/footer.php'; ?> 

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
                        url : "<?php echo $statics_path; ?>/processors/testConnectToServer.php",
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
                        url : "<?php echo $statics_path; ?>/processors/testSelectDataBase.php",
                        type : 'POST', 
                        callback : showResponse
                    };

                function showResponse(response, status, requestObj) {
                    console.log(response)
                    event.target.nextElementSibling.innerHTML = response;
                }

                window.skynet.request.getDocument(params);

            }; 


        </script>

    </body>

</html>
