<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // require("$local_path/lib/fpdf.php");
    require_once "$local_path/lib/html2pdf_v4.03/html2pdf.class.php";
    require_once '../processors/ProccessData.php';
    
    // Obtener los arrays con los datos y guardarlos en variables para imprimirlos en el pdf
    $save_seat_data = $_SESSION['save_seat_data'];
    $reservation_data = $_SESSION['reservation_data']; 
    $datos_reserva = $_SESSION['reservation_data'];

    $proccess_datos_vuelo = new ProccessData($datos_vuelo);
    $proccess_datos_avion = new ProccessData($datos_avion);

    $content = "
        <page>
            <page_header>Skynet</page_header>
            <h1>Boarding Pass</h1>
            <h2>Datos Pasajero</h2>
            <p>Nombre: </p>
            <p>Apellido: </p>
            <p>DNI: </p>

            <h2>Datos Vuelo</h2>
            <p>Código de vuelo: " . $proccess_datos_vuelo->getValue('numero_vuelo') . "</p>
            <p>Avión: " . $proccess_datos_avion->getValue('codigo_avion') . "</p>
            <p>Asiento: $asiento</p>
            <p>Clase: </p>$local_path/components/barCode.php
            <img alt='codigo_barras' src='barCode.php' />
        </page>";

    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('exemple.pdf');


    // require("$local_path/lib/dompdf/dompdf.php");

    // ———– Texto Html almacenado en la variable $html —————–
    $html = '<html><head><title>Generando un PDF</title></head>'
    .'<body>'
    .'<p><img src=”http://peachep.files.wordpress.com/2007/10/cabecerablog2.jpg"; alt=”Cabecera Blog” /></p>'
    .'<h2>Html2Fpdf, Creando PDF “al vuelo” con PHP</h2>'
    .'<p>En este tutorial vamos a tratar de explicar como generar PDFs on line o al vuelo desde nuestras páginas escritas con PHP.</p>'
    .'<p>Para ello vamos a utilizar el proyecto html2fpdf. Este proyecto se basa fundamentalmente en la utilización de 3 clases escritas en PHP: <b>FPDF, HTML2FPDF (extensión de la clase FPDF) y PDF (site Version)</b>. Se incluye otro script complementario contenido en el archivo htmltoolkit.php.</p>'
    .'<p>Para descargar los archivos necesarios id a esta dirección sourceforge.net/projects/html2fpdf.</p>'
    .'<p>Una vez descomprimido el archivo zip descargado nos encontraremos con una lista de archivos, de los cuales, algunos de ellos no nos serán necesarios. Por ejemplo, source2doc.php, es una clase que podemos utilizar para volcar en pantalla toda la información relativa a las variables, constantes o métodos que componen una determinada clase que le sería indicada. Pero este archivo no nos resultará necesario para generar PDFs.</p>'
    .'<p>Los archivos y directorio necesarios de todos los descargados para la generación de PDFs son:'
    .'<ul>'
    .'<li>fpdf.php</li>'
    .'<li>html2fpdf.php</li>'
    .'<li>gif.php</li>'
    .'<li>htmltoolkit.php</li>'
    .'<li>incluir también el directorio o carpeta font</li>'
    .'</ul>'
    .'</p>'
    .'<p><a href=”http://peachep.wordpress.com”>peachep.wordpress.com</a></p>'
    .'</body>'
    .'</html>';
    // ———– Texto Html —————–

    // $pdf = new DOMPDF(); // Creamos una instancia de la clase HTML2FPDF

    // $pdf -> load_html($html); // Creamos una página

    // $pdf -> render();//Volcamos el HTML contenido en la variable $html para crear el contenido del PDF

    // $pdf -> stream("testDOMPFD.pdf");//Volcamos el pdf generado con nombre ‘doc.pdf’. En este caso con el parametro ‘D’ forzamos la descarga del mismo.

?>

<!-- se incluye el inicio del html <!doctype html>...</head> -->
<?php require $local_path . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
            <!-- se incluye el <header> -->
            <?php require $local_path . '/components/header.php'; ?> 

            <main id="main" role="main">

                <section>
                    
                    <h2>Check In</h2>

                    <p>###ACA VA EL BOARDING PASS IMPRIMIBLE###</p>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $local_path . '/components/footer.php'; ?> 

        <script type="text/javascript">

            (function(){
                'use strict';

                var link = document.getElementById('gotoPreviousPage');

                link.onclick = function(event) {

                    event.preventDefault;

                    window.history.back();

                };

            }());

        </script>

    </body>

</html>
