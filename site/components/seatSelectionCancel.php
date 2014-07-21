<?php 
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // Borramos los datos guardados en SeatSelection.php
    $_SESSION['seatMapData'] = null;
    $_SESSION['flight_data'] = null;
    $_SESSION['plane_data'] = null;
    $_SESSION['reserved_seats'] = null;
    $_SESSION['seat_data_map'] = null;
    setcookie('reservation_code', '', time()-3000);

    // datos guardados en seatConfirm.php
    $_SESSION['save_seat_data'] = null;

    // Redirigimos al inicio del Check-in, ya sin datos guardados
    header("Location: $statics_path/sections/checkIn.php");
    
?>