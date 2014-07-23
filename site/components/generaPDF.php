<?php 
	session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // Obtenemos los datos para poder imprimirlos en el pdf
    $reservation_data 	= $_SESSION['reservation_data'][0];
    $traveler_data 		= $_SESSION['traveler_data'];
    $flight_data 		= $_SESSION['flight_data'];
    $plane_data 		= $_SESSION['plane_data'];

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

    // Datos de la reserva
    $categoria_str = ($reservation_data['id_categoria'] == 100)? 'Primera' : 'Economica';

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("custom-pdf")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

<!-- <div class="skynet-pfd">

	<header>
		<img src="../images/header/volando.png" alt="Skynet" />
	</header>

	<section>
		<h2>Datos Vuelo</h2>
		<dl>
			<dt>Ciudad origen:</dt>
				<dd><?php echo $flight_data['origen']; ?></dd>
			<dt>Ciudad destino:</dt>
				<dd><?php echo $flight_data['destino']; ?></dd>
			<dt>Fecha programada de vuelo:</dt>
				<dd><?php echo ''; ?></dd>
			<dt>Avión:</dt>
				<dd><?php echo $plane_data['marca'] . ' ' . $plane_data['modelo']; ?></dd>
			<dt>Categoría</dt>
				<dd><?php echo $categoria_str; ?></dd>
		</dl>
	</section>

	<section>
		<h2>Datos Pasajero</h2>
		<dl>
			<dt>Nombre y Apellido: </dt>
				<dd><?php echo $traveler_data['nombre'] . ' ' . $traveler_data['apellido']; ?></dd>
			<dt>DNI: </dt>
				<dd><?php echo $traveler_data['dni']; ?></dd>
			<dt>TE:</dt>
				<dd><?php echo $traveler_data['telefono']; ?></dd>
			<dt>Email:</dt>
				<dd><?php echo $traveler_data['email']; ?></dd>
		</dl>
	</section>

</div> -->

<?php
    // ################### DOMPDF #######################
    require_once "../lib/dompdf/dompdf_config.inc.php";

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

		</div>";


    $pdf_filename = 'skynet-ticket-' . $reservation_data['codigo_reserva'] . $flight_data['numero_vuelo'] . '.pdf';
    // $qr_src = "codeQR2.png";
    
    $dompdf = new DOMPDF();     
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($pdf_filename);
    // ################### DOMPDF #######################

?>

<?php

	// //Creamos la conexión a nuestra base de datos
	// //Hay que sustituir el usuario contraseña
	// $conexion = mysql_connect("localhost", "root", "");
	// //Aquí hay que sustituir la el nombre de la base de datos
	// mysql_select_db("skynet", $conexion);

	// require_once("../lib/fpdf/fpdf.php");

	// $query = "select * from pago";
	// $consulta = mysql_query($query);
	// $nfilas = mysql_num_rows($consulta);

	// $pdf = new FPDF();
	// $pdf->AddPage();
	// // listamos los datos con Cell
	// $pdf->SetFont('Arial','',12); // definimos el tipo de letra y el tamaño
	// // Cell esta formado por (posición de inicio, ancho, texto, borde, cambio de linea, posición del texto)
	// $pdf->Cell(0,6,'Fecha de Pago: '.$nfilas['monto'],0,1);
				
	// $pdf->Output();

?> 