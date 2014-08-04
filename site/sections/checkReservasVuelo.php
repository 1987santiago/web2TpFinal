<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

        if ( !isset($_SESSION['admin_logged']) || !$_SESSION['admin_logged']) {
        $_SESSION['error'] = 'Debe registrarse';
        header("Location: $statics_path/sections/home.php");
    }

    # ==========================================
    # Obtenemos los datos pasados por post
    # y los datos de sesion
    # ==========================================
        if ( isset($_POST['id_flight']) ) {
            $id_flight = $_POST['id_flight'];
            setcookie('id_flight', $id_flight, time()+600, $statics_path);
        } else if( isset($_COOKIE['id_flight']) ) {
            $id_flight = $_COOKIE['id_flight'];
        }

        $reservation_enabled = ( isset($_SESSION['reservation_enabled'])? $_SESSION['reservation_enabled'] : array() );
        
    # ==========================================

    # ==========================================
    # TODO:
    # ==========================================
    # En base a una lista de vuelos, tabla "vuelo"
    # Selecciona un vuelo y obtiene -> numero_vuelo
    # Con el numero de vuelo, busca el avion -> vuelo.codigo_avion
    #
    # Con el codigo de avion puede obtener la hora de partida del vuelo -> reserva.fecha_partida
    # Si está entre las 24 y 2 horas anteriores a la partida comienza la baja de aquellas reservas impagas -> reserva.estado == 0 
    # Según la cantidad de reservas impagas que se den de baja -> reserva.estado = -2
    # Son las reservas en espera que se van a habilitar para ser pagadas -> WHERE (reserva.estado == -1) reserva.estado = 0 
    # De esa reserva que se habilita se obtiene el dni del pasajero -> reserva.dni
    # 
    # Con el dni se obtiene el mail del pasajero -> pasajero.email
    # con el mail se lo notifica del nuevo estado 
    # ==========================================

    # ==========================================
    # Conexion con el servidor y DB
    # ==========================================
        require_once '../processors/Database.php';
        require_once '../processors/ProccessData.php';

        // Establecemos una conexión con el servidor
        $connect = new Database();
    # ==========================================

    getFlightData($id_flight); // Obtenemos los datos del vuelo seleccionado
    $flight_data = $_SESSION['flight_data'];

    getReservationsData($id_flight); // Obtenemos todas las reservas del vuelo seleccionado
    if ( isset($_SESSION['reservations_data']) ) {
    
        $reservations_data = $_SESSION['reservations_data'];
        $reservations_status = proccessReservationData($reservations_data);

        $starting_date = $reservations_data[0]['fecha_partida'];
        $enable_standby_reserves = getRemainingTime($starting_date);
        
    } else {

        $reservations_error = "No se encontraron reservas para este vuelo";

    }

    /**
     * getFlightData
     * Busca en la base los datos del vuelo pasado por parametro
     * @param $id_flight numero identificatorio del vuelo
     * @return Boolean 
     */
    function getFlightData($id_flight) {

        global $connect;

        // Generamos la query para obtener los datos del vuelo, mediante su numero de vuelo
        $query_sql = "SELECT numero_vuelo, origen, destino, tarifa_primera, tarifa_economy, codigo_avion FROM vuelo WHERE (numero_vuelo = '$id_flight');";

        // Ejecutamos la query y guardamos el valor devuelto por la base
        $flight_data = $connect->executeSelect($query_sql);

        // Si la consulta fue exitosa entra
        if ($flight_data) { 

            // si el registro está vacío retornamos falso 
            if (!$flight_data) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['flight_data'] = $flight_data[0];

            return true;

        } else { 

            return false;
            
        }

    }

    /**
     * getReservationsData
     * Obiene las reservas del vuelo indicado por paramtro
     * @param $id_flight 
     * @return Boolean 
     */
    function getReservationsData($id_flight) {

        global $connect;

        // Generamos la query para obtener los datos del avión según su código
        $reservations_query_sql = "SELECT codigo_reserva, fecha_partida, estado, dni, id_categoria FROM reserva WHERE (numero_vuelo = $id_flight)";

        // Ejecutamos la consulta y guardamos la respuesta (array assoc)
        $reservations_data = $connect->executeSelect($reservations_query_sql);

        // Si la consulta fue exitosa entra 
        if ($reservations_data) { 

            // si el registro está vacío retornamos falso 
            if (!$reservations_data) {
                return false;
            }

            // Guardamos en una variable de session los datos del avión
            $_SESSION['reservations_data'] = $reservations_data;

        } else { 

            $_SESSION['reservations_data'] = null;
            return false;

        }

    }

    /**
     * proccessReservationData
     * 
     * @param 
     * @return Boolean 
     */
    function proccessReservationData($reservations) {

        global $reservation_enabled;

        $reservations_status = array();
        $reservations_paid = array();
        $reservations_unpaid = array();
        $reservations_standby = array();

        // Iteramos todas la reservas obtenidas
        foreach ($reservations as $index => $reservation) {
            
            // Iteramos cada reserva para obtener sus datos
            foreach ($reservation as $key => $value) {

                if ($key == 'estado') {
                    # -2 reserva caida (es aquella reserva valida no pagada a 24 horas antes de salir el vuelo)
                    # -1 reserva en espera
                    # 0  reserva valida no pagada
                    # 1  reserva valida pagada
                    # 2  reserva con checkin realizado (terminada)
                    switch ($value) {
                        case '-1':
                            $reservation['type'] = 'standby';
                            array_push($reservations_standby, $reservation);
                            break;

                        case '0':
                            // Si esta reserva fue recientemente habilitada, no se la agrega como no pagada,
                            // Para evitar que se la cancele por error
                            if ( !in_array($reservation['codigo_reserva'], $reservation_enabled) ) {
                                $reservation['type'] = 'unpaid';
                                array_push($reservations_unpaid, $reservation);
                            }
                            break;
                        
                        case '1':
                        case '2':
                            $reservation['type'] = 'paid';
                            array_push($reservations_paid, $reservation);
                            break;
                        
                        default:
                            break;
                    }
                }
            }

        }

        $reservations_status['reservations_standby'] = $reservations_standby; 
        $reservations_status['reservations_unpaid'] = $reservations_unpaid; 
        $reservations_status['reservations_paid'] = $reservations_paid; 

        return $reservations_status;

    }


    /**
     * getRemainingTime
     * 
     */
    function getRemainingTime($starting_date) {

        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $starting_date = "$starting_date 08:00:00";
        $current_date = date('Y-m-d h:i:s'); //"2014-08-14 05:00:00";

        $seconds = strtotime($starting_date) - strtotime($current_date);
        $hours_remaining = $seconds / 60 / 60;

        return ($hours_remaining <= 24);

    }

    /**
     * printData
     * 
     */
    function printData($reservation_data, $enable_standby_reserves = false) {

        global $statics_path;

        echo '<table><thead>
                <th>Fecha de partida</th>
                <th>Estado de la reserva</th>
                <th>Dni</th>
                <th>Cod. categoría</th>
              </thead><tbody>';

        foreach ($reservation_data as $index => $record) {
            echo '<tr>';

            foreach ($record as $key => $data) {

                if ($key == 'codigo_reserva') {
                    $reservation_code = $data;
                } else if($key == 'type') {
                    $reservation_type = $data;
                } else {   
                    echo "<td>$data</td>";
                }
            }
            if ($enable_standby_reserves) {
                echo "<td><input name='reservation_code[]' value='$reservation_code' type='checkbox' /></td>";
            }

            echo '</tr>';
        }


        echo '</tbody></table>';

    }

    // se incluye el inicio del html <!doctype html>...</head>
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main">
                                        
                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <section class="col" id="checkReservas">

                    <h2>Chequeo de reservas</h2>
                    <?php 
                        if (isset($_SESSION['update_success'])) { 
                            $box = ($_SESSION['update_success']? 'box-success' : 'box-error');
                            $box_msg = ($_SESSION['update_success']? 'El cambio se realizo satisfactoriamente' : 'No se pudo realizar el camibio, vuelva a intentarlo');
                            echo "<div class='box $box'>$box_msg</div>";
                            $_SESSION['update_success'] = null;
                        }
                    ?>
                    <div>                       
                        <h3>Datos del Vuelo</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Numero de vuelo</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Tarifa Primera</th>
                                    <th>Tarifa Economy</th>
                                    <th>Avión</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                    foreach ($flight_data as $key => $value) {
                                        echo "<td>$value</td>";
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Datos del Avión</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Capacidad total</th>
                                    <th>Asientos Primera</th>
                                    <th>Asientos Economy</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                ?>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Estado de reservas</h3>
                        <?php if (isset($reservations_error)) { ?>
                            <div class='box box-error'><?php echo $reservations_error; ?></div>
                        <?php } else { ?>

                            <form>
                                <fieldset>
                                    <legend>Reservas pagas <span><?php echo count($reservations_status['reservations_paid']); ?></span></legend>
                                    <?php printData($reservations_status['reservations_paid']); ?>
                                </fieldset>
                            </form>
                                
                            <form action="<?php echo "$statics_path/processors/disableReservation.php"; ?>" method="post">
                                <fieldset>
                                    <legend>Reservas sin pagar <span><?php echo count($reservations_status['reservations_unpaid']); ?></span></legend>
                                    <?php printData($reservations_status['reservations_unpaid'], true); ?>
                                    <div><input type="submit" value="Dar de baja"></div>
                                </fieldset>
                            </form>

                            <form action="<?php echo "$statics_path/processors/enableReservation.php"; ?>" method="post">
                                <fieldset>
                                    <legend>Reservas en espera <span><?php echo count($reservations_status['reservations_standby']); ?></span></legend>
                                    <?php printData($reservations_status['reservations_standby'], $enable_standby_reserves); ?>
                                    <div><input type="submit" value="Habilitar reservas"></div>
                                </fieldset>
                            </form>

                        <?php } ?>

                    </div>

                    <a href="<?php echo "$statics_path/sections/checkReservas.php" ?>">Volver</a>

                </section>

            </main>
        
        </div><!-- [END] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

    </body>

</html>
