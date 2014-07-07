<?php
    session_start();
    $codigoReserva = $_GET["codigoReserva"];
    $_SESSION["codigoReserva"] = $codigoReserva;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="ext/css" href="../css/mostrar_codigo_reserva.css"/>
</head>
<body>
    <form class="centrar">
        <?php echo  "Su codigo de reserva es: " . $_SESSION["codigoReserva"]; ?>
        </br>
        <a href="datos_vuelo.php" name="finalizar" onclick="<?php session_destroy(); ?>"/>Finalizar tramite</a>
    </form>
</body>
</html>
    
    
    


