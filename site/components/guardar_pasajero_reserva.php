<?php
    session_start();
    
    // require_once 'database.php';
    require_once '../processors/Database.php';
    require_once 'library.php';
    
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
    
    // Se convierte la fecha de nacimiento al formato aaaa-mm-dd
    $fechaNacF =  getFechaFormateada($_SESSION["fechaNac"]);
    /* Se prepara la reserva a guardar*/
    $codigoReserva = getCodigoUnicoReserva();
    $fechaReserva = date("Y-m-d");
    $fechaPartida = getFechaFormateada($_SESSION["fechaPartida"]);
    $estaEnEspera = $_SESSION["estaEnEspera"];
    $numeroVuelo = $_SESSION["vueloElegido"];
    $idCategoria = $_SESSION["categoriaElegida"];
    
    $skynet = new Database();
    $conexionCorrecta = $skynet->connect();
    if ($conexionCorrecta)
    {
        $query = "INSERT INTO pasajero (dni, apellido, nombre, fecha_nac, telefono, email, nacionalidad) VALUES('$dni', '$apellido', '$nombre', '$fechaNacF', '$telefono', '$email','$nacionalidad')";
        $pasajeroInsertado = $skynet->executeIDU($query);
        if ($pasajeroInsertado) 
        {
            $query2 = "INSERT INTO reserva (codigo_reserva, fecha_reserva, fecha_partida, esta_en_espera, dni, numero_vuelo, id_categoria ) VALUES('$codigoReserva', '$fechaReserva', '$fechaPartida', '$estaEnEspera', '$dni', '$numeroVuelo','$idCategoria')";
            $reservaInsertada = $skynet->executeIDU($query2);
            if ($reservaInsertada) 
            {
                header("Location: mostrar_codigo_reserva.php?codigoReserva=$codigoReserva");
            }
            else 
            {
                $errorInsercionReserva= "No se pudo insertar la reserva en la base de datos";
                header("Location: error_guardar_pasajero_reserva.php?mensaje=$errorInsercionReserva");
            }    
        }
        else 
        {
            $errorInsercionPasajero= "No se pudo insertar el pasajero en la base de datos";
            header("Location: error_guardar_pasajero_reserva.php?mensaje=$errorInsercionPasajero");
        }
        $skynet->disconnect();
    }
?>

