<?php
    session_start();
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];
    echo "<link rel='stylesheet' type='text/css' href='../css/error.css'/>";
    echo "<form class='centrar'>";
    echo    $mensaje;
    echo    "</br>";
    echo    "<a href='$anterior' name='anterior'/>Anterior</a>";
    echo "</form>";
?>
