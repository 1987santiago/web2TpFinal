<?php
	//recuperamos la ruta que tiene almacenada por defecto y la guardamos.
	$old_path = get_include_path();
	// guardamos la nueva ruta base del site
	$SITE_PATH = "/Applications/XAMPP/htdocs/unlam/web2/tpFinal/web2TpFinal/site";
	// guardamos la url de los recursos estaticos
	$static_url = "/unlam/web2/tpFinal/web2TpFinal/site";
?>

<!doctype html>
<html>

	<!-- se incluye el <head> -->
	<?php require $SITE_PATH . '/components/head.php'; ?>
	
	<body>

	    <div class="wrapper">
    
		<!-- se incluye el <header> -->
		<?php require $SITE_PATH . '/components/header.php'; ?> 

			<main role="main"></main><!-- [end] main -->

		</div><!-- [end] wrapper -->

		<!-- se incluye el <header> -->
		<?php require $SITE_PATH . '/components/footer.php'; ?> 

	</body>

</html>