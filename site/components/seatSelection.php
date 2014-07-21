<?php
    session_start();

    /*
     * en este archivo se dibuja el mapa del avión, 
     * para esto, se obtienen los datos de la reserva, del vuelo y del avión
     * con los datos del vuelo se obtienen los asientos reservados o pagados (inhabilitados)
     * y se deshabilitan para impedir su selección
     */

    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // Si existen errores se guardan e informan
    $hasError = false;

    if (isset($_COOKIE['error'])) {
        $hasError = true;
        $errorMsg = $_COOKIE['error'];
    }
    
    if (!isset($_POST['reservation_code']) && !isset($_COOKIE['reservation_code']) && !isset($_SESSION['reservation_code']) ) {

        // En caso de no existir el codigo de reserva 
        // redirigimos al usuario al inicio del checkIn
        setcookie('error', 'Codigo_reserva_no_ingresado');
        header("Location: $statics_path/sections/checkIn.php");

    } else {

        // Obtenemos el código ingresado por usuario
        if (isset($_POST['reservation_code'])) {
            $reservation_code = $_POST['reservation_code']; 
        } else if (isset($_COOKIE['reservation_code'])) {
            $reservation_code = $_COOKIE['reservation_code'];
        } else if (isset($_SESSION['reservation_code'])) {
            $reservation_code = $_SESSION['reservation_code'];
        }

    }

    require_once '../processors/Database.php';
    require_once '../processors/ProccessData.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();

    // Generamos la consulta
    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";

    // Ejecutamos la consulta y guardamos la respuesta de la base
    $response_sql = $connect->executeSelect($query_sql);

    // Si el codigo de reserva no pertenece a ningun registro
    if (!$response_sql) {
        // redirigimos al usuario al inicio del checkIn
        setcookie('error', 'Codigo_reserva_invalido');
        header("Location: $statics_path/sections/checkIn.php");
    }
    
    // eliminamos la cookie error
    setcookie('error', '', time()-300);

    setcookie('reservation_code', $reservation_code, time()+1000);

    #######################################################################################

    $reservation_data = $_SESSION['reservation_data'];

    setFligthData($reservation_data[0]['numero_vuelo']);
    $flight_data = $_SESSION['flight_data'];

    setPlaneData($flight_data[0]['codigo_avion']);
    $plane_data = $_SESSION['plane_data'];

    // Declaramos un array para guardar los datos del avión y dibujar el esquema del mismo
    $seatMapData = array();
    $plane_proccess_data = new ProccessData($plane_data);

    foreach ($plane_data as $index => $record) {

        foreach ($record as $key => $value) {
            // Guardamos en el array los datos del avión
            $seatMapData["$key"] = $value;
        }

    }

    $_SESSION["seatMapData"] = $seatMapData;


    /**
     * setFlightData
     * Busca en la base los datos del vuelo pasado por parametro
     * @param $id_flight numero identificatorio del vuelo
     * @return Boolean 
     */
    function setFligthData($id_flight) {

        global $connect;

        // Generamos la query para obtener los datos del vuelo, mediante su numero de vuelo
        $query_sql = "SELECT * FROM vuelo WHERE (numero_vuelo = '$id_flight');";

        // Ejecutamos la query y guardamos el valor devuelto por la base
        $flight_data = $connect->executeSelect($query_sql);

        // Si la consulta fue exitosa entra
        if ($flight_data) { 

            // si el registro está vacío retornamos falso 
            if (!$flight_data) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['flight_data'] = $flight_data;

            return true;

        } else { 

            return false;
            
        }

    }

    /**
     * setPlaneData
     * Busca en la base los datos del avion detallado por parametro
     * @param $plane_code numero identificatorio del avion
     * @return Boolean 
     */
    function setPlaneData($plane_code) {

        global $connect;

        // Generamos la query para obtener los datos del avión según su código
        $plane_query_sql = "SELECT * FROM avion WHERE (codigo_avion = $plane_code)";

        // Ehecutamos la consulta y guardamos la respuesta (array assoc)
        $plane_data = $connect->executeSelect($plane_query_sql);

        // Si la consulta fue exitosa entra 
        if ($plane_data) { 

            // si el registro está vacío retornamos falso 
            if (!$plane_data) {
                return false;
            }

            // Guardamos en una variable de session los datos del avión
            $_SESSION['plane_data'] = $plane_data;

        } else { 

            // echo 'no entro';
            return false;

        }

    }

    /**
     * getReservedSeats
     * Checkea que asientos ya estan reservados/ocupados
     * @return array() con lo asientos NO disponibles
     */
    function getReservedSeats($flight_num) {

        global $connect;

        // Generamos la query para obtener los id de los asientos de un vuelo (avión), según el número de vuelo
        $reserved_seats_query_sql = "SELECT id_asiento FROM asiento WHERE (numero_vuelo = $flight_num)";

        // Ehecutamos la consulta y guardamos la respuesta (array assoc)
        $reserved_seats = $connect->executeSelect($reserved_seats_query_sql);

        // Si la consulta fue exitosa entra 
        if ($reserved_seats) { 

            // si el registro está vacío retornamos falso 
            if (!$reserved_seats) {
                return 0;
            }  

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['reserved_seats'] = $reserved_seats;

            return $reserved_seats;

        } else { 

            // echo 'no entro';
            echo "no se encontraron asientos reservado";
            return 0;

        }

    }

    /**
     * isReservedSeat
     * Checkea que el asiento pasado por parametro este reservado
     * @param seat_id Number con el id del asiento
     * @return Boolean 
     */
    function isReservedSeat($seat_id) {

        $flight_num = $_SESSION['reservation_data'][0]['numero_vuelo'];

        $reserved_seat = array();

        if (isset($_SESSION['reserved_seats'])) {
            $reserved_seat = $_SESSION['reserved_seats'];
        } else {
            $reserved_seat = getReservedSeats($flight_num);
        }

        foreach ($reserved_seat as $key => $id_asiento) {

            $seat = new ProccessData($id_asiento);
            $id = $seat->getValue('id_asiento');

            if($id == $seat_id) {
                return true;
            }

        }

        return false;

    }

    /**
     * printSeatMap
     * Dibuja el esquema de asientos del avión en base a los datos recibidos de la base,
     * @$rows_quantity Number con la cantidad de filas de asientos
     * @$cols_quantity Number con la cantidad de asientos por fila (columnas)
     * @$category Number con el codigo de la categoría del asiento (100->premium / 200->economy)
     */
    function printSeatMap($rows_quantity, $cols_quantity, $category_code) {

        $category_description = ($category_code == 100)? 'premi' : 'econo';

        if ($_SESSION['reservation_data'][0]['id_categoria'] == $category_code) {
        // Sólo se setea este array si la categoría se corresponde con la reservada
            $seat_data_map = array();
        }

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

                    // Obtenemos el id del asiento para compararlo con los reservados
                    $id_asiento = $row . $seat;

                    if (isReservedSeat($id_asiento) || $_SESSION['reservation_data'][0]['id_categoria'] != $category_code) { // Si el asiento esta reservado o no corresponde a la categoria pagada lo deshabilitamos

                        echo "<input 
                            id='asiento$category_code$id_asiento' 
                            name='seat' 
                            type='radio' 
                            value='$id_asiento' 
                            data-category-code='$category_code' 
                            data-category-description='$category_description' 
                            disabled='disabled'>";
                        echo "<label for='asiento$category_code$id_asiento' class='seat disabled'>F $row A$seat</label>";

                    } else {

                        // Se genera un array con la info del asiento 
                        $seat_data = array(
                            'id' => $id_asiento,
                            'data_category_code' => $category_code,
                            'data_category_description' => $category_description,
                            'data_seat_row' => $row,
                            'data_seat_col' => $seat,
                            );
                        // Esa info se agrega al array de asientos (disponibles)
                        $seat_data_map[$category_code . $id_asiento] = $seat_data;

                        echo "<input 
                            id='asiento$category_code$id_asiento' 
                            name='seat' 
                            type='radio' 
                            value='$id_asiento' 
                            data-category-code='$category_code' 
                            data-category-description='$category_description' 
                            data-seat-row='$row' 
                            data-seat-col='$seat'>";
                        echo "<label for='asiento$category_code$id_asiento' class='seat'>F $row A$seat</label>";
                    }

                }

            } // [END] asiento

            echo "</div>";

        } // [END] fila
        
        if ($_SESSION['reservation_data'][0]['id_categoria'] == $category_code) {
            // Se agrega el array con la info de todos los asientos disponibles 
            // a una variable de sesión, para utilizarla luego
            $_SESSION['seat_data_map'] = $seat_data_map;
        }

    }


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


                <!-- se incluye el sidebar -->
                <?php include $local_path . '/components/navLateral.php'; ?> 
                    
                <?php
                    if ($hasError) { 
                        echo "<div class='box-error'>$errorMsg</div>";
                    }
                ?>

                <article class="col seat-selection">

                    <h3>Selección de asiento</h3>

                    <form id="seatSelection" action="seatConfirm.php" method="post">

                        <input name="flightNumber" type="hidden" value='<?php echo "$flight_data[numero_vuelo]"; ?>'>
                        <input name="travelerDoc" type="hidden" value='<?php echo "$reservation_data[dni]"; ?>'>

                        <fieldset>

                            <legend>Seleccione un asiento</legend>

                                <div class="seat-premium-class">
                                    <?php printSeatMap($seatMapData["filas_primera"], $seatMapData["columnas_primera"], 100); ?>
                                </div>
                                <div class="seat-economy-class">
                                    <?php printSeatMap($seatMapData["filas_economy"], $seatMapData["columnas_economy"], 200); ?>
                                </div>

                        </fieldset>

                        <div>
                            <input type="submit" value="Siguiente >" />
                        </div>

                    </form>

                    <form action="seatSelectionCancel.php" method="post">
                        <input type="submit" value="Cancelar" />
                    </form>

                </article>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

    <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
        <script type="text/javascript" src="js/components/seatSelection.js"></script> 
    -->
    </body>

</html>