<?php
    session_start();
    
    $PATHS = parse_ini_file("paths.ini");

    // guardamos la nueva ruta base del site
    $base_path = $PATHS["base_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $PATHS["statics_path"];
    // guardamos la ruta base
    $http_path = $PATHS["http_path"];

	$server_root = $PATHS["server_root"];
	// guardamos la url de los recursos estaticos
	

	$_SESSION["server_root"] = $server_root;
	$_SESSION["statics_path"] = $statics_path;
	$_SESSION["base_path"] = $base_path;

    $_SESSION["http_path"] = $http_path;

    header("Location: $statics_path/sections/home.php");
?>

<!-- se incluye el <head> -->
<?php require "$base_path$statics_path/components/head.php"; ?>
		
    <body>

	    <div class="wrapper">
    
		<!-- se incluye el <header> -->
		<?php require "$base_path$statics_path/components/header.php"; ?> 

          

         

		<!-- se incluye el <header> -->
		<?php require "$base_path$statics_path/components/footer.php"; ?> 

	</body>
</html>