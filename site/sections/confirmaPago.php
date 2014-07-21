 <?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("dameReserva")
    ); 
    require $local_path . '/components/head.php'; 
?>

<div class="wrapper">

    <!-- se incluye el <header> -->
    <?php require $local_path . '/components/header.php'; ?> 

    <main role="main">

        <?php require $local_path . '/components/navLateral.php'; ?>
        
        <!-- se incluye el el resultado del pago de la reserva -->
        <div class="col left-col">
            <?php require $local_path . '/components/dameReserva.php'; ?> 
        </div>   

    </main>

    <!-- se incluye el <footer> -->
    <?php require $local_path . '/components/footer.php'; ?>

</div>  