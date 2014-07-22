 <?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("dameReserva")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

<div class="wrapper">

    <!-- se incluye el <header> -->
    <?php require "$base_path$statics_path/components/header.php"; ?> 

    <main role="main">

        <?php require "$base_path$statics_path/components/navLateral.php"; ?>
        
        <!-- se incluye el el resultado del pago de la reserva -->
        <div class="col left-col">
            <?php require "$base_path$statics_path/components/dameReserva.php"; ?> 
        </div>   

    </main>

</div>  

<!-- se incluye el <footer> -->
<?php require "$base_path$statics_path/components/footer.php"; ?>