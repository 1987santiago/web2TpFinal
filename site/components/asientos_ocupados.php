<?php
    session_start();
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    $server_root = $_SESSION["server_root"];
    
    require_once "$base_path$statics_path/processors/Database.php";
    require_once "$base_path$statics_path/components/library.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph_bar.php";
    
    $fechaInicial = $_SESSION["fechaInicial"];
    $fechaFinal = $_SESSION["fechaFinal"];
    $destino = $_SESSION["destino"];
    
    $fechaInicialF = getFechaFormateada($fechaInicial);
    $fechaFinalF = getFechaFormateada($fechaFinal);
    
    $skynet = new Database();
    $conexionExitosa = $skynet->connect();
    
    if ($conexionExitosa) {
        $query1 =  "select count(*) as asientosOcupados, vu.codigo_avion
                    from asiento as asi,    (select numero_vuelo, codigo_avion
                                            from vuelo
                                            where destino = '$destino') as vu
                    where vu.numero_vuelo = asi.numero_vuelo
                    group by vu.codigo_avion
                    order by vu.codigo_avion";
        $response1 = $skynet->executeSelect($query1);
        if (count($response1) > 0) 
            {
                $_SESSION["asientosOcupados"] = $response1;
            }
        else
            {
                $noHayAsientosOcupados = "No hay asientos ocupados para el destino" . $destino;
                $anterior = "$server_root$statics_path/components/pedir_informe.php";
                $error = "$server_root$statics_path/components/error.php";
                header("Location: ". $error . "?mensaje=$noHayAsientosOcupados&anterior=$anterior");
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

    $grafico3 = new Graph(450, 300);

    // Se define el tipo de escala 
    $grafico3->SetScale("textlin");

    // Se asigna el titulo del grafico
    $titulo = "Asientos ocupados por tipo de avion para el destino " . $destino;

    $grafico3->title->Set($titulo);
    
    $tipos = array("Tipo 1", "Tipo 2", "Tipo 3", "Tipo 4");
    // Se asigna el titulo y la alineacion para el eje x
    $grafico3->xaxis->SetTitle("Tipos de avion");
    // Se asignan las etiquetas del eje x
    $grafico3->xaxis->SetTickLabels($tipos);
    // Se asigna el titulo y la alineacion para el eje y
    $grafico3->yaxis->SetTitle("Asientos ocupados");

    // Se crea un array con los asientos ocupados por tipos de avion
    $asientos = array();
    $i=0;
    foreach ($response1 as $item) {
        $asientos[$i] = $item["asientosOcupados"];
        $i++;
    }

    // Se define una serie
    $bp1 = new BarPlot($asientos);
    //$bp1->SetCenter(0.4);
    // Se asigna la leyenda para la serie
    $bp1->SetLegend("Asientos ocupados");

    // Se agrega la serie al grafico
    $grafico3->Add($bp1);

    // Se muestra el grafico
    $grafico3->Stroke();
?>