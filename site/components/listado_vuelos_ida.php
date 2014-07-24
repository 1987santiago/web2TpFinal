<?php 
    session_start();
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

    <?php require "$base_path$statics_path/components/head.php"; ?>

    <body>
        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $base_path . $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main">
                <form action="<?php echo $http_path . '/components/buscar_asiento.php';?>" method="post" onsubmit="return validarVueloSeleccionado()">
                    
                    <fieldset>
                        <legend>Vuelos</legend>
                        <?php  echo "Fecha de partida:  " . $_SESSION["fechaPartida"]; ?>
                        <table>
                            <tr>
                                <th>
                                    Numero de vuelo	
                                </th>
                                <th>
                                    Origen
                                </th>
                                <th>
                                    Destino
                                </th>
                                <th>
                                    Tarifa economy
                                </th>
                                <th>
                                    Tarifa primera
                                </th>
                                <th>
                                    Vuelo seleccionado
                                </th>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>    
                            </tr>
                            <?php 
                                if (isset($_SESSION["vuelosIda"])) 
                                {
                                    $vuelos = $_SESSION["vuelosIda"];
                                    foreach($vuelos as $vuelo) 	
                                    {
                                        $idVueloSeleccionado = $vuelo["numero_vuelo"];
                                        echo    "<tr>";
                                        echo        "<td>";
                                        echo            $vuelo["numero_vuelo"];
                                        echo        "</td>";
                                        echo        "<td>";
                                        echo            $vuelo["oaci_origen"] . "-" . $vuelo["origen"];
                                        echo        "</td>";
                                        echo        "<td>";
                                        echo            $vuelo["oaci_destino"] . "-" . $vuelo["destino"];
                                        echo        "</td>";
                                        echo        "<td>";
                                        if ($vuelo["asientos_economy"] > 0) 
                                        {
                                            echo 	"<input type='radio' name='categoria' value='200'/>" . $vuelo["tarifa_economy"];
                                        }
                                        echo        "</td>";
                                        echo        "<td>";
                                        if ($vuelo["asientos_primera"] > 0) 
                                        {
                                            echo        "<input type='radio' name='categoria' value='100'/>" . $vuelo["tarifa_primera"];	
                                        }
                                        echo        "</td>";
                                        echo        "<td>";
                                        echo            "<input type='radio' name='vuelo' value='$idVueloSeleccionado'/>";
                                        echo        "</td>";
                                        echo    "</tr>";
                                    }  
                                }
                            ?>
                        </table>
                        <a href="<?php echo $http_path . '/components/datos_vuelo.php';?>" name="anterior">Anterior</a>
                        <input type="submit" name="siguiente" value="Siguiente"/>
                    </fieldset>
                </form>
            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $base_path . $statics_path . '/components/footer.php'; ?> 
    </body>
