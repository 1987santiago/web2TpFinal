<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("destinos")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

<body>

    <div class="wrapper">

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/header.php"; ?> 

        <section>
            <article> 
                <strong>Argentina</strong> es un pais ubicado en la costa este de Sudamerica, frente al Oceano Atlantico. Su capital es Buenos Aires y se encuentra dividido en 23 provincias, que a su vez albergan  interesantes lugares turisticos como: Buenos Aires,  Cordoba,  Bariloche y Mendoza. 
                Si estas pensando en viajar por Sudamerica, compra tus pasajes a Argentina en LAN.com y viaja a conocer maravillosos lugares turisticos situados en medio de la Pampa, los valles, el desierto y la Patagonia argentina
            </article>
        </section>
        
        <section class="destino">
            <h3>Conoce nuestros destinos y descubre su maravilloso paisaje y cultura</h3>
            <img src="<?php echo "$statics_path"; ?>/images/destinos/fondoargentina1.png">
        </section>  

    </div><!-- [END] wrapper -->

    <!-- se incluye el footer -->
    <?php require "$base_path$statics_path/components/footer.php"; ?>

</body>