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

    setFligthsData(); // busca los vuelos en la base y setea una variable de session "flights_data"
    // obtenemos los vuelos desde dicha variable
    $flights_data = $_SESSION['flights_data']; 

    /**
     * getFlightsData
     * Busca todos los datos de la tabla vuelo y los guarda en session
     * @return Boolean 
     */
    function setFligthsData() {

        global $connect;

        // Generamos la query para obtener los datos del vuelo, mediante su numero de vuelo
        $query_sql = "SELECT * FROM vuelo WHERE 1";

        // Ejecutamos la query y guardamos el valor devuelto por la base
        $flights_data = $connect->executeSelect($query_sql);

        // Si la consulta fue exitosa entra
        if ($flights_data) { 

            // si el registro está vacío retornamos falso 
            if (!$flights_data) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['flights_data'] = $flights_data;

            return true;

        } else { 

            return false;
            
        }

    }

    /**
     * setFlightData
     * Busca en la base los datos del vuelo pasado por parametro
     * @param $id_flight numero identificatorio del vuelo
     * @return Boolean 
     */
    function setFsligthData($id_flight) {

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
     * generateFlightList
     * Crea un select con todos los vuelos disponibles
     */
    function generateFlightList() {

        global $flights_data;

        echo "<select id='flightsList' name='id_flight'>";
        foreach ($flights_data as $vuelo => $data) {
            $description = $data['numero_vuelo'] . ' | ' . $data['origen'] . ' - ' . $data['destino'];
            echo "<option value=" . $data['numero_vuelo'] . ">$description</option>";
        }
        echo "</select>";

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

                    <form action="<?php echo "$statics_path/sections/checkReservasVuelo.php"; ?>" method="post">
                        <?php 
                            generateFlightList();
                        ?>
                        <div><input type="submit" value="Ver estado" /></div>
                    </form>

                </section>

            </main>
        
        </div><!-- [END] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

    </body>

</html>
