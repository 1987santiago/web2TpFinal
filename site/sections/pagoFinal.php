 <?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("generic")
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
                    <?php require $local_path . '/components/guardarReserva.php'; ?>
                </div>

            </div>

            <div >
                <?php require $local_path . '/components/offExclusiv.php'; ?>
            </div> 

            <div >
                <?php require $local_path . '/components/pagoSinInt.php'; ?>
            </div> 

        </div><!-- [END] wrapper -->

        <?php require $local_path . '/components/footer.php'; ?>

    </body>

</html>
