<?php
    
    // $db = mysql_connect('localhost','root','');
    // mysql_select_db('skynet', $db);
    require_once "$base_path$statics_path/processors/Database.php";

    // Establecemos una conexión con el servidor
    $connect = new Database();

    $reservation_data = $_SESSION['reservation_data'];

    // Con el dni accedemos a los datos del pasajero
    $traveler_doc = $reservation_data[0]['dni'];
    $traveler_data = getTravelerData($traveler_doc);
    // Guardamos esos datos en sesion
    $_SESSION['traveler_data'] = $traveler_data;

    // Con el numero de vuelo accedemos a los datos del vuelo
    $flight_number = $reservation_data[0]['numero_vuelo'];
    $flight_data = getFlightData($flight_number);
    // Guardamos esos datos en sesion
    $_SESSION['flight_data'] = $flight_data;

    // Con el codigo del avión accedemos a sus datos
    $plane_number = $flight_data['codigo_avion'];
    $plane_data = getPlaneData($plane_number);
    // Guardamos esos datos en sesion
    $_SESSION['plane_data'] = $plane_data;


    // Con el numero de vuelo y la categoría accedemos al precio del pasaje
    $category = $reservation_data[0]['id_categoria'];
    // Generamos la key de categoria (economy / primera)
    $category_str = ($category == 100)? 'tarifa_primera' : 'tarifa_economy';
    $price = $flight_data[$category_str];
    $_SESSION['flight_data']['precio'] = $price;


    /** 
     * Busca en la base los datos del pasajero, 
     * según el dni pasado por parametro
     * @param Number $traveler_doc -> documento del pasajero
     * @return [Array] 
     */
    function getTravelerData($traveler_doc) {

        global $connect;

        // Generamos la query para obtener el precio de la reserva
        $query_sql = "SELECT * FROM pasajero WHERE (dni = $traveler_doc)";

        // Realizamos la consulta a la tabla y guardamos los datos devueltos 
        $traveler_data = $connect->executeSelect($query_sql)[0];

        // Si la consulta fue exitosa entra
        if ($traveler_data) { 

            // si el registro está vacío retornamos falso 
            if (sizeof($traveler_data) == 0) {
                // echo '$price :: vacio false';
                return false;
            }

            return $traveler_data;

        }

    }
    
    /** 
     * Busca en la base los datos del vuelo, 
     * basandose en el numero de vuelo pasado por parametro
     * @param Number $flight_number
     * @return [Array] 
     */
    function getFlightData($flight_number) {

        global $connect;

        // Generamos la query para obtener el precio de la reserva
        $query_sql = "SELECT * FROM vuelo WHERE (numero_vuelo = $flight_number)";

        // Realizamos la consulta a la tabla y guardamos los datos devueltos 
        $flight_data = $connect->executeSelect($query_sql)[0];

        // Si la consulta fue exitosa entra
        if ($flight_data) { 

            // si el registro está vacío retornamos falso 
            if (sizeof($flight_data) == 0) {
                // echo '$price :: vacio false';
                return false;
            }

            return $flight_data;

        }

    }

    /** 
     * Busca en la base los datos del avion, 
     * utilizando el codigo de avión pasado por parametro
     * @param Number $plane_number
     * @return [Array] 
     */
    function getPlaneData($plane_number) {

        global $connect;

        // Generamos la query para obtener el precio de la reserva
        $query_sql = "SELECT * FROM avion WHERE (codigo_avion = $plane_number)";

        // Realizamos la consulta a la tabla y guardamos los datos devueltos 
        $plane_data = $connect->executeSelect($query_sql)[0];

        // Si la consulta fue exitosa entra
        if ($plane_data) { 

            // si el registro está vacío retornamos falso 
            if (sizeof($plane_data) == 0) {
                // echo '$price :: vacio false';
                return false;
            }

            return $plane_data;

        }

    }
    
?>


<h2>Confirme los datos de Reserva</h2>

<form class="data-form" action="<?php echo "$statics_path"; ?>/sections/pagoFinal.php" method="post" >

    <fieldset>
        <legend>Verifique sus datos</legend>
        <div>
            <label for="firstName">Nombre</label>
            <input id="firstName" name="firstname" type="text" value="<?php echo $traveler_data['nombre']; ?>">
        </div>
        <div>
            <label for="lastName">Apellido</label>
            <input id="lastName" name="lastname" type="text" value="<?php echo $traveler_data['apellido']; ?>">
        </div>
        <div>
            <label for="numDoc">DNI</label>
            <input id="numDoc" name="numdoc" type="text" value="<?php echo $traveler_data['dni']; ?>">
        </div>
        <div>
            <label for="nation">Nacionalidad</label>
            <input id="nation" name="nation" type="text" value="<?php echo $traveler_data['nacionalidad']; ?>">
        </div>
        <div>
            <label for="birthDay">Fecha de nacimiento</label>
            <input id="birthDay" name="birthday" type="text" value="<?php echo $traveler_data['fecha_nac']; ?>">
        </div>
        <div>
            <label for="phone">Telefono</label>
            <input id="phone" name="phone" type="text" value="<?php echo $traveler_data['telefono']; ?>">
        </div>
        <div>    
            <label for="email">Email</label>
            <input id="email" name="email" type="text" value="<?php echo $traveler_data['email']; ?>">
        </div>
    </fieldset>

    <fieldset>
        <legend>Datos del vuelo</legend>
        <dl>
            <dt>Precio: </dt>
                <dd><?php echo $price; ?></dd>
                <input name="price" type="hidden" value="<?php echo $price; ?>" />
            <dt>Ciudad origen: </dt>
                <dd><?php echo $flight_data['origen']; ?></dd>
                <input name="origin" type="hidden" value="<?php echo $flight_data['origen']; ?>" />
            <dt>Ciudad destino: </dt>
                <dd><?php echo $flight_data['destino']; ?></dd>
                <input name="destiny" type="hidden" value="<?php echo $flight_data['destino']; ?>" />
            <dt>Fecha de vuelo: </dt>
                <dd><?php echo $reservation_data[0]['fecha_partida']; ?></dd>
                <input name="startingDate" type="hidden" value="<?php echo $reservation_data[0]['fecha_partida']; ?>" />
            <dt>Avion: </dt>
                <dd><?php echo $plane_data['marca'] . ' ' . $plane_data['modelo']; ?></dd>
                <input name="price" type="hidden" value="<?php echo $plane_data['marca'] . ' ' . $plane_data['modelo']; ?>" />
        <dl>
    </fieldset>

    <fieldset>
        <legend>Seleccione un medio de pago</legend>
        <div>    
            <label>Tarjeta de Credito<span>(*)</span></label>
            <select name="card">
                <option value="visa">Visa</option>
                <option value="mastercard">Mastercard</option>
                <option value="amex">American Express</option>
            </select>
        </div>
        <div>
            <label>Numero de Tarjeta <span>(*)</span></label>
            <input id="cardNumber" type="text" name="cardnumber" required />
        </div>
    </fieldset>

    <input type="submit" value="Pagar" />

</form>