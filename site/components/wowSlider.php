<?php 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<div class="images-slider"> <!-- ex: right -->
	
	<!-- Start WOWSlider id=wowslider-container1 -->
	<h2>Conozca Argentina</h2>
	<div id="wowslider-container1">
		
		<div class="ws_images">
			<ul>
				<li><img src="<?php echo "$statics_path"; ?>/wow/data1/images/Valle Lunar- San Juan.jpg" alt="Valle Lunar " title="Valle Lunar " id="wows1_0"/>Dentro del Parque provincial de Ischigualasto, o Valle de la Luna, al norte de la provincia de San Juan, nos sumergimos en un escenario propio de un paisaje surrealista.</li>
				<li><img src="<?php echo "$statics_path"; ?>/wow/data1/images/peninsulavaldes.jpg" alt="Península de Valdés" title="Península de Valdés" id="wows1_1"/>Península Valdés: un reservorio de vida silvestre único en el mundo. Pocos lugares en el mundo ofrecen la posibilidad de observar en su ámbito natural tanta cantidad de animales.</li>
				<li><img src="<?php echo "$statics_path"; ?>/wow/data1/images/puente_del_incamendoza.jpg" alt="Puente del Inca " title="Puente del Inca " id="wows1_2"/>El que busque aventura, es claro que en estas tierras la encontrará seguro. Pero también, es un recorrido con mucha historia.</li>
				<li><img src="<?php echo "$statics_path"; ?>/wow/data1/images/jujuy.jpg" alt="Jujuy" title="Jujuy" id="wows1_3"/>En el límite de las provincias de Salta y Jujuy, se encuentra Salinas Grandes, a una altitud de 3.450 msnm, otro de los depósitos de sal más grandes del planeta y un paisaje difícil de catalogar.</li>
				<li><img src="<?php echo "$statics_path"; ?>/wow/data1/images/payuniamendoza.jpg" alt="Payunia" title="Payunia" id="wows1_4"/>Conos volcánicos y un extenso escorial de lava de diversos colores conforman un paisaje sorprendente al visitar la Reserva Provincial La Payunia. Descúbrala ...</li>
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
				<a href="#" title="Valle Lunar "><img src="<?php echo "$statics_path"; ?>/wow/data1/tooltips/valle_lunar_san_juan.jpg" alt="Valle Lunar "/>1</a>
				<a href="#" title="Península de Valdés"><img src="<?php echo "$statics_path"; ?>/wow/data1/tooltips/peninsulavaldes.jpg" alt="Península de Valdés"/>2</a>
				<a href="#" title="Puente del Inca "><img src="<?php echo "$statics_path"; ?>/wow/data1/tooltips/puente_del_incamendoza.jpg" alt="Puente del Inca "/>3</a>
				<a href="#" title="Jujuy"><img src="<?php echo "$statics_path"; ?>/wow/data1/tooltips/jujuy.jpg" alt="Jujuy"/>4</a>
				<a href="#" title="Payunia"><img src="<?php echo "$statics_path"; ?>/wow/data1/tooltips/payuniamendoza.jpg" alt="Payunia"/>5</a>
			</div>
		</div>
		<div class="ws_shadow"></div>
	
	</div>
	<!-- End WOWSlider  -->

</div>