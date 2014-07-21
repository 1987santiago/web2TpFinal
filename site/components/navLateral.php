 <?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<div class="sidebar"><!-- ex: links -->

	<li><a href="<?php echo "$statics_path"; ?>/sections/reservas.php" data-section="reservas" title="Reservas">Reservas</a></li>
	<li><a href="<?php echo "$statics_path"; ?>/sections/pago.php" data-section="pago" title="Pago">Pago</a></li>
	<li><a href="<?php echo "$statics_path"; ?>/sections/checkin.php" data-section="checkin" title="Checkin">Checkin</a></li>

</div>