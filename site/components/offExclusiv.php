<?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<section class="sell">

	<h2>Ofertas exclusivas</h2>
    
    <ul>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/off/cataratas.jpg" alt="Cataratas del Iguazú" title="Cataratas del Iguazú" />
        </li>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/off/cordobacapital.jpg" alt="Córdoba" title="Córdoba" />
        </li>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/off/sanrafaelmendoza.jpg" alt="San Rafael" title="San Rafael" />
        </li>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/off/tilcarajujuy.jpg" alt="Tilcara" title="Tilcara" />
        </li>
        <li>
            <img src="<?php echo "$statics_path"; ?>/images/off/sanmiguel.jpg" alt="San Miguel de Tucumán" title="San Miguel de Tucumán" />
        </li>
    </ul>

</section>