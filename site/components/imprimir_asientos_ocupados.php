<?php   
    session_start();
    // guardamos la url de los recursos estaticos 
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    
    require_once "$base_path$statics_path/lib/tcpdf/config/tcpdf_config.php";
    require_once "$base_path$statics_path/lib/tcpdf/tcpdf.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph_bar.php";
  
    // se recupera nombre de archivo pdf
    $filePDF = $_SESSION["pdf"];
    
    $asientosOcupados = $_SESSION["asientosOcupados"];
    $fechaInicial = $_SESSION["fechaInicial"];
    $fechaFinal = $_SESSION["fechaFinal"];
    $destino = $_SESSION["destino"];
    
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
    foreach ($asientosOcupados as $item) {
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
    
      // Se envia el grafico a un handler
    $contentType = 'image/png';
    $gdImgHandler = $grafico3->Stroke(_IMG_HANDLER);
 
    ob_start();                        // start buffering
    $grafico3->img->Stream();             // print data to buffer
    $graphData = ob_get_contents();   // retrieve buffer contents
    ob_end_clean();                    // stop buffer
  
    try
    {
        $pdf = new TCPDF('P','mm', 'A4');
        $pdf->AddPage();
        $pdf->Image('@'.$graphData);
        $pdf->Output($filePDF);
    }
    
    catch(Exception $e) 
    {
        $errorPDF = $e->getMessage();
        $anterior = "$server_root$statics_path/components/pedir_informe.php";
        $error = "$server_root$statics_path/components/error.php";
        header("Location: " . $error. "?mensaje=$errorPDF&anterior=$anterior");
    }
?>