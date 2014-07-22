<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    require "$base_path$statics_path/components/codeQR.php";
    require "$base_path$statics_path/components/dompdf.php";

?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require "$base_path$statics_path/components/head.php"; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main id="main" role="main">

                <section>
                    
                    <h2>Check In</h2>

                    <p>###ACA VA EL BOARDING PASS IMPRIMIBLE###</p>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?> 

    </body>

</html>
