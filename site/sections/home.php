<?php
    // guardamos la nueva ruta base del site
    $SITE_PATH = "/Applications/XAMPP/htdocs/unlam/web2/tpFinal/web2TpFinal/site";
    // guardamos la url de los recursos estaticos
    $static_url = "/unlam/web2/tpFinal/web2TpFinal/site";
?>

<!doctype html>
<html>

    <!-- se incluye el <head> -->
    <?php require $SITE_PATH . '/components/head.php'; ?>
    
    <body>

        <div class="wrapper">
    
        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/header.php'; ?> 

            <main id="main" role="main">

                <section id="home">

                    Home
                    <button id="but">load.php</button>

                </section>

            </main><!-- [end] main -->

        </div><!-- [end] wrapper -->

        <!-- se incluye el <header> -->
        <?php require $SITE_PATH . '/components/footer.php'; ?> 

        <script type="text/javascript">

            $('#but').on('click', function(){
                $('#home').load('/unlam/web2/tpFinal/web2TpFinal/site/components/load.php #content', {caca: 'fea'}, function(res){
                    console.log('load.php has loaded');
                });
            });

        </script>

    </body>

</html>
