<?php 

    include 'selectDataBase.php';
    
    // 2. SELECCIONAR UNA DB
    $db_name = $_POST['dbName'];
    
    // instanciamos un selector de base de datos
    $selectTestDataBase = new selectDataBase($db_name);
    // seleccionamos la base
    $selectTestDataBase->select();
    // guardamos el estado de la seleccion (TRUE/FALSE)
    $testDB_selection_status = $selectTestDataBase->getSelectionStatus();
    $testDB_selection_status_msg = ($testDB_selection_status? 'Seleccionada con éxito' : 'Error en la conexión');
    // imprimimos el estado
    // echo $db_name . ' : ' . $testDB_selection_status_msg;
    var_dump($testDB_selection_status);

?>