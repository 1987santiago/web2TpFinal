<?php
    session_start();
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda el path del servidor
    $server_root = $_SESSION["server_root"];
  
    // se guarda el nombre del pdf
    $_SESSION["pdf"] = "asientos_ocupados.pdf";
    
    $_SESSION["resources"] = array(
        "css"  => array("forms"),
    );
 
    $html = "<form method='post' action='$server_root$statics_path/components/imprimir_asientos_ocupados.php'>
                <div>
                    <img src = 'asientos_ocupados.php' alt='asientos ocupados'>
                </div>
                <div>
                    <input type='submit' name='imprimir' value='Imprimir informe'/>
                </div>
            </form>";
              
    echo $html;
?>
  