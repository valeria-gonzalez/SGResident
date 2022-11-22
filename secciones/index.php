<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Admin Dashboard</title>
    <link rel = "stylesheet" href = "../css/style.css">
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
         <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."nav-sin-buscar.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->

            <!--main content, aqui decides si poner las cards o el item-->
            <div class = "main-title">
                <h1 class = "wow-title">Bienvenido de vuelta</h1>
            </div>
            <!--en el index iran las cards, es decir, los cuatro botones-->
            <div class = "cardBox">
                <div class = "card"> <!--carta de agregar residente-->
                    <div>
                        <div class = "numbers">Agregar</div>
                        <div class = "cardName">Residente</div>
                    </div>
                    <div class = "iconBx">
                        <button type = "button" class = "crd-button">
                            <ion-icon name="people-outline"></ion-icon>
                        </button>
                    </div>

                </div><!--end card-->

                <div class = "card"> <!--carta de agregar domicilio-->
                    <div>
                        <div class = "numbers">Agregar</div>
                        <div class = "cardName">Domicilio</div>
                    </div>
                    <div class = "iconBx">
                        <button type = "button" class = "crd-button">
                            <ion-icon name="bed-outline"></ion-icon>
                        </button>
                    </div>
                </div><!--end card-->

                <div class = "card"> <!--carta de agregar pago-->
                    
                    <div>
                        <div class = "numbers">Agregar</div>
                        <div class = "cardName">Pago</div>
                    </div>
                    <div class = "iconBx">
                        <button type = "button" class = "crd-button">
                            <ion-icon name="card-outline"></ion-icon>
                        </button>
                    </div>
                </div><!--end card-->

                <div class = "card"> <!--carta de buscar residente-->
                    <div>
                        <div class = "numbers">Buscar</div>
                        <div class = "cardName">Residente</div>
                    </div>
                    <div class = "iconBx">
                        <button type = "button" class = "crd-button">
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </div>
                </div><!--end card-->

                <div class = "card"> <!--carta de buscar pago-->
                    <div>
                        <div class = "numbers">Buscar</div>
                        <div class = "cardName">Pago</div>
                    </div>
                    <div class = "iconBx">
                        <button type = "button" class = "crd-button">
                            <ion-icon name="search"></ion-icon>
                        </button>
                    </div>
                </div><!--end card-->

            </div> <!--end cardBox-->

        </div> <!--end main-->

    </div> <!--end container-->
    
    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
</body>
</html>