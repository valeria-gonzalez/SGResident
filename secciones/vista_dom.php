<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Domicilios</title>
    <link rel = "stylesheet" href = "../css/style.css">
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
         <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."nav-sin-buscar.html"); ?> 

            <div class = "main-title">
                <h1 class = "wow-title">Domicilios</h1>
            </div>

            <div class = "item" id = "tabla-res">
                <p>hola, pon lo q quieras aqui DENTRO DE UN DIV, DIOS ES UN DIV, DIV ES VIDA</p>
                
            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
</body>
</html>