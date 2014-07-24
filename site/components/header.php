<?php
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>
<header>
    
    <!-- Logo -->
    <img alt="Sky Net Sistema de Reservas Online de Pasajes Aéreos" src="<?php echo "$statics_path"; ?>/images/header/logo.png" /> 
    <img class="isologotipo" alt="Volamos al mejor precio siempre" src="<?php echo "$statics_path"; ?>/images/header/volando.png" />

    <!-- Principal navigation bar -->
    <nav>
        <li><a href="<?php echo "$statics_path"; ?>/sections/home.php" data-section="home" title="Home">Home</a></li>
        <li><a href="<?php echo "$statics_path"; ?>/sections/destinos.php" data-section="destinos" title="Destinos">Destinos</a></li>
    </nav>

</header>