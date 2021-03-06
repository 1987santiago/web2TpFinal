 <?php
    session_start();

    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    require_once "$base_path$statics_path/processors/Database.php";
    require_once "$base_path$statics_path/components/library.php";
        
    function getMonto($numeroVuelo, $categoria) 
    {
        global $skynet;
        $monto=0;
        switch ($categoria) 
        {
            case 100:   // primera
                        $query ="SELECT tarifa_primera FROM vuelo WHERE numero_vuelo=$numeroVuelo";
                        $tarifaPrimera = $skynet->executeSelect($query);
                        $monto = floatval($tarifaPrimera[0]["tarifa_primera"]);    
                        break;

            case 200:   // economy
                        $query ="SELECT tarifa_economy FROM vuelo WHERE numero_vuelo=$numeroVuelo";
                        $tarifaEconomy = $skynet->executeSelect($query);
                        $monto = floatval($tarifaEconomy[0]["tarifa_economy"]);  
                        break;
        }
        return $monto;
    }
  
    // Se prepara el pasajero a guardar
    $dni = $_POST["dni"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $fechaNac = $_POST["fechaNac"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $nacionalidad = $_POST["nacionalidad"];
   
    // Se guardan los datos del pasajero en la sesion
    $_SESSION["dni"] = $dni;
    $_SESSION["apellido"] = $apellido;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["fechaNac"] = $fechaNac;
    $_SESSION["telefono"] = $telefono;
    $_SESSION["email"] = $email;
    $_SESSION["nacionalidad"] = $nacionalidad;
   
    $skynet = new Database();
    $conexionExitosa = $skynet->connect();
    if ($conexionExitosa) 
    {
        // Se verifica si el pasajero ya existe 
        $searchPasajero = "SELECT * FROM pasajero WHERE dni='$dni'";
        $resultado = $skynet->executeSelect($searchPasajero);
        $tamanio = count($resultado);
        
        $tipoDeViaje=$_SESSION["tipoDeViaje"];
        switch ($tipoDeViaje) 
        {
            case 1: // Viaje ida
                    // Se convierte la fecha de nacimiento al formato aaaa-mm-dd
                    $fechaNac =  getFechaFormateada($fechaNac);

                    /* Se prepara el registro de la reserva de ida a guardar*/
                    $codigoReservaIda = getCodigoUnicoReserva();
                    $datFechaReservaIda = new DateTime("", new DateTimeZone("America/Buenos_Aires"));
                    $fechaReservaIda = $datFechaReservaIda->format("Y-m-d");
                    $datFechaPartida = new DateTime(getFechaFormateada($_SESSION["fechaPartida"]) . " 8:00:00", new DateTimeZone("America/Buenos_Aires"));
                    $fechaPartida = $datFechaPartida->format("Y-m-d H:i:s");
                    $estadoReservaIda = $_SESSION["estadoReservaIda"];
                    $vueloIdaElegido = $_SESSION["vueloIdaElegido"];
                    $categoriaIdaElegida = $_SESSION["categoriaIdaElegida"];
                    $montoIda = getMonto($vueloIdaElegido, $categoriaIdaElegida);
 
                    // Se preparan las querys de inserciones
                    $insertPasajero = "INSERT INTO pasajero (dni, apellido, nombre, fecha_nac, telefono, email, nacionalidad) VALUES('$dni', '$apellido', '$nombre', '$fechaNac', '$telefono', '$email', '$nacionalidad')";
                    $insertReservaIda = "INSERT INTO reserva (codigo_reserva, fecha_reserva, fecha_partida, estado, monto, dni, numero_vuelo, id_categoria) VALUES('$codigoReservaIda','$fechaReservaIda', '$fechaPartida', '$estadoReservaIda', '$montoIda', '$dni', '$vueloIdaElegido', '$categoriaIdaElegida')";
                    $_SESSION["codigoReservaIda"] = $codigoReservaIda;
                    try 
                    {   
                        $skynet->beginTransaction();
                        if ($tamanio == 0) // no existe el pasajero
                        {
                            $skynet->executeIDU($insertPasajero);
                        }
                        $skynet->executeIDU($insertReservaIda);
                        $skynet->commit();
                        $siguiente = "$server_root$statics_path/components/mostrar_codigo_reserva.php";
                        header("Location: " . $siguiente);
                    } 
                    catch (Exception $e) 
                    {
                        $skynet->rollBack();
                        $errorInsercion = $e->getMessage();
                        $anterior = "$server_root$statics_path/components/datos_pasajero.php";
                        $error = "$server_root$statics_path/components/error.php";
                        header("Location: " . $error. "?mensaje=$errorInsercion&anterior=$anterior");
                    }
                    break;
            case 2: // Viaje ida y vuelta
                    // Se convierte la fecha de nacimiento al formato aaaa-mm-dd
                    $fechaNac =  getFechaFormateada($fechaNac);

                    /* Se prepara el registro de la reserva a guardar*/
                    $codigoReservaIda = getCodigoUnicoReserva();
                    $datFechaReservaIda = new DateTime("", new DateTimeZone("America/Buenos_Aires"));
                    $fechaReservaIda = $datFechaReservaIda->format('Y-m-d H:i:s');
                    $datFechaPartida = new DateTime(getFechaFormateada($_SESSION["fechaPartida"]) . " 8:00:00", new DateTimeZone("America/Buenos_Aires"));
                    $fechaPartida = $datFechaPartida->format('Y-m-d H:i:s');
                    $estadoReservaIda = $_SESSION["estadoReservaIda"];
                    $vueloIdaElegido = $_SESSION["vueloIdaElegido"];
                    $categoriaIdaElegida = $_SESSION["categoriaIdaElegida"];
                    $montoIda = getMonto($vueloIdaElegido, $categoriaIdaElegida);

                    /* Se prepara el registro de la reserva de regreso a guardar*/
                    $codigoReservaRegreso = getCodigoUnicoReserva();
                    $datFechaReservaRegreso = new DateTime("", new DateTimeZone("America/Buenos_Aires"));
                    $fechaReservaRegreso = $datFechaReservaRegreso->format('Y-m-d H:i:s');
                    $datFechaRegreso = new DateTime(getFechaFormateada($_SESSION["fechaRegreso"]) . " 8:00:00", new DateTimeZone("America/Buenos_Aires"));
                    $fechaRegreso = $datFechaRegreso->format('Y-m-d H:i:s');
                    $estadoReservaRegreso = $_SESSION["estadoReservaRegreso"];
                    $vueloRegresoElegido = $_SESSION["vueloRegresoElegido"];
                    $categoriaRegresoElegida = $_SESSION["categoriaRegresoElegida"];
                    $montoRegreso = getMonto($vueloRegresoElegido, $categoriaRegresoElegida);
                    
                    $insertPasajero = "INSERT INTO pasajero (dni, apellido, nombre, fecha_nac, telefono, email, nacionalidad) VALUES('$dni', '$apellido', '$nombre', '$fechaNac', '$telefono', '$email', '$nacionalidad')";
                    $insertReservaIda = "INSERT INTO reserva (codigo_reserva, fecha_reserva, fecha_partida, estado, monto, dni, numero_vuelo, id_categoria) VALUES('$codigoReservaIda','$fechaReservaIda', '$fechaPartida', '$estadoReservaIda', '$montoIda', '$dni', '$vueloIdaElegido', '$categoriaIdaElegida')";
                    $insertReservaRegreso = "INSERT INTO reserva (codigo_reserva, fecha_reserva, fecha_partida, estado, monto, dni, numero_vuelo, id_categoria) VALUES('$codigoReservaRegreso','$fechaReservaRegreso', '$fechaRegreso', '$estadoReservaRegreso', '$montoRegreso', '$dni', '$vueloRegresoElegido', '$categoriaRegresoElegida')";
                    $_SESSION["codigoReservaIda"] = $codigoReservaIda;
                    $_SESSION["codigoReservaRegreso"] = $codigoReservaRegreso;
                    try 
                    {  
                        $skynet->beginTransaction();
                        if ($tamanio == 0) 
                        {
                            $skynet->executeIDU($insertPasajero); 
                        }
                        $skynet->executeIDU($insertReservaIda);
                        $skynet->executeIDU($insertReservaRegreso);
                        $skynet->commit();
                        $siguiente = "$server_root$statics_path/components/mostrar_codigo_reserva.php";
                        header("Location: " . $siguiente);
                    } 
                    catch (Exception $e) 
                    {
                        $skynet->rollBack();
                        $errorInsercion = $e->getMessage();
                        $anterior = "$server_root$statics_path/components/datos_pasajero.php";
                        $error = "$server_root$statics_path/components/error.php";
                        header("Location: " . $error. "?mensaje=$errorInsercion&anterior=$anterior");
                    }
                    break;
        }
        $skynet->disconnect();
    }
?>

