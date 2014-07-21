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

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main role="main">
                
                <!-- se incluye la barra lateral de navegación -->
                <?php require $local_path . '/components/navLateral.php'; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col left-col">
                    <?php require $local_path . '/components/__guardarReserva.php'; ?>
                </div>

            </main>

            <!-- listado de ofertas -->
            <?php require $local_path . '/components/offExclusiv.php'; ?>

            <!-- listado de medios de pago sin interés -->
            <?php require $local_path . '/components/pagoSinInt.php'; ?>

        </div><!-- [END] wrapper -->

        <?php require $local_path . '/components/footer.php'; ?>

    </body>

</html>
