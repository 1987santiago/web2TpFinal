<?php   
    $mensaje = $_GET["mensaje"];
    $anterior = $_GET["anterior"];
    
    // guardamos la url de los recursos estaticos
    $base_path = $_SESSION["base_path"];
    $statics_path = $_SESSION["statics_path"];
    // se guarda la ruta al servidor
    $server_root = $_SESSION["server_root"];
    
    $_SESSION["resources"] = array(
        "css"  => array("forms")
    );   
?>
    <form>
        <?php echo $mensaje;?>
        <a href="<?php echo $anterior;?>" name="anterior"/>Anterior</a>
    </form>
    

