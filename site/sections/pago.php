<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main">
                                        
                <!-- se incluye la barra lateral de navegacion -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <section class="col" id="pay">

                    <h2 class="reserva">Abona tu pasaje</h2>

                    <form data-component="pay" action ="<?php echo "$statics_path/sections/confirmaPago.php"; ?>" method="post">

                        <label>Ingresa tu codigo de reserva: </label>
                        <!-- <input type="text" name="codReserva" id="codReserva" /> -->
                        <input id="reservationCode" name="reservationCode" type="text" />
                        <input type="submit" value="Consultar" />

                    </form>

                </section>

            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>
        
        </div><!-- [END] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <script type="text/javascript">

            var form = document.querySelector('#pay form'),
                reservationCode = form.reservationCode;

            reservationCode.onchange = function(event) {

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                        reservationCode : reservationCode.value,

                        // Con este dato el validador define que validación hacer
                        // No es lo mismo para pagar que para hacer el check-in por ejemplo 
                        component : (form.dataset)? form.dataset.component : form.getAttribute('data-component')
                    },

                    // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : "<?php echo $statics_path; ?>/processors/validateReservationStatus.php",
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
