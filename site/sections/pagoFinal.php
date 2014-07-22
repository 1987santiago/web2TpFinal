 <?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("generic")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main">
                
                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col left-col">
                    <?php require "$base_path$statics_path/components/__guardarReserva.php"; ?>
                </div>

            </main>

            <!-- listado de ofertas -->
            <?php require "$base_path$statics_path/components/offExclusiv.php"; ?>

            <!-- listado de medios de pago sin interés -->
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>

    </body>

</html>
