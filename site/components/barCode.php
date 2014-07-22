<?php 
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    require_once "$statics_path/lib/barcode.inc.php"; 

    // Código barras 
    $code_number = '1234567890';
    $bar_code = new barCodeGenrator($code_number,0,'barCode.gif'); 
?>