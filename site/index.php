<?php
	// guardamos la nueva ruta base del site
	$SITE_PATH = "/Applications/XAMPP/htdocs/unlam/web2/tpFinal/web2TpFinal/site";
	// guardamos la url de los recursos estaticos
	$static_url = "/unlam/web2/tpFinal/web2TpFinal/site";
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie6" lang="en"> <![endif]-->
<!--[if IE 7]>	<html class="no-js  lt-ie10 lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>	<html class="no-js lt-ie10 lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]>	<html class="no-js lt-ie10 ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->

	<!-- se incluye el <head> -->
	<?php require $SITE_PATH . '/components/head.php'; ?>
	
	<body>

	    <div class="wrapper">
    
		<!-- se incluye el <header> -->
		<?php require $SITE_PATH . '/components/header.php'; ?> 

			<main id="main" role="main"></main><!-- [end] main -->

		</div><!-- [end] wrapper -->

		<!-- se incluye el <header> -->
		<?php require $SITE_PATH . '/components/footer.php'; ?> 

	</body>

</html>