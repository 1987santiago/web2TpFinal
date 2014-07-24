<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    $_SESSION["resources"] = array(
        "css"  => array("forms")
    ); 
?>

    <?php require "$base_path$statics_path/components/head.php"; ?>
    
    <body>
        <div class="wrapper">
            <!-- se incluye el <header> -->
            <?php require $base_path . $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main">
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
                    <a href="<?php echo $http_path . '/components/datos_vuelo.php';?>" name="finalizar">Finalizar tramite</a>
                </form>
            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $base_path . $statics_path . '/components/footer.php'; ?>      
    </body>


