<?php 
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    $admin_name = $_POST['adminName'];
    $admin_pass = $_POST['adminPass'];

    // Datos mockeados    
    $valid_users['admin01'] = 'admin01';
    $valid_users['admin02'] = 'admin02';
    $valid_users['admin03'] = 'admin03';
    $valid_users['admin04'] = 'admin04';
    
    if(in_array($admin_name, $valid_users)) {

        if($valid_users[$admin_name] == $admin_pass) {
            $_SESSION['admin_logged'] = true;
            header("Location: $statics_path/sections/home.php");
        } else {
            $_SESSION['error'] = "Contraseña inválida";
            header("Location: $statics_path/sections/login.php");
        }

    } else {
        
        $_SESSION['admin_logged'] = false;
        $_SESSION['error'] = "Usuario inválido";
        header("Location: $statics_path/sections/login.php");
    
    }
    

?>