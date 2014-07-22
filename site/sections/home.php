<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("formReservHome","offExclusiv", "pagoSinInt", "wowSlider", "engine1/style")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>
   
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main"><!-- ex: center -->

                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col left-col">
                    <?php require "$base_path$statics_path/components/formReservHome.php"; ?>
                </div>

                <!-- Se inlcuye el slider -->    
                <div class="col right-col">
                    <?php include "$base_path$statics_path/components/wowSlider.php"; ?>
                </div> 
			
            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <!-- Scripts necesarios para Wow Slider -->
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/wowslider.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/script.js"></script>
        <!-- [END] Scripts necesarios para Wow Slider -->

    </body>

</html>
