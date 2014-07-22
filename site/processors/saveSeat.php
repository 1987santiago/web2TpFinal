<?php 
    session_start();

    /**
     * En este archivo se guardan los datos del asiento elegido por el viajante
     * en la base de datos
     */

    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    /** 
     *  DATOS NECESARIOS
     *
     *  id_asiento      45
     *  descripcion     Econo
     *  fila            5
     *  columna         4
     *  numero_vuelo    1
     *  id_categoria    200
     *  dni             12333123
     */
    $save_seat_data = $_SESSION['save_seat_data'];
    $reservation_data = $_SESSION['reservation_data']; 
    
    require_once '../processors/Database.php';
    require_once '../processors/ProccessData.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();

    // Generamos la query
    $query_sql = "INSERT INTO asiento (id_asiento, descripcion, fila, columna, numero_vuelo, id_categoria, dni)
                VALUES (
                    $save_seat_data[id_asiento],
                    '$save_seat_data[descripcion]',
                    $save_seat_data[fila],
                    $save_seat_data[columna],
                    $save_seat_data[numero_vuelo],
                    $save_seat_data[id_categoria],
                    $save_seat_data[dni]
                );";
    
    echo $query_sql;

    // Ejecutamos la consulta y guardamos la respuesta de la base
    $response_sql = $connect->executeIDU($query_sql);

    // Si la inserción tuvo éxito 
    if ($response_sql) {
        header("Location: $statics_path/components/checkInComplete.php");
    } else {
        session_destroy();
        session_start();
        // guardamos la nueva ruta base del site
        $_SESSION["local_path"] = $statics_path;
        // guardamos la url de los recursos estaticos
        $_SESSION["statics_path"] = $statics_path;
        header("Location: $statics_path/components/");
    }


?>