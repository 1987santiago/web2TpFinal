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
        $query1 =  "select count(*) as pasajes, re.id_categoria as categ, vu.destino as destin
                    from reserva as re, pago as pa, vuelo as vu
                    where re.codigo_reserva = pa.codigo_reserva and
                    re.numero_vuelo = vu.numero_vuelo and
                    pa.fecha_pago >= '$fechaInicialF' and 
                    pa.fecha_pago <= '$fechaFinalF' and 
                    vu.destino = '$destino'
                    group by re.id_categoria, vu.destino
                    order by re.id_categoria";
        $response1 = $skynet->executeSelect($query1);
        if (count($response1) > 0) {
            $_SESSION["pasajesVendidosPorCategoria"] = $response1;
        }
        else {
            $noHayPasajesVendidos = "No hay pasajes vendidos entre " . $fechaInicial . 
                                    " y " . $fechaFinal . " para el destino " . 
                                    $destino;
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

    $grafico2 = new Graph(450, 300);

    // Se define el tipo de escala 
    $grafico2->SetScale("textlin");

    // Se asigna el titulo del grafico
    $titulo = "Pasajes vendidos por categoria entre " . $fechaInicial;
    $subtitulo = " y " . $fechaFinal . " para el destino " . $destino;

    $grafico2->title->Set($titulo);
    $grafico2->subtitle->Set($subtitulo);
    
    $categorias = array("primera", "economy");
    // Se asigna el titulo y la alineacion para el eje x
    $grafico2->xaxis->SetTitle("Categorias");
    // Se asignan las etiquetas del eje x
    $grafico2->xaxis->SetTickLabels($categorias);
    // Se asigna el titulo y la alineacion para el eje y
    $grafico2->yaxis->SetTitle("Pasajes vendidos");

    // Se crea un array con los pasajes por categoria
    $pasajes = array();
    $i=0;
    foreach ($response1 as $item) {
        $pasajes[$i] = $item["pasajes"];
        $i++;
    }

    // Se define una serie
    $bp1 = new BarPlot($pasajes);
    //$bp1->SetCenter(0.4);
    // Se asigna la leyenda para la serie
    $bp1->SetLegend("Pasajes vendidos");

    // Se agrega la serie al grafico
    $grafico2->Add($bp1);

    // Se muestra el grafico
    $grafico2->Stroke();
?>

