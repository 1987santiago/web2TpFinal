<?php
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    require_once "$base_path$statics_path/processors/Database.php";

    // Establecemos una conexión con el servidor
    $connect = new Database();    

    $reservation_data = $_SESSION['reservation_data'][0];
	
    $payDate    = date('Y-m-d');
    $card       = $_POST['card'];
    $cardNumber = $_POST['cardnumber'];
    $price      = $_POST['price'];
	$reservationCode = $reservation_data['codigo_reserva'];

    $query_insert = 
        "INSERT INTO pago (fecha_pago, forma_pago, numero_tarjeta, monto, codigo_reserva) 
        VALUES ('$payDate','$card', '$cardNumber', '$price', '$reservationCode')";

    // Ejecutamos la query de inserción 
    $pay_insertion = $connect->executeIDU($query_insert);

    // Si la consulta fue exitosa entra
    if ($pay_insertion) { 
        // Devemos cambiar el estado de la reserva
        updateReservationStatus($reservation_data['codigo_reserva']);
    } else {
        echo "No se pudo realizar el pago, intente nuevamente";
        // return false;
    }

    /**
     * Actualiza el estado de la reserva en la table reserva de la base
     * @param String $codigo_reserva 
     */
    function updateReservationStatus($codigo_reserva) {

        global $connect;

        $sql_update_query = "UPDATE reserva SET estado=1  WHERE (codigo_reserva = '$codigo_reserva');";

        // Realizamos la consulta a la tabla 
        $updated = $connect->executeIDU($sql_update_query);

        if (!$updated) {   
            echo "no se pudo acceder a la base";
            return false;
        }

    }

?>

<h2 class="reserva">Pago realizado con exito</h2>
    
<h4>Imprima su pasaje electronico</h4>

<a class="link-button" href="../components/generaPDF.php" title="Imprimir Boleto">Imprimir</a>
