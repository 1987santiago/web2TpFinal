<?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array("offExclusiv")
    // ); 
?>

<div class="sell">
	<h2>Ofertas exclusivas</h2>
	<img src="<?php echo "$statics_path"; ?>/images/off/sanmiguel.jpg" alt="San Miguel de Tucumán" title="San Miguel de Tucumán" />
	<img src="<?php echo "$statics_path"; ?>/images/off/cataratas.jpg" alt="Cataratas del Iguazú" title="Cataratas del Iguazú" />
	<img src="<?php echo "$statics_path"; ?>/images/off/cordobacapital.jpg" alt="Córdoba" title="Córdoba" />
	<img src="<?php echo "$statics_path"; ?>/images/off/sanrafaelmendoza.jpg" alt="San Rafael" title="San Rafael" />
	<img src="<?php echo "$statics_path"; ?>/images/off/tilcarajujuy.jpg" alt="Tilcara" title="Tilcara" />
</div>