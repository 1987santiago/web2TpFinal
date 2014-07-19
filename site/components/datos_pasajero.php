<?php 
    session_start();   
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-15"/>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
    <link rel="stylesheet" href="../css/jquery-ui.css"/>
    <script type="text/javascript" src="../js/datos_pasajero.js"></script>
    <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
    <script>
        $(function() 
        {
            $("#fechaNac").datepicker({
            showOn: "button",
            buttonImage: "../images/calendar.gif",
            buttonImageOnly: true,
            firstDay: 0
            });
        });
    </script>
</head>
<body>
    <form method="post" action="guardar_pasajero_reserva.php" onsubmit="return validarDatosPasajero()" class="centrar">
        <table>
            <tr>
                <td>
                    <label><b>Datos del pasajero</b></label>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dni">DNI</label>
                </td>
                <td>
                    <input type="text" id="dni" name="dni" value="<?php if (isset($_SESSION['dni'])){ echo $_SESSION['dni']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellido">Apellido</label>
                </td>
                <td>
                    <input type="text" id="apellido" name="apellido" value="<?php if (isset($_SESSION['apellido'])){ echo $_SESSION['apellido']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nombre">Nombre</label>
                </td>
                <td>
                    <input type="text" id="nombre" name="nombre" value="<?php if (isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fechaNac">Fecha de nacimiento [dd/mm/aaaa]</label>
                </td>
                <td>
                    <input type="text" id="fechaNac" name="fechaNac" value="<?php if (isset($_SESSION['fechaNac'])){ echo $_SESSION['fechaNac']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="telefono">Telefono</label>
                </td>
                <td>
                    <input type="text" id="telefono" name="telefono" value="<?php if (isset($_SESSION['telefono'])){ echo $_SESSION['telefono']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="text" id="email" name="email" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nacionalidad">Nacionalidad</label>
                </td>
                <td>
                    <input type="text" id="nacionalidad" name="nacionalidad" value="<?php if (isset($_SESSION['nacionalidad'])){ echo $_SESSION['nacionalidad']; } ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <?php 
                        $tipoDeViaje=$_SESSION["tipoDeViaje"];
                        if ($tipoDeViaje == 1) 
                        { 
                            echo "<a href='listado_vuelos_ida.php' name='anterior'>Anterior</a>";
                        }
                        else
                        {
                            echo "<a href='listado_vuelos_ida_regreso.php' name='anterior'>Anterior</a>";
                        }    
                    ?> 
                    <input type="submit" name="siguiente" value="Siguiente"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>