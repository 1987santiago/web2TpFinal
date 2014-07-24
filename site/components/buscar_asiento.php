<?php
    session_start();
    require_once '../processors/Database.php';
    define("EXCEDENTE", 10); // constante
        
    function getAsientosLibres($vuelo, $categoria) 
    {
        $asientosLibres = 0;
        $skynet = new Database();
        $conexionCorrecta = $skynet->connect();
        
        if ($conexionCorrecta) {

            switch ($categoria) {

                case 100:   // primera
                    $asientosCategoria = 
                    "SELECT asientos_primera as asientos FROM avion
                    WHERE codigo_avion =  (
                        SELECT codigo_avion  
                        FROM vuelo 
                        WHERE numero_vuelo = $vuelo)";
                break;   
                
                case 200:   // economy
                    $asientosCategoria = 
                    "SELECT asientos_economy as asientos FROM avion
                    WHERE codigo_avion =  (
                        SELECT codigo_avion  
                        FROM vuelo 
                        WHERE numero_vuelo = $vuelo)";
                break;
            }

            $asientos = $skynet->executeSelect($asientosCategoria);
            $totalAsientos = intval($asientos[0]["asientos"]);
            $reservasHechas = "SELECT count(*) as reservas FROM reserva
                               WHERE numero_vuelo = $vuelo and id_categoria = $categoria and esta_en_espera = 0";
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
                      WHERE numero_vuelo = $vuelo and esta_en_espera = 1";
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
            
            if ($asientosLibresIda > 0) {
            
                $reservaIdaEnEspera = 0;
                $reservaIdaPermitida = true;
            
            } else {
                
                if ($reservasEsperaIda < EXCEDENTE) {

                    $reservaIdaEnEspera = -1; 
                    $reservaIdaPermitida = true;
                }
            }

            if ($reservaIdaPermitida) {

                header("Location: datos_pasajero.php");
                $_SESSION["reservaIdaEnEspera"] = $reservaIdaEnEspera;
            
            } else {    
            
                $errorNoHayAsientos = "No hay asientos para el vuelo de ida entre " . $_SESSION["ciudadOrigen"] . 
                                      " y " . $_SESSION["ciudadDestino"] . " en la categoria " . $_SESSION["categoriaIdaElegida"];
                $anterior = "listado_vuelos_ida.php";
                header("Location: error.php?mensaje=$errorNoHayAsientos&anterior=$anterior");
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
            
            if ($asientosLibresIda > 0) {
            
                $reservaIdaEnEspera = 0;
                $reservaIdaPermitida = true;
            
            } else {

                if ($reservasEsperaIda < EXCEDENTE) {

                    $reservaIdaEnEspera = -1;
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
            
            if ($asientosLibresRegreso > 0) {

                $reservaRegresoEnEspera = false;
                $reservaRegresoPermitida = true;
            
            } else {
                
                if ($reservasEsperaRegreso < EXCEDENTE) {

                    $reservaRegresoEnEspera = true;
                    $reservaRegresoPermitida = true;

                }
            }

            if ($reservaIdaPermitida && $reservaRegresoPermitida) {
            
                header("Location: datos_pasajero.php");
                $_SESSION["reservaIdaEnEspera"] = $reservaIdaEnEspera;
                $_SESSION["reservaRegresoEnEspera"] = $reservaRegresoEnEspera;
            
            } else { 

                if (!$reservaIdaPermitida) {
            
                    $errorNoHayAsientos = "No hay asientos para el vuelo de ida entre " . $_SESSION["ciudadOrigen"] . 
                                          " y " . $_SESSION["ciudadDestino"] . " en la categoria " . $_SESSION["categoriaIdaElegida"];
                    $anterior = "listado_vuelos_ida_regreso.php";
                    header("Location: error.php?mensaje=$errorNoHayAsientos&anterior=$anterior");
                    die();

                } if (!$reservaRegresoPermitida) {
                    
                    $errorNoHayAsientosRegreso = "No hay asientos para el vuelo de regreso entre " . $_SESSION["ciudadDestino"] . 
                                                 " y " . $_SESSION["ciudadOrigen"] . " en la categoria " . $_SESSION["categoriaRegresoElegida"];
                    $anterior = "listado_vuelos_ida_regreso.php";
                    header("Location: error.php?mensaje=$errorNoHayAsientosRegreso&anterior=$anterior");
                    die();
                }
            } 
            break;    
    }
?>
