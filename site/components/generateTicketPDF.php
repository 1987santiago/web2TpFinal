<?php 
	session_start();
    $server_root = $_SESSION["server_root"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // Obtenemos los datos para poder imprimirlos en el pdf
    $reservation_data 	= $_SESSION['reservation_data'][0];
    $traveler_data 		= $_SESSION['traveler_data'];
    $flight_data 		= $_SESSION['flight_data'];
    $plane_data 		= $_SESSION['plane_data'];

    // Datos de la reserva
    $categoria_str = ($reservation_data['id_categoria'] == 100)? 'Primera' : 'Economica';

    // ################### DOMPDF #######################
    require "$base_path$statics_path/lib/phpqrcode/qrlib.php";
    require_once "../lib/dompdf/dompdf_config.inc.php";

    // Generamos el código QR con la informacion de la reserva
    $data = 
        "Datos Pasajero: \n" . 
        "Nombre y apellido: " . $traveler_data['nombre'] . " " . $traveler_data['apellido'] . "\n" .
        "Nacionalidad" . $traveler_data['nacionalidad'] . "\n" . 
        "DNI: " . $traveler_data['dni'] . "\n" .
        "Telefono: " . $traveler_data['telefono'] . "\n" . 
        "Email: " . $traveler_data['email'] . "\n" . 
        "Datos Vuelo: \n" . 
        "Ciudad de origen: " . $flight_data['origen'] . "\n" . 
        "Ciudad de destino: " . $flight_data['destino'] . "\n" . 
        "Precio:" . $flight_data['precio'] . "\n" . 
        "Número de vuelo:" . $flight_data['numero_vuelo'] . "\n" . 
        "Avión: " . $plane_data['marca'] . " Modelo: " . $plane_data['modelo'];
    
    $qr_file_name = "reservationCodeQR" . rand() . ".png";
    $qr_code = QRcode::png($data, $qr_file_name);

	$html = 
		"<div>

			<header>
                <img src='../images/header/volando.png' alt='Skynet' />
            </header>

            <section>
                <h2>Datos Vuelo</h2>
                <dl>
                    <dt>Ciudad origen:</dt>
                        <dd>" . $flight_data['origen'] . "</dd>
                    <dt>Ciudad destino:</dt>
                        <dd>" . $flight_data['destino'] . "</dd>
                    <dt>Avion:</dt>
                        <dd>" . $plane_data['marca'] . " " . $plane_data['modelo'] . "</dd>
                    <dt>Categoria</dt>
                        <dd>$categoria_str</dd>
                </dl>
            </section>

            <section>
                <h2>Datos Pasajero</h2>
                <dl>
                    <dt>Nombre y Apellido: </dt>
                        <dd>" . $traveler_data['nombre'] . " " . $traveler_data['apellido'] . "</dd>
                    <dt>DNI: </dt>
                        <dd>" . $traveler_data['dni'] . "</dd>
                    <dt>TE:</dt>
                        <dd>" . $traveler_data['telefono'] . "</dd>
                    <dt>Email:</dt>
                        <dd> " . $traveler_data['email'] . "</dd>
                </dl>
            </section>

			<div><img src='" . $qr_file_name . "' alt='datos reserva' /></div>
        </div>";

    // die($html);
    $pdf_filename = 'skynet-ticket-' . $reservation_data['codigo_reserva'] . $flight_data['numero_vuelo'] . '.pdf';
    // $qr_src = "codeQR2.png";
    
    $dompdf = new DOMPDF();     
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($pdf_filename);
    // ################### [END] DOMPDF #######################


    // Datos Pasajero:
    // $traveler_data['nombre']
    // $traveler_data['apellido']
    // $traveler_data['dni']
    // $traveler_data['fecha_nac']
    // $traveler_data['telefono']
    // $traveler_data['email']
    // $traveler_data['nacionalidad']

    // // Datos Vuelo
    // $flight_data['origen']
    // $flight_data['destino']
    // $flight_data['numero_vuelo']
    // $flight_data['precio']

    // // Datos del avion
    // $plane_data['codigo_avion']
    // $plane_data['marca']
    // $plane_data['modelo']

?>
