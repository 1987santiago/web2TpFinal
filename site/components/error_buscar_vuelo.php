<?php
    session_start();
    $mensaje = $_GET["mensaje"];
    echo "<form>";
    echo    $mensaje;
    echo    "</br>";
    echo    "<a href='datos_vuelo.php' name='anterior'/>Anterior</a>";
    echo "</form>";
?>

