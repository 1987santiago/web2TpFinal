<?php
    session_start();
    require_once 'database.php';
    require_once 'library.php';
    
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
 
    $skynet = new Database();
    $conexionCorrecta = $skynet->connect();
    if ($conexionCorrecta)
    {
        switch ($tipoDeViaje) 
        {
            case 1:
                    $query = "SELECT numero_vuelo, oaci_origen, origen, oaci_destino, destino, dias_vuelo, tarifa_economy, tarifa_primera 
                              FROM vuelo 
                              WHERE origen = '$ciudadOrigen' and destino = '$ciudadDestino'";
                    $vuelos = $skynet->executeSelect($query);
                    $cantidadVuelos = count($vuelos);
                    if ($cantidadVuelos > 0) 
                    {
                        $fechaPartidaFormateada = getFechaFormateada($fechaPartida);
                        $dia = getDiaDeLaSemana($fechaPartidaFormateada);
                        $vuelosAMostrar = array();
                        foreach ($vuelos as $vuelo) 
                        {
                            $diasDeVuelo = getDiasVueloBin($vuelo["dias_vuelo"]);
                            if ($diasDeVuelo[$dia] == "1") 
                            {
                                // Se añade a un nuevo array los vuelos a mostrar
                                array_push($vuelosAMostrar, $vuelo);
                            }
                        }
                        $cantidadVuelosAMostrar = count($vuelosAMostrar);
                        if ($cantidadVuelosAMostrar > 0) 
                        {
                            $_SESSION["vuelos"] = $vuelosAMostrar;
                            header("Location: listado_vuelos_ida.php");
                        }
                        else
                        {
                            $errorNoHayVuelosParaLaFecha = "No hay vuelos entre " . $ciudadOrigen . " y " . $ciudadDestino . " para la fecha " . $fechaPartida;
                            header("Location: error_buscar_vuelo.php?mensaje=$errorNoHayVuelosParaLaFecha");
                        } 
                    }
                    else
                        {
                            $errorNoHayVuelos= "No hay vuelos entre " . $ciudadOrigen . " y " . $ciudadDestino;
                            header("Location: error_buscar_vuelo.php?mensaje=$errorNoHayVuelos");
                        }
                    break;
            case 2:

                    break;
        }
        $skynet->disconnect();
    }	
?>