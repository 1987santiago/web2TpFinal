<?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<section class="pago">

	<h2>Paga en cuotas sin interes</h2>
    
    <ul>
        <li>
        	<img src="<?php echo "$statics_path"; ?>/images/pagos/americanexpress.png">
        </li>
        <li>
        	<img src="<?php echo "$statics_path"; ?>/images/pagos/visa.png">
        </li>
        <li>
        	<img src="<?php echo "$statics_path"; ?>/images/pagos/mastercard.png">
        </li>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/pagos/guarantee.png">
        </li>
    </ul>

</section>

