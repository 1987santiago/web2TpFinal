<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

        if ( !isset($_SESSION['admin_logged']) || !$_SESSION['admin_logged']) {
        $_SESSION['error'] = 'Debe registrarse';
        header("Location: $statics_path/sections/home.php");
    }

    # ==========================================
    # TODO:
    # ==========================================
    # En base a una lista de vuelos, tabla "vuelo"
    # Selecciona un vuelo y obtiene -> numero_vuelo
    # Con el numero de vuelo, busca el avion -> vuelo.codigo_avion
    #
    # Con el codigo de avion puede obtener la hora de partida del vuelo -> reserva.fecha_partida
    # Si está entre las 24 y 2 horas anteriores a la partida comienza la baja de aquellas reservas impagas -> reserva.estado == 0 
    # Según la cantidad de reservas impagas que se den de baja -> reserva.estado = -2
    # Son las reservas en espera que se van a habilitar para ser pagadas -> WHERE (reserva.estado == -1) reserva.estado = 0 
    # De esa reserva que se habilita se obtiene el dni del pasajero -> reserva.dni
    # 
    # Con el dni se obtiene el mail del pasajero -> pasajero.email
    # con el mail se lo notifica del nuevo estado 
    # ==========================================


    // se incluye el inicio del html <!doctype html>...</head>
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main">
                                        
                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <section class="col" id="checkReservas">

                    <h2>Chequeo de reservas</h2>


                </section>

            </main>
        
        </div><!-- [END] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

    </body>

</html>
