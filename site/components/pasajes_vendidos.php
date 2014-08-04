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
        $query1 =   "select fecha_pago
                    from pago
                    where fecha_pago >= '$fechaInicialF' and 
                    fecha_pago <= '$fechaFinalF'";
        $response1 = $skynet->executeSelect($query1);

        if (count($response1) > 0) {
            // se cuenta la cantidad de pasajes vendidos para cada dia de la semana
            $pasajesVendidosPorDia = array(0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($response1 as $item) {
                $dia = getDiaDeLaSemana($item["fecha_pago"]);
                $pasajesVendidosPorDia[$dia]++;
            }        
            $_SESSION["pasajesVendidosPorDia"] = $pasajesVendidosPorDia;    
        }
        else {
            
            $noHayPasajesVendidos = "No hay pasajes vendidos entre " . $fechaInicial . 
                                " y " . $fechaFinal . " para el destino " . $destino;
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
    $datos = $pasajesVendidosPorDia;
    $leyenda = array("", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

    //Se define el grafico
    $grafico = new PieGraph(450,300);
    $grafico->img->SetAntiAliasing();
    
    //Definimos el titulo
    $titulo = "Pasajes vendidos por dia entre " . $fechaInicial . " y " . $fechaFinal; 
    $grafico->title->Set($titulo);
 
    //Añadimos el titulo y la leyenda
    $p1 = new PiePlot($datos);
    $p1->SetLegends($leyenda);
    $p1->SetCenter(0.4);
 
    $grafico->Add($p1);
    
    $grafico->Stroke();
?>