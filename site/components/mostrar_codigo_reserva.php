<?php
    session_start();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
</head>
<body>
    <form class="centrar">
        <?php 
            if (isset($_SESSION["codigoReservaIda"])) 
            {
                echo "Su codigo de reserva de ida es: " . $_SESSION["codigoReservaIda"];
                echo "</br>";
            }
            if (isset($_SESSION["codigoReservaRegreso"])) 
            {
                echo "Su codigo de reserva de regreso es: " . $_SESSION["codigoReservaRegreso"];
                echo "</br>";
            }
            session_destroy(); 
        ?>
        <a href="datos_vuelo.php" name="finalizar">Finalizar tramite</a>
    </form>
</body>
</html>
    
    
    


