<?php
	//Creamos la conexión a nuestra base de datos
	//Hay que sustituir el usuario contraseña
	$conexion = mysql_connect("localhost", "root", "");
	//Aquí hay que sustituir la el nombre de la base de datos
	mysql_select_db("skynet", $conexion);

	require_once("../processors/fpdf/fpdf.php");

	$fecha_pago = $_POST['fecha_pago'];
	$monto = $_POST['monto'];
	$tarjeta = $_POST['tarjeta'];
	$numTarjeta =  $_POST['numeroTarjeta'];
	$codigo_reserva = $_POST['codigoReserva'];

	$insertar = "INSERT INTO pago (fecha_pago, forma_pago, numero_tarjeta, monto, codigo_reserva) VALUES ('$fecha_pago','$tarjeta', '$numTarjeta', '$monto', '$codigo_reserva')";
	mysql_query($insertar,$conexion);	

 	$query = "select * from pago where codigo_reserva = '$codigo_reserva'";
	$consulta = mysql_query($query);
	$nfilas = mysql_num_rows($consulta);

	if ($insertar) {
		
		echo '<h2 class="reserva">Pago realizado con exito</h2>';
		echo '</br>';
		echo '<h2 class="reserva">Imprima su pasaje electronico</h2>';

		$query = "select * from pago where codigo_reserva = '$codigo_reserva'";
		$consulta = mysql_query($query);
		$row = mysql_fetch_array($consulta);

		$pdf = new FPDF();
		$pdf->AddPage();
		// listamos los datos con Cell
		$pdf->SetFont('Arial','',12); // definimos el tipo de letra y el tamaño
		// Cell esta formado por (posición de inicio, ancho, texto, borde, cambio de linea, posición del texto)
		$pdf->Cell(30,6,'Monto:'.$row['monto'],0,1,'R'); 
		$pdf->Cell(1,6,'Forma de Pago: '.$row['forma_pago'],0,1);
		$pdf->Cell(0,6,'Codigo de Reserva: '.$row['codigo_reserva'],0,1);
						
		$pdf->Output("ejemplo.pdf","F");

		echo "<script language='javascript'> window.open('ejemplo.pdf','_blank');</script>";
		
	} else {
		echo 'Hubo un error en el registro del pago. Intentelo mas tarde';	
	}

?>      


