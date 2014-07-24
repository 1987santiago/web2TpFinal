<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    require_once '../processors/Database.php';
    require_once 'library.php';

    function getVuelos($query, $fecha) {

        $vuelosAMostrar = array();
        $skynet = new Database();
        $conexionCorrecta = $skynet->connect();
        
        if ($conexionCorrecta) {
            
            $vuelos = $skynet->executeSelect($query);
            $cantidadVuelos = count($vuelos);
            
            if ($cantidadVuelos > 0) {

                $fechaPartidaFormateada = getFechaFormateada($fecha);
                $dia = getDiaDeLaSemana($fechaPartidaFormateada);

                foreach($vuelos as $vuelo) {
                
                    $diasDeVuelo = getDiasVueloBin($vuelo["dias_vuelo"]);
                    
                    if ($diasDeVuelo[$dia] == "1") {
                        // Se añade el vuelo a un nuevo array
                        array_push($vuelosAMostrar, $vuelo);
                    }
                
                }

            }

            $skynet->disconnect();
        
        }
        
        return $vuelosAMostrar;

    }

    $ciudadOrigen = $_POST["ciudadOrigen"];
    $ciudadDestino = $_POST["ciudadDestino"];
    $fechaPartida = $_POST["fechaPartida"];
    $fechaRegreso = $_POST["fechaRegreso"];
    $tipoDeViaje = $_POST["tipoDeViaje"];

    // Se guardan los datos del vuelo en la sesion
    $_SESSION["ciudadOrigen"]=$ciudadOrigen;
    $_SESSION["ciudadDestino"]=$ciudadDestino;
    $_SESSION["fechaPartida"]=$fechaPartida;
    $_SESSION["fechaRegreso"]=$fechaRegreso;
    $_SESSION["tipoDeViaje"]=$tipoDeViaje;


    switch ($tipoDeViaje) {

    case 1:
        $busquedaVuelosIda = "SELECT numero_vuelo, oaci_origen, origen, oaci_destino, destino, dias_vuelo, tarifa_economy, tarifa_primera, asientos_economy, asientos_primera
            FROM vuelo, avion
            WHERE vuelo.codigo_avion = avion.codigo_avion and origen = '$ciudadOrigen' and destino = '$ciudadDestino'";
        $vuelosIda = getVuelos($busquedaVuelosIda, $fechaPartida);
        
        if (count($vuelosIda) > 0) {
            $_SESSION["vuelosIda"] = $vuelosIda;
            header("Location: $statics_path/components/listado_vuelos_ida.php");
        } else {
            $errorNoHayVuelosParaLaFecha = "No hay vuelos entre " . $ciudadOrigen . " y " . $ciudadDestino . " para la fecha " . $fechaPartida;
            $anterior = "datos_vuelo.php";
            $_SESSION['error'] = 'error - No hay vuelos para la fecha seleccionada';
            header("Location: $statics_path/sections/home.php");
        }
        break;

    case 2:
        $busquedaVuelosIda = "SELECT numero_vuelo, oaci_origen, origen, oaci_destino, destino, dias_vuelo, tarifa_economy, tarifa_primera, asientos_economy, asientos_primera
            FROM vuelo, avion
            WHERE vuelo.codigo_avion = avion.codigo_avion and origen = '$ciudadOrigen' and destino = '$ciudadDestino'";
        $busquedaVuelosRegreso = "SELECT numero_vuelo, oaci_origen, origen, oaci_destino, destino, dias_vuelo, tarifa_economy, tarifa_primera, asientos_economy, asientos_primera
            FROM vuelo, avion
            WHERE vuelo.codigo_avion = avion.codigo_avion and origen = '$ciudadDestino' and destino = '$ciudadOrigen'";
        $vuelosIda = getVuelos($busquedaVuelosIda, $fechaPartida);
        $vuelosRegreso = getVuelos($busquedaVuelosRegreso, $fechaRegreso);
        
        if (count($vuelosIda) > 0) {

            if (count($vuelosRegreso) > 0) {
                $_SESSION["vuelosIda"] = $vuelosIda;
                $_SESSION["vuelosRegreso"] = $vuelosRegreso;
                header("Location: $statics_path/components/listado_vuelos_ida_regreso.php");
            } else {
                $errorNoHayVuelosParaLaFecha = "No hay vuelos entre " . $ciudadDestino . " y " . $ciudadOrigen . " para la fecha " . $fechaRegreso;
                $anterior = "datos_vuelo.php";
                $_SESSION['error'] = 'error - No hay vuelos para la fecha seleccionada';
                header("Location: $statics_path/sections/home.php");
            }

        } else {
            
            $errorNoHayVuelosParaLaFecha = "No hay vuelos entre " . $ciudadOrigen . " y " . $ciudadDestino . " para la fecha " . $fechaPartida;
            $anterior = "datos_vuelo.php";
            $_SESSION['error'] = 'error - No hay vuelos para la fecha seleccionada';
            header("Location: $statics_path/sections/home.php");
        
        }
        break;
    }
?>