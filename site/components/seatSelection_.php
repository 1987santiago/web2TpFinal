<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    require_once '../processors/Database.php';
    require_once '../processors/ProccessData.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    // Generamos la consulta
    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";

    // Ejecutamos la consulta y guardamos la respuesta de la base
    $response_sql = $connect->executeSelect($query_sql);

    // Si el codigo de reserva no pertenece a ningun registro
    if (!$response_sql) {
        // redirigimos al usuario al inicio del checkIn
        setcookie('error', 'Codigo_reserva_invalido');
        header("Location: $statics_path/components/checkIn.php");
    }
    
    // eliminamos la cookie error
    setcookie('error', '', time()-300);  

    setcookie('reservation_code', $reservation_code, time()+1000);

    /**
     * Aca se obtienen los datos de reserva, avion y asiento
     **/
    $reservation_data = $_SESSION['reservation_data'];
    $flight_data = $_SESSION['flight_data'];

    var_dump($reservation_data);
    echo "\n<br><br>";
    var_dump($flight_data);
    echo "\n<br><br>";

    /**
     * Aca se obtienen los datos del avion
     **/
    $flight_proccess_data = new ProccessData($flight_data);

    $plane_code = $flight_proccess_data->getValue('codigo_avion');
    echo '$plane_code : ' . $plane_code . '<br>';

    // Generamos la query para obtener los datos del avión
    $plane_query_sql = "SELECT * FROM avion WHERE (codigo_avion = $plane_code)";

    // Ejecutamos la consulta y guardamos la respuesta (array assoc)
    $plane_data = $connect->executeSelect($plane_query_sql);

    // Si la consulta fue exitosa entra 
    if ($plane_data) { 

        // si el registro está vacío retornamos falso 
        if (!$plane_data) {
            return false;
        }

        echo "\nAsientos: <br>\n";

        $plane_proccess_data = new ProccessData($plane_data);
        $plane_proccess_data->printData(); 

        echo "<br>\n";

        $premium_seat_colums    = $plane_proccess_data->getValue('columnas_primera');
        $premium_seat_rows      = $plane_proccess_data->getValue('filas_primera');
        $economy_seat_colums    = $plane_proccess_data->getValue('columnas_economy');
        $economy_seat_rows      = $plane_proccess_data->getValue('filas_economy');
        $total_premium_seat     = $plane_proccess_data->getValue('asientos_primera');
        $total_economy_seat     = $plane_proccess_data->getValue('asientos_economy');
        $total_seat             = $plane_proccess_data->getValue('total_asientos');

        $seatMapData = array(
            "premium_seat_colums"    => $plane_proccess_data->getValue('columnas_primera'),
            "premium_seat_rows"      => $plane_proccess_data->getValue('filas_primera'),
            "economy_seat_colums"    => $plane_proccess_data->getValue('columnas_economy'),
            "economy_seat_rows"      => $plane_proccess_data->getValue('filas_economy'),
            "total_premium_seat"     => $plane_proccess_data->getValue('asientos_primera'),
            "total_economy_seat"     => $plane_proccess_data->getValue('asientos_economy'),
            "total_seat"             => $plane_proccess_data->getValue('total_asientos')
        );

        $_SESSION["seatMapData"] = $seatMapData;

    } else { 

        // echo 'no entro';

        return false;

    }

    /**
     * Aca se obtienen los asientos ya reservados y/o pagados
     **/
    // Generamos la query para obtener los asientos reservados y/o pagados
    

    /**
     * printSeatMap
     * Dibuja el esquema de asientos del avión en base a los datos recibidos de la base,
     * @$rows_quantity Number con la cantidad de filas de asientos
     * @$cols_quantity Number con la cantidad de asientos por fila (columnas)
     * @$category String con el nombre de la categoría del asiento (premium/economy)
     */
    function printSeatMap($rows_quantity, $cols_quantity, $category) {

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
                        echo "<input id='asiento$category$row$seat' name='asiento' type='radio' value='$row$seat' disabled='disabled'>";
                        echo "<label for='asiento$category$row$seat' class='seat disabled'>F $row A$seat</label>";
                    } else if( ($seat % 2) != 0 && ($row % 3) == 0 ) {
                        echo "<input id='asiento$category$row$seat' name='asiento' type='radio' value='$row$seat' disabled='disabled'>";
                        echo "<label for='asiento$category$row$seat' class='seat reserved'>F $row A$seat</label>";
                    } else {
                        echo "<input id='asiento$category$row$seat' name='asiento' type='radio' value='$row$seat' data-seat-row='$row' data-seat-col='$seat'>";
                        echo "<label for='asiento$category$row$seat' class='seat'>F $row A$seat</label>";
                    }

                }

            } // [END] asiento

            echo "</div>";
            
        } // [END] fila

    }


?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php 
    $_SESSION["resources"] = array(
        "css" => array("seatSelection")
    ); 
    require $statics_path . '/components/head.php'; 
?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <div class="">

                    <article class="seat-selection">

                        <h3>Selección de asiento</h3>

                        <form id="seatSelection" action="seatConfirm.php" method="post">

                            <input name="flightNumber" type="hidden" value='<?php echo "$flight_data[numero_vuelo]"; ?>'>
                            <input name="travelerDni" type="hidden" value='<?php echo "$reservation_data[dni]"; ?>'>

                            <fieldset>

                                <legend>Seleccione un asiento</legend>

                                    <div class="seat-premium-class">
                                        <?php printSeatMap($seatMapData["premium_seat_rows"], $seatMapData["premium_seat_colums"], 'premium'); ?>
                                    </div>
                                    <div class="seat-economy-class">
                                        <?php printSeatMap($seatMapData["economy_seat_rows"], $seatMapData["economy_seat_colums"], 'economy'); ?>
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
        <?php require $statics_path . '/components/footer.php'; ?> 

    <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
        <script type="text/javascript" src="js/components/seatSelection.js"></script> 
    -->
    </body>

</html>


