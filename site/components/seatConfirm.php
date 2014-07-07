<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    $seat_selected = $_POST['asiento'];
    $flight_number = $_POST['flightNumber'];
    $traveler_dni = $_POST['travelerDni'];

    setcookie('seatSelected', $seat_selected);

?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require $local_path . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <section>
                    
                    <h2>Check In</h2>

                    <p>Ah seleccionado el asiento <strong><?php echo $seat_selected; ?></strong></p>

                    <form action="printBoardingPass.php" method="post">

                        <input name="seatConfirmed" type="submit" value="Confirmar" />

                        <a id="gotoPreviousPage" href="<?php echo "$statics_path/components/seatSelection.php"; ?>">Cambiar asiento</a>

                    </form>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

        <script type="text/javascript">

            // (function(){
            //     'use strict';

            //     var link = document.getElementById('gotoPreviousPage');

            //     link.onclick = function(event) {

            //         event.preventDefault();
            //         console.log('window.history ', window.history);
            //         // window.history.back();

            //     };

            // }());

        </script>

    </body>

</html>
