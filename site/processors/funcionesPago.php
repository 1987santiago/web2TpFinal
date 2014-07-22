<?php
//Creamos la conexión a nuestra base de datos
//Hay que sustituir el usuario contraseña
$conexion = mysql_connect("localhost", "root", "forest");
//Aquí hay que sustituir la el nombre de la base de datos
mysql_select_db("skynet", $conexion);
?>


<?php
    //Comprobamos si se han recibido datos del formulario

    // isset() es una función de PHP que nos permite comprobar si una variable está definida, devolviendo true si lo estuviese.

    //Esta función es muy común cuando deseamos comprobar que los campos de un formulario hayan sido rellenados

    if(isset($_POST['email'])){
      //Insertamos los datos en la tabla personas
      //de la BDD suscripcion y consta de una celda
      //la de email
      $insertar = "INSERT INTO personas (email) 
          VALUES ('".$_POST['email']."')";
      mysql_query($insertar,$conexion);	
     }
?>