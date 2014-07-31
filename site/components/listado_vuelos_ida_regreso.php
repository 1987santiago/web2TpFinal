<?php 
    session_start();
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $server_root = $_SESSION["server_root"];
    
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js" => array("listado_vuelos_ida_regreso")
    );
?>
  
    
    <form action="<?php echo "$server_root$statics_path"; ?>/components/buscar_asiento.php" method="post" onsubmit="return validarVuelosSeleccionados()">
        <?php  echo "Fecha de partida: " . $_SESSION["fechaPartida"]; ?>
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
        <!-- Tabla de vuelos de regreso -->
        <?php  echo "Fecha de regreso: " . $_SESSION["fechaRegreso"]; ?>
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

                if (isset($_SESSION["vuelosRegreso"])) {

                    $vuelos = $_SESSION["vuelosRegreso"];

                    echo "<tr>";

                    foreach ($vuelos as $vuelo) {

                        $idVueloSeleccionado = $vuelo["numero_vuelo"];                                        

                        echo "<td>" . $vuelo["numero_vuelo"] . "</td>";
                        echo "<td>" . $vuelo["oaci_destino"] . "-" . $vuelo["destino"] . "</td>";
                        echo "<td>" . $vuelo["oaci_origen"] . "-" . $vuelo["origen"] . "</td>";

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
   

