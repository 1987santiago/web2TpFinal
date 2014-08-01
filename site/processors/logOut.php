<?php 
    session_start(); 
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    $cook = $_SESSION['admin_logged'];

    $_SESSION['admin_logged'] = false;

    header("Location: $statics_path/sections/home.php");

?>