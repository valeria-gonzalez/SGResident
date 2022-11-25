<?php
include_once '../conexion_bd.php';
$id = $_GET["id_"];
$query_consulta = "SELECT CONCAT(NOMBRE,' ',PR_APELL,' ',SEG_APELL) AS NOMBRE, CELULAR, TEL_CASA 
                    FROM titular
                    WHERE ID_TITULAR = '$id'";
$consulta = $conexion -> query($query_consulta);

$query_meses = "SELECT CONCAT(p.MES,' ',p.FCHA_PAGO) AS MES, m.TIPO, p.ID_PAGO, m.ID_PAGO AS P
                FROM pago AS p
                INNER JOIN metodo_pago as m
                INNER JOIN titular as t
                WHERE '$id' = p.ID_TITULAR AND p.INACTIVO = '0'";
$consulta_meses = $conexion -> query($query_meses);
?>


<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Residentes</title>
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel = "stylesheet" href = "../../css/tablas.css">
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
                <h1 class = "wow-title">Detalles de residente</h1>
            </div>

            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <h2>
                                <th>Nombre</th>
                                <th>Celular</th>
                                <th>Telefono de casa</th>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($consulta) > 0){
                            $row = $consulta -> fetch_assoc()?>
                            <tr>
                                <!-- Imprimiremos con obj todo aquella columna a mostrar junto con sus 
                                datos -->
                                <td><?php echo $row["NOMBRE"];?></td>
                                <td><?php echo $row['CELULAR'];?></td>
                                <td><?php echo $row['TEL_CASA'];?></td>                      
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }
                            ?>
                                    
                        </tbody>
                    </table>
                </div>
            <br>

                <h1 class = "wow-title">Pagos</h1>
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                                <th>Meses pagados</th>
                                <th>Metodo de pago</th>
                                <th>ID</th>
                                <th>ID Pago</th>
                        </thead>

                        <tbody>
                        <?php
                        if(mysqli_num_rows($consulta_meses) > 0){
                            while($row = $consulta_meses -> fetch_assoc()){?>                        
                            <tr>
                                <td><?php echo $row["MES"];?></td>
                                <td><?php echo $row['TIPO'];?></td>  
                                <td><?php echo $row['ID_PAGO'];?></td>
                                <td><?php echo $row["P"];?></td>                       
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }
                            }
                            ?>                                    
                        </tbody>
                    </table> 
                </div> <!--end main-->
            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src="../../js/alerta_eliminar.js"></script>
</body>
</html>