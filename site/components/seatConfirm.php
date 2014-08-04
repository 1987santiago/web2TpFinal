<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    require_once "$base_path$statics_path/processors/Database.php";

    // Establecemos una conexión con el servidor
    $connect = new Database();  

    /*
     * en este archivo se imprime el asiento seleccionado,
     * el usuario puede confirmar o cambiar
     * Pasos a seguir: 
     *      A - CONFIRMA: se guarda el asiento en la db y se redirije a ...
     *      B - CAMBIA: se redirije al paso anterior para que seleccione otro asiento (seatSelection.php)
     */

    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

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
    
    $traveler_data = getTravelerData($save_seat_data['dni']);
    $_SESSION['traveler_data'] = $traveler_data;

    /** 
     * Busca en la base los datos del pasajero, 
     * basandose en el numero de documento
     * @param Number $dni
     * @return [Array] 
     */
    function getTravelerData($dni) {

        global $connect;

        // Generamos la query para obtener el precio de la reserva
        $query_sql = "SELECT * FROM pasajero WHERE (dni = $dni)";

        // Realizamos la consulta a la tabla y guardamos los datos devueltos 
        $traveler_data = $connect->executeSelect($query_sql)[0];

        // Si la consulta fue exitosa entra
        if ($traveler_data) { 

            // si el registro está vacío retornamos falso 
            if (sizeof($traveler_data) == 0) {
                // echo '$price :: vacio false';
                return false;
            }

            return $traveler_data;

        }

    }

    // Incluimos los recursos css y js que necesita este componente especifico
    $_SESSION["resources"] = array(
        "css" => array("seatConfirm")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?>

            <main id="main" role="main">

                <!-- se incluye el sidebar -->
                <?php include "$base_path$statics_path/components/navLateral.php"; ?>                 

                <section class="col seat-confirm" id="seatConfirm">
                    
                    <h2>Check In</h2>

                    <p>Sr/a. <?php echo $traveler_data['nombre'] . ' ' . $traveler_data['apellido']; ?> usted a realizado la siguiente eleccion de asiento:</p>
                    
                    <dl>
                        <dt>Categoria del asiento: </dt>
                        <dd><?php echo $save_seat_data['descripcion']; ?></dd>
                        
                        <dt>Fila: </dt>
                        <dd><?php echo $save_seat_data['fila']; ?></dd>
                        
                        <dt>Asiento: </dt>
                        <dd><?php echo $save_seat_data['columna']; ?></dd>
                    </dl>

                    <p><a class="link-button" id="saveSeat" href='<?php echo "$statics_path/processors/saveSeat.php"; ?>'>Confirmar y reservar asiento</a></p>
                    <p><a class="link-button" id="changeSeatBtn" href='<?php echo "$statics_path/components/seatSelection.php"; ?>'>Cambiar asiento</a></p>

                    <p><a id="cancelSeatBtn" href='<?php echo "$statics_path/components/seatSelectionCancel.php"; ?>'>Cancelar</a></p>
<!--                     <form action="seatSelectionCancel.php" method="post">
                        <input type="submit" value="Cancelar" />
                    </form>
 -->
                    <div id="boardingPass"></div>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?> 

        <script type="text/javascript">

            var section = document.getElementById('seatConfirm'),
                seatSaveLink = document.getElementById('saveSeat');

            seatSaveLink.onclick = function(event) {

                event.preventDefault();

                // Guardamos en variables los datos de php
                var seatSelected = "<?php echo $seat_selected; ?>",
                    saveSeatUrl = "<?php echo $statics_path; ?>/processors/saveSeat.php",
                    printBoardingPassUrl = "<?php echo $statics_path; ?>/components/printBoardingPass.php";

                // datos que le pasamos al achivo que valida el codigo
                var data = {
                        seatId : seatSelected
                    },

                    // parametros que necesitamos para hacerl el request por ajax
                    params = {
                        data : data,
                        url : saveSeatUrl,
                        type : 'POST', 
                        callback : savedSeat
                    };

                function savedSeat(response, status, requestObj) {

                    var boardingPass = document.getElementById('boardingPass');
                    
                    if (response) { // si valida 
                        // Mostramos el boton para imprimir el boarding pass
                        var changeSeatBtn = document.getElementById('changeSeatBtn');
                            changeSeatBtn.style.display = 'none';
                        boardingPass.innerHTML = 
                            '<div class="box box-success">' +
                            '<h3>Reserva Existosa</h3>' +
                            '<p>Ahora puede imprimir su boleto clickeando en este botón: ' + 
                            '<a href="' + printBoardingPassUrl + '">Imprimir Boleto</a></p>' + 
                            '</div>';

                    } else {
                        // Mostramos el boton para imprimir el boarding pass
                        boardingPass.innerHTML = 
                            '<div class="box box-error">' +
                            '<h3>No se pudo concretar el check-in</h3>' +
                            '</div>';
                        //window.skynet.messages.error(response);
                    }

                }

                window.skynet.request.getDocument(params);

            }

        </script>

    </body>

</html>
