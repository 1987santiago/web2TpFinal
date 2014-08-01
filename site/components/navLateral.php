 <?php 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<div class="sidebar"><!-- ex: links -->
    <ul>
        <li><a href="<?php echo "$statics_path"; ?>/sections/pago.php" data-section="pago" title="Pago">Pago</a></li>
        <li><a href="<?php echo "$statics_path"; ?>/sections/checkin.php" data-section="checkin" title="Checkin">Checkin</a></li>
        
        <?php
            ## Esta opción se muestra sólo si es un admin logueado
            if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged']) {
                echo "<li><a href='$statics_path/sections/checkReservas.php' data-section='checkReservas' title='Chequear reservas'>Chequear reservas</a></li>";
            }
        ?>
        
    </ul>
</div>