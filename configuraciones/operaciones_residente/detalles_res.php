<?php
include_once '../conexion_bd.php';
$id = $_GET["id_"];
$query_consulta = "SELECT * FROM titular WHERE id_titular = '$id' AND inactivo = '0'";
$consulta = $conexion -> query($query_consulta);

$query_meses = "SELECT *, m.TIPO
                FROM pago AS p
                JOIN metodo_pago as m ON p.ID_PAGO = m.ID_PAGO
                JOIN titular as t ON p.ID_TITULAR = '$id'
                WHERE p.INACTIVO = '0'
                GROUP BY p.ID_PAGO";
$consulta_meses = $conexion -> query($query_meses);

$query_adeudos = "SELECT *
                FROM pago AS p
                JOIN titular as t ON p.ID_TITULAR = '$id'
                WHERE p.ADEUDO = '1'
                GROUP BY p.MES";
$consulta_adeudos = $conexion -> query($query_adeudos);
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
                        if(mysqli_num_rows($consulta) > 0){
                            $row = $consulta -> fetch_assoc()?>
                            <tr>
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
                                <th class = "id-azul">ID</th>
                                <th>Fecha de pago</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Cantidad recibida</th>
                                <th>Metodo</th>
                        </thead>

                        <tbody>
                        <?php
                        if(mysqli_num_rows($consulta_meses) > 0){
                            while($row = $consulta_meses -> fetch_assoc()){?>                        
                            <tr>
                                <th class="id-azul"><?php echo $row['ID_PAGO'];?></th>
                                <td><?php echo $row['FCHA_PAGO'];?></td>
                                <td><?php echo $row['MES'];?></td>
                                <td><?php echo $row['MONTO'];?></td>
                                <td><?php echo $row['RECIBIDO'];?></td>
                                <td><?php echo $row['TIPO'];?></td>                     
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }
                            }
                            ?>                                    
                        </tbody>
                    </table>
                    
                        <br>

                        <h1 class = "wow-title">Adeudos</h1>                    
                    <div class="table-wrapper">
                        <table class="styled-table">
                            <thead>
                            <th class = "id-azul">ID</th>
                                <th>Fecha de registro</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                            </thead>

                            <tbody>
                            <?php
                            if(mysqli_num_rows($consulta_adeudos) > 0){
                                while($row = $consulta_adeudos -> fetch_assoc()){?>                        
                                <tr>
                                    <th class="id-azul"><?php echo $row['ID_PAGO'];?></th>
                                    <td><?php echo $row['FCHA_PAGO'];?></td>
                                    <td><?php echo $row['MES'];?></td>
                                    <td><?php echo $row['MONTO'];?></td>                      
                                </tr>
                                <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                    abiertas-->
                                <?php }
                                }
                                ?>                                    
                            </tbody>
                        </table> 
                    </div>
                </div> <!--end item-->
            </div> <!--end main-->
        </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src="../../js/alerta_eliminar.js"></script>
</body>
</html>