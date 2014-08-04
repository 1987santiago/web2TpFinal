<?php   
    session_start();
    // guardamos la url de los recursos estaticos 
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    
    require_once "$base_path$statics_path/lib/tcpdf/config/tcpdf_config.php";
    require_once "$base_path$statics_path/lib/tcpdf/tcpdf.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph.php";
    require_once "$base_path$statics_path/lib/jpgraph/src/jpgraph_pie.php";
  
    // se recupera nombre de archivo pdf
    $filePDF = $_SESSION["pdf"];
    
    $reservasCaidasPorDia = $_SESSION["reservasCaidasPorDia"];
    $fechaInicial = $_SESSION["fechaInicial"];
    $fechaFinal = $_SESSION["fechaFinal"];
    
    $datos = $reservasCaidasPorDia;
    $leyenda = array("", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

    //Se define el grafico
    $grafico4 = new PieGraph(450,300);
<<<<<<< HEAD
    $grafico4->img->SetAntiAliasing();
=======
    //$grafico4->img->SetAntiAliasing();
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
    
    // Se envia el grafico a un handler
    $contentType = 'image/png';
    $gdImgHandler = $grafico4->Stroke(_IMG_HANDLER);
 
    ob_start();                        // start buffering
    $grafico4->img->Stream();             // print data to buffer
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