<?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array("pagoSinInt")
    // ); 
?>

<div class="pago">
	<h2>Paga en cuotas sin interes</h2>
	<img src="<?php echo "$statics_path"; ?>/images/pagos/americanexpress.png">
	<img src="<?php echo "$statics_path"; ?>/images/pagos/visa.png">
	<img src="<?php echo "$statics_path"; ?>/images/pagos/mastercard.png">
	<img src="<?php echo "$statics_path"; ?>/images/pagos/guarantee.png">
</div>	