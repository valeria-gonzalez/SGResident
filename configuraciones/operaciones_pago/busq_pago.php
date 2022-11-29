<?php
include_once '../conexion_bd.php';
$calle = $_POST["buscar_calle"];
$numero = $_POST["buscar_no"];
$query_pago = "SELECT 
                    c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO, 
                    CONCAT(c1.NOM_PAGADOR, ' ', c1.PAG_APELL_1, ' ', c1.PAG_APELL_2) AS RESPONSABLE,
                    CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                    CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO, c4.TIPO
                    FROM
                    pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN domicilio c3 USING (ID_TITULAR)
                    INNER JOIN metodo_pago c4 USING (ID_PAGO)
                    WHERE c3.CALLE = '$calle' AND c3.NO_CASA = '$numero' AND c1.ADEUDO = 0 AND c1.INACTIVO = 0
                    GROUP BY
                    c1.ID_PAGO";
$consulta_pago = $conexion -> query($query_pago);

$query_adeudo = "SELECT 
                        c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO,
                        CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                        CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO
                    FROM
                        pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN domicilio c3 USING (ID_TITULAR)
                    WHERE c3.CALLE = '$calle' AND c3.NO_CASA = '$numero' AND c1.ADEUDO = 1 AND c1.INACTIVO = 0
                    GROUP BY
                    c1.ID_PAGO";

$consulta_adeudo = $conexion -> query($query_adeudo);
//$cerrar_conexion = mysqli_close($conexion);
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
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
</head>
<body>
    <?php
        if(mysqli_num_rows($consulta_pago) > 0 || mysqli_num_rows($consulta_adeudo) > 0){
    ?>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
        <!---main-->
        <div class = "main">
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/"; include($IPATH . "nav-sin-buscar.html"); ?>
            <!--aqui buscar-->
            <?php if(mysqli_num_rows($consulta_pago) > 0){ ?>
                <div class = "main-title">
                <h1 class = "wow-title" id="index">Coincidencias de pago</h1>
            </div>

            <div class = "item">
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
                                <th>Metodo de pago</th>
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
                                <td><?php echo $row["TIPO"];?></td>
                                <td class ="iconos-borde">
                                <div class="desplegable">
                                <button class="boton-des"><i class="fa-sharp fa-solid fa-caret-down"></i></button>
                                    <div class="opciones">
                                        <div class = "iconos">
                                            <figcaption class="texto">Editar</figcaption>
                                            <a href="mod_pago.php?id_=<?php echo $row['ID_PAGO']; ?> ">
                                                <i id = "editar" class="fa-solid fa-square-pen"></i>
                                            </a>
                                            
                                            <figcaption class="texto">Eliminar</figcaption>
                                            <a href="eliminar_pago.php?id_=<?php echo $row['ID_PAGO']; ?>" onclick='return confirmacion()'>
                                                <i id = "eliminar" class="fa-solid fa-user-slash"></i></a>

                                            <figcaption class="texto">Recibo</figcaption>
                                            <a target = "blank" href="../../secciones/recibo_id.php?id_=<?php echo $row['ID_PAGO']; ?>">
                                                <i class="fa-solid fa-receipt" id="editar"></i>
                                            </a>
                                        </div>
                                    </div>
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
                <h1 class = "wow-title" id="index">Coincidencias de adeudos</h1>
            </div>
            <div class = "item">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                                <th class = "id-azul">Id</th>
                                <th>Fecha de registro</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Cantidad recibida</th>
                                <th>Titular</th>
                                <th>Domicilio</th>
                                <th>Opciones</th>
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
                                <td><?php echo $row['RECIBIDO'];?></td>
                                <td><?php echo $row["TITULAR"];?></td>
                                <td><?php echo $row["DOMICILIO"];?></td> 
                                <td class ="iconos-borde">
                                <div class="desplegable">
                                    <button class="boton-des"><i class="fa-sharp fa-solid fa-caret-down"></i></button>
                                        <div class="opciones">
                                            <div class = "iconos">
                                                <figcaption class="texto">Editar</figcaption>
                                                <a href="mod_pago.php?id_=<?php echo $row['ID_PAGO']; ?> "><i id = "editar" class="fa-solid fa-square-pen"></i></a>
                                                
                                                <figcaption class="texto">Eliminar</figcaption>
                                                <a href="eliminar_pago.php?id_=<?php echo $row['ID_PAGO']; ?>" onclick='return confirmacion()'><i id = "eliminar" class="fa-solid fa-user-slash"></i></a>

                                                <figcaption class="texto">Recibo</figcaption>
                                                    <a target = "blank" href="../../secciones/recibo_id.php?id_=<?php echo $row['ID_PAGO']; ?>">
                                                        <i class="fa-solid fa-receipt" id="editar"></i>
                                                    </a>
                                            </div>
                                        </div>
                                </div>
                                </td>                          
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