<?php 

    function getCssResources($files) {

        foreach ($files as $index => $name) {
            $statics_path = $_SESSION["statics_path"];
            echo "<link href='$statics_path/css/$name.css' type='text/css' rel='stylesheet'>";
        }

    }

    function getJsResources($files) {

        foreach ($files as $index => $name) {
            $statics_path = $_SESSION["statics_path"];
            echo "<script type='text/javascript' src='$statics_path/js/$name.js'></script>";
        }

    }

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie6" lang="en"> <![endif]-->
<!--[if IE 7]>  <html class="no-js  lt-ie10 lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie10 lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]>  <html class="no-js lt-ie10 ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->  <!--<![endif]-->
<html class="no-js" lang="es">
    <head>

        <title>Sistema de reservas</title>
        <meta name="author" content="Godoy Lorena, Santucho Walter, Marchioni Santiago">
        <meta charset="ISO-8859-15">
        
        <!-- CSS -->
        <link href="<?php echo $statics_path; ?>/css/reset.css" type="text/css" rel="stylesheet">
        <link href="<?php echo $statics_path; ?>/css/global.css" type="text/css" rel="stylesheet">
        <link href="<?php echo $statics_path; ?>/css/jquery-ui.css" type="text/css" rel="stylesheet"/>
                    
        <?php 
            // Si se envian datos de los recursos que se necesitan cargar especialmente para 
            // un componente o seccion, 
            if (isset($_SESSION["resources"])) {
                // obtenemos dichos recursos
                $_resources = $_SESSION["resources"];
                // los iteramos e imprimimos para descargarlos
                foreach ($_resources as $key => $value) {
                    if ($key == "css") {
                        getCssResources($value);
                    } else if ($key == "js") {
                        getJsResources($value);
                    }
                }

            }
        ?>

        <!--[if lt IE 9]>
            <script src="<?php echo $statics_path; ?>/js/html5shiv.js"></script>
        <![endif]-->

        <!-- JS -->
        <script type="text/javascript" src="<?php echo $statics_path; ?>/js/lib/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo $statics_path; ?>/js/lib/jquery.ui.core.js"></script>
        <script type="text/javascript" src="<?php echo $statics_path; ?>/js/lib/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="<?php echo $statics_path; ?>/js/lib/jquery.ui.datepicker-es.js"></script>

        <!-- Seteamos variables globales -->
        <script type="text/javascript">
            var STATICS_PATH = '<?php echo $_SESSION["statics_path"]; ?>';
        </script>

    </head>

<?php 
    // Limpiamos el contenido de resources para evitar que se llamen los mismo archivos varias veces
    $_SESSION["resources"] = null;
?>

