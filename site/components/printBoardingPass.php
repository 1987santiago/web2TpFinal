<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];

    // require("$local_path/lib/fpdf.php");
    require_once "$local_path/lib/html2pdf_v4.03/html2pdf.class.php";
    require_once "$local_path/processors/ProccessData.php";
    
    // Obtener los arrays con los datos y guardarlos en variables para imprimirlos en el pdf
    $save_seat_data = $_SESSION['save_seat_data'];
    $reservation_data = $_SESSION['reservation_data']; 
    $plane_data = $_SESSION['plane_data']; 
    $flight_data = $_SESSION['flight_data']; 

    include("$local_path/components/dompdf.php");

    // $content = "
    //     <page>
    //         <page_header>Skynet</page_header>
    //         <h1>Boarding Pass</h1>
    //         <h2>Datos Pasajero</h2>
    //         <p>Nombre: </p>
    //         <p>Apellido: </p>
    //         <p>DNI: " . $save_seat_data['dni'] . "</p>

    //         <h2>Datos Vuelo</h2>
    //         <p>Código de vuelo: " . $flight_data[0]['numero_vuelo'] . "</p>
    //         <p>Avión: " . $plane_data[0]['marca'] . "</p>
    //         <p>Asiento: " . $save_seat_data['id_asiento'] . "</p>
    //         <p>Clase: " . $save_seat_data['descripcion'] . "</p>
    //         <p>QR</p>
    //     </page>";

    // $html2pdf = new HTML2PDF('P','A4','es');
    // // $html2pdf->WriteHTML($content);
    // $html2pdf->writeHTML("
    //     <img src=$local_path/images/image.png>
    //     ");
    // $html2pdf->Output('boarding-pass.pdf');

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
