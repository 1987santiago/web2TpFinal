<?php
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
       <?php 
           if (isset($_SESSION["codigoReservaIda"])) 
           {
               echo "Su codigo de reserva de ida es: " . $_SESSION["codigoReservaIda"];
               echo "</br>";
           }
           if (isset($_SESSION["codigoReservaRegreso"])) 
           {
               echo "Su codigo de reserva de regreso es: " . $_SESSION["codigoReservaRegreso"];
               echo "</br>";
           }
       ?>
       <a href="<?php echo "$server_root$statics_path"; ?>/components/datos_vuelo.php" name="finalizar">Finalizar tramite</a>
   </form>
    


