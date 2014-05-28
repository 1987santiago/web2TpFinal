<?php 

    include 'ConnectToServer.php';

    // 1. CONECTARSE AL SERVIDOR
    $server_name = $_POST['serverName'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Instanciamos una conexión al Server
    $connectToLocalhostServer = new ConnectToServer($server_name, $user, $pass);
    // Conectamos
    $connectToLocalhostServer->connect();
    // guardamos la respuesta del server 
    $localhost_connection_link = $connectToLocalhostServer->getConnectionLink();
    // Imprimimos la respuesta del server 
    echo '$localhost_connection_link : ' . $localhost_connection_link;

?>