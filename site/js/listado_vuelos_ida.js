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
        alert("Error en tarifa economy o primera: Debe elegir una categoria para el vuelo");
        return (false);
    }
} 

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
        alert("Error: Debe elegir un vuelo");
        return (false);
    }
}

function validarVueloSeleccionado() 
{
    if (!vueloSeleccionado())
        return false;
    if (!categoriaSeleccionada())
        return false;
    return (true);
}