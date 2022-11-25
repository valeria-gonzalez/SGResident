<?php
include_once '../conexion_bd.php';
$id = $_GET["id_"];
$query_consulta = "SELECT CONCAT(t.NOMBRE,' ',t.PR_APELL,' ',t.SEG_APELL) AS NOMBRE, t.CELULAR, t.TEL_CASA, CONCAT(p.MES,' ',p.FCHA_PAGO) AS MESES_P, m.TIPO 
                    FROM titular AS t 
                    INNER JOIN pago p USING (ID_TITULAR)
                    INNER JOIN metodo_pago m USING (ID_PAGO)
                    WHERE t.ID_TITULAR = '$id' AND p.INACTIVO = '0'";
$consulta = $conexion -> query($query_consulta);


?>


<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Residentes</title>
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
                            $row=$consulta -> fetch_assoc()?>
                        
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

            <br>
            <div class = "main-title">
                <h1 class = "wow-title">Pagos</h1>
            </div>

            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <h2>
                                <th>Meses pagados</th>
                                <th>Metodo de pago</th>
                        </thead>
                        <tbody>
                        <?php
                        if(mysqli_num_rows($consulta) > 0){
                            while($row=$consulta -> fetch_assoc()){?>
                        
                            <tr>
                                <td><?php echo $row["MESES_P"];?></td>
                                <td><?php echo $row['TIPO'];?></td>                       
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