<?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("generic"),
        "css"  => array("navLateral"),
        "css"  => array("formReservHome"),
        "css"  => array("offExclusiv"),
        "css"  => array("pagoSinInt"),
        "css"  => array("wowSlider"),
        "css"  => array("/wow/engine1/style")
    ); 
    require $local_path . '/components/head.php'; 
?>
   
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <div class="central">

                <!-- se incluye la barra lateral de navegación -->
                <div class="links">
                    <?php require $local_path . '/components/navLateral.php'; ?>
                </div>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="left">
                    <?php require $local_path . '/components/formReservHome.php'; ?>
                </div>

                <!-- Se inlcuye el slider -->    
                <div class="right">
                    <?php include $local_path . '/components/wowSlider.php'; ?>
                </div> 
			
            </div>

            <?php include $local_path . '/components/offExclusiv.php'; ?>
     
            <?php require $local_path . '/components/pagoSinInt.php'; ?>

        </div><!-- [END] wrapper -->

        <?php require $local_path . '/components/footer.php'; ?>

        <!-- Scripts necesarios para Wow Slider -->
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/wowslider.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/script.js"></script>
        <!-- [END] Scripts necesarios para Wow Slider -->

    </body>

</html>
