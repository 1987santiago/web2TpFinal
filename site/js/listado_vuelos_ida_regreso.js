function vueloSeleccionado() 
{
    var vuelos = document.getElementsByName("vuelo");
    var flag = false;
    for (var i = 0; i < vuelos.length; i++) 
    {
        if(vuelos[i].checked) 
        {
            flag = true;
            break;
        }
    }
    if (flag)
        return (true);
    else
    {    
        alert("Error: Debe elegir un vuelo de ida");
        return (false);
    }
}

function categoriaSeleccionada() 
{
    var categorias = document.getElementsByName("categoria");
    var flag = false;
    for (var i = 0; i < categorias.length; i++) 
    {
        if(categorias[i].checked) 
        {
            flag = true;
            break;
        }
    }
    if (flag)
        return (true);
    else
    {
        alert("Error en tarifa economy o primera: Debe elegir una categoria para el vuelo de ida");
        return (false);
    }
} 

function vueloRegresoSeleccionado() 
{
    var vuelos = document.getElementsByName("vueloRegreso");
    var flag = false;
    for (var i = 0; i < vuelos.length; i++) 
    {
        if(vuelos[i].checked) 
        {
            flag = true;
            break;
        }
    }
    if (flag)
        return (true);
    else
    {    
        alert("Error: Debe elegir un vuelo de regreso");
        return (false);
    }
}

function categoriaRegresoSeleccionada() 
{
    var categorias = document.getElementsByName("categoriaRegreso");
    var flag = false;
    for (var i = 0; i < categorias.length; i++) 
    {
        if(categorias[i].checked) 
        {
            flag = true;
            break;
        }
    }
    if (flag)
        return (true);
    else
    {
        alert("Error en tarifa economy o primera: Debe elegir una categoria para el vuelo de regreso");
        return (false);
    }
} 

function validarVuelosSeleccionados() 
{
    if (!vueloSeleccionado())
        return false;
    if (!categoriaSeleccionada())
        return false;
    if (!vueloRegresoSeleccionado())
        return false;
    if (!categoriaRegresoSeleccionada())
        return false;
    return (true);
}

