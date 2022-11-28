<?php
include_once '../configuraciones/conexion_bd.php';
$query_consulta = "SELECT * FROM titular WHERE NOT inactivo = 1";
$consulta= $conexion -> query($query_consulta)
?>

<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Residentes</title>
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/tablas.css">
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
        <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."nav-buscar-res.html"); ?> 

            <div class = "main-title">
                <h1 class = "wow-title">Residentes</h1>
            </div>

            <div class = "item">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <h2>
                                <th class = "id-azul">Id</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Celular</th>
                                <th>Telefono de casa</th>
                                
                        </thead>
                        <tbody>
                        <?php
                            while($row=$consulta -> fetch_assoc()){?>
                            <tr>
                                <!-- Imprimiremos con obj todo aquella columna a mostrar junto con sus 
                                datos -->
                                <th class="id-azul"><?php echo $row['ID_TITULAR'];?></th>
                                <td><?php echo $row['NOMBRE'];?></td>
                                <td><?php echo $row['PR_APELL'];?></td>
                                <td><?php echo $row['SEG_APELL'];?></td>
                                <td><?php echo $row['SEXO'];?></td>
                                <td><?php echo $row['EDAD'];?></td>
                                <td><?php echo $row['CELULAR'];?></td>
                                <td><?php echo $row['TEL_CASA'];?></td>                            
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }  ?>
                        
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