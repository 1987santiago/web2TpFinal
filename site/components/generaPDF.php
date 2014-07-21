<?php
	//Creamos la conexión a nuestra base de datos
	//Hay que sustituir el usuario contraseña
	$conexion = mysql_connect("localhost", "root", "");
	//Aquí hay que sustituir la el nombre de la base de datos
	mysql_select_db("skynet", $conexion);

	require_once("../processors/fpdf/fpdf.php");

	$query = "select * from pago";
	$consulta = mysql_query($query);
	$nfilas = mysql_num_rows($consulta);

	$pdf = new FPDF();
	$pdf->AddPage();
	// listamos los datos con Cell
	$pdf->SetFont('Arial','',12); // definimos el tipo de letra y el tamaño
	// Cell esta formado por (posición de inicio, ancho, texto, borde, cambio de linea, posición del texto)
	$pdf->Cell(0,6,'Fecha de Pago: '.$nfilas['monto'],0,1);
				
	$pdf->Output();

?> 