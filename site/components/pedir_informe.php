<?php
    session_start();
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta para ejecutar php
    $http_path = $_SESSION["http_path"];
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js" => array("pedir_informe")
    ); 
?>

    <?php require "$base_path$statics_path/components/head.php"; ?>  

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $base_path . $statics_path . '/components/header.php'; ?> 

            <main id="main" role="main">
                <form method="post" action="<?php echo $http_path . '/components/mostrar_informe.php'?>" onsumbit="return validarFechas()" >
                    <fieldset>
                        <legend>Informes</legend>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            <label for="fechaInicial">Fecha inicial [dd/mm/aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaInicial" name="fechaInicial"/>
                        </div>
                        <div>
                            <label for="fechaFinal">Fecha final [dd/mm/aaaa]</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaFinal" name="fechaFinal"/>
                        </div>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            <label for="informe">Pasajes vendidos</label>
                            <input type="radio" id="pasajesVendidos" name="informe" value="1" checked="checked"/>
                        </div>
                        <div>
                            <label for="informe">Cantidad de pasajes vendidos por categoria y destino</label>
                            <input type="radio" id="pasajesVendidosCategoriaDestino" name="informe" value="2"/>
                        </div>
                        <div>
                            <label for="informe">Ocupacion por avion y destino</label>
                            <input type="radio" id="ocupacionAvionDestino" name="informe" value="3"/>
                        </div>
                        <div>
                            <label for="informe">Cantidad de reservas caidas</label>
                            <input type="radio" id="reservasCaidas" name="informe" value="4"/>
                        </div>
                        <input type="submit" name="mostrarInforme" value="Mostrar informe"/>                     
                    </fieldset>
                </form>
           </main> <!--[end] main -->

        </div> <!--[end] wrapper -->

        <!-- se incluye el <footer> -->
        <?php require $base_path . $statics_path . '/components/footer.php'; ?>
        <script>
            $(function() {
                $("#fechaInicial").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
            $(function() {
                $("#fechaFinal").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>
    </body>
