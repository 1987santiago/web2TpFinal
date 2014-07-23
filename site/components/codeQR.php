<?php 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    $save_seat_data = $_SESSION['save_seat_data'];
    $reservation_data = $_SESSION['reservation_data']; 
    $plane_data = $_SESSION['plane_data']; 
    $flight_data = $_SESSION['flight_data']; 

    $data = "Numero vuelo: " . $flight_data[0]['numero_vuelo'] . "\n" .
            "Fecha de vuelo: " . $reservation_data[0]['fecha_partida'] . "\n" . 
            "Ciudad origen: " . $flight_data[0]['origen'] . "\n" .
            "Ciudad destino: " . $flight_data[0]['destino'] . "\n" . 
            "Avion: " . $plane_data[0]['marca'] . " " . $plane_data[0]['modelo'] . "\n" . 
            "Asiento: " . $save_seat_data['id_asiento'] . "\n" . 
            "Categoria: " . $save_seat_data['descripcion'] . "\n" . 
            "Codigo de reserva: " . $reservation_data[0]['codigo_reserva'];

    require "$base_path$statics_path/lib/phpqrcode/qrlib.php";

    $code = QRcode::png($data, "codeQR.png");

    /*
    save_seat_data: { 
        ["id_asiento"]=> string(3) "202" 
        ["descripcion"]=> string(5) "econo" 
        ["fila"]=> int(20) 
        ["columna"]=> int(2) 
        ["numero_vuelo"]=> string(1) "1" 
        ["id_categoria"]=> string(3) "200" 
        ["dni"]=> string(8) "12333123" 
    } 
    reservation_data: { 
        [0]=> array(7) { 
            ["codigo_reserva"]=> string(3) "01C" 
            ["fecha_reserva"]=> string(10) "2014-07-15" 
            ["fecha_partida"]=> string(10) "2014-07-25" 
            ["esta_en_espera"]=> string(1) "0" 
            ["dni"]=> string(8) "12333123" 
            ["numero_vuelo"]=> string(1) "1" 
            ["id_categoria"]=> string(3) "200" 
        } 
    } 
    plane_data: { 
        [0]=> array(10) { 
            ["codigo_avion"]=> string(1) "3" 
            ["marca"]=> string(7) "Embraer" 
            ["modelo"]=> string(6) "ER-145" 
            ["total_asientos"]=> string(3) "125" 
            ["asientos_economy"]=> string(3) "105" 
            ["filas_economy"]=> string(2) "21" 
            ["columnas_economy"]=> string(1) "5" 
            ["asientos_primera"]=> string(2) "20" 
            ["filas_primera"]=> string(2) "10" 
            ["columnas_primera"]=> string(1) "2" 
        } 
    } 
    flight_data: { 
        [0]=> array(9) { 
            ["numero_vuelo"]=> string(1) "1" 
            ["origen"]=> string(16) "Alto Rio Senguer" 
            ["destino"]=> string(23) "San Martin de los Andes" 
            ["tarifa_economy"]=> string(4) "1191" 
            ["tarifa_primera"]=> string(7) "1464.93" 
            ["dias_vuelo"]=> string(3) "112" 
            ["oaci_origen"]=> string(4) "SAVR" 
            ["oaci_destino"]=> string(4) "SAZY" 
            ["codigo_avion"]=> string(1) "3" 
        } 
    } 
    */
?>