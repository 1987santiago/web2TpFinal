 <?php
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/sunny/jquery-ui.css" /> -->

<div>
	
    <h2 class="reserva">Reserva tu pasaje </h2>
	
    <form class="contact_form" action ="" method="post">
		<ul>
			<li>
				<label>Partida</label>
				<input type="text" id="datepicker" >
			</li>
			<li>
				<label>Solo Ida</label>
				<input type="checkbox" name="soloida" id="soloida">
			</li>
			<li id="cdias">
				<label>Regreso </label>
				<input type="text" id="datepickerR" >
			</li>
			<li>
				<label>Ciudad Origen</label>
				<select name="origen" id="origen">
					<option value="">Seleccione una Ciudad de Origen</option>
				</select>
			</li>
			<li>
				<label>Ciudad Destino</label>
				<select name="destino" id="destino">
					<option value="">- Primero selecciona Ciudad de Origen -</option>
				</select>
			</li>
			<li>
				<button class="submit" type="submit">Consultar</button>
			</li>
		</ul>
	</form>
	
</div>

<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            showOn: "button",
            buttonImage: "../js/components/datepicker/images/calendar.gif",
            buttonImageOnly: true,
            closeText: 'Cerrar',
            /* prevText: ' 'nextText: 'Sig'*/
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1
        });
    });

    $(function() {
        $( "#datepickerR" ).datepicker({
            showOn: "button",
            buttonImage: "../js/components/datepicker/images/calendar.gif",
            buttonImageOnly: true,
            closeText: 'Cerrar',
            /* prevText: ' 'nextText: 'Sig'*/
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1
        });
    });
</script>
