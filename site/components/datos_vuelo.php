<?php 
    session_start();
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js" => array("datos_vuelo")
    ); 
?>

    <?php require "$base_path$statics_path/components/head.php"; ?>

    <body>
        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $base_path . $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <form id="frmVuelo" method="post" action="<?php echo $http_path . '/components/buscar_vuelo.php'; ?>" onsubmit="return validarDatosVuelo()">

                    <fieldset>
                        <legend>Consulta vuelo</legend>
                        <div>
                            <label for="ciudadOrigen">Ciudad origen</label>
                            <select id="ciudadOrigen" name="ciudadOrigen" required="required">
                                <?php
                                    require_once $base_path . $statics_path . "/components/database.php";
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
                                    require_once $base_path . $statics_path . "/components/database.php";
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
                            <label for="fechaPartida">Fecha partida [dd/mm/aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaPartida" name="fechaPartida" value="<?php if (isset($_SESSION['fechaPartida'])){ echo $_SESSION['fechaPartida']; } ?>"/>
                        </div>
                        <div id="divRegreso" class="invisible">
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
        <!-- se incluye el <footer> -->
	<?php require $base_path . $statics_path . '/components/footer.php'; ?>     
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
