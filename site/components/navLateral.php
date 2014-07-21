 <?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array("navLateral")
    // ); 
?>

<div class="links">
		<li><a href="<?php echo "$statics_path"; ?>/sections/reservas.php" data-section="reservas" title="Reservas">Reservas</a></li>
		<li><a href="<?php echo "$statics_path"; ?>/sections/pago.php" data-section="pago" title="Pago">Pago</a></li>
		<li><a href="<?php echo "$statics_path"; ?>/sections/checkin.php" data-section="checkin" title="Checkin">Checkin</a></li>
  
		<li><img src="<?php echo "$statics_path"; ?>/images/links/suscripcion.png" /></li>
		
		<?php
			//Creamos la conexión a nuestra base de datos
			//Hay que sustituir el usuario contraseña
			$conexion = mysql_connect("localhost", "root", "");
			
			//Aquí hay que sustituir la el nombre de la base de datos
			mysql_select_db("suscripcion", $conexion);
		?>

			<!-- Ahora creamos el formulario que enviará los datos -->
			<!-- En el apartado 'action' hay que poner a que página enviaremos los datos -->

		<form  method="post" action="#">
		  	<li><input class="suscrip" type="text" name="email"/></li>
				<li><button class="submit" type="submit">Suscribirse</button></li>
		</form>

  <?php
    //Comprobamos si se han recibido datos del formulario
  
    if(isset($_POST['email'])){
      //Insertamos los datos en la tabla personas
      //de la BDD suscripcion y consta de una celda
      //la de email
      $insertar = "INSERT INTO personas (email) 
          VALUES ('".$_POST['email']."')";
      mysql_query($insertar,$conexion);	
     }
  ?>
</div>			