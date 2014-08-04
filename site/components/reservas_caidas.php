<?php  
    session_start();
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    $server_root = $_SESSION["server_root"];
    
    require_once "$base_path$statics_path/processors/Database.php";
    require_once "$base_path$statics_path/components/library.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph_pie.php";
    
    $fechaInicial = $_SESSION["fechaInicial"];
    $fechaFinal = $_SESSION["fechaFinal"];
    $destino = $_SESSION["destino"];
    
    $fechaInicialF = getFechaFormateada($fechaInicial);
    $fechaFinalF = getFechaFormateada($fechaFinal);
    
    $skynet = new Database();
    $conexionExitosa = $skynet->connect();
    
    if ($conexionExitosa) {
        $query1 =   "select fecha_reserva
                    from reserva
                    where (day(now()) - day(fecha_reserva) <= 1) and 
                    fecha_reserva >= '$fechaInicialF' and 
                    fecha_reserva <= '$fechaFinalF' and
                    codigo_reserva NOT IN (select codigo_reserva
                                           from pago)";
        $response1 = $skynet->executeSelect($query1);
        if (count($response1) > 0) {
            // se cuenta la cantidad de reservas caidas para cada dia de la semana
            $reservasCaidasPorDia = array(0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($response1 as $item) {
                $dia = getDiaDeLaSemana($item["fecha_reserva"]);
                $reservasCaidasPorDia[$dia]++;
            }
            $_SESSION["reservasCaidasPorDia"] = $reservasCaidasPorDia;
        }
        else {
            
            $noHayPasajesVendidos = "No hay reservas caidas entre " . $fechaInicial . " y " . $fechaFinal;
            $anterior = "$server_root$statics_path/components/pedir_informe.php";
            $error = "$server_root$statics_path/components/error.php";
            header("Location: ". $error . "?mensaje=$noHayPasajesVendidos&anterior=$anterior");
        }
        $skynet->disconnect();   
    }
    else {
        
        $errorConexion = "No se pudo conectar a la base de datos"; 
        $anterior = "$server_root$statics_path/components/pedir_informe.php";
        $error = "$server_root$statics_path/components/error.php";
        header("Location: ". $error . "?mensaje=$errorConexion&anterior=$anterior");
        die();
    }
    $datos = $reservasCaidasPorDia;
    $leyenda = array("", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

    //Se define el grafico
    $grafico4 = new PieGraph(450,300);
<<<<<<< HEAD
    $grafico4->img->SetAntiAliasing();
=======
    //$grafico->img->SetAntiAliasing();
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6
    
    //Definimos el titulo
    $titulo = "Reservas caidas por dia entre " . $fechaInicial . " y " . $fechaFinal; 
    $grafico4->title->Set($titulo);
 
    //Añadimos el titulo y la leyenda
    $p1 = new PiePlot($datos);
    $p1->SetLegends($leyenda);
<<<<<<< HEAD
    $p1->SetCenter(0.4);
=======
    //$p1->SetCenter(0.4);
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6
 
    $grafico4->Add($p1);
    
    $grafico4->Stroke();
?>