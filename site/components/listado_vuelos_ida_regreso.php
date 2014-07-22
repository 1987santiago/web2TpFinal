<?php 
	session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
    <script type="text/javascript" src="../js/listado_vuelos_ida_regreso.js"></script>
</head>
<body>
    <form action="buscar_asiento.php" method="post" onsubmit="return validarVuelosSeleccionados()" class="centrar">
        <?php  echo "Fecha de partida: " . $_SESSION["fechaPartida"]; ?>
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
                    &nbsp;
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
                            echo        "<input type='radio' name='categoria' value='200'/>" . $vuelo["tarifa_economy"];
			}
			echo        "</td>";
			echo        "<td>";
                        if ($vuelo["asientos_primera"] > 0) 
			{
                            echo    	"<input type='radio' name='categoria' value='100'/>" . $vuelo["tarifa_primera"];	
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
        
        <!-- Tabla de vuelos de regreso -->
        <?php  echo "Fecha de regreso: " . $_SESSION["fechaRegreso"]; ?>
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
                    &nbsp;
                </td>
            </tr>
            <?php 
                if (isset($_SESSION["vuelosRegreso"])) 
                {
                    $vuelos = $_SESSION["vuelosRegreso"];
                    foreach($vuelos as $vuelo) 	
                    {
                        $idVueloSeleccionado = $vuelo["numero_vuelo"];
                        echo    "<tr>";
                        echo        "<td>";
                        echo            $vuelo["numero_vuelo"];
                        echo        "</td>";
                        echo        "<td>";
                        echo            $vuelo["oaci_destino"] . "-" . $vuelo["destino"];
                        echo        "</td>";
                        echo        "<td>";
                        echo            $vuelo["oaci_origen"] . "-" . $vuelo["origen"];     
                        echo        "</td>";
                        echo        "<td>";
			if ($vuelo["asientos_economy"] > 0) 
                        {
                            echo        "<input type='radio' name='categoriaRegreso' value='200'/>" . $vuelo["tarifa_economy"];
			}
			echo        "</td>";
			echo        "<td>";
                        if ($vuelo["asientos_primera"] > 0) 
			{
                            echo    	"<input type='radio' name='categoriaRegreso' value='100'/>" . $vuelo["tarifa_primera"];	
			}
			echo        "</td>";
                        echo        "<td>";
                        echo            "<input type='radio' name='vueloRegreso' value='$idVueloSeleccionado'/>";
                        echo        "</td>";
                        echo    "</tr>";
                    }  
                }
            ?> 
        </table> 
        <a href="datos_vuelo.php" name="anterior">Anterior</a>
        <input type="submit" name="siguiente" value="Siguiente"/>
    </form>		
</body>
</html>