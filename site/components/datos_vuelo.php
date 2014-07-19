<?php 
    session_start();
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
    <script>
    $(function() 
    {
        $("#fechaPartida").datepicker({
        showOn: "button",
        buttonImage: "../images/calendar.gif",
        buttonImageOnly: true,
        firstDay: 0
        });
    });
    $(function() 
    {
        $("#fechaRegreso").datepicker({
        showOn: "button",
        buttonImage: "../images/calendar.gif",
        buttonImageOnly: true,
        firstDay: 0
        });
    });
    </script>
</head>
<body>
    <form id="frmVuelo" method="post" action="buscar_vuelo.php" onsubmit="return validarDatosVuelo()" class="centrar">
        <table>
            <tr>
                <td>
                    <label><b>Consultar vuelo entre</b></label>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ciudadOrigen">Ciudad origen</label>
                </td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ciudadDestino">Ciudad destino</label>
                </td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fechaPartida">Fecha partida [dd/mm/aaaa]</label>
                </td>
                <td>
                    <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                    <input type="text" id="fechaPartida" name="fechaPartida" class="anchoFecha" value="<?php if (isset($_SESSION['fechaPartida'])){ echo $_SESSION['fechaPartida']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr id="trRegreso" class="invisible">
                <td>
                    <label for="fechaRegreso">Fecha regreso [dd/mm/aaaa]</label>
                </td>
                <td>
                    <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                    <input type="text" id="fechaRegreso" name="fechaRegreso" class="anchoFecha" value="<?php if (isset($_SESSION['fechaRegreso'])){ echo $_SESSION['fechaRegreso']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tipoDeViaje">Tipo de viaje</label>
                </td>
                <td>
                    <input type="radio" id="viajeIda" name="tipoDeViaje" value="1" checked="checked" onclick="ocultarFechaRegreso()"/>Ida
                    <input type="radio" id="viajeIdaVuelta" name="tipoDeViaje" value="2" onclick="mostrarFechaRegreso()"/>Ida y vuelta
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input type="submit" name="buscar" value="Buscar"></input>
                </td>
            </tr>
         </table>
    </form>
</body>
</html>