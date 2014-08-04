<?php
<<<<<<< HEAD
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
    
=======
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $server_root = $_SESSION["server_root"];

>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6
    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("datosVuelo", "offExclusiv", "pagoSinInt", "forms"),
        "js" => array("listado_vuelos_ida")
    ); 
<<<<<<< HEAD
    
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
  
                    <form action="<?php echo "$server_root$statics_path"; ?>/components/buscar_asiento.php" method="post" onsubmit="return validarVueloSeleccionado()">
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
                                        else {
                                            echo "<td></td>";
                                        } 
                                            
                                        if ($vuelo["asientos_primera"] > 0) {
                                            echo "<td><input type='radio' name='categoria' value='100'/>" . $vuelo["tarifa_primera"] . "</td>"; 
                                        }
                                        else {
                                            echo "<td></td>";
                                        } 
                                        echo "<td><input type='radio' name='vuelo' value='$idVueloSeleccionado'/></td>";
                                    } 

                                    echo "</tr>"; 
                                }
                            ?>
                        </table> 
                        <a href="<?php echo "$server_root$statics_path"; ?>/sections/home.php" name="anterior">Anterior</a>
                        <input type="submit" name="siguiente" value="Siguiente"/>
                    </form>    
                
                </div>

            </main>

            <?php include "$base_path$statics_path/components/offExclusiv.php"; ?>
     
            <?php require "$base_path$statics_path/components/pagoSinInt.php"; ?>

        </div><!-- [END] wrapper -->

        <?php require "$base_path$statics_path/components/footer.php"; ?>    
    
    </body>
=======
?>
   
  
    <form action="<?php echo "$server_root$statics_path"; ?>/components/buscar_asiento.php" method="post" onsubmit="return validarVueloSeleccionado()">
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
        <a href="<?php echo "$server_root$statics_path"; ?>/components/datos_vuelo.php" name="anterior">Anterior</a>
        <input type="submit" name="siguiente" value="Siguiente"/>
    </form>    
   
>>>>>>> 34403359e05cc68427652620c73d8c0ec32573d6

