<?php 
    /**
     * 
     * Connect to Server
     * 
     */

    /**
     * This Class execute , 
     * that has been pass from parameter
     * @example ;
     */
    class ExecuteQuery {

        // Attributes
        private $table_name; // String

        // Methods
        function ExecuteQuery($table_name) {

        }

        

    }

    /**
     * @query_sql String with SQL query instruction (insert/select/alter)
     * @return Array() with conection data
     * @example mysqlInstruction('SELECT * FROM table_test')
     */
    function mysqlInstruction($query_sql, $connection_link) {
        
        $query_response = mysql_query($query_sql, $connection_link);
        if (!$query_response) {
            $query_status_bool = $query_response;
            $query_status = 'error';
            $query_status_message = 'Query invalida : ' . mysql_error() . '<br>';
        } else {
            $query_status_bool = true;
            $query_status = 'success';
            $query_status_message = 'Datos obtenidos con exito!';
        }

        $query_message = "<span class='box-$query_status'>$query_status_message</span>";

        $query_data = array(
            'response' => $query_response, 
            'status_bool' => $query_status_bool, 
            'status' => $query_status, 
            'message' => $query_message, 
            'status_message' => $query_status_message 
            );

        return $query_data;

    } 

    // 1. CONECTARSE AL SERVIDOR
    // $server_connection save an array with all conection server data
    $server_connection = connectToServer();
    $connection_link = $server_connection['connect_server_link'];

    // 2. SELECCIONAR UNA DB
    $db_connection = connectToDataBase('test');

    // 3. EJECUTAR UNA INSTRUCCION
    
    // seteamos el nombre de la tabla
    $table_name = 'persona_test_php';
    $select_data = mysqlInstruction($user_mysql_query, $connection_link);
?>