<?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    //Creamos la conexión a nuestra base de datos
    //Hay que sustituir el usuario contraseña
    $conexion = mysql_connect("localhost", "root", "");
    //Aquí hay que sustituir la el nombre de la base de datos
    mysql_select_db("suscripcion", $conexion);
?>

    <!-- Ahora creamos el formulario que enviará los datos -->
    <!-- En el apartado 'action' hay que poner a que página
    enviaremos los datos, en este caso lo enviaremos
    a suscripcion.php, es decir, a esta misma web -->
    <form id="form1" name="form1" method="post" action="#">
        <li><input class="suscrip" type="text" name="email"  id="email"/></li>
        <li><button class="submit" type="submit">Suscribirse</button></li>
        <!-- <input type="submit" name="enviar" id="enviar" value="Enviar" /> -->
    </form>
    <?php
        //Comprobamos si se han recibido datos del formulario
        if (isset($_POST['email'])) {
            //Insertamos los datos en la tabla personas
            //de la BDD suscripcion y consta de una celda
            //la de email
            $insertar = "INSERT INTO personas (email) VALUES ('".$_POST['email']."')";
            mysql_query($insertar,$conexion);	
        }
    ?>
