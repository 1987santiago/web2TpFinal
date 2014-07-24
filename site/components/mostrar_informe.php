<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    
    $fechaInicial = $_POST["fechaInicial"];
    $fechaFinal = $_POST["fechaFinal"];
    $informe = $_POST["informe"];
      
    require_once $base_path . $statics_path . "/components/database.php";
    require_once $base_path . $statics_path . "/components/library.php";
    /* inclur jpgragh y dompdf*/
    require_once $base_path . $statics_path . "/components/database.php";
      
    $skynet = new Database();
    $conexionExitosa = $skynet->connect();
    if ($conexionExitosa) 
        {
            switch ($informe) {
                case 1: 
                        $query1 =   "select fecha_pago
                                    from pago
                                    where fecha_pago >= $fechaInicial and fecha_pago <= $fechaFinal";
                        $response1 = $skynet->executeSelect($query1);
                        if (count($response1) > 0)  
                            {
                                mostrarPasajesVendidos($response1);
                            }
                        else
                            {
                                $noHayPasajesVendidos = "No hay pasajes vendidos entre" . $fechaInicial . " y " . $fechaFinal;
                                $anterior = $http_path . "/components/pedir_informe.php";
                                $error = $http_path . "/components/error.php";
                                header("Location: ". $error . "?mensaje=$noHayPasajesVendidos&anterior=$anterior");
                            }
                        break;
                case 2: 
                        $query1 =  "select count(*), re.id_categoria, vu.destino
                                    from reserva as re, pago as pa, vuelo as vu
                                    where re.codigo_reserva = pa.codigo_reserva and
                                    re.numero_vuelo = vu.numero_vuelo and
                                    pa.fecha_pago >= $fechaInicial and pa.fecha_pago <= $fechaFinal
                                    group by re.id_categoria, vu.destino";
                        $response1 = $skynet->executeSelect($query1);
                        if (count($response1) > 0) 
                            {
                                mostrarPasajesVendidosCategoriaDestino($response1);
                            }
                        else
                            {
                                $noHayPasajesVendidos = "No hay pasajes vendidos entre" . $fechaInicial . " y " . $fechaFinal;
                                $anterior = $http_path . "/components/pedir_informe.php";
                                $error = $http_path . "/components/error.php";
                                header("Location: ". $error . "?mensaje=$noHayPasajesVendidos&anterior=$anterior");
                            }
                        break;
                case 3: 
                        $query1 =  "select count(*), vu.codigo_avion, vu.destino
                                    from reserva as re, vuelo as vu, asiento as asi
                                    where re.numero_vuelo = vu.numero_vuelo and 
                                    vu.numero_vuelo = asi.numero_vuelo and
                                    re.fecha_reserva >= $fechaInicial and re.fecha_reserva <= $fechaFinal
                                    group by vu.codigo_avion, vu.destino";
                        $response1 = $skynet->executeSelect($query1);
                        if (count($response1) > 0) 
                            {
                                mostrarOcupacionAvionDestino($response1);
                            }
                        else
                            {
                                $noHayAsientosOcupados = "No hay asientos ocupados entre" . $fechaInicial . " y " . $fechaFinal;
                                $anterior = $http_path . "/components/pedir_informe.php";
                                $error = $http_path . "/components/error.php";
                                header("Location: ". $error . "?mensaje=$noHayAsientosOcupados&anterior=$anterior");
                            }
                        break;
                case 4: 
                        $query1 =   "select fecha_reserva
                                    from reserva
                                    where (day(now()) - day(fecha_reserva) <= 1) and 
                                    fecha_reserva >= $fechaInicial and fecha_reserva <= $fechaFinal and
                                    codigo_reserva NOT IN (select codigo_reserva
                                                            from pago)";
                        $response1 = $skynet->executeSelect($query1);
                        if (count($response1) > 0)  
                            {
                                mostrarReservasCaidas($response1);
                            }
                        else
                            {
                                $noHayPasajesVendidos = "No hay reservas caidas entre" . $fechaInicial . " y " . $fechaFinal;
                                $anterior = $http_path . "/components/pedir_informe.php";
                                $error = $http_path . "/components/error.php";
                                header("Location: ". $error . "?mensaje=$noHayPasajesVendidos&anterior=$anterior");
                            }
                        break;
            } 
            $skynet->disconnect();
        }
?>

