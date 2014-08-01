<?php 
    session_start();

    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];
    
    // Si existen errores se guardan e informan
    $hasError = false;

    if (isset($_SESSION['error'])) {
        $hasError = true;
        $errorMsg = $_SESSION['error'];
    }

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array('wowSlider', 'engine1/style')
    // ); 
    require "$base_path$statics_path/components/head.php"; 
?>
   
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main"><!-- ex: center -->

                <form class="data-form login" action="<?php echo "$statics_path/sections/home.php" ?>" method="post">

                    <div>
                        <label for="adminName">Usuario: </label>
                        <input id="adminName" name="adminName" type="text" />
                    </div>
                    <div>
                        <label for="adminPass">Contraseña: </label>
                        <input id="adminPass" type="password" />
                    </div>
                    <input value="Ingresar" type="submit" />

                </form>
                    
            </main>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>

    </body>

</html>
