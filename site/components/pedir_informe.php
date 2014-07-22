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
        "js"  => array("datos_vuelo")
    ); 
    require $local_path . '/components/head.php';
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $statics_path . '/css/forms.css';?>"/>
        <script type="text/javascript" src="<?php echo $statics_path . '/js/pedir_informe.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery-1.10.2.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.core.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.datepicker.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $statics_path . '/js/jquery.ui.datepicker-es.js'; ?>"></script>
    </head>
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">
                <form method="post" action="<?php echo $http_path . '/components/mostrar_informe.php'?>" onsumbit="return validarFechas()" >
                    <fieldset>
                        <legend>Informes</legend>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            <label for="fechaInicial">Fecha inicial [dd/mm/aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaInicial" name="fechaInicial"/>
                        </div>
                        <div>
                            <label for="fechaFinal">Fecha final [dd/mm/aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaFinal" name="fechaFinal"/>
                        </div>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            <label for="tipoDeInforme">Pasajes vendidos</label>
                            <input type="radio" id="pasajesVendidos" name="tipoDeInforme" value="1" checked="checked"/>
                        </div>
                        <div>
                            <label for="tipoDeInforme">Cantidad de pasajes vendidos por categoria y destino</label>
                            <input type="radio" id="pasajesVendidosCategoriaDestino" name="tipoDeInforme" value="2"/>
                        </div>
                        <div>
                            <label for="tipoDeInforme">Ocupacion por avion y destino</label>
                            <input type="radio" id="ocupacionAvionDestino" name="tipoDeInforme" value="3"/>
                        </div>
                        <div>
                            <label for="tipoDeInforme">Cantidad de reservas caidas</label>
                            <input type="radio" id="reservasCaidas" name="tipoDeInforme" value="4"/>
                        </div>
                        <input type="submit" name="mostrarInforme" value="Mostrar informe"/>                     
                    </fieldset>
                </form>
           </main> <!--[end] main -->

        </div> <!--[end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $local_path . '/components/footer.php'; ?>
        <script>
            $(function() {
                $("#fechaInicial").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
            $(function() {
                $("#fechaFinal").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>
    </body>
</html>