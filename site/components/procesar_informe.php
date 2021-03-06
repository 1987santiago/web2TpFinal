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
                // se guarda el nombre del pdf
                $_SESSION["pdf"] = "pasajes_vendidos.pdf";
                $_SESSION["php"] = "pasajes_vendidos.php";
                header("Location: " . "$server_root$statics_path/components/mostrar_informe.php");
                break;

        case 2: 
                $_SESSION["pdf"] = "pasajes_vendidos_categoria.pdf";
                $_SESSION["php"] = "pasajes_vendidos_categoria.php";
                header("Location: " . "$server_root$statics_path/components/mostrar_informe.php");
                break;
            
        case 3: 
                $_SESSION["pdf"] = "asientos_ocupados.pdf";
                $_SESSION["php"] = "asientos_ocupados.php";
                header("Location: " . "$server_root$statics_path/components/mostrar_informe.php");
                break;
        
        case 4: 
                $_SESSION["pdf"] = "reservas_caidas.pdf";
                $_SESSION["php"] = "reservas_caidas.php";
                header("Location: " . "$server_root$statics_path/components/mostrar_informe.php");
                break;
    }
?>  