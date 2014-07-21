<?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>
<header>
    
    <!-- Logo -->
    <img alt="Sky Net Sistema de Reservas Online de Pasajes Aéreos" src="<?php echo "$statics_path"; ?>/images/header/logo.PNG" /> 
    <img class="volando" alt="Volamos al mejor precio siempre" src="<?php echo "$statics_path"; ?>/images/header/volando.PNG" />

    <!-- Principal navigation bar -->
    <nav>
        <li><a href="<?php echo "$statics_path"; ?>/sections/home.php" data-section="home" title="Home">Home</a></li>
        <li><a href="<?php echo "$statics_path"; ?>/sections/destinos.php" data-section="destinos" title="Destinos">Destinos</a></li>

        <!-- Estos links son para probar [quitar luego] -->
        <li><a href="<?php echo $statics_path; ?>/components/codeQR.php" data-component="codeQR" title="imprimir codigo QR">Código QR</a></li>
        <li><a href="<?php echo $statics_path; ?>/components/datos_vuelo.php" data-component="checkIn" title="Datos Vuelo">Datos vuelo</a></li>
        <li><a href="<?php echo $statics_path; ?>/components/datos_pasajero.php" data-component="checkIn" title="Datos Pasajero">Datos pasajero</a></li>
        <!--/ Estos links son para probar [quitar luego] -->
    </nav>

</header>