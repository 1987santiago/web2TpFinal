 <?php
    session_start();
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
    // guardamos la ruta base
    $base_path = $_SESSION["base_path"];

    // se incluye el inicio del html <!doctype html>...</head>
    $_SESSION["resources"] = array(
        "css"  => array("contactForm")
    ); 
    require "$base_path$statics_path/components/head.php"; 
?>

<div class="wrapper">

    <!-- se incluye el <header> -->
    <?php require "$base_path$statics_path/components/header.php"; ?> 

    <main role="main">

        <?php require "$base_path$statics_path/components/navLateral.php"; ?>
        
        <!-- se incluye el el resultado del pago de la reserva -->
        <section id="confirmPay" class="col">

            <!-- incluimos el formulario con los datos de la reserva -->
            <?php require "$base_path$statics_path/components/dameReserva.php"; ?> 
        
        </section>   

    </main>

</div>  

<!-- se incluye el <footer> -->
<?php require "$base_path$statics_path/components/footer.php"; ?>

<script type="text/javascript">
    
    var confirmPay = document.getElementById('confirmPay'),
        form = confirmPay.querySelector('form'),
        payButton = form.querySelector('input[type=submit]');

    payButton.onclick = function(event) {

        event.preventDefault();

        var cardNumberField = form.cardNumber.value;

        console.log('cardNumberField.length: ',cardNumberField.length);
        if (cardNumberField.length === 16 && areNumbers(cardNumberField)) {
            form.submit();
        } else {
            form.cardNumber.style.backgroundColor = "red";
        }

        function areNumbers(chain) {

            var i = 0,
                allNumbers = true,
                num;

            for (i; i < chain.length; i = i+1) {
                num = chain[i];
                console.log('num', num);
                console.log('isNaN(num)', isNaN(num));
                if (isNaN(num)) {
                    allNumbers = false;
                }
            };

            return allNumbers;

        }

    };


    $(function() {
        $("#birthDay").datepicker({
            showOn: "button",
            buttonImage: "../js/components/datepicker/images/calendar.gif",
            buttonImageOnly: true,
            closeText: 'Cerrar',
            prevText: 'Ant',
            nextText: 'Sig',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie;', 'Juv', 'Vie', 'Sab'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });
    });
</script>