<?php
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "js"  => array("listado_vuelos_ida")
    ); 
    require "$base_path$statics_path/components/head.php"; 
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js" => array("listado_vuelos_ida")
    ); 
?>
   
    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require "$base_path$statics_path/components/header.php"; ?> 

            <main role="main"><!-- ex: center -->

                <!-- se incluye la barra lateral de navegación -->
                <?php require "$base_path$statics_path/components/navLateral.php"; ?>

                <!-- se incluye el formulario de busqueda de vuelos disponibles para reservar -->
                <div class="col">
                
                    <form action="buscar_asiento.php" method="post" onsubmit="return validarVueloSeleccionado()">
                        
                        <label>Fecha de partida:  <?php  echo $_SESSION["fechaPartida"]; ?></label>

                        <table>
                            <tr>
                                <th>Numero de vuelo</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Tarifa economy</th>
                                <th>Tarifa primera</th>
                                <th>Vuelo seleccionado</th>
                            </tr>
                            <?php 
                                
                                if (isset($_SESSION["vuelosIda"])) {

                                    $vuelos = $_SESSION["vuelosIda"];
                                    
                                    echo "<tr>";

                                    foreach ($vuelos as $vuelo) {
                                        
                                        $idVueloSeleccionado = $vuelo["numero_vuelo"];                                        
                                        
                                        echo "<td>" . $vuelo["numero_vuelo"] . "</td>";
                                        echo "<td>" . $vuelo["oaci_origen"] . "-" . $vuelo["origen"] . "</td>";
                                        echo "<td>" . $vuelo["oaci_destino"] . "-" . $vuelo["destino"] . "</td>";

                                        if ($vuelo["asientos_economy"] > 0) {
                                            echo "<td><input type='radio' name='categoria' value='200'/>" . $vuelo["tarifa_economy"] . "</td>";
                                        }
                                        if ($vuelo["asientos_primera"] > 0) {
                                            echo "<td><input type='radio' name='categoria' value='100'/>" . $vuelo["tarifa_primera"] . "</td>"; 
                                        }
                                        echo "<td><input type='radio' name='vuelo' value='$idVueloSeleccionado'/></td>";
                                    } 

                                    echo "</tr>"; 

                                }
                            ?>
                        </table> 

                        <a href="datos_vuelo.php" name="anterior">Anterior</a>
                        <input type="submit" name="siguiente" value="Siguiente"/>

                    </form>

                </div><!-- [END] col -->
            
            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>

        <!-- Scripts necesarios para Wow Slider -->
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/wowslider.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/wow/engine1/script.js"></script>
        <script type="text/javascript" src="<?php echo "$statics_path"; ?>/js/datos_vuelo.js"></script>
        <!-- [END] Scripts necesarios para Wow Slider -->

    </body>

</html>
