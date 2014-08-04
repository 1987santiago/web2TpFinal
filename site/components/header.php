<?php
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>
<header>
    
    <!-- Logo -->
    <img alt="Sky Net Sistema de Reservas Online de Pasajes Aereos" src="<?php echo "$statics_path"; ?>/images/header/logo.png" /> 
    <img class="isologotipo" alt="Volamos al mejor precio siempre" src="<?php echo "$statics_path"; ?>/images/header/volando.png" />

    <!-- Principal navigation bar -->
    <nav>
        <ul>
            <li><a href="<?php echo "$statics_path"; ?>/sections/home.php" data-section="home" title="Home">Home</a></li>
            <li><a href="<?php echo "$statics_path"; ?>/sections/destinos.php" data-section="destinos" title="Destinos">Destinos</a></li>
        
        <?php 
            if ( isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] ) {
                echo "<li><a href='$statics_path/sections/informes.php' data-component='informes' title='Informes'>Informes</a></li>";
            }
        ?>
        </ul>

    <?php 
        if ( isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] ) {
            echo "<a class='more-actions' href='$statics_path/processors/logOut.php' data-section='home' title='Cerrar Sesión'>Cerrar Sesión</a>";
        } else {
            echo "<a class='more-actions' href='$statics_path/sections/login.php' data-section='login' title='Ingresar'>Ingresar</a>";
        }
    ?>

    </nav>

</header>