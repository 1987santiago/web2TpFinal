<?php 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<section class="sell">

	<h2>Ofertas exclusivas</h2>
    
    <div class="slider">
        <ul>
            <li><img src="<?php echo "$statics_path"; ?>/images/off/cataratas.jpg" alt="Cataratas del Iguazu" title="Cataratas del Iguazu"></li>
            <li><img src="<?php echo "$statics_path"; ?>/images/off/cordobacapital.jpg" alt="Cordoba" title="Cordoba" ></li>
            <li><img src="<?php echo "$statics_path"; ?>/images/off/sanrafaelmendoza.jpg" alt="San Rafael" title="San Rafael" ></li>
            <li><img src="<?php echo "$statics_path"; ?>/images/off/tilcarajujuy.jpg" alt="Tilcara" title="Tilcara" ></li>
            <li><img src="<?php echo "$statics_path"; ?>/images/off/sanmiguel.jpg" alt="San Miguel de Tucuman" title="San Miguel de Tucuman"></li>
        </ul>
    </div>

</section>