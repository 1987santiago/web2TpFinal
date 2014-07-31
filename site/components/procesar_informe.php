<?php
    session_start();
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    $server_root = $_SESSION["server_root"];
    
    $fechaInicial = $_POST["fechaInicial"];
    $fechaFinal = $_POST["fechaFinal"];
    $destino = $_POST["destino"];
    $informe = $_POST["informe"];
    
    $_SESSION["fechaInicial"] = $fechaInicial;
    $_SESSION["fechaFinal"] = $fechaFinal;
    $_SESSION["destino"] = $destino;
    $_SESSION["informe"] = $informe;
    
    switch ($informe) {
        case 1: 
                header("Location: " . "$server_root$statics_path/components/mostrar_pasajes_vendidos.php");
                break;

        case 2: 
                header("Location: " . "$server_root$statics_path/components/mostrar_pasajes_vendidos_categoria.php");
                break;
            
        case 3: 
                header("Location: " . "$server_root$statics_path/components/mostrar_asientos_ocupados.php");
                break;
        
        case 4: 
                header("Location: " . "$server_root$statics_path/components/mostrar_reservas_caidas.php");
                break;
    }
?>  