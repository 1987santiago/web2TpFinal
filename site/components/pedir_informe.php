<?php
<<<<<<< HEAD
=======
    session_start();
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
<<<<<<< HEAD
    );
?>

  
    <form method="post" action="<?php echo "$server_root$statics_path/components/procesar_informe.php"; ?>" onsubmit="return validarFechas()" class="data-form">
        <legend>Informes</legend>
        <fieldset>    
=======
        "js" => array("pedir_informe")
    );

?>
    
    <form method="post" action="<?php echo "$server_root$statics_path/components/procesar_informe.php"; ?>" onsubmit="return validarFechas()" class="data-form">
        <fieldset>
            <legend>Informes</legend>
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6
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
            <div id="divDestino" class="invisible">
                <label for="destino">Destino</label>
                <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                <select name="destino" required="required">
                    <?php
                        require_once "$base_path$statics_path/processors/Database.php";
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
                &nbsp;
            </div>
            <div>
                <label for="informe">Pasajes vendidos</label>
                <input type="radio" id="pasajesVendidos" name="informe" value="1" checked="checked" onclick="ocultarDestino()"/>
            </div>
            <div>
                <label for="informe">Cantidad de pasajes vendidos por categoria y destino</label>
                <input type="radio" id="pasajesVendidosCategoriaDestino" name="informe" value="2" onclick="mostrarDestino()"/>
            </div>
            <div>
                <label for="informe">Ocupacion por avion y destino</label>
                <input type="radio" id="ocupacionAvionDestino" name="informe" value="3" onclick="mostrarDestino()"/>
            </div>
            <div>
                <label for="informe">Cantidad de reservas caidas</label>
                <input type="radio" id="reservasCaidas" name="informe" value="4" onclick="ocultarDestino()"/>
            </div>
            <input type="submit" name="mostrarInforme" value="Mostrar informe"/>                     
        </fieldset>
    </form>

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
   
