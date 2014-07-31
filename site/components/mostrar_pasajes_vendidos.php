<?php
    session_start();
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda el path del servidor
    $server_root = $_SESSION["server_root"];
   
    // se guarda el nombre del pdf
    $_SESSION["pdf"] = "pasajes_vendidos.pdf";
    
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
    );
 
    $html = "<form method='post' action='$server_root$statics_path/components/imprimir_pasajes_vendidos.php'>
                <div>
                    <img src = 'pasajes_vendidos.php' alt='pasajes vendidos'>
                </div>
                <div>
                    <input type='submit' name='imprimir' value='Imprimir informe'/>
                </div>
            </form>";
              
    echo $html;
?>

   
 