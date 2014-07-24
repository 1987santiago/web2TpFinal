<?php
    session_start();
    
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];
    
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
                    <?php echo $mensaje;?>
                    </br>
                    <a href="<?php echo $anterior;?>" name="anterior"/>Anterior</a>
                </form>
            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $base_path . $statics_path . '/components/footer.php'; ?>  
    </body>

