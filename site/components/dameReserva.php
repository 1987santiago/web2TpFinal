<?php
    $db = mysql_connect('localhost','root','');
    mysql_select_db('skynet', $db);

    $resultado = $_POST['codReserva'];
    $query = "select * from reserva where codigo_reserva='".$resultado."'";
?>

<div>

    <h2 class="reserva">Confirme los datos de Reserva </h2>

    <?php
        $consulta = mysql_query($query);
        $nfilas = mysql_num_rows($consulta);

        if ($nfilas > 0) {

            for ($i=0; $i<$nfilas; $i++) {

                $fila = mysql_fetch_array($consulta);

                echo "<strong>Codigo de Reserva:</strong>" .$fila ['codigo_reserva'];
                echo "<br>";
                echo "<strong>Monto a abonar:</strong>".$fila['monto'];
            }

            mysql_close();
        }
    ?>

    <form class="contact_form" action ="<?php echo "$statics_path"; ?>/sections/pagoFinal.php" method="post" >
        <ul>
            <li><?php $fecha= getdate(); ?></li>
            <li>
                <label>Confirme Monto<span>(*)</span></label>
                <input type="text" name="monto" required>
            </li>
            <li>
                <label>Codigo de Reserva<span>(*)</span></label>
                <input type="text" name="codigoReserva" required>
            </li>
            <li>
                <label>Fecha de Pago (yyyy-mm-dd)</label>
                <input type="text" name="fecha_pago" required>
            </li> 
            <li>
                <label>Tarjeta de Crédito<span>(*)</span></label>
                <select name="tarjeta">
                    <option>Visa</option>
                    <option>Mastercard</option>
                    <option>American Express</option>
                </select>
            </li>
            <li>                 
                <label>Numero de Tarjeta <span>(*)</span></label>
                <input type="text" name="numeroTarjeta"  required/>
            </li>
            <li>
                <input type="hidden" name="codigo_reserva" value="$resultado">
            </li>  
            <li>
                <button class="submit" type="submit">Abonar</button>
            </li>
        </ul>
    </form>
</div>