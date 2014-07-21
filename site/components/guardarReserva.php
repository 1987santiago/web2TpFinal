<?php
    //Creamos la conexión a nuestra base de datos
    //Hay que sustituir el usuario contraseña
    $conexion = mysql_connect("localhost", "root", "");
    //Aquí hay que sustituir la el nombre de la base de datos
    mysql_select_db("skynet", $conexion);

	$fecha_pago = $_POST['fecha_pago'];
	$monto = $_POST['monto'];
	$tarjeta = $_POST['tarjeta'];
	$numTarjeta =  $_POST['numeroTarjeta'];
	$codigo_reserva = $_POST['codigoReserva'];

    $insertar = "INSERT INTO pago (fecha_pago, forma_pago, numero_tarjeta, monto, codigo_reserva) VALUES ('$fecha_pago','$tarjeta', '$numTarjeta', '$monto', '$codigo_reserva')";

    mysql_query($insertar,$conexion);	

    $query = "select * from pago";

    $consulta = mysql_query($query);

    $nfilas = mysql_num_rows($consulta);

    

    if($insertar) {

		echo '<h2 class="reserva">Pago realizado con exito</h2>';
		echo '</br>';
		echo '<h2 class="reserva">Imprima su pasaje electronico</h2>';
		echo '<div class="espacio">
                <form class="contact_form" action ="../components/generaPDF.php" method="post" >
                    <button class="submit" type="submit">Imprimir</button>  
    			</form>
              </div>';
		
	} else {
		echo 'Hubo un error en el registro del pago. Intentelo mas tarde';	
    }

?>      


