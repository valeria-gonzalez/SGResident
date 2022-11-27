<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Ayuda</title>
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
         <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."nav-sin-buscar.html"); ?> 

            <div class = "item" id = "ayuda">
                <h2>Frequently Asked Questions (FAQs)</h2>
                <h3>En esta sección se encuentran las preguntas más frecuentes que se hacen los usuarios sobre el sistema.</h3>
                
                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Qué es SG Resident?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>SG Resident es un sistema de gestión de residentes, que permite llevar un control de los mismos, así como de los pagos que realizan.</p>
                </div> <!--end panel-->

                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Cómo lo debo usar?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>El objetivo del sistema es que puedas ingresar un residente junto con su domicilio, para así en ocasiones posteriores, 
                        ingresar los pagos mensuales que haga para darles seguimiento. Puedes buscar a un residente por su nombre completo
                        y también buscar los pagos que corresponden a un domicilio en particular.  </p>
                </div> <!--end panel-->

                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Cómo ingreso datos?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>En el panel de inicio existen 3 botones que permiten ingresar un residente junto a su domicilio, un domicilio solo, o un pago. 
                        Dale clic a los iconos y llena los campos que se te piden. Dale registrar y listo. 
                    </p>
                </div> <!--end panel-->

                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Cómo busco datos?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>En el panel de inicio existen 2 botones que permiten buscar a un residente o los pagos de un domicilio. Dales clic y te llevarán al
                        panel de residente o pagos, y podras ingresar el nombre completo del residente o el domicilio que buscas, en el navegador.
                    </p>
                </div> <!--end panel-->

                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Cómo veo los pagos?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>Puedes buscar un pago en particular llendo al panel de pagos y buscar en el navegador, o tener una vista de todos los pagos y adeudos
                        en las tablas dinámicas que ofrecemos.
                    </p>
                </div> <!--end panel-->

                <div class = "accordion">
                    <ion-icon name="add-circle"></ion-icon>
                    <h5>¿Cómo veo los residentes?</h5>
                </div> <!--end accordion-->
                <div class = "panel">
                    <p>Puedes buscar un residente en particular llendo al panel de residentes y buscar en el navegador, o tener una vista de todos los residentes
                        en las tablas dinámicas que ofrecemos.</p>
                </div> <!--end panel-->
                
            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>
    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
</body>
</html>