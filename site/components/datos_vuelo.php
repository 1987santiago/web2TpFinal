<?php 
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    
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
        <link rel="stylesheet" type="text/css" href="../css/datos_vuelo.css"/>
        <link rel="stylesheet" href="../css/jquery-ui.css"/>
        <script type="text/javascript" src="../js/datos_vuelo.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
    </head>
    <body>
        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <form id="frmVuelo" method="post" action="buscar_vuelo.php" onsubmit="return validarDatosVuelo()" class="centrar">

                    <fieldset>
                        <legend>Consultar vuelo</legend>
                        <div>
                            <label for="ciudadOrigen">Ciudad origen</label>
                            <select id="ciudadOrigen" name="ciudadOrigen" required="required">
                                <?php
                                    require_once 'database.php';
                                    $skynet = new Database();
                                    $conexionOk = $skynet->connect();
                                    if ($conexionOk) 
                                    {
                                        $query = "SELECT distinct origen FROM vuelo ORDER BY origen";
                                        $ciudades = $skynet->executeSelect($query);
                                        foreach ($ciudades as $ciudad) 
                                        {
                                            $ciudadActual = $ciudad["origen"];
                                            echo "<option value='$ciudadActual'>$ciudadActual</option>";
                                        }
                                        $skynet->disconnect();
                                    }
                                ?>
                            </select> 
                        </div>
                        <div>
                            <label for="ciudadDestino">Ciudad destino</label>
                            <select id="ciudadDestino" name="ciudadDestino" required="required">
                        	<?php
                                    require_once 'database.php';
                                    $skynet = new Database();
                                    $conexionOk = $skynet->connect();
                                    if ($conexionOk) 
                                    {
                                        $query = "SELECT distinct destino FROM vuelo ORDER BY destino";
                                        $ciudades = $skynet->executeSelect($query);
                                        foreach ($ciudades as $ciudad)
                                        {
                                            $ciudadActual = $ciudad["destino"];
                                            echo "<option value='$ciudadActual'>$ciudadActual</option>";
                                        }
                                        $skynet->disconnect();
                                    }
                        	?>
                            </select>
                        </div>
                        <div>
                            <label for="fechaPartida">Fecha partida [dd-mm-aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaPartida" name="fechaPartida" value="<?php if (isset($_SESSION['fechaPartida'])){ echo $_SESSION['fechaPartida']; } ?>"/>
                        </div>
                        <div id="divRegreso" class="invisible">
                            <label for="fechaRegreso">Fecha regreso [dd-mm-aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaRegreso" name="fechaRegreso" value="<?php if (isset($_SESSION['fechaRegreso'])){ echo $_SESSION['fechaRegreso']; } ?>"/>
                        </div>
                        <div>
                            <label for="tipoDeViaje">Tipo de viaje</label>
                            <input type="radio" id="viajeIda" name="tipoDeViaje" value="1" checked="checked" onclick="ocultarFechaRegreso()"/>Ida
                            <input type="radio" id="viajeIdaVuelta" name="tipoDeViaje" value="2" onclick="mostrarFechaRegreso()"/>Ida y vuelta
                        </div>
                        <input type="submit" name="buscar" value="Buscar"></input>

                    </fieldset>

                </form>

            </main>

        </div>

        <script>
            $(function() {
                $("#fechaPartida").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
            $(function() {
                $("#fechaRegreso").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>
    </body>
</html>