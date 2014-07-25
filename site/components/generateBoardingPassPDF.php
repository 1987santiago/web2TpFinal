<?php 
    $server_root = $_SESSION["server_root"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    $save_seat_data = $_SESSION['save_seat_data'];
    $reservation_data = $_SESSION['reservation_data']; 
    $plane_data = $_SESSION['plane_data']; 
    $flight_data = $_SESSION['flight_data'];

    // ################### FPDF #######################
    // require "../lib/fpdf/fpdf.php";
    // $pdf = new FPDF();
    // //Primera página
    // $pdf->AddPage();
    // $pdf->SetFont('Arial','',15);
    // $pdf->Cell(40,20);
    // $pdf->Write(5,'A continuación mostramos una imagen ');
    // $pdf->Image($image_src , 80 ,22, 35 , 38,'png');
    // $pdf->Output();
    // ################### FPDF #######################

    
    // ################### DOMPDF #######################
    require_once "../lib/dompdf/dompdf_config.inc.php";

    $pdf_filename = 'boardingPass-' . $reservation_data[0]['codigo_reserva'] . $flight_data[0]['numero_vuelo'] . $save_seat_data['id_asiento'] . '.pdf';
    $qr_src = "$server_root$statics_path/components/".$_COOKIE['qr_file_name'];
    
    $html = 
            "<header style='position:relative;'>
                <img src='../images/header/volando.png' alt='Skynet' />
                <img src='" . $qr_src . "' alt='datos reserva' style='position:absolute; left: 15cm;' />
            </header>
            <hr>
            <ul> 
            <li>Numero vuelo: " . $flight_data[0]['numero_vuelo'] . "</li>
            <li>Fecha de vuelo: " . $reservation_data[0]['fecha_partida'] . "</li> 
            <li>Ciudad origen: " . $flight_data[0]['origen'] . "</li>
            <li>Ciudad destino: " . $flight_data[0]['destino'] . "</li> 
            <li>Avion: " . $plane_data[0]['marca'] . " " . $plane_data[0]['modelo'] . "</li> 
            <li>Asiento: " . $save_seat_data['id_asiento'] . "</li> 
            <li>Categoria: " . $save_seat_data['descripcion'] . "</li> 
            <li>Codigo de reserva: " . $reservation_data[0]['codigo_reserva'] .
            "<ul>";


    // die($html);
    $dompdf = new DOMPDF();     
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($pdf_filename);

    setcookie('qr_file_name', '', time()-3000);
    // ################### DOMPDF #######################

?>