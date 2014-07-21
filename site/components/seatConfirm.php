<?php
    session_start();

    /*
     * en este archivo se imprime el asiento seleccionado,
     * el usuario puede confirmar o cambiar
     * Pasos a seguir: 
     *      A - CONFIRMA: se guarda el asiento en la db y se redirije a ...
     *      B - CAMBIA: se redirije al paso anterior para que seleccione otro asiento (seatSelection.php)
     */

    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    if (!isset($_POST['seat'])) {
        // redirigimos al usuario al inicio del checkIn
        setcookie('error', 'No_selecciono_asiento');
        header("Location: $statics_path/components/seatSelection.php");
    }

    $seat_selected = $_POST['seat'];
    // $flight_number = $_POST['flightNumber'];
    // $traveler_dni = $_POST['travelerDoc'];

    // Array bidimensional [array(array())] con los datos de todos los asientos
    $seat_data_map = $_SESSION['seat_data_map'];
    // datos de la reserva
    $reservation_data = $_SESSION['reservation_data']; 

    // Acá obtenemos el codigo de asiento, el mismo se compone del código de categoría y el id de asiento
    // ej: 
    //      categoría:          premium, 
    //      código categoría:   100, 
    //      id de asiento:      12 (columna 1, fila 2),
    //      código de asiento:  10012 
    $seat_code = $reservation_data[0]['id_categoria'] . $seat_selected;
    $seat_data = $seat_data_map[$seat_code];

    $save_seat_data = array (
        'id_asiento' => $seat_data['id'], // desde seatSelection
        'descripcion' => $seat_data['data_category_description'], // desde seatSelection
        'fila' => $seat_data['data_seat_row'], // desde seatSelection
        'columna' => $seat_data['data_seat_col'], // desde seatSelection
        'numero_vuelo' => $reservation_data[0]['numero_vuelo'],
        'id_categoria' => $reservation_data[0]['id_categoria'],
        'dni' => $reservation_data[0]['dni']
        );
    $_SESSION['save_seat_data'] = $save_seat_data;

?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require $local_path . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?>

            <main id="main" role="main">

                <!-- se incluye el sidebar -->
                <?php include $local_path . '/components/navLateral.php'; ?>                 

                <section class="col" id="seatConfirm">
                    
                    <h2>Check In</h2>

                    <p>Sr/a. #Nombre# usted a realizado la siguiente elección de asiento:</p>
                    <dl>
                        <dt>Categoría del asiento: </dt>
                        <dd><?php echo $save_seat_data['descripcion']; ?></dd>
                        
                        <dt>Fila: </dt>
                        <dd><?php echo $save_seat_data['fila']; ?></dd>
                        
                        <dt>Asiento</dt>
                        <dd><?php echo $save_seat_data['columna']; ?></dd>
                    </dl>

                    <p><a id="saveSeat" href='../processors/saveSeat.php'>Confirmar y reservar asiento</a></p>
                    <p><a id="gotoPreviousPage" href='seatSelection.php'>Cambiar asiento</a></p>

                    <form action="seatSelectionCancel.php" method="post">
                        <input type="submit" value="Cancelar" />
                    </form>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

        <script type="text/javascript">

            var section = document.getElementById('seatConfirm'),
                seatSaveLink = section.getElementById('saveSeat');

            seatSaveLink.onclick = function(event) {

                event.preventDefault();

                alert('alert');

                // Guardamos en variables los datos de php
                var seatSelected = "<?php $seat_selected ?>",
                    saveSeatUrl = "<?php echo $statics_path; ?>/processors/saveSeat.php",
                    printBoardingPassUrl = "<?php echo $statics_path; ?>/components/printBoardingPass.php";

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                        seatId : seatSelected;
                    },

                    // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : saveSeatUrl,
                        type : 'POST', 
                        callback : savedSeat
                    };

                function savedSeat(response, status, requestObj) {

                    if (response) { // si valida 
                        // Mostramos el boton para imprimir el boarding pass
                        var boardingPass = section.getElementById('boardingPass');
                        boardingPass.innerHTML = '<a href="' + printBoardingPassUrl + '">Imprimir Boleto</a></form>';

                    } else {
                        // Notificamos que hubo un error y solicitamos vuelva a intentarlo
                        console.log('Error amigo');
                        //window.skynet.messages.error(response);
                    }

                }

                window.skynet.request.getDocument(params);

            }; 

        </script>

    </body>

</html>
