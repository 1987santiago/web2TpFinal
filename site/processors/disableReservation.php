<?php 
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    # ==========================================
    # Obtenemos los datos pasados por post
    # y los datos de sesion
    # ==========================================
        if ( isset($_POST['reservation_code']) ) {
            $reservation_code = $_POST['reservation_code'];
            $_SESSION['reservation_code'] = $reservation_code;
        } else if( isset($_SESSION['reservation_code']) ) {
            $reservation_code = $_SESSION['reservation_code'];
        }
    # ==========================================

    # ==========================================
    # Conexion con el servidor y DB
    # ==========================================
        require_once '../processors/Database.php';
        require_once '../processors/ProccessData.php';

        // Establecemos una conexión con el servidor
        $connect = new Database();
    # ==========================================

    foreach ($reservation_code as $key => $value) {
        $updated = changeReservationStatus($value);
    }


    /**
     * changeReservationStatus
     * Modifica el estado de una reserva
     * @param $reservation_code código unívoco con el que se registró la reserva
     * @return Boolean 
     */
    function changeReservationStatus($reservation_code) {

        global $connect;

        // Generamos la query para modificar los datos de la reserva
        $sql_update_query = "UPDATE reserva SET estado=-2  WHERE codigo_reserva = '$reservation_code';";
        
        // Ejecutamos la query
        $updated = $connect->executeIDU($sql_update_query);

        // Si la ejecución fue exitosa
        return $updated; 

    }

    $_SESSION['update_success'] = $updated;
    // Redirigimos al admin a la pagina de altas y bajas de reservas
    header("Location: $statics_path/sections/checkReservasVuelo.php");
?>
