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

    // Instanciamos un objeto del tipo AskData 
    // y le pasamos los valores de la consulta a realizar a futuro
    $reservationData = new AskData($query_sql, $connect_link);

    // Realizamos la consulta a la tabla
    $reservationData->executeQuery();

    $response_sql = $reservationData->getResponse();
    // $response_sql = mysql_query($query_sql, $connect_link);

    // Si la consulta fue exitosa entra
    if ($response_sql) { 

        // guarda un array asociativo 
        $data_fetch_array_assoc = $reservationData->getAssociativeArrayResponse(); 

        // si el registro está vacío retornamos falso 
        if (!$data_fetch_array_assoc) {
            return false;
        }

        // Guardamos en una variable de session los datos de la reserva
        $_SESSION['reservation_data'] = $data_fetch_array_assoc;
    
        echo "\nDatos de reserva: \n";

        $reservationData->printData($data_fetch_array_assoc); 

        // obtenemos el id de pago, 
        // $id_pay = $reservationData->getValue($data_fetch_array_assoc, 'id_pago');
        $id_pay = $reservationData->getValue('id_pago');
        // obtenemos el id de reserva, 
        // $id_reservation_code = $reservationData->getValue($data_fetch_array_assoc, 'codigo_reserva');
        $id_reservation_code = $reservationData->getValue('codigo_reserva');
        // obtenemos el id de vuelo,  
        // $id_flight = $reservationData->getValue($data_fetch_array_assoc, 'numero_vuelo');
        $id_flight = $reservationData->getValue('numero_vuelo');

        // echo "\tid de pago ---> $id_pay\n";
        // echo "\tid reserva ---> $id_reservation_code\n";
        // echo "\tid de vuelo ---> $id_flight\n";

        // Chequeamos que la reserva esté pagada
        $is_paid = is_paid($id_pay); 
        // Chequeamos que la hora actual se encuentre entre 2 a 48hs antes de la salida del vuelo
        $is_valid_time = is_valid_time($id_flight);
        
        return $data_fetch_array_assoc;

    } else { // sino, se mockean valores por defecto

        // echo 'no entro';

        return false;

    }

    function is_paid($id_pay) {

        global $connect_link;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
        $query_sql = "SELECT * FROM pago WHERE (id_pago = '$id_pay');";
        // Instanciamos un objeto del tipo AskData 
        // y le pasamos los valores de la consulta a realizar a futuro
        $payData = new AskData($query_sql, $connect_link);

        // Realizamos la consulta a la tabla
        $payData->executeQuery();

        // $response_sql = mysql_query($query_sql, $connect_link);
        $response_sql = $payData->getResponse();

        // Si la consulta fue exitosa entra
        if ($response_sql) { 

            // guarda un array asociativo
            // $data_fetch_array_assoc = mysql_fetch_array($response_sql, MYSQL_ASSOC); 
            $data_fetch_array_assoc = $payData->getAssociativeArrayResponse(); 

            // si el registro está vacío retornamos falso 
            if (!$data_fetch_array_assoc) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['pay_data'] = $data_fetch_array_assoc;
    
            echo "\nDatos del pago: \n";

            $payData->printData($data_fetch_array_assoc); 
            
            // Chequeamos que el id de pago exista (debe retornar un valor)
            // $exists_id_pay = $payData->getValue($data_fetch_array_assoc, 'id_pago');
            $exists_id_pay = $payData->getValue('id_pago');
            echo "\tid de pago ---> $exists_id_pay\n";

            return isset($exists_id_pay);

        } else { 

            // echo 'no entro';

            return false;

        }
    
    }

    function is_valid_time($id_flight) {

        global $connect_link;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
        $query_sql = "SELECT * FROM vuelo WHERE (numero_vuelo = '$id_flight');";
        // Instanciamos un objeto del tipo AskData 
        // y le pasamos los valores de la consulta a realizar a futuro
        $flightData = new AskData($query_sql, $connect_link);

        // Realizamos la consulta a la tabla
        $flightData->executeQuery();

        // $response_sql = mysql_query($query_sql, $connect_link);
        $response_sql = $flightData->getResponse();

        // Si la consulta fue exitosa entra
        if ($response_sql) { 

            // guarda un array asociativo
            // $data_fetch_array_assoc = mysql_fetch_array($response_sql, MYSQL_ASSOC); 
            $data_fetch_array_assoc = $flightData->getAssociativeArrayResponse(); 

            // si el registro está vacío retornamos falso 
            if (!$data_fetch_array_assoc) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['flight_data'] = $data_fetch_array_assoc;
    
            echo "\nDatos de vuelo: \n";

            $flightData->printData($data_fetch_array_assoc); 

            // Chequeamos que el id de pago exista (debe retornar un valor)
            // $exists_id_flight = $flightData->getValue($data_fetch_array_assoc, 'numero_vuelo');
            $exists_id_flight = $flightData->getValue('numero_vuelo');
            echo "\n id de vuelo ---> $exists_id_flight\n";

            return isset($exists_id_flight);

        } else { 

            // echo 'no entro';

            return false;

        }

    }

    // en caso de no encontrar coincidencias, 
    // se redirige a la pantalla de ingreso de codigo(checkIn.php), notificando el error
    // header('Location: checkIn.php?error=invalid_code');

    // header("Location: $statics_path/components/seatSelection.php?rc=$reservation_code");

?>