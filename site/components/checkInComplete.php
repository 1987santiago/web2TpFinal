<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    require_once '../processors/ProccessData.php';
    
?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require "$base_path$statics_path/components/head.php"; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main id="main" role="main">

                <!-- se incluye el sidebar -->
                <?php include "$base_path$statics_path/components/navLateral.php"; ?>                 

                <section class="col">
                    
                    <h2>Checkin satisfactorio</h2>

                    <p>Has click <a href='<?php echo "$statics_path/components/printBoardingPass.php"; ?>' title='imprimir boarding pass'>aquí</a> para imprimir tu boleto.</p>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?> 

    </body>

</html>
