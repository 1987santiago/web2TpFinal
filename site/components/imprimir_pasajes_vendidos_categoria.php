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
    
    $pasajesVendidosPorCategoria = $_SESSION["pasajesVendidosPorCategoria"];
    $fechaInicial = $_SESSION["fechaInicial"];
    $fechaFinal = $_SESSION["fechaFinal"];
    $destino = $_SESSION["destino"];
    
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
    foreach ($pasajesVendidosPorCategoria as $item) {
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
    
    // Se envia el grafico a un handler
    $contentType = 'image/png';
    $gdImgHandler = $grafico2->Stroke(_IMG_HANDLER);
 
    ob_start();                        // start buffering
    $grafico2->img->Stream();             // print data to buffer
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