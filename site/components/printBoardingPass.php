<?php
    session_start();
    // guardamos la nueva ruta base del site
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
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
