function formatearFecha(fecha)
{
    return fecha.split("/").reverse().join("-");
}
	
function ciudadOrigenValida() 
{
    var ciudadOrigen = document.getElementById("ciudadOrigen").value;
    var tamanio = ciudadOrigen.length;
    if (tamanio == 0)
        {
            alert("Error en ciudad origen: Debe ingresar una ciudad origen");
            document.getElementById("ciudadOrigen").focus();
            return (false);
        }
    else
        {
            var patron = /[A-Za-z]+\s*/;
            var resultado = patron.test(ciudadOrigen);
            if (!resultado)
            {
                alert("Error en ciudad origen: solo letras mayusculas, minusculas o espacios");
                document.getElementById("ciudadOrigen").focus();
                return (false);
            }
            else
                return (true);
        }
}

function ciudadDestinoValida() 
{
    var ciudadDestino = document.getElementById("ciudadDestino").value;
    var tamanio = ciudadDestino.length;
    if (tamanio == 0)
        {
            alert("Error en ciudad destino: Debe ingresar una ciudad destino");
            document.getElementById("ciudadDestino").focus();
            return (false);
        }
    else
        {
            var patron = /[A-Za-z]+\s*/;
            var resultado = patron.test(ciudadDestino);
            if (!resultado)
            {
                alert("Error en ciudad destino: solo letras mayusculas, minusculas o espacios");
                document.getElementById("ciudadDestino").focus();
                return (false);
            }
            else
                return (true);
        }
}

function origenDestinoDistintos()
{
    var ciudadOrigen = document.getElementById("ciudadOrigen").value;
    var ciudadDestino = document.getElementById("ciudadDestino").value;
    if (ciudadOrigen != ciudadDestino)
        return (true);
    else
    {
        alert("Error en ciudad de origen o destino: ambas deben ser distintas");
        document.getElementById("ciudadDestino").focus();
        return (false);
    }
}

function fechaPartidaValida() 
{
    var fechaPartida = document.getElementById("fechaPartida").value;
    var tamanio = fechaPartida.length;
    if (tamanio == 0) 
    {
        alert("Error en fecha de partida: Debe ingresar una fecha de partida");
        document.getElementById("fechaPartida").focus();
        return (false);
    }
    else
    {	
        var patron = /\d{1,2}\/\d{1,2}\/\d{4}/;
        var resultado = patron.test(fechaPartida);
        if (!resultado)
        {
            alert("Error en fecha de partida: el formato es [dd/mm/aaaa]");
            document.getElementById("fechaPartida").focus();
            return (false);
        }
        else
        {
            var dHoy = new Date();
            // se formatea la fecha de dd/mm/aaaa a aaaa-mm-dd
            var fechaPartidaFormateada = formatearFecha(fechaPartida);
            var dFechaPartida = new Date(fechaPartidaFormateada);
            if (dFechaPartida <= dHoy)
            {
                alert("Error en fecha de partida: debe ser posterior a la fecha de hoy");
                document.getElementById("fechaPartida").focus();
                return (false);
            }
            else
                return (true);
        }
    }
}

function fechaRegresoValida() 
{
    var fechaRegreso = document.getElementById("fechaRegreso").value;
    var tamanio = fechaRegreso.length;
    if (tamanio == 0) 
    {
        alert("Error en fecha de regreso: Debe ingresar una fecha de regreso");
        document.getElementById("fechaRegreso").focus();
        return (false);
    }
    else
    {	
        var patron = /\d{1,2}\/\d{1,2}\/\d{4}/;
        var resultado = patron.test(fechaRegreso);
        if (!resultado)
        {
            alert("Error en fecha de regreso: el formato es [dd/mm/aaaa]");
            document.getElementById("fechaRegreso").focus();
            return (false);
        }
        else
        {
            var fechaPartida = document.getElementById("fechaPartida").value;
            var fechaPartidaFormateada = formatearFecha(fechaPartida);
            var dFechaPartida = new Date(fechaPartidaFormateada);
            // se formatea la fecha de dd/mm/aaaa a aaaa-mm-dd
            var fechaRegresoFormateada = formatearFecha(fechaRegreso);
            var dFechaRegreso = new Date(fechaRegresoFormateada);
            if (dFechaRegreso <= dFechaPartida)
            {
                alert("Error en fecha de regreso: debe ser mayor a la fecha de partida");
                document.getElementById("fechaRegreso").focus();
                return (false);
            }
            else
                return (true);
        }
    }
}

function mostrarFechaRegreso() 
{
    var filaFechaRegreso=document.getElementById("trRegreso");
    filaFechaRegreso.style="visibility: visible;";
}

function ocultarFechaRegreso() 
{
    var filaFechaRegreso=document.getElementById("trRegreso");
    filaFechaRegreso.style="visibility: hidden;"; 
}

function validarDatosVuelo()
{
    var tipoDeViaje = document.getElementsByName("tipoDeViaje");
    if (!ciudadOrigenValida()) 
        return (false);	
    if (!ciudadDestinoValida())
        return (false);
    if (!origenDestinoDistintos())
        return (false);
    if (!fechaPartidaValida())
        return (false);
    if	(tipoDeViaje.item(1).checked)
    {
        if (!fechaRegresoValida())
            return (false); 
    }
    return (true);
}
