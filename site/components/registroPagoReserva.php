<?php
	//Creamos la conexión a nuestra base de datos
	//Hay que sustituir el usuario contraseña
	$conexion = mysql_connect("localhost", "root", "forest");
	//Aquí hay que sustituir la el nombre de la base de datos
	mysql_select_db("skynet", $conexion);


	//Recibir
	$codReserva = strip_tags($_POST['codReserva']);
	$fecha_pago = strip_tags($_POST['fecha_pago']);
	$monto = strip_tags($_POST['monto']);
	$tarjeta = strip_tags(sha1($_POST['tarjeta']));
	$numeroTarjeta = strip_tags(sha1($_POST['numeroTarjeta']));
	$datFechaReservaIda = new DateTime("", new DateTimeZone("America/Buenos_Aires"));


	$query = @mysql_query('SELECT * FROM pago WHERE reserva="'.mysql_real_escape_string($codReserva).'"');

	if ($existe = @mysql_fetch_object($query)) {
		
		$meter = @mysql_query('INSERT INTO pago (fecha_pago, tarjeta, numeroTarjeta, monto, codReserva ) values ("'.mysql_real_escape_string($datFechaReservaIda).'", "'.mysql_real_escape_string($email).'", "'.mysql_real_escape_string($user).'", "'.mysql_real_escape_string($password).'")');
		
		if ($meter) {

			echo 'Pago realizado con exito';
			echo 'Imprima su pasaje electrónico';

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(40,10,'$query [0]["codigo_reserva"]'); // como se ve en la base de datos
			$pdf->Cell(40,20,'$query [0]["fecha_partida"]'); 
			$pdf->Cell(40,30,'$query [0]["apellido"]');
			$pdf->Cell(40,40,'$query [0]["nombre"]');
			$pdf->Cell(40,50,'$query [0]["origen"]');
			$pdf->Cell(40,60,'$query [0]["destino"]');
			$pdf->Cell(40,70,'$query [0]["categoria"]');     
			$pdf->Output();

		} else {

			echo 'Hubo un error en el registro del pago. Intentelo mas tarde';	

		}

	} else {
		 echo 'El codigo de reserva '.$codReserva.' no se encuentra registrado en nuestra base de datos.';	
	}
?>

<!-- Generar una carpeta que se llama FPDF, dentro de site despues en script require_once (la ruta: FPDF/fpdf.php) $a = new FPDF() y colorlo en el if correspondiente -->