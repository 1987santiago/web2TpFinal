<?php
	session_start();
    $base_path = $_SESSION["base_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    $estaEnEspera = (isset($_GET["estaEnEspera"])? $_GET["estaEnEspera"] : '' );
    $_SESSION["estaEnEspera"] = $estaEnEspera;

    // se incluye el inicio del html <!doctype html>...</head>
    // $_SESSION["resources"] = array(
    //     "css"  => array()
    // ); 
    require "$base_path$statics_path/components/head.php"; 
?>

    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main id="main" role="main" class="contenedor-formulario-favorito">

                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de ingreso de datos del pasajero -->
                <div class="col">

                    <form class="data-form" action="guardar_pasajero_reserva.php" method="post" onsubmit="return validarDatosPasajero()">
                        <fieldset>
                            <legend>Datos del pasajero</legend>
                            <div>
                                <label for="dni">DNI</label>
                                <input type="text" id="dni" name="dni" value="<?php if (isset($_SESSION['dni'])){ echo $_SESSION['dni']; } ?>"/>
                            </div>
                            <div>
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" value="<?php if (isset($_SESSION['apellido'])){ echo $_SESSION['apellido']; } ?>"/>
                            </div>
                            <div>
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" value="<?php if (isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; } ?>"/>
                            </div>
                            <div>
                                <label for="fechaNac">Fecha de nacimiento [dd/mm/aaaa]</label>
                                <input type="text" id="fechaNac" name="fechaNac" value="<?php if (isset($_SESSION['fechaNac'])){ echo $_SESSION['fechaNac']; } ?>"/>
                            </div>
                            <div>
                                <label for="telefono">Telefono</label>
                                <input type="text" id="telefono" name="telefono" value="<?php if (isset($_SESSION['telefono'])){ echo $_SESSION['telefono']; } ?>"/>
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>"/>
                            </div>
                            <div>
                                <label for="nacionalidad">Nacionalidad</label>
                                <input type="text" id="nacionalidad" name="nacionalidad" value="<?php if (isset($_SESSION['nacionalidad'])){ echo $_SESSION['nacionalidad']; } ?>"/>
                            </div>
                        </fieldset>

                        <?php 
                            $tipoDeViaje=$_SESSION["tipoDeViaje"];
                            if ($tipoDeViaje == 1) { 
                                echo "<a href='listado_vuelos_ida.php' name='anterior'>Anterior</a>";
                            } else {
                                echo "<a href='listado_vuelos_ida_regreso.php' name='anterior'>Anterior</a>";
                            }    
                    	?> 
                        <input type="submit" name="siguiente" value="Siguiente"/>

                    </form>

                </div><!-- [END] col -->

            </main><!-- [END] main -->

        </div><!-- [END] wrapper -->

        <!-- se incluye el <header> -->
        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
            <script type="text/javascript" src="js/components/seatSelection.js"></script> 
        -->
        
        <script>
            $(function() {
                $("#fechaNac").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>

    </body>

</html>