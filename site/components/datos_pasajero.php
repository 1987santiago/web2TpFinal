<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
     // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    
    $estaEnEspera = (isset($_GET["estaEnEspera"])? $_GET["estaEnEspera"] : '' );
    $_SESSION["estaEnEspera"] = $estaEnEspera;

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("forms", "estilos", "datos_pasajero")
    ); 
    require $statics_path . '/components/head.php'; 
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $statics_path . '/css/forms.css' ;?>"/>
    <script type="text/javascript" src="<?php echo $statics_path . '/js/datos_pasajero.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery-1.10.2.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.core.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.datepicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.datepicker-es.js'; ?>"></script>
<body>
        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main" class="contenedor-formulario-favorito">

                <form action="<?php echo $http_path . '/components/guardar_pasajero_reserva.php'; ?>" method="post" onsubmit="return validarDatosPasajero()">
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
                        <?php 
                            $tipoDeViaje=$_SESSION["tipoDeViaje"];
                            if ($tipoDeViaje == 1) 
                                { 
                                    $anterior = $http_path . "/components/listado_vuelos_ida.php";
                                    echo "<a href=$anterior name='anterior'>Anterior</a>";
                                }
                            else
                                {
                                    $anterior = $http_path . "/components/listado_vuelos_ida_regreso.php";
                                    echo "<a href=$anterior name='anterior'>Anterior</a>";
                                }    
                    	?> 
                    	<input type="submit" name="siguiente" value="Siguiente"/>
                    </fieldset>
			
                </form>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?>

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

    </body>
</html>