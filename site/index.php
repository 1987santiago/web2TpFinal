<?php
	session_start();

	$PATHS = parse_ini_file("paths.ini");

	// guardamos la url de los recursos estaticos
	$statics_path = $PATHS["statics_path"];
	// guardamos la ruta base
	$base_path = $PATHS["base_path"];

	$_SESSION["statics_path"] = $statics_path;
	$_SESSION["base_path"] = $base_path;

	header("Location: $statics_path/sections/home.php");

?>

<!-- se incluye el <head> -->
<?php require "$base_path$statics_path/components/head.php"; ?>
		
	<body>

	    <div class="wrapper">
    
		<!-- se incluye el <header> -->
		<?php require "$base_path$statics_path/components/header.php"; ?> 

			<main id="main" role="main"></main><!-- [end] main -->

		</div><!-- [end] wrapper -->

		<!-- se incluye el <header> -->
		<?php require "$base_path$statics_path/components/footer.php"; ?> 

	</body>

</html>