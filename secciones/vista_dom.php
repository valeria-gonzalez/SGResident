<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Domicilios</title>
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/tablas.css">
    <script src="https://kit.fontawesome.com/e35dd15ecb.js" crossorigin="anonymous"></script>
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
                <div class="table-wrapper">
                    <table class="styled-table">

                        <thead>
                            <h2>
                                <th>Calle</th>
                                <th>Número</th>
                                <th>Vialidad 1</th>
                                <th>Vialidad 2</th>
                                <th>Referencias</th>
                                <th>Titular Actual</th>
                                <th>Pagos</th>
                        </thead>

                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>San Mariano</td>
                                <td>1350</td>
                                <td>San algo</td>
                                <td>San otro</td>
                                <td>Samir</td>
                                <td><a id ="pagos" href="../configuraciones/operaciones_pago/busq_pago.php"><i class="fa-solid fa-money-bill-transfer"></i></a></td>
                            </tr>

                            <tr>
                                <th>2</th>
                                <td>San Mariano</td>
                                <td>1350</td>
                                <td>San algo</td>
                                <td>San otro</td>
                                <td>Samir</td>
                            </tr>

                            <tr>
                                <th>3</th>
                                <td>San Mariano</td>
                                <td>1350</td>
                                <td>San algo</td>
                                <td>San otro</td>
                                <td>Samir</td>
                            </tr>
                        </tbody>

                    </table>    
                </div>           
            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
</body>
</html>