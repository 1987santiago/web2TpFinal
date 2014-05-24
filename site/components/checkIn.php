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

                <section id="checkIn">
                    
                    <h2>Check In</h2>

                    <form action="seatSelection.php" method="post" >

                        <input name="static_url" value="<?php echo $static_url; ?>" type="hidden" />

                        <label for="reservationCode">Ingrese su código de reserva: </label>
                        <input id="reservationCode" name="reservationCode" type="text" />

                        <input type="submit" value="Verificar">

                    </form>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/footer.php'; ?> 

        <script type="text/javascript">

            var form = document.querySelectorAll('#checkIn form'),
                reservationCode = document.getElementById('reservationCode');

            reservationCode.onchange = function(event) {

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                    reservationCode : reservationCode.value
                },

                // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : "<?php echo $static_url; ?>/processors/reservationCheckIn.php",
                        type : 'POST', 
                        callback : skinField
                    };

                function skinField(response, status, requestObj) {
                    console.log('skinField: response --> ', response);

                    if (response === 'true') { // si valida 
                        inputClass = 'valid';
                        // seteamos los datos necesarios para hacer la llamada al componente
                        // component = {
                        //     name : 'seatSelection',
                        //     data : data
                        // };
                    } else {
                        inputClass = 'invalid';
                        // seteamos los datos necesarios para hacer la llamada al componente e informar el error
                        // data['errorMsg'] = 'Código inválido';
                        // component = {
                        //     name : 'checkIn',
                        //     data : data
                        // }
                    }
                    reservationCode.setAttribute('class', inputClass);

                    // llamamos al componente correspondiente
                    // window.skynet.request.getComponent(component);

                }

                window.skynet.request.getDocument(params);

            }; 

        </script>

    </body>

</html>
