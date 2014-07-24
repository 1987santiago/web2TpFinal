<?php
    session_start();
    $base_path = $_SESSION["base_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    $estaEnEspera = (isset($_GET["estaEnEspera"])? $_GET["estaEnEspera"] : '' );
    $_SESSION["estaEnEspera"] = $estaEnEspera;

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array()
    // ); 
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main id="main" role="main" class="contenedor-formulario-favorito">

                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye la notificación del estado de la reserva -->
                <div class="col">

                    <div>
                        <?php 
                            if (isset($_SESSION["codigoReservaIda"])) {
                                echo "<p>Su codigo de reserva de ida es: " . $_SESSION["codigoReservaIda"] . "</p>";
                            }
                            if (isset($_SESSION["codigoReservaRegreso"])) {
                                echo "<p>Su codigo de reserva de regreso es: " . $_SESSION["codigoReservaRegreso"] . "</p>";
                            }
                            // session_destroy(); 
                        ?>
                        <a href="<?php echo $statics_path; session_destroy(); ?>/" name="finalizar">Finalizar tramite</a>
                    </div>


                </div><!-- [END] col -->

            </main><!-- [END] main -->

        </div><!-- [END] wrapper -->

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
            <script type="text/javascript" src="js/components/seatSelection.js"></script> 
        -->
        
        <script>
            $(function() {
                $("#fechaNac").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>

    </body>

</html>

    
    


