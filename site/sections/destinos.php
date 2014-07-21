<?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("destinos")
    ); 
    require $local_path . '/components/head.php'; 
?>

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <section>
                <article> 
                    <strong>Argentina</strong> es un país ubicado en la costa este de Sudamérica, frente al Océano Atlántico. Su capital es Buenos Aires y se encuentra dividido en 23 provincias, que a su vez albergan  interesantes lugares turísticos como: Buenos Aires,  Córdoba,  Bariloche y Mendoza. 
                    Si estás pensando en viajar por Sudamérica, compra tus pasajes a Argentina en LAN.com y viaja a conocer maravillosos lugares turísticos situados en medio de la Pampa, los valles, el desierto y la Patagonia argentina
                </article>
            </section>
            <section class="destino">
                <h3>Conoce nuestros destinos y descubre su maravilloso paisaje y cultura</h3>
                <img src="<?php echo "$statics_path"; ?>/images/destinos/fondoargentina1.png">
            </section>  

        </div><!-- [END] wrapper -->
 
        <!-- se incluye el footer -->
        <?php require $local_path . '/components/footer.php'; ?>

    </body>
