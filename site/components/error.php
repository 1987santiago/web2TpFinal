<?php   
    session_start();
 
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];

    echo "<form>";
    echo    $mensaje;
    echo    "</br>";
    echo    "<a href='$anterior' name='anterior'/>Anterior</a>";
    echo "</form>";
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    // Si existen errores se guardan e informan
    $hasError = false;

    if (isset($_SESSION['error'])) {
        $hasError = true;
        $errorMsg = $_SESSION['error'];
    }
    
    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("datosVuelo", "offExclusiv", "pagoSinInt", "forms")
    );
    
    require "$base_path$statics_path/components/head.php";
?>
    
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main"><!-- ex: center -->

                <!-- se incluye la barra lateral de navegacion -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col left-col">
                    <?php
                        // Si hay un erro lo imprimimos en la página
                        if ($hasError) { 
                            echo "<div class='box box-error'>$errorMsg</div>";
                            // Una vez mostrado el error, reseteamos la variable
                            $_SESSION['error'] = null;
                        }
                    ?>
                    <form>
                        <?php echo $mensaje;?>
                        <a href="<?php echo $anterior;?>" name="anterior"/>Anterior</a>
                    </form>
                </div>

            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>    
        
    </body>    


