<?php 
    session_start();

    /*
     * en este archivo se procesa el codigo de reserva que ingresa el usuario-cliente
     * el mismo se chequea contra la base de datos para verificar su validez, 
     * una vez checkeado continua el siguiente flujo:
     *      A - VALIDA: se redirije a la seccion de seleccion de asiento (seatSelection.php)
     *      B - NO VALIDA: se redirije a la seccion de ingreso de codigo (paso anterior - checkIn.php), informando el error
     */

    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    require_once 'Database.php';
    require_once 'ProccessData.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();

    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 
    // Obtenemos el nombre del componente a validar
    $component = $_POST['component']; 

    $query_sql = "SELECT * FROM reserva WHERE (codigo_reserva = '$reservation_code');";

    // Realizamos la consulta a la tabla y guardamos el array associativo 
    $reservation_data = $connect->executeSelect($query_sql);

    // Si la consulta fue exitosa entra
    if ($reservation_data) { 

        // si el registro está vacío retornamos falso 
        if (sizeof($reservation_data) == 0) {
            echo '$reservation_data :: vacio false';
            return false;
        }

        // Guardamos en una variable de session los datos de la reserva
        $_SESSION['reservation_data'] = $reservation_data;
    
        // echo "\nDatos de reserva: \n";

        $reservation_proccess_data = new ProccessData($reservation_data);
        // $proccess_data->printData(); 

        // obtenemos el id de reserva, 
        $id_reservation_code = $reservation_proccess_data->getValue('codigo_reserva');

        // Chequeamos que la reserva no se haya confirmado (check-in completo)
        // Posibles estados de la reserva: 
        //      0 - Pagada
        //      1 - Sin pagar
        //      2 - Confirmada (ya se hizo el check-in)
        $reservation_active = $reservation_proccess_data->getValue('estado');

        switch ($component) {

            case 'checkIn':

                if ($reservation_active == '0' || $reservation_active == '2') 
                    return false;

                // Chequeamos que la reserva esté pagada 
                // $is_paid = is_paid($id_reservation_code); 
                // if (!$is_paid) 
                //     return false;

                // Chequeamos que la hora actual se encuentre entre 2 a 48hs antes de la salida del vuelo
                $is_valid_checkin_time = is_valid_time($reservation_proccess_data->getValue('fecha_partida'));
                if (!$is_valid_checkin_time) 
                    return false;
                
                break;
            
            case 'pay':

                if ($reservation_active != 0) 
                    return false;

                // Deberíamos validar que no hayan pasado más de N hs desde que se realizo la reserva

                break;
            
            default:
                return false;
                break;
        }

        // Si el codigo de reserva es valido, está pagado y el horario de checkin es válido
        echo true;

    } else { 
        // echo '$reservation_data :: no existe';
        return false;
    }

    function is_paid($id_reservation_code) {

        global $connect;
        global $proccess_data;

        // Generamos la query para buscar el ID de pago de la reserva en la tabla de pagos 
        $query_sql = "SELECT * FROM pago WHERE (codigo_reserva = '$id_reservation_code');";

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
    
            // echo "\nDatos del pago: \n<br>";

            $proccess_data = new ProccessData($pay_data);
            // $proccess_data->printData(); 
            
            // Chequeamos que el id de pago exista (debe retornar un valor)
            $exists_id_pay = $proccess_data->getValue('id_pago');
            // echo "\tid de pago ---> $exists_id_pay\n";

            return isset($exists_id_pay);

        } else { 
            // echo 'no entro';
            return false;

        }
    
    }

    function is_valid_time($starting_date) {

        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $starting_date  = strtotime (date($starting_str_date));
        $current_date   = strtotime (date('Y-m-d')); // the current date 
        $hours_remaining = date($starting_date - $current_date) / 3600;

        return ($hours_remaining > 2 && $hours_remaining < 48);

    }

?>