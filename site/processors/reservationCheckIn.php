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

    include 'Database.php';
    include 'ProccessData.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();

    // Definimos un valor valido a mano
    $hardcode_valid_code = '001A';
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";

    // Realizamos la consulta a la tabla y guardamos el array associativo 
    $reservation_data = $connect->executeSelect($query_sql);

    // Si la consulta fue exitosa entra
    if ($reservation_data) { 

        // si el registro está vacío retornamos falso 
        if (!$reservation_data) {
            return false;
        }

        // Guardamos en una variable de session los datos de la reserva
        $_SESSION['reservation_data'] = $reservation_data;
    
        echo "\nDatos de reserva: \n";
        var_dump($reservation_data);

        $proccess_data = new ProccessData($reservation_data);

        $proccess_data->printData($reservation_data); 

        // obtenemos el id de pago, 
        $id_pay = $proccess_data->getValue('id_pago');
        // obtenemos el id de reserva, 
        $id_reservation_code = $proccess_data->getValue('codigo_reserva');
        // obtenemos el id de vuelo,  
        $id_flight = $proccess_data->getValue('numero_vuelo');

        // Chequeamos que la reserva esté pagada
        $is_paid = is_paid($id_pay); 
        // Chequeamos que la hora actual se encuentre entre 2 a 48hs antes de la salida del vuelo
        $is_valid_time = is_valid_time($id_flight);
        
        return $reservation_data;

    } else { // sino, se mockean valores por defecto

        // echo 'no entro';

        return false;

    }

    function is_paid($id_pay) {

        global $connect;
        global $proccess_data;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
        $query_sql = "SELECT * FROM pago WHERE (id_pago = '$id_pay');";

        // Ejecutamos la consulta y guardamos la respuesta (array assoc)
        $pay_data = $connect->executeSelect($query_sql);

        // Si la consulta fue exitosa entra
        if ($pay_data) { 

            // si el registro está vacío retornamos falso 
            if (!$pay_data) {
                return false;
            }

            // Guardamos en una variable de session los datos de la reserva
            $_SESSION['pay_data'] = $pay_data;
    
            echo "\nDatos del pago: \n";

            $proccess_data->printData($pay_data); 
            
            // Chequeamos que el id de pago exista (debe retornar un valor)
            $exists_id_pay = $proccess_data->getValue('id_pago');
            echo "\tid de pago ---> $exists_id_pay\n";

            return isset($exists_id_pay);

        } else { 

            // echo 'no entro';

            return false;

        }
    
    }

    function is_valid_time($id_flight) {

        global $connect;
        global $proccess_data;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos
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
    
            echo "\nDatos de vuelo: \n";

            $proccess_data->printData($flight_data); 

            // Chequeamos que el id de pago exista (debe retornar un valor)
            $exists_id_flight = $proccess_data->getValue('numero_vuelo');
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