<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    include '../processors/ConnectToServer.php';
    include '../processors/selectDataBase.php';
    include '../processors/AskData.php';

    // Establecemos una conexión con el servidor
    $connect_to_localhost_server = new ConnectToServer('localhost', 'root', 'root');
    $connect_to_localhost_server->connect();
    $connect_link = $connect_to_localhost_server->getConnectionLink();

    // Seleccionamos una base de datos
    $select_reserva_db = new selectDataBase('skynet');
    $select_reserva_db->select();
    $selected_db = $select_reserva_db->getSelectionStatus();
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";
    $response_sql = mysql_query($query_sql, $connect_link);

    // Si el codigo de reserva no pertenece a ningun registro
    if (!mysql_fetch_array($response_sql, MYSQL_ASSOC)) {
        // redirigimos al usuario al inicio del checkIn
        setcookie('error', 'Codigo_reserva_invalido');
        header("Location: $statics_path/components/checkIn.php");
    }
    
    // eliminamos la cookie error
    setcookie('error', '', time()-300);  

    setcookie('reservation_code', $reservation_code, time()+1000);

?>

<!-- 
    Esquema de asientos del avion, 
    datos necesarios: 

        // para dibujarlo
        @totalAsientos  
        @cantidadColumnas (hileras de asientos)

        // para determinar el estado de cada asiento
        @idAsiento
        @estadoAsiento

-->
<?php 

    $reservation_data = $_SESSION['reservation_data'];
    $flight_data = $_SESSION['flight_data'];

    var_dump($reservation_data);
    echo "\n<br><br>";
    var_dump($flight_data);
    echo "\n<br><br>";

    $plane_code = getValue($flight_data, 'codigo_avion');

    // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
    $plane_query_sql = "SELECT * FROM avion WHERE (codigo_avion = $plane_code)";
    // Instanciamos un objeto del tipo AskData 
    // y le pasamos los valores de la consulta a realizar a futuro
    $planeData = new AskData($plane_query_sql, $connect_link);

    // Realizamos la consulta a la tabla
    $planeData->executeQuery();

    // $response_sql = mysql_query($query_sql, $connect_link);
    $response_sql = $planeData->getResponse();

    // Si la consulta fue exitosa entra 
    if ($response_sql) { 

        // guarda un array asociativo
        // $data_fetch_array_assoc = mysql_fetch_array($response_sql, MYSQL_ASSOC); 
        $data_fetch_array_assoc = $planeData->getAssociativeArrayResponse(); 

        // si el registro está vacío retornamos falso 
        if (!$data_fetch_array_assoc) {
            return false;
        }

        echo "\nAsientos: <br>\n";

        $planeData->printData($data_fetch_array_assoc); 

        echo "<br>\n";

        // $premium_seat_colums = $planeData->getValue($data_fetch_array_assoc, 'columnas_primera');
        // $premium_seat_rows = $planeData->getValue($data_fetch_array_assoc, 'filas_primera');
        // $economy_seat_colums = $planeData->getValue($data_fetch_array_assoc, 'columnas_economy');
        // $economy_seat_rows = $planeData->getValue($data_fetch_array_assoc, 'filas_economy');
        // $total_premium_seat = $planeData->getValue($data_fetch_array_assoc, 'asientos_primera');
        // $total_economy_seat = $planeData->getValue($data_fetch_array_assoc, 'asientos_economy');
        // $total_seat = $planeData->getValue($data_fetch_array_assoc, 'total_asientos');
        $premium_seat_colums = $planeData->getValue('columnas_primera');
        $premium_seat_rows = $planeData->getValue('filas_primera');
        $economy_seat_colums = $planeData->getValue('columnas_economy');
        $economy_seat_rows = $planeData->getValue('filas_economy');
        $total_premium_seat = $planeData->getValue('asientos_primera');
        $total_economy_seat = $planeData->getValue('asientos_economy');
        $total_seat = $planeData->getValue('total_asientos');

    } else { 

        // echo 'no entro';

        return false;

    }

    // Hardcode values
    // $colsQuantity = 4;
    // $totalSeats = 60;
    // $rows_quantity = $totalSeats / $colsQuantity; // se calcula la cantidad de filas

    // $seatId = 001;
    // $seatStatus = 'disabled'; // valores ['available',disabled']
    // // O bien un dato booleano para saber su estado
    // $availableSeat = false; // or true

    function getValue($array, $key_) {

        foreach ($array as $key => $value) {

            if ($key == $key_) {
                return $value;
            }

        }

    }

    function printSeatMap($rows_quantity, $cols_quantity) {

        for ($row = 0; $row <= $rows_quantity ; $row++) { 
            // fila
            echo "<div>";

            for ($seat = 0; $seat <= $cols_quantity; $seat++) { 
                // asiento
                if ($row == 0 && $seat == 0) {
                    
                    // si es la primer columna y la primer fila, no pongo nada
                    echo "<span class='seat-letter'></span>";

                } else if ($seat == 0) { 
                
                    // si es la primer columna, pongo el numero de fila
                    echo "<span class='seat-number'>$row</span>"; 
                
                } else if ($row == 0) {
               
                    // si es la primer fila pongo las letras de asiento
                    echo "<span class='seat-letter'>$seat</span>"; // TODO: $seat.letra -> A,B,C,D...
                
                } else {

                    // TODO: si el asiento está reservado (asiento.status == 'reserved' || 'disabled'), 
                    //       agregar atributo disabled al radio y la clase correspondiente al label
                    if ( (($seat + $row) % 2) == 0) {
                        echo "<input id='asiento$row$seat' name='asiento' type='radio' value='$row$seat' disabled='disabled'>";
                        echo "<label for='asiento$row$seat' class='seat disabled'>F $row A$seat</label>";
                    } else if( ($seat % 2) != 0 && ($row % 3) == 0 ) {
                        echo "<input id='asiento$row$seat' name='asiento' type='radio' value='$row$seat' disabled='disabled'>";
                        echo "<label for='asiento$row$seat' class='seat reserved'>F $row A$seat</label>";
                    } else {
                        echo "<input id='asiento$row$seat' name='asiento' type='radio' value='$row$seat' data-seat-row='$row' data-seat-col='$seat'>";
                        echo "<label for='asiento$row$seat' class='seat'>F $row A$seat</label>";
                    }

                }

            } // [END] asiento

            echo "</div>";
            
        } // [END] fila

    }


?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require $local_path . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <div class="grid row2-12">

                    <article class="seat-selection">

                        <h3>Selección de asiento</h3>

                        <form id="seatSelection" action="seatConfirm.php" method="post">

                            <input name="flightNumber" type="hidden" value='<?php echo "$flight_data[numero_vuelo]"; ?>'>
                            <input name="travelerDni" type="hidden" value='<?php echo "$reservation_data[dni]"; ?>'>

                            <fieldset>

                                <legend>Seleccione un asiento</legend>

                                    <div class="seat-premium-class">
                                        <?php printSeatMap($premium_seat_rows,$premium_seat_colums); ?>
                                    </div>
                                    <div class="seat-economy-class">
                                        <?php printSeatMap($economy_seat_rows,$economy_seat_colums); ?>
                                    </div>

                            </fieldset>

                            <div>
                                <!-- DATA TO SENT
                                    *id_asiento,
                                    descripcion,
                                    *fila,
                                    *columna,
                                    *numero_vuelo,
                                    id_categoria,
                                    *dni
                                -->
                                <input type="submit" value="Siguiente >">
                            </div>

                        </form>

                    </article>

                </div>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

    <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
        <script type="text/javascript" src="js/components/seatSelection.js"></script> 
    -->
    </body>

</html>


