<?php 
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    
    require_once("$local_path/lib/dompdf/dompdf_config.inc.php");

    $html =
        '<p>Put your html here, or generate it with your favourite templating system.</p>'.
        '<img src=' . $local_path . '/images/image.png />';

    $dompdf = new DOMPDF();     
    
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("sample.pdf");

    // ob_start();
    // file_put_contents($statics_path.'/components/templatePDF.html', ob_get_contents());

    // $ofilename = 'miPDF';
 
    // $filename = "$statics_path/components/templatePDF.html";
    // $dompdf->load_html(file_get_contents($filename));
    // $dompdf->render();
    // $dompdf->stream($ofilename.".pdf");

?>