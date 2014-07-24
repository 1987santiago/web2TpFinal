<footer>
    <dl>
        <dt>Sobre Skynet<dt>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/nosortros.php" data-section="nosotros" title="Nosotros">Nosotros</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/prensa.php" data-section="prensa" title="Prensa">Prensa</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/trabajo.php" data-section="trabajo" title="Trabajo">Trabaje en Skynet</a></dd>
    </dl>

    <dl>
        <dt>Información<dt>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/destinos.php" data-section="destinos" title="Servicios">Destinos</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/condiciones.php" data-section="condiciones" title="Condiciones">Condiciones de transporte</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/documentos.php" data-section="documentos" title="Documentos">Documentos importantes</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/equipaje.php" data-section="equipaje" title="Equipaje">Equipaje</a></dd>
    </dl>

    <dl>
        <dt>Servicios adicionales<dt>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/parqueo.php" data-section="parqueo" title="Parqueo">Parqueo</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/taxis.php" data-section="taxis" title="Taxis">Taxis</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/alquiler.php" data-section="alquiler" title="Alquiler de vehículos">Alquiler de vehículos</a></dd>
    </dl>

    <dl>
        <dt>Legales<dt>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/destinos.php" data-section="destinos" title="Destinos">Términos de uso</a></dd>
        <dd><a href="<?php echo "$statics_path"; ?>/sections/politica.php" data-section="política" title="Politica">Política de privacidad</a></dd>
    </dl>

	<div class="datafiscal">
		<img  src="<?php echo "$statics_path"; ?>/images/footer/premio.png">
		<img  src="<?php echo "$statics_path"; ?>/images/footer/best.png">
		<img  src="<?php echo "$statics_path"; ?>/images/footer/datafiscal.jpg">
	</div>	
</footer>


<!-- JS 
<script type="text/javascript" src="<?php echo $statics_path; ?>/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?php echo $statics_path; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>-->
<script type="text/javascript" src="<?php echo $statics_path; ?>/js/core.js"></script>
<script type="text/javascript" src="<?php echo $statics_path; ?>/js/request.js"></script>

<?php 

    function getJsResourcesOnload($files) {

        foreach ($files as $index => $name) {
            $statics_path = $_SESSION["statics_path"];
            echo "<script type='text/javascript' src='$statics_path/js/$name.js'></script>";
        }

    }

    // Si se envían datos de los recursos que se necesitan cargar especialmente para 
    // un componente o sección, 
    if (isset($_SESSION["onloadResources"])) {
        // obtenemos dichos recursos
        $_resources = $_SESSION["onloadResources"];
        // los iteramos e imprimimos para descargarlos
        foreach ($_resources as $key => $value) {
            if ($key == "js") {
                getJsResourcesOnload($value);
            }
        }

    }

    // Limpiamos el contenido de resources para evitar que se llamen los mismo archivos varias veces
    $_SESSION["onloadResources"] = null;
?>

