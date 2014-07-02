<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC -//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
<html xmlns=http://www.w3.org/1999/xhtml>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/listado_vuelos_ida.css"/>
    <script type="text/javascript" src="../js/listado_vuelos_ida.js"></script>
</head>
<body>
    <form action="buscar_asiento_ida.php" method="post" onsubmit="return validarVueloSeleccionado()" class="centrar">
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
                    &nbsp;
                </td>
            </tr>
            <?php 
                $vuelos = $_SESSION["vuelos"];
                if (isset($vuelos)) 
                {
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
                        echo            "<input type='radio' name='categoria' value='200'/>" . $vuelo["tarifa_economy"];
                        echo        "</td>";
                        echo        "<td>";
                        echo            "<input type='radio' name='categoria' value='100'/>" . $vuelo["tarifa_primera"];
                        echo        "</td>";
                        echo        "<td>";
                        echo            "<input type='radio' name='vuelo' value='$idVueloSeleccionado'/>";
                        echo        "</td>";
                        echo    "</tr>";
                    }  
                }
            ?>
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
                <td>
                    <a href="datos_vuelo.php" name="anterior">Anterior</a>
                    <input type="submit" name="siguiente" value="Siguiente"/>
                </td>
            </tr>
        </table> 
    </form>		
</body>
</html>