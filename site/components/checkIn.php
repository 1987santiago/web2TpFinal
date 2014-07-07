<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php 
    $_SESSION["resources"] = array(
        "css" => array("seatSelection")
    ); 
    require $local_path . '/components/head.php'; 
?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <section id="checkIn">
                    
                    <h2>Check In</h2>

                    <?php 
                        if ( isset($_COOKIE['error']) ) {
                            echo '<p class="box box-error">$_COOKIE[\'error\']</p>';
                        }
                    ?>

                    <form action="seatSelection.php" method="post" >

                        <input name="statics_path" value="<?php echo $statics_path; ?>" type="hidden" />

                        <label for="reservationCode">Ingrese su código de reserva: </label>
                        <input id="reservationCode" name="reservationCode" type="text" />

                        <input type="submit" value="Verificar" />

                    </form>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

        <script type="text/javascript">

            var form = document.querySelector('#checkIn form'),
                reservationCode = form.reservationCode;

            reservationCode.onchange = function(event) {

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                        reservationCode : reservationCode.value
                    },

                    // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : "<?php echo $statics_path; ?>/processors/reservationCheckIn.php",
                        type : 'POST', 
                        callback : skinField
                    };

                function skinField(response, status, requestObj) {

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

        </script>

    </body>

</html>
