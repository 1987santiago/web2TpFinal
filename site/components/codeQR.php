<?php 
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    require_once "$local_path/lib/phpqrcode/phpqrcode.php";

    $code = QRcode::png('SKINET: test de código QR', 'code-reservation.png');

?>