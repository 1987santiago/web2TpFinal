<?php 

    /*
     * en este archivo se procesa el codigo de reserva que ingresa el usuario-cliente
     * el mismo se chequea contra la base de datos la validez del mismo
     * una vez checkeado se sigue el siguiente flujo:
     *      A - VALIDA: se redirije a la seccion de seleccion de asiento (seatSelection.php)
     *      B - NO VALIDA: se redirije a la seccion de ingreso de codigo (paso anterior - checkIn.php), informando el error
     */

    // Obtenemos la url de los recursos estaticos
    $static_url = $_POST['static_url'];
    
    // Definimos un valor valido a mano
    $hardcode_valid_code = '001A';
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    if ($reservation_code == $hardcode_valid_code) {
        echo 'true';
    } else {
        echo 'false';
    }

    // Con el codigo, generamos una consulta a la DB correspondiente
    // "SELECT * FROM 'reserva' WHERE reserva.idPago == $reservation_code"; 

    // la respuesta de dicha instruccion la guardamos en $validation_code_response, 
    
    // en caso de devolver un registro(no puede devolver más de uno),
    // ejecutamos la redireccion a seatSelection.php, pasandole el mismo como parametro
    // header('Location: seatSelection.php'); TODO: ver como pasar los parametros de forma segura (no GET)

    // en caso de no encontrar coincidencias, 
    // se redirige a la pantalla de ingreso de codigo(checkIn.php), notificando el error
    // header('Location: checkIn.php?error=invalid_code');

    // header("Location: $static_url/components/seatSelection.php?rc=$reservation_code");

?>