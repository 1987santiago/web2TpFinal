function formatearFecha(fecha)
{
    return fecha.split("/").reverse().join("-");
}

function fechaInicialValida() 
{
    var fechaInicial = document.getElementById("fechaInicial").value;
    var tamanio = fechaInicial.length;
    if (tamanio == 0) 
    {
        alert("Error en fecha inicial: Debe ingresar una fecha inicial");
        document.getElementById("fechaInicial").focus();
        return (false);
    }
    else
    {	
        var patron = /\d{1,2}\/\d{1,2}\/\d{4}/;
        var resultado = patron.test(fechaInicial);
        if (!resultado)
        {
            alert("Error en fecha inicial: el formato es [dd/mm/aaaa]");
            document.getElementById("fechaInicial").focus();
            return (false);
        }
        else
        {
            return (true);
        }
    }
}

function fechaFinalValida() 
{
    var fechaFinal = document.getElementById("fechaFinal").value;
    var tamanio = fechaFinal.length;
    if (tamanio == 0) 
    {
        alert("Error en fecha final: Debe ingresar una fecha final");
        document.getElementById("fechaFinal").focus();
        return (false);
    }
    else
    {	
        var patron = /\d{1,2}\/\d{1,2}\/\d{4}/;
        var resultado = patron.test(fechaFinal);
        if (!resultado)
        {
            alert("Error en fecha final: el formato es [dd/mm/aaaa]");
            document.getElementById("fechaFinal").focus();
            return (false);
        }
        else
        {
            var fechaInicial = document.getElementById("fechaInicial").value;
            var fechaInicialFormateada = formatearFecha(fechaInicial);
            var dFechaInicial= new Date(fechaInicialFormateada);
            // se formatea la fecha de dd/mm/aaaa a aaaa-mm-dd
            var fechaFinalFormateada = formatearFecha(fechaFinal);
            var dFechaFinal = new Date(fechaFinalFormateada);
            if (dFechaFinal <= dFechaInicial)
            {
                alert("Error en fecha final: debe ser mayor a la fecha inicial");
                document.getElementById("fechaFinal").focus();
                return (false);
            }
            else
                return (true);
        }
    }
}

function mostrarDestino() 
{
    var destino=document.getElementById("divDestino");
    destino.style.visibility = "visible";
}

function ocultarDestino() 
{
    var destino=document.getElementById("divDestino");
    destino.style.visibility = "hidden"; 
}

function validarFechas() 
{
    if (!fechaInicialValida())
        return (false);
    
    if (!fechaFinalValida())
        return (false);
    
    return (true);
}


