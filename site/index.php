<?php
    session_start();
    
    $PATHS = parse_ini_file("paths.ini");

    // guardamos la url de los recursos estaticos
    $base_path = $PATHS["base_path"];
    $statics_path = $PATHS["statics_path"];   
   
    // guardamos la url base del server
    $server_root = $PATHS["server_root"];
    
    $_SESSION["base_path"] = $base_path;
    $_SESSION["statics_path"] = $statics_path;
    $_SESSION["server_root"] = $server_root;
    
    header("Location: $server_root$statics_path/sections/home.php");
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