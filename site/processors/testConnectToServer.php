<?php 

    require_once 'Database.php';

    // Establecemos una conexión con el servidor
    $connect = new Database();

    // 1. CONECTARSE AL SERVIDOR
    $server_name = $_POST['serverName'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Imprimimos la respuesta del server 
    echo 'Server response : ' . $$connect->getConnectionInfo();

?>