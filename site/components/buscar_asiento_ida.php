<?php
    session_start();
    require_once 'database.php';
    define("EXCEDENTE", 10);
    $categoria = (int) $_POST["categoria"];
    $vuelo = (int) $_POST["vuelo"];
    $_SESSION["categoriaElegida"] = $categoria;
    $_SESSION["vueloElegido"] = $vuelo;
    $skynet = new Database();
    $conexionCorrecta = $skynet->connect();
    if ($conexionCorrecta)
    {
        switch ($categoria) 
        {
            case 100:   // primera
                        $query = "SELECT asientos_primera
                                  FROM avion
                                  WHERE codigo_avion =
                                        (SELECT codigo_avion  
                                         FROM vuelo 
                                         WHERE numero_vuelo = $vuelo)";
                        $asientosPrimera = $skynet->executeSelect($query);
                        $query2 = "SELECT count(*) as reservas
                                  FROM reserva
                                  WHERE numero_vuelo = $vuelo and id_categoria = $categoria and esta_en_espera = false";
                        $reservasPrimera = $skynet->executeSelect($query2);
                        $totalAsientos = intval($asientosPrimera[0]["asientos_primera"]);
                        $totalReservas = intval($reservasPrimera[0]["reservas"]);
                        if ($totalAsientos > 0) 
                        {
                            $asientosLibres = $totalAsientos - $totalReservas;
                            if ($asientosLibres > 0)
                            {
                                /* Espera false indica que la reserva no queda en espera*/
                                header("Location: datos_pasajero.php?estaEnEspera=false");
                            }
                            else
                            {
                                $query = "SELECT count(*) as reservas
                                          FROM reserva
                                          WHERE numero_vuelo = $vuelo and esta_en_espera = true";
                                $reservasEnEspera = $skynet->executeSelect($query);
                                $cantidadReservasEnEspera = intval($reservasEnEspera[0]["reservas"]);
                                if ($cantidadReservasEnEspera < EXCEDENTE) 
                                {
                                    /* Espera true indica que la reserva queda en espera*/
                                    header("Location: datos_pasajero.php?estaEnEspera=true");
                                }
                                else
                                {
                                    $errorNoHayAsientos = "No hay asientos para el vuelo " . $vuelo . 
                                                           "entre " . $_SESSION["ciudadOrigen"] . " y " . 
                                                           $_SESSION["ciudadDestino"] . " para la categoria primera";
                                    header("Location: error_buscar_asiento_ida.php?mensaje=$errorNoHayAsientos");
                                }    
                            } 
                        }
                        else 
                        {
                            $errorNoHayAsientosParaLaCategoria = "No hay asientos para la categoria elegida";
                            header("Location: error_buscar_asiento_ida.php?mensaje=$errorNoHayAsientosParaLaCategoria");
                        }
                        break;   
            case 200:   // economy
                        $query = "SELECT asientos_economy
                                  FROM avion
                                  WHERE codigo_avion =
                                        (SELECT codigo_avion  
                                         FROM vuelo 
                                         WHERE numero_vuelo = $vuelo)";
                        $asientosEconomy = $skynet->executeSelect($query);
                        $query2 = "SELECT count(*) as reservas
                                  FROM reserva
                                  WHERE numero_vuelo = $vuelo and id_categoria = $categoria and esta_en_espera = false";
                        $reservasEconomy = $skynet->executeSelect($query2);
                        $totalAsientos = intval($asientosEconomy[0]["asientos_economy"]);
                        $totalReservas = intval($reservasEconomy[0]["reservas"]);
                        if ($totalAsientos > 0) 
                        {
                            $asientosLibres = $totalAsientos - $totalReservas;
                            if ($asientosLibres > 0)
                            {
                                /* Espera false indica que la reserva no queda en espera*/
                                header("Location: datos_pasajero.php?estaEnEspera=false");
                            }
                            else
                            {
                                $query = "SELECT count(*) as reservas
                                          FROM reserva
                                          WHERE numero_vuelo = $vuelo and esta_en_espera = true";
                                $reservasEnEspera = $skynet->executeSelect($query);
                                $cantidadReservasEnEspera = intval($reservasEnEspera[0]["reservas"]);
                                if ($cantidadReservasEnEspera < EXCEDENTE) 
                                {
                                    /* Espera true indica que la reserva queda en espera*/
                                    header("Location: datos_pasajero.php?estaEnEspera=true");
                                }
                                else
                                {
                                    $errorNoHayAsientos = "No hay asientos para el vuelo " . $vuelo . 
                                                           "entre " . $_SESSION["ciudadOrigen"] . " y " . 
                                                           $_SESSION["ciudadDestino"] . " para la categoria economy";
                                    header("Location: error_buscar_asiento_ida.php?mensaje=$errorNoHayAsientos");
                                }    
                            } 
                        }
                        else 
                        {
                            $errorNoHayAsientosParaLaCategoria = "No hay asientos para la categoria elegida";
                            header("Location: error_buscar_asiento_ida.php?mensaje=$errorNoHayAsientosParaLaCategoria");
                        }
                        break;
        }   
    }
?>
