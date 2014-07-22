<?php
    session_start();
    $mensaje = $_GET["mensaje"];
    echo "<link rel='stylesheet' type='text/css' href='../css/error.css'/>";
    echo "<form class='centrar'>";
    echo    $mensaje;
    echo    "</br>";
    echo    "<a href='datos_pasajero.php' name='anterior'/>Anterior</a>";
    echo "</form>";
?>

