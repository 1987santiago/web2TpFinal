<?php
    session_start();
    

    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    /// se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    require_once "$base_path$statics_path/processors/Database.php";

    define("EXCEDENTE", 10); // constante
        
    function getAsientosLibres($vuelo, $categoria) 
    {
        $asientosLibres = 0;
        $skynet = new Database();
        $conexionCorrecta = $skynet->connect();
        
        if ($conexionCorrecta) {

            switch ($categoria) {

                case 100:   // primera
                            $asientosCategoria =    "SELECT asientos_primera as asientos 
                                                    FROM avion
                                                    WHERE codigo_avion =  (
                                                        SELECT codigo_avion  
                                                        FROM vuelo 
                                                        WHERE numero_vuelo = $vuelo)";
                             break;   
                
                case 200:   // economy
                            $asientosCategoria =    "SELECT asientos_economy as asientos 
                                                    FROM avion
                                                    WHERE codigo_avion =  (
                                                        SELECT codigo_avion  
                                                        FROM vuelo 
                                                        WHERE numero_vuelo = $vuelo)";
                            break;
            }

            $asientos = $skynet->executeSelect($asientosCategoria);
            $totalAsientos = intval($asientos[0]["asientos"]);
            $reservasHechas = "SELECT count(*) as reservas
                               FROM reserva
                               WHERE numero_vuelo = $vuelo and id_categoria = $categoria and (estado = 0 or estado = 1)";

            $reservas = $skynet->executeSelect($reservasHechas);
            $totalReservas = intval($reservas[0]["reservas"]);

            if ($totalAsientos > 0) {
                $asientosLibres = $totalAsientos - $totalReservas;
            }

            $skynet->disconnect();
        }

        return $asientosLibres;
    }
    
    function getReservasEnEspera($vuelo) {

        $skynet = new Database();
        $conexionCorrecta = $skynet->connect();
        $totalReservasEnEspera = 0;
        
        if ($conexionCorrecta) {

            $query = "SELECT count(*) as reservas
                      FROM reserva
                      WHERE numero_vuelo = $vuelo and estado = -1";
            $reservasEnEspera = $skynet->executeSelect($query);
            $totalReservasEnEspera = intval($reservasEnEspera[0]["reservas"]);
            $skynet->disconnect();
        }

        return $totalReservasEnEspera;
    }
    
    $tipoDeViaje=$_SESSION["tipoDeViaje"];
    
    switch ($tipoDeViaje) {
        
        case 1: 
                // viaje ida
                $categoria = (int) $_POST["categoria"];
                $vuelo = (int) $_POST["vuelo"];
                $_SESSION["categoriaIdaElegida"] = $categoria;
                $_SESSION["vueloIdaElegido"] = $vuelo;
                $asientosLibresIda = getAsientosLibres($vuelo, $categoria);
                $reservasEsperaIda = getReservasEnEspera($vuelo);
                $reservaIdaPermitida = false;
                
                if ($asientosLibresIda > 0)
                {
                    $estadoReservaIda = 0;
                    $reservaIdaPermitida = true;
                }
                else
                {
                    if ($reservasEsperaIda < EXCEDENTE) 
                    {
                        $estadoReservaIda = -1; 
                        $reservaIdaPermitida = true;
                    }
                }
                
                if ($reservaIdaPermitida) 
                {
                    $siguiente = "$server_root$statics_path/components/datos_pasajero.php";
                    $_SESSION["estadoReservaIda"] = $estadoReservaIda;
                    header("Location: " . $siguiente);
                }
                else
                {    
                    $errorNoHayAsientos = "No hay asientos para el vuelo de ida entre " 
                                          . $_SESSION["ciudadOrigen"] . 
                                          " y " . $_SESSION["ciudadDestino"] . " en la categoria " 
                                          . $_SESSION["categoriaIdaElegida"];
                    $error = "$server_root$statics_path/components/error.php";
                    $anterior = "$server_root$statics_path/components/listado_vuelos_ida.php";
                    header("Location: " . $error . "?mensaje=$errorNoHayAsientos&anterior=$anterior");
                }
                break;

        case 2: 
                // viaje ida y vuelta
                // vuelo ida
                $categoria = (int) $_POST["categoria"];
                $vuelo = (int) $_POST["vuelo"];
                $_SESSION["categoriaIdaElegida"] = $categoria;
                $_SESSION["vueloIdaElegido"] = $vuelo;
                $asientosLibresIda = getAsientosLibres($vuelo, $categoria);
                $reservasEsperaIda = getReservasEnEspera($vuelo);
                $reservaIdaPermitida = false;
                
                if ($asientosLibresIda > 0)
                {
                    $estadoReservaIda = 0;
                    $reservaIdaPermitida = true;
                }
                else
                {
                    if ($reservasEsperaIda < EXCEDENTE) 
                    {
                        $estadoReservaIda = -1;
                        $reservaIdaPermitida = true;
                    }
                }
                
                // vuelo regreso
                $categoriaRegreso = (int) $_POST["categoriaRegreso"];
                $vueloRegreso = (int) $_POST["vueloRegreso"];
                $_SESSION["categoriaRegresoElegida"] = $categoriaRegreso;
                $_SESSION["vueloRegresoElegido"] = $vueloRegreso;
                $asientosLibresRegreso = getAsientosLibres($vueloRegreso, $categoriaRegreso);
                $reservasEsperaRegreso = getReservasEnEspera($vueloRegreso);
                $reservaRegresoPermitida = false;
                
                if ($asientosLibresRegreso > 0)
                {
                    $estadoReservaRegreso = 0;
                    $reservaRegresoPermitida = true;
                }
                else
                {
                    if ($reservasEsperaRegreso < EXCEDENTE) 
                    {
                        $estadoReservaRegreso = -1;
                        $reservaRegresoPermitida = true;
                    }
                }
                
                if ($reservaIdaPermitida && $reservaRegresoPermitida) 
                {
                    $_SESSION["estadoReservaIda"] = $estadoReservaIda;
                    $_SESSION["estadoReservaRegreso"] = $estadoReservaRegreso;
                    $siguiente = "$server_root$statics_path/components/datos_pasajero.php";
                    header("Location: ". $siguiente);
                }
                else
                {    
                    if (!$reservaIdaPermitida) 
                    {
                        $errorNoHayAsientos = "No hay asientos para el vuelo de ida entre " . $_SESSION["ciudadOrigen"] . 
                                              " y " . $_SESSION["ciudadDestino"] . " en la categoria " . $_SESSION["categoriaIdaElegida"];
                        $error = "$server_root$statics_path/components/error.php";
                        $anterior = "$server_root$statics_path/components/listado_vuelos_ida_regreso.php";
                        header("Location: " . $error . "?mensaje=$errorNoHayAsientos&anterior=$anterior");

                        die();
                    }
                    if (!$reservaRegresoPermitida) 
                    {
                        $errorNoHayAsientosRegreso = "No hay asientos para el vuelo de regreso entre " . $_SESSION["ciudadDestino"] . 
                                                     " y " . $_SESSION["ciudadOrigen"] . " en la categoria " . $_SESSION["categoriaRegresoElegida"];

                        $error = "$server_root$statics_path/components/error.php";
                        $anterior = "$server_root$statics_path/components/listado_vuelos_ida_regreso.php";
                        header("Location: " . $error . "?mensaje=$errorNoHayAsientosRegreso&anterior=$anterior");
                        die();
                    }
                } 
                break;    
    }
?>
