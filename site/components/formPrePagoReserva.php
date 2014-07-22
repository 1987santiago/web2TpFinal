<div>
    <h2 class="reserva">Abona tu pasaje </h2>
    <form class="contact_form" action ="<?php echo "$statics_path"; ?>/sections/confirmaPago.php" method="post" id="formulario">
        <ul>
            <li>
                <label>codigo de reserva</label>
                <input type="text" name="codReserva" id="codReserva" >
            </li>
            <li>
                <button class="submit" type="submit" >Consultar</button>
            </li>
        </ul>
    </form>
</div>