<?php
include_once '../conexion_bd.php';
$calle = $_POST["buscar_calle"];
$numero = $_POST["buscar_no"];
$query_pago = "SELECT 
                    c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO, 
                    CONCAT(c1.NOM_PAGADOR, ' ', c1.PAG_APELL_1, ' ', c1.PAG_APELL_2) AS RESPONSABLE,
                    CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                    CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO
                    FROM
                    pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN domicilio c3 USING (ID_TITULAR)
                    WHERE c3.CALLE = '$calle' AND c3.NO_CASA = '$numero' AND c1.ADEUDO = 0 AND c1.INACTIVO = 0
                    GROUP BY
                    c1.ID_PAGO";
$consulta_pago = $conexion -> query($query_pago);

$query_adeudo = "SELECT 
                        c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, 
                        CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                        CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO
                    FROM
                        pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN domicilio c3 USING (ID_TITULAR)
                    WHERE c3.CALLE = '$calle' AND c3.NO_CASA = '$numero' AND c1.ADEUDO = 1
                    GROUP BY
                    c1.ID_PAGO";

$consulta_adeudo = $conexion -> query($query_adeudo);
$cerrar_conexion = mysqli_close($conexion);
//$consulta= $conexion -> query($query_consulta)
?>

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
    <?php
        if($consulta_pago || $consulta_adeudo){
    ?>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
        <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            <?php if(mysqli_num_rows($consulta_pago) > 0){ ?>
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
                                <th>Titular</th>
                                <th>Domicilio</th>
                                <th>Opciones</th>
                        </thead>

                        <tbody>
                            <?php
                            while($row=$consulta_pago -> fetch_assoc()){?>
                            <tr>
                                <!-- Imprimiremos con obj todo aquella columna a mostrar junto con sus 
                                datos -->
                                <th class="id-azul"><?php echo $row['ID_PAGO'];?></th>
                                <td><?php echo $row['FCHA_PAGO'];?></td>
                                <td><?php echo $row['MES'];?></td>
                                <td><?php echo $row['MONTO'];?></td>
                                <td><?php echo $row['RECIBIDO'];?></td>
                                <td><?php echo $row["RESPONSABLE"];?></td>
                                <td><?php echo $row["TITULAR"];?></td>
                                <td><?php echo $row["DOMICILIO"];?></td>
                                <td class ="iconos-borde">
                                    <div class = "iconos">
                                        <figcaption>Editar</figcaption>
                                        <a href=""><i id = "editar" class="fa-solid fa-square-pen"></i></a>
                                        <figcaption>Eliminar</figcaption>
                                        <a href="eliminar_pago.php?id_=<?php echo $row['ID_PAGO']; ?>" onclick='return confirmacion()'><i id = "eliminar" class="fa-solid fa-user-slash"></i></a>
                                    </div>
                                </td>
                            
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }?>
                        </tbody>

                    </table>
                </div>
            </div>
                        <?php } if(mysqli_num_rows($consulta_adeudo) > 0){?>
            <div class = "main-title">
                <h1 class = "wow-title">Adeudos</h1>
            </div>
            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                                <th class = "id-azul">Id</th>
                                <th>Fecha de registro</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Titular</th>
                                <th>Domicilio</th>
                        </thead>

                        <tbody>
                        <?php
                        
                            while($row=$consulta_adeudo -> fetch_assoc()){?>
                            <tr>
                                <!-- Imprimiremos con obj todo aquella columna a mostrar junto con sus 
                                datos -->
                                <th class="id-azul"><?php echo $row['ID_PAGO'];?></th>
                                <td><?php echo $row['FCHA_PAGO'];?></td>
                                <td><?php echo $row['MES'];?></td>
                                <td><?php echo $row['MONTO'];?></td>
                                <td><?php echo $row["TITULAR"];?></td>
                                <td><?php echo $row["DOMICILIO"];?></td>                           
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }} ?>
                        </tbody>
                        
                    </table>
                </div>               
            </div> <!--end item-->
        </div> <!--end main-->
        <?php }else{
                                
                                echo "<script>
                                alert('No hay coincidencias');
                                history.back();
                                </script>";

                        }?>
    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src="../../js/alerta_eliminar.js"></script>
</body>
</html>