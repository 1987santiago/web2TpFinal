<?php
    session_start();
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];
    echo "<form>";
    echo    $mensaje;
    echo    "</br>";
    echo    "<a href='$anterior' name='anterior'/>Anterior</a>";
    echo "</form>";
?>
