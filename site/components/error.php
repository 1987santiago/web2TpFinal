<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
     // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    
    $estaEnEspera = (isset($_GET["estaEnEspera"])? $_GET["estaEnEspera"] : '' );
    $_SESSION["estaEnEspera"] = $estaEnEspera;

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js"  => array("datos_pasajero")
    ); 
    require $local_path . '/components/head.php';
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $statics_path . '/css/forms.css' ;?>"/>
    </head>
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">
                <form>
                    <?php echo $mensaje;?>
                    </br>
                    <a href="<?php echo $anterior;?>" name="anterior"/>Anterior</a>
                </form>
            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $local_path . '/components/footer.php'; ?>     
    </body>
</html> 