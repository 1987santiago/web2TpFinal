<?php
    // guardamos la nueva ruta base del site
    $SITE_PATH = "/Applications/XAMPP/htdocs/unlam/web2/tpFinal/web2TpFinal/site";
    // guardamos la url de los recursos estaticos
    $static_url = "/unlam/web2/tpFinal/web2TpFinal/site";

    // Definimos un valor valido a mano
    $hardcode_valid_code = '001A';
    
    // Obtenemos el código ingresado por usuario
    $reservation_code = $_POST['reservationCode']; 

    if ($reservation_code != $hardcode_valid_code) {
        header("Location: $static_url/components/checkIn.php");
    } 
?>

<!-- 
    Esquema de asientos del avion, 
    datos necesarios: 

        // para dibujarlo
        @totalAsientos
        @cantidadColumnas (hileras de asientos)

        // para determinar el estado de cada asiento
        @idAsiento
        @estadoAsiento

-->
<?php 
    // Hardcode values
    $colsQuantity = 4;
    $totalSeats = 60;
    $rowsQuantity = $totalSeats / $colsQuantity; // se calcula la cantidad de filas

    $seatId = 001;
    $seatStatus = 'disabled'; // valores ['available',disabled']
    // O bien un dato booleano para saber su estado
    $availableSeat = false; // or true

?>

<!doctype html>
<html>

    <!-- se incluye el <head> -->
    <?php require $SITE_PATH . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/header.php'; ?> 

            <main id="main" role="main">

                <div class="grid row2-12">

                    <article class="seat-selection">

                        <h3>Selección de asiento</h3>

                        <form id="seatSelection" action="seatConfirm.php" method="post">

                            <fieldset>

                                <legend>Seleccione un asiento</legend>

                                <?php 
                                    for ($row = 0; $row <= $rowsQuantity ; $row++) { 
                                        // fila
                                        echo "<div>";

                                        for ($seat = 0; $seat <= $colsQuantity; $seat++) { 
                                            // asiento
                                            if ($row == 0 && $seat == 0) {
                                                
                                                // si es la primer columna y la primer fila, no pongo nada
                                                echo "<span class='seat-letter'></span>";

                                            } else if ($seat == 0) { 
                                            
                                                // si es la primer columna, pongo el numero de fila
                                                echo "<span class='seat-number'>$row</span>"; 
                                            
                                            } else if ($row == 0) {
                                           
                                                // si es la primer fila pongo las letras de asiento
                                                echo "<span class='seat-letter'>$seat</span>"; // TODO: $seat.letra -> A,B,C,D...
                                            
                                            } else {

                                                // TODO: si el asiento está reservado (asiento.status == 'reserved' || 'disabled'), 
                                                //       agregar atributo disabled al radio y la clase correspondiente al label
                                                if ( (($seat + $row) % 2) == 0) {
                                                    echo "<input id='asiento$row$seat' name='asiento' type='radio' disabled='disabled'>";
                                                    echo "<label for='asiento$row$seat' class='seat disabled'>F $row A$seat</label>";
                                                } else if( ($seat % 2) != 0 && ($row % 3) == 0 ) {
                                                    echo "<input id='asiento$row$seat' name='asiento' type='radio' disabled='disabled'>";
                                                    echo "<label for='asiento$row$seat' class='seat reserved'>F $row A$seat</label>";
                                                } else {
                                                    echo "<input id='asiento$row$seat' name='asiento' type='radio' value='$seatId'>";
                                                    echo "<label for='asiento$row$seat' class='seat'>F $row A$seat</label>";
                                                }

                                            }

                                        } // [END] asiento

                                        echo "</div>";
                                        
                                    } // [END] fila
                                ?>

                            </fieldset>

                            <div>
                                <input type="submit" value="Siguiente >">
                            </div>

                        </form>

                    </article>

                </div>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/footer.php'; ?> 

    <!-- Incluir este js para agregar funcionalidad en browsers < IE8 
        <script type="text/javascript" src="js/components/seatSelection.js"></script> 
    -->
    </body>

</html>


