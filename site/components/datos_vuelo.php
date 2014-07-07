<?php 
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    
    $estaEnEspera = (isset($_GET["estaEnEspera"])? $_GET["estaEnEspera"] : '' );
    $_SESSION["estaEnEspera"] = $estaEnEspera;

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
        "js"  => array("datos_vuelo")
    ); 
    require $local_path . '/components/head.php'; 
?>

    <body>

        <div class="wrapper">

            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <form id="frmVuelo" method="post" action="buscar_vuelo.php" onsubmit="return validarDatosVuelo()" class="centrar">

                    <fieldset>
                        <legend>Consulta Vuelo</legend>
                        <div>
                            <label for="ciudadOrigen">Ciudad origen</label>
                            <input type="text" id="ciudadOrigen" name="ciudadOrigen" list="listaOrigen" value="<?php if (isset($_SESSION['ciudadOrigen'])){ echo $_SESSION['ciudadOrigen']; } ?>"/>
                            <datalist id="listaOrigen" required="required">
                                <option value="Alto Rio Senguer" label="Alto Rio Senguer"/>
                                <option value="Azul" label="Azul"/>
                                <option value="Bahia Blanca" label="Bahia Blanca"/>
                                <option value="Bariloche" label="Bariloche"/>
                                <option value="Bolivar" label="Bolivar"/>
                                <option value="Buenos Aires" label="Buenos Aires"/>
                                <option value="Campos de Mayo" label="Campo de Mayo"/>
                                <option value="Cavihue" label="Caviahue"/>
                                <option value="Ceres" label="Ceres"/>
                                <option value="Chamical" label="Chamical"/>
                                <option value="Chepes" label="Chepes"/>
                                <option value="Chilecito" label="Chilecito"/>
                                <option value="Clorinda" label="Clorinda"/>
                                <option value="Comodoro Rivadavia" label="Comodoro Rivadavia"/>
                                <option value="Concordia" label="Concordia"/>
                                <option value="Cordoba" label="Cordoba"/>
                                <option value="Coronel Suarez" label="Coronel Suarez"/>
                                <option value="Corrientes" label="Corrientes"/>
                                <option value="Curuzu Cuatia" label="Curuzu Cuatia"/>
                                <option value="Cutral-Co" label="Cutral-Co"/>
                                <option value="Dolores" label="Dolores"/>
                                <option value="El Bolson" label="El Bolson"/>
                                <option value="El Calafate" label="El Calafate"/>
                                <option value="El Palomar" label="El Palomar"/>
                                <option value="Esquel" label="Esquel"/>
                                <option value="Ezeiza" label="Ezeiza"/>
                                <option value="Formosa" label="Formosa"/>
                                <option value="General Alvear" label="General Alvear"/>
                                <option value="General Pico" label="General Pico"/>
                                <option value="General Roca" label="General Roca"/>
                                <option value="Ingeniero Jacobacci" label="Ingeniero Jacobacci"/>
                                <option value="Isla Martin Garcia" label="Isla Martin Garcia"/>
                                <option value="Jose C. Paz" label="Jose C. Paz"/>
                                <option value="Junin" label="Junin"/>
                                <option value="Laboulaye" label="Laboulaye"/>
                                <option value="La Cumbre" label="La Cumbre"/>
                                <option value="La Plata" label="La Plata"/>
                                <option value="La Rioja" label="La Rioja"/>
                                <option value="Las Heras" label="Las Heras"/>
                                <option value="Las Lomitas" label="Las Lomitas"/>
                                <option value="Malargue" label="Malargue"/>
                                <option value="Mar del Plata" label="Mar del Plata"/>
                                <option value="Mendoza" label="Mendoza"/>
                                <option value="Merlo" label="Merlo"/>
                                <option value="Miramar" label="Miramar"/>
                                <option value="Monte Caseros" label="Monte Caseros"/>
                                <option value="Moron" label="Moron"/>
                                <option value="Necochea" label="Necochea"/>
                                <option value="Neuquen" label="Neuquen"/>
                                <option value="Olavarria" label="Olavarria"/>
                                <option value="Parana" label="Parana"/>
                                <option value="Paso de los Libres" label="Paso de los Libres"/>
                                <option value="Pehuajo" label="Pehuajo"/>
                                <option value="Perico" label="Perico"/>
                                <option value="Perito Moreno" label="Perito Moreno"/>
                                <option value="Posadas" label="Posadas"/>
                                <option value="Puerto Deseado" label="Puerto Deseado"/>
                                <option value="Puerto Iguazu" label="Puerto Iguazu"/>
                                <option value="Puerto Madryn" label="Puerto Madryn"/>
                                <option value="Puerto San Julian" label="Puerto San Julian"/>
                                <option value="Puerto Santa Cruz" label="Puerto Santa Cruz"/>
                                <option value="Presidencia Roque Saenz Peña" label="Presidencia Roque Saenz Peña"/>
                                <option value="Reconquista" label="Reconquista"/>
                                <option value="Resistencia" label="Resistencia"/>
                                <option value="Rio Cuarto" label="Rio Cuarto"/>
                                <option value="Rio Gallegos" label="Rio Gallegos"/>
                                <option value="Rio Grande" label="Rio Grande"/>
                                <option value="Rio Turbio" label="Rio Turbio"/>
                                <option value="Rosario" label="Rosario"/>
                                <option value="Salta" label="Salta"/>
                                <option value="San Fernando" label="San Fernando"/>
                                <option value="San Fernando del Valle de Catamarca" label="San Fernando del Valle de Catamarca"/>
                                <option value="San Juan" label="San Juan"/>
                                <option value="San Luis" label="San Luis"/>
                                <option value="San Rafael" label="San Rafael"/>
                                <option value="San Ramon de la Nueva Oran" label="San Ramon de la Nueva Oran"/>
                                <option value="San Justo" label="San Justo"/>
                                <option value="San Miguel de Tucuman" label="San Miguel de Tucuman"/>
                                <option value="Santa Rosa" label="Santa Rosa"/>
                                <option value="Santa Teresita" label="Santa Teresita"/>
                                <option value="Santiago del Estero" label="Santiago del Estero"/>
                                <option value="San Martin de los Andes" label="San Martin de los Andes"/>
                                <option value="Sauce Viejo" label="Sauce Viejo"/>
                                <option value="Sunchales" label="Sunchales"/>
                                <option value="Tandil" label="Tandil"/>
                                <option value="Tartagal" label="Tartagal"/>
                                <option value="Termas de Rio Hondo" label="Termas de Rio Hondo"/>
                                <option value="Trelew" label="Trelew"/>
                                <option value="Tres Arroyos" label="Tres Arroyos"/>
                                <option value="Ushuaia" label="Ushuaia"/>
                                <option value="Viedma" label="Viedma"/>
                                <option value="Villa Dolores" label="Villa Dolores"/>
                                <option value="Villa Gesell" label="Villa Gesell"/>
                                <option value="Villa Reynolds" label="Villa Reynolds"/>
                                <option value="Villaguay" label="Villaguay"/>
                                <option value="Zapala" label="Zapala"/>
                            </datalist>
                        </div>
                        <div>
                            <label for="ciudadDestino">Ciudad destino</label>
                            <input type="text" id="ciudadDestino" name="ciudadDestino" list="listaDestino" value="<?php if (isset($_SESSION['ciudadDestino'])){ echo $_SESSION['ciudadDestino']; } ?>"/>
                            <datalist id="listaDestino" required="required">
                                <option value="Alto Rio Senguer" label="Alto Rio Senguer"/>
                                <option value="Azul" label="Azul"/>
                                <option value="Bahia Blanca" label="Bahia Blanca"/>
                                <option value="Bariloche" label="Bariloche"/>
                                <option value="Bolivar" label="Bolivar"/>
                                <option value="Buenos Aires" label="Buenos Aires"/>
                                <option value="Campos de Mayo" label="Campo de Mayo"/>
                                <option value="Cavihue" label="Caviahue"/>
                                <option value="Ceres" label="Ceres"/>
                                <option value="Chamical" label="Chamical"/>
                                <option value="Chepes" label="Chepes"/>
                                <option value="Chilecito" label="Chilecito"/>
                                <option value="Clorinda" label="Clorinda"/>
                                <option value="Comodoro Rivadavia" label="Comodoro Rivadavia"/>
                                <option value="Concordia" label="Concordia"/>
                                <option value="Cordoba" label="Cordoba"/>
                                <option value="Coronel Suarez" label="Coronel Suarez"/>
                                <option value="Corrientes" label="Corrientes"/>
                                <option value="Curuzu Cuatia" label="Curuzu Cuatia"/>
                                <option value="Cutral-Co" label="Cutral-Co"/>
                                <option value="Dolores" label="Dolores"/>
                                <option value="El Bolson" label="El Bolson"/>
                                <option value="El Calafate" label="El Calafate"/>
                                <option value="El Palomar" label="El Palomar"/>
                                <option value="Esquel" label="Esquel"/>
                                <option value="Ezeiza" label="Ezeiza"/>
                                <option value="Formosa" label="Formosa"/>
                                <option value="General Alvear" label="General Alvear"/>
                                <option value="General Pico" label="General Pico"/>
                                <option value="General Roca" label="General Roca"/>
                                <option value="Ingeniero Jacobacci" label="Ingeniero Jacobacci"/>
                                <option value="Isla Martin Garcia" label="Isla Martin Garcia"/>
                                <option value="Jose C. Paz" label="Jose C. Paz"/>
                                <option value="Junin" label="Junin"/>
                                <option value="Laboulaye" label="Laboulaye"/>
                                <option value="La Cumbre" label="La Cumbre"/>
                                <option value="La Plata" label="La Plata"/>
                                <option value="La Rioja" label="La Rioja"/>
                                <option value="Las Heras" label="Las Heras"/>
                                <option value="Las Lomitas" label="Las Lomitas"/>
                                <option value="Malargue" label="Malargue"/>
                                <option value="Mar del Plata" label="Mar del Plata"/>
                                <option value="Mendoza" label="Mendoza"/>
                                <option value="Merlo" label="Merlo"/>
                                <option value="Miramar" label="Miramar"/>
                                <option value="Monte Caseros" label="Monte Caseros"/>
                                <option value="Moron" label="Moron"/>
                                <option value="Necochea" label="Necochea"/>
                                <option value="Neuquen" label="Neuquen"/>
                                <option value="Olavarria" label="Olavarria"/>
                                <option value="Parana" label="Parana"/>
                                <option value="Paso de los Libres" label="Paso de los Libres"/>
                                <option value="Pehuajo" label="Pehuajo"/>
                                <option value="Perico" label="Perico"/>
                                <option value="Perito Moreno" label="Perito Moreno"/>
                                <option value="Posadas" label="Posadas"/>
                                <option value="Puerto Deseado" label="Puerto Deseado"/>
                                <option value="Puerto Iguazu" label="Puerto Iguazu"/>
                                <option value="Puerto Madryn" label="Puerto Madryn"/>
                                <option value="Puerto San Julian" label="Puerto San Julian"/>
                                <option value="Puerto Santa Cruz" label="Puerto Santa Cruz"/>
                                <option value="Presidencia Roque Saenz Peña" label="Presidencia Roque Saenz Peña"/>
                                <option value="Reconquista" label="Reconquista"/>
                                <option value="Resistencia" label="Resistencia"/>
                                <option value="Rio Cuarto" label="Rio Cuarto"/>
                                <option value="Rio Gallegos" label="Rio Gallegos"/>
                                <option value="Rio Grande" label="Rio Grande"/>
                                <option value="Rio Turbio" label="Rio Turbio"/>
                                <option value="Rosario" label="Rosario"/>
                                <option value="Salta" label="Salta"/>
                                <option value="San Fernando" label="San Fernando"/>
                                <option value="San Fernando del Valle de Catamarca" label="San Fernando del Valle de Catamarca"/>
                                <option value="San Juan" label="San Juan"/>
                                <option value="San Luis" label="San Luis"/>
                                <option value="San Rafael" label="San Rafael"/>
                                <option value="San Ramon de la Nueva Oran" label="San Ramon de la Nueva Oran"/>
                                <option value="San Justo" label="San Justo"/>
                                <option value="San Miguel de Tucuman" label="San Miguel de Tucuman"/>
                                <option value="Santa Rosa" label="Santa Rosa"/>
                                <option value="Santa Teresita" label="Santa Teresita"/>
                                <option value="Santiago del Estero" label="Santiago del Estero"/>
                                <option value="San Martin de los Andes" label="San Martin de los Andes"/>
                                <option value="Sauce Viejo" label="Sauce Viejo"/>
                                <option value="Sunchales" label="Sunchales"/>
                                <option value="Tandil" label="Tandil"/>
                                <option value="Tartagal" label="Tartagal"/>
                                <option value="Termas de Rio Hondo" label="Termas de Rio Hondo"/>
                                <option value="Trelew" label="Trelew"/>
                                <option value="Tres Arroyos" label="Tres Arroyos"/>
                                <option value="Ushuaia" label="Ushuaia"/>
                                <option value="Viedma" label="Viedma"/>
                                <option value="Villa Dolores" label="Villa Dolores"/>
                                <option value="Villa Gesell" label="Villa Gesell"/>
                                <option value="Villa Reynolds" label="Villa Reynolds"/>
                                <option value="Villaguay" label="Villaguay"/>
                                <option value="Zapala" label="Zapala"/>
                            </datalist>
                        </div>
                        <div>
                            <label for="fechaPartida">Fecha partida</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaPartida" name="fechaPartida" value="<?php if (isset($_SESSION['fechaPartida'])){ echo $_SESSION['fechaPartida']; } ?>"/>
                        </div>
                        <div>
                            <tr id="trRegreso" class="invisible">
                            <label for="fechaRegreso">Fecha regreso</label>
                            <!-- Aqui se enlaza el datepicker al cuadro de texto -->
                            <input type="text" id="fechaRegreso" name="fechaRegreso" value="<?php if (isset($_SESSION['fechaRegreso'])){ echo $_SESSION['fechaRegreso']; } ?>"/>
                        </div>
                        <div>
                            <label for="tipoDeViaje">Tipo de viaje</label>
                            <input type="radio" id="viajeIda" name="tipoDeViaje" value="1" checked="checked" onclick="ocultarFechaRegreso()"/>Ida
                            <input type="radio" id="viajeIdaVuelta" name="tipoDeViaje" value="2" onclick="mostrarFechaRegreso()"/>Ida y vuelta
                        </div>
                        <input type="submit" name="buscar" value="Buscar"></input>

                    </fieldset>

                </form>

            </main>

        </div>

        <script>
            $(function() {
                $("#fechaPartida").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
            $(function() {
                $("#fechaRegreso").datepicker({
                showOn: "button",
                buttonImage: "../images/calendar.gif",
                buttonImageOnly: true,
                firstDay: 0
                });
            });
        </script>
    </body>
</html>