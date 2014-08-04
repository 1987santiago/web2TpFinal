<?php
    session_start();
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
                        // Si hay un error lo imprimimos en la pagina
                        if ($hasError) { 
                            echo "<div class='box box-error'>$errorMsg</div>";
                            // Una vez mostrado el error, reseteamos la variable
                            $_SESSION['error'] = null;
                        }
                    ?>
                    <form>
                       <?php 
                           if (isset($_SESSION["codigoReservaIda"])) 
                           {
                               echo "Su codigo de reserva de ida es: " . $_SESSION["codigoReservaIda"];
                               echo "</br>";
                           }
                           if (isset($_SESSION["codigoReservaRegreso"])) 
                           {
                               echo "Su codigo de reserva de regreso es: " . $_SESSION["codigoReservaRegreso"];
                               echo "</br>";
                           }
                       ?>
                       <a href="<?php echo "$server_root$statics_path"; ?>/sections/home.php" name="finalizar">Finalizar tramite</a>
                   </form>
                
                </div>

            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>    
    </body>    
