function dniValido() 
{
    var dni = document.getElementById("dni").value;
    var tamanio = dni.length;
    if (tamanio == 0)
        {
            alert("Error en DNI: debe ingresar un DNI");
            document.getElementById("dni").focus();
            return (false);
        }
    else
        {
            var patron = /[0-9]{7,8}/;
            var resultado = patron.test(dni);
            if (!resultado)
            {
                alert("Error en dni: solo numeros sin puntos entre 7 y 8 digitos");
                document.getElementById("dni").focus();
                return (false);
            }
            else
                return (true);
        } 
}

function apellidoValido() 
{
    var apellido = document.getElementById("apellido").value;
    var tamanio = apellido.length;
    if (tamanio == 0)
        {
            alert("Error en apellido: debe ingresar un apellido");
            document.getElementById("apellido").focus();
            return (false);
        }
    else
        {
            var patron = /[A-Za-z]{1,30}\s*/;
            var resultado = patron.test(apellido);
            if (!resultado)
            {
                alert("Error en apellido: solo letras mayusculas, minusculas o espacios con longitud maxima 30 caracteres");
                document.getElementById("apellido").focus();
                return (false);
            }
            else
                return (true);
        }  
}

function nombreValido() 
{
    var nombre = document.getElementById("nombre").value;
    var tamanio = nombre.length;
    if (tamanio == 0)
        {
            alert("Error en nombre: debe ingresar un nombre");
            document.getElementById("nombre").focus();
            return (false);
        }
    else
        {
            var patron = /[A-Za-z]{1,30}\s*/;
            var resultado = patron.test(nombre);
            if (!resultado)
            {
                alert("Error en nombre: solo letras mayusculas, minusculas o espacios con longitud maxima 30 caracteres");
                document.getElementById("nombre").focus();
                return (false);
            }
            else
                return (true);
        } 
}

function fechaNacValida() 
{
    var fechaNac = document.getElementById("fechaNac").value;
    var tamanio = fechaNac.length;
    if (tamanio == 0)
        {
            alert("Error en fecha de nacimiento: debe ingresar una fecha de nacimiento dd/mm/aaa");
            document.getElementById("fechaNac").focus();
            return (false);
        }
    else
        {
            var patron = /\d{1,2}\/\d{1,2}\/\d{4}/;
            var resultado = patron.test(fechaNac);
            if (!resultado)
            {
                alert("Error en fecha de nacimiento: el formato es dd/mm/aaaa");
                document.getElementById("fechaNac").focus();
                return (false);
            }
            else
                return (true);
        }   
}

function telefonoValido() 
{
    var telefono = document.getElementById("telefono").value;
    var tamanio = telefono.length;
    if (tamanio == 0)
        {
            alert("Error en telefono: debe ingresar un telefono (NNNNN)-NNNNNNNN");
            document.getElementById("telefono").focus();
            return (false);
        }
    else
        {
            var patron = /\(*[0-9]{0,5}\)*\-*[0-9]{8}/;
            var resultado = patron.test(telefono);
            if (!resultado)
            {
                alert("Error en telefono: debe ingresar un telefono (NNNNN)-NNNNNNNN");
                document.getElementById("telefono").focus();
                return (false);
            }
            else
                return (true);
        }   
}

function emailValido() 
{
    var email = document.getElementById("email").value;
    var tamanio = email.length;
    if (tamanio == 0)
        {
            alert("Error en email: debe ingresar un email");
            document.getElementById("email").focus();
            return (false);
        }
    else
        {
            var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            var resultado = patron.test(email);
            if (!resultado)
            {
                alert("Error en email: debe ingresar un email valido");
                document.getElementById("email").focus();
                return (false);
            }
            else
                return (true);
        }
}

function nacionalidadValida() 
{
    var nacionalidad = document.getElementById("nacionalidad").value;
    var tamanio = nacionalidad.length;
    if (tamanio == 0)
        {
            alert("Error en nacionalidad: debe ingresar una nacionalidad");
            document.getElementById("nacionalidad").focus();
            return (false);
        }
    else
        {
            var patron = /[A-Za-z]{1,20}/;
            var resultado = patron.test(nacionalidad);
            if (!resultado)
            {
                alert("Error en nacionalidad: solo letras mayusculas, minusculas o espacios con longitud maxima 20 caracteres");
                document.getElementById("nacionalidad").focus();
                return (false);
            }
            else
                return (true);
        } 
}

function validarDatosPasajero() 
{
    if (!dniValido()) 
        return (false);	
    if (!apellidoValido())
	return (false);
    if (!nombreValido())
	return (false);
    if (!fechaNacValida())
    	return (false);
    if (!telefonoValido())
    	return (false);
    if (!emailValido())
    	return (false);
    if (!nacionalidadValida())
    	return (false);
    return (true);
}




