 <?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("generic"),
        "css"  => array("navLateral"),
        "css"  => array("dameReserva")
    ); 
    require $local_path . '/components/head.php'; 
?>

    <body>
        <div>
        <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 
        </div>    
        <div class="links">
            <?php require $local_path . '/components/navLateral.php'; ?>
        </div>
         <div class="left">
        <!-- se incluye el el resultado del pago de la reserva -->
            <?php require $local_path . '/components/dameReserva.php'; ?> 
        </div>   


		<div >
			<!-- se incluye el <footer> -->
            <?php require $local_path . '/components/footer.php'; ?>
        </div> 
    </body>

</html>  