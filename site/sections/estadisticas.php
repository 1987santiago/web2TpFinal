<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];
    
    // Si existen errores se guardan e informan
    $hasError = false;
    
    if ( !isset($_SESSION['admin_logged']) || !$_SESSION['admin_logged']) {
        $_SESSION['error'] = 'Debe registrarse';
        header("Location: $statics_path/sections/home.php");
    }

    if (isset($_SESSION['error'])) {
        $hasError = true;
        $errorMsg = $_SESSION['error'];
    }

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("engine1/style")
    ); 
    require_once "$base_path$statics_path/components/head.php"; 
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
                    <?php
                        // Si hay un erro lo imprimimos en la página
                        if ($hasError) { 
                            echo "<div class='box box-error'>$errorMsg</div>";
                            // Una vez mostrado el error, reseteamos la variable
                            // $_SESSION['error'] = null;
                        }
                    ?>
                    <?php require "$base_path$statics_path/components/datos_vuelo.php"; ?>
                </div>
            
            </main>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <!-- Scripts necesarios para Wow Slider -->
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/wowslider.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/script.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/js/datos_vuelo.js"></script>
        <!-- [END] Scripts necesarios para Wow Slider -->

    </body>

</html>
