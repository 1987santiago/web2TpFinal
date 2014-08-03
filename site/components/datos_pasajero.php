<?php
    session_start();
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    // Si existen errores se guardan e informan
    $hasError = false;

    if (isset($_SESSION['error'])) {
        $hasError = true;
        $errorMsg = $_SESSION['error'];
    }
    
    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("datosVuelo", "offExclusiv", "pagoSinInt", "forms"),
        "js" => array("datos_pasajero")
    ); 
    
    require "$base_path$statics_path/components/head.php";
?>
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main"><!-- ex: center -->

                <!-- se incluye la barra lateral de navegacion -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col left-col">
                    <?php
                        // Si hay un erro lo imprimimos en la pagina
                        if ($hasError) { 
                            echo "<div class='box box-error'>$errorMsg</div>";
                            // Una vez mostrado el error, reseteamos la variable
                            $_SESSION['error'] = null;
                        }
                    ?>
                    <form class="data-form" action="<?php echo "$server_root$statics_path"; ?>/components/guardar_pasajero_reserva.php" method="post" onsubmit="return validarDatosPasajero()">
                        <legend>Datos del pasajero</legend>
                        <fieldset>
                            
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
                                $anterior = "$server_root$statics_path/components/listado_vuelos_ida.php";
                                echo "<a href=$anterior name='anterior'>Anterior</a>";
                            }
                            else {
                                $anterior = "$server_root$statics_path/components/listado_vuelos_ida_regreso.php";
                                echo "<a href=$anterior name='anterior'>Anterior</a>";
                            }    
                        ?> 
                        <input type="submit" name="siguiente" value="Siguiente"/>

                    </form> 
                </div>
			
            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>    
        
        <script type="text/javascript">
           $(function() {
            $("#fechaNac").datepicker({
            showOn: "button",
            buttonImage: "../images/calendar.gif",
            buttonImageOnly: true,
            firstDay: 0
            });
        </script>
    </body>
