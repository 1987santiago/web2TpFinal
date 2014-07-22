<?php
	// Concatena un directorio con el directorio del servidor para obtener la ruta absoluta. 
        // Devuelve un string
	function getRutaAbsoluta($directorio)
	{
            return $_SERVER["DOCUMENT_ROOT"] . $directorio;
	}

	// Convierte el valor entero diasVuelo en binario
	// Ejemplo 01100010 significa que el vuelo sale lunes, martes y sabado
	// La posiciones del vector van de 0 a 7. La posicion cero no es considerada
	/* 1 lunes
	 * 2 martes
	 * 3 miercoles
	 * 4 jueves
	 * 5 viernes
	 * 6 sabado
	 * 7 domingo
	 * */
        // Devuelve un vector con numeros binarios
	function getDiasVueloBin($diasVuelo)
	{
            $binario = decbin($diasVuelo);
            $binario = substr("00000000",0,8 - strlen($binario)) . $binario;
            return str_split($binario);
	}
	
	// Convierte la fecha del formato dd/mm/aaaa a aaaa-mm-dd
	// Devuelve un string
	function getFechaFormateada($fecha)
	{
            return implode("-", array_reverse(explode("/", $fecha)));
	}
	
	// Genera un codigo unico para la reserva
        // Devuelve un string
	function getCodigoUnicoReserva() 
	{
            $idReserva = uniqid();
            return $idReserva;
	}
	
	// Devuelve el dia de la semana de una fecha formateada como aaaa-mm-dd
        // Devuelve un string
	function getDiaDeLaSemana($fecha) 
	{
            return date('N', strtotime($fecha));
	}
?>