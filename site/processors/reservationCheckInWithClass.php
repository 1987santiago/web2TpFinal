<?php 
    session_start();

    /*
     * en este archivo se procesa el codigo de reserva que ingresa el usuario-cliente
     * el mismo se chequea contra la base de datos la validez del mismo
     * una vez checkeado se sigue el siguiente flujo:
     *      A - VALIDA: se redirije a la seccion de seleccion de asiento (seatSelection.php)
     *      B - NO VALIDA: se redirije a la seccion de ingreso de codigo (paso anterior - checkIn.php), informando el error
     */

    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    include 'ConnectToServer.php';
    include 'SelectDataBase.php';
    include 'AskData.php';

    // Establecemos una conexión con el servidor
    $connect_to_localhost_server = new ConnectToServer('localhost', 'root', 'root');
    $connect_to_localhost_server->connect();
    $connect_link = $connect_to_localhost_server->getConnectionLink();

    // Seleccionamos una base de datos
    $select_reserva_db = new selectDataBase('skynet');
    $select_reserva_db->select();
    $selected_db = $select_reserva_db->getSelectionStatus();

    // Definimos un valor valido a mano
    $hardcode_valid_code = '001A';
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";
    // $response_sql = mysql_query($query_sql, $connect_link);

    // Instanciamos un objeto del tipo AskData 
    // y le pasamos los valores de la consulta a realizar a futuro
    $reservationData = new AskData($query_sql, $connect_link);
    // Realizamos la consulta a la tabla
    $reservationData->executeQuery();

    // Si la consulta fue exitosa entra
    if ($reservationData->getResponse()) { 

        $reservationResponse = $reservationData->getResponse();
        // numero de registros de la tabla
        $data_num_rows = $reservationData->getRows(); 
        // cantidad de datos de cada registro
        $data_num_fields = $reservationData->getFields(); 
        // guarda un array asociativo
        $data_fetch_array_assoc = $reservationData->getRecord(); 
        // $data_fetch_array_assoc = mysql_fetch_array($reservationResponse, MYSQL_ASSOC);

        if (!$data_fetch_array_assoc) {
            return false;
        }

        var_dump($data_fetch_array_assoc);
        // Guardamos los datos del registro en la sesión
        $_SESSION['reserve_data'] = $data_fetch_array_assoc;

        // echo "datos de reserva \n";

        // Guardamos en variables los valores que queremos del registro obtenido
        $id_reservation_code = $reservationData->getValue('codigo_reserva');
        $id_pay = $reservationData->getValue('id_pago');
        $id_flight = $reservationData->getValue('num_vuelo');
        // echo "$id_reservation_code \n $id_pay \n $id_flight \n";


        // for ($r=0; $r < $data_num_rows; $r++) { 
        //     # code...
        //     echo "Registro --> $r <br>";
        //     for ($f=0; $f < $data_num_fields; $f++) { 
        //         # code...
        //         if ($f == 0) {
        //             echo "Dato $f : - " . mysql_result($response_sql, $r, $f) . '<br>';
        //         }
        //     }
        //     echo "<br />";
        // }

        // Chequeamos que la reserva esté pagada
        // $is_paid = is_paid($id_pay);
        // Chequeamos que la hora actual se encuentre entre 2 a 48hs antes de la salida del vuelo
        // $is_valid_time = is_valid_time($id_flight);
        
        $no_table = false;

        return $data_fetch_array_assoc;

    } else { // sino, se mockean valores por defecto

        echo 'no entro';

        return false;

    }

    /**
     * @key String
     * @data [Associative Array]
     * @return the value of this key
     */
    function getValue ($key, $data){

        foreach ($data as $key_ => $value) {

            if ($key_ == $key) {
                return $value;
            }

        }

    }

    function is_paid ($id_pay){

        global $connect_link;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
        $query_sql = "SELECT * FROM pago WHERE (id_pago = '$id_pay');";
        $response_sql = mysql_query($query_sql, $connect_link);

        // Si la consulta fue exitosa entra
        if ($response_sql) { 

            // numero de registros de la tabla
            $data_num_rows = mysql_num_rows($response_sql); 
            // cantidad de datos de cada registro
            $data_num_fields = mysql_num_fields($response_sql); 
            // guarda un array asociativo
            $data_fetch_array_assoc = mysql_fetch_array($response_sql, MYSQL_ASSOC); 

            if (!$data_fetch_array_assoc) {
                return false;
            }

            echo "\ndatos de pago \n";

            foreach ($data_fetch_array_assoc as $key => $value) {
                # code...
                echo "\t$key ---> $value \n";
            }
            
            return true;

        } else { 

            return false;

        }
    
    }

    // function is_valid_time(id_flight) {

        

    // }

    // en caso de no encontrar coincidencias, 
    // se redirige a la pantalla de ingreso de codigo(checkIn.php), notificando el error
    // header('Location: checkIn.php?error=invalid_code');

    // header("Location: $statics_path/components/seatSelection.php?rc=$reservation_code");

?>