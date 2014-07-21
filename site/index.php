
<?php
	session_start();
	$PATHS = parse_ini_file("paths.ini");

	// guardamos la nueva ruta base del site
	$local_path = $PATHS["local_path"];
	// guardamos la url de los recursos estaticos
	$statics_path = $PATHS["statics_path"];
        // guardamos la ruta para ejecutar los php
        $http_path = $PATHS["http_path"];

	$_SESSION["local_path"] = $local_path;
	$_SESSION["statics_path"] = $statics_path;
        $_SESSION["http_path"] = $http_path;      
?>

<!-- se incluye el <head> -->
<?php require $local_path . '/components/head.php'; ?>
		
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main"></main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $local_path . '/components/footer.php'; ?>     
    </body>

</html>