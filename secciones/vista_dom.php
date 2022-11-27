<?php
    include_once '../configuraciones/conexion_bd.php';
    //$query_consulta = "SELECT * FROM titular WHERE NOT inactivo = 1";
    $query_consulta = "SELECT 
                            c1.CALLE, c1.NO_CASA, c1.VIALIDAD_1, c1.VIALIDAD_2, c1.REFERENCIAS, 
                            CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR
                        FROM
                            domicilio c1
                        INNER JOIN titular c2 USING (ID_TITULAR)
                        GROUP BY
                            c1.CALLE, c1.NO_CASA;";

    $consulta= mysqli_query($conexion,$query_consulta);
    $cerrar_conexion = mysqli_close($conexion);
    //$consulta= $conexion -> query($query_consulta)
?>

<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Domicilios</title>
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/tablas.css">
    <script src="https://kit.fontawesome.com/e35dd15ecb.js" crossorigin="anonymous"></script>
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
                        </thead>

                        <tbody>
                            <?php
                                if($consulta){
                                    if(mysqli_num_rows($consulta) > 0){
                                        while($obj=mysqli_fetch_object($consulta)){?>
                                <tr>
                                    <td><?php echo $obj->CALLE?></td>
                                    <td><?php echo $obj->NO_CASA?></td>
                                    <td><?php echo $obj->VIALIDAD_1?></td>
                                    <td><?php echo $obj->VIALIDAD_2?></td>
                                    <td><?php echo $obj->REFERENCIAS?></td>
                                    <td><?php echo $obj->TITULAR?></td>
                                </tr>
                            <?php } } }?>
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