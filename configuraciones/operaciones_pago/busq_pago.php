<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Pagos</title>
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel = "stylesheet" href = "../../css/tablas_opc.css">
    <script src="https://kit.fontawesome.com/e35dd15ecb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
        <!---main-->
        <div class = "main">
            <!--aqui buscar-->

            <div class = "main-title">
                <h1 class = "wow-title">Coincidencias de pago</h1>
            </div>

            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">

                        <thead>
                            <h2>
                                <th class = "id-azul">Id</th>
                                <th>Fecha de registro</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Cantidad recibida</th>
                                <th>Responsable</th>
                                <th>Opciones</th>
                        </thead>

                        <tbody>
                            <tr>
                                <th class = "id-azul">1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                                <td class ="iconos-borde">
                                    <div class = "iconos">
                                        <figcaption>Editar</figcaption>
                                        <a href=""><i id = "editar" class="fa-solid fa-square-pen"></i></a>
                                        <figcaption>Eliminar</figcaption>
                                        <a href=""><i id = "eliminar" class="fa-solid fa-user-slash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                                <td>320</td>
                                <td>Samir</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class = "main-title">
                <h1 class = "wow-title">Adeudos</h1>
            </div>
            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <h2>
                                <th class = "id-azul">Id</th>
                                <th>Fecha de registro</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                        </thead>

                        <tbody>
                            <tr>
                                <th class = "id-azul">1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
                            </tr>

                            <tr>
                                <th>1</th>
                                <td>19/11/2022</td>
                                <td>Noviembre</td>
                                <td>320</td>
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