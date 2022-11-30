<?php
    include_once '../configuraciones/conexion_bd.php';
    //$query_consulta = "SELECT * FROM titular WHERE NOT inactivo = 1";
    $query_res = "SELECT * FROM titular WHERE inactivo = 1";
    $consultaRes= $conexion -> query($query_res);
    
    $query_pago = "SELECT 
                        c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO, 
                         CONCAT(c1.NOM_PAGADOR, ' ', c1.PAG_APELL_1, ' ', c1.PAG_APELL_2) AS RESPONSABLE,
                        CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR, c4.TIPO
                    FROM
                        pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN metodo_pago c4 USING (ID_PAGO)
                    WHERE c1.ADEUDO = 0 AND c1.INACTIVO = 1
                    GROUP BY
                    c1.ID_PAGO;";

    $cons_pago= mysqli_query($conexion,$query_pago);

    $query_adeudo = "SELECT 
                        c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO,
                        CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                        CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO
                    FROM
                        pago c1 
                    INNER JOIN titular c2 USING (ID_TITULAR)
                    INNER JOIN domicilio c3 USING (ID_TITULAR)
                    WHERE c1.ADEUDO = 1 AND c1.INACTIVO = 1
                    GROUP BY
                    c1.ID_PAGO ;";

    $cons_ade= mysqli_query($conexion,$query_adeudo);
    $cerrar_conexion = mysqli_close($conexion);
    //$consulta= $conexion -> query($query_consulta)
?>

<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Papelera</title>
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
                <h1 class = "wow-title">Papelera</h1>
                
                <h2>Residentes eliminados</h2>
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
                                <th>Recuperar</th>
                                
                        </thead>
                        <tbody>
                        <?php
                            while($row=$consultaRes -> fetch_assoc()){?>
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
                                <td>
                                    <a href="../configuraciones/oper_papelera/recuperar_res.php?id_=<?php echo $row['ID_TITULAR']; ?> " onclick='return confirmacion_rec()'><i id = "editar" class="fa-solid fa-clock-rotate-left"></i></a>
                                </td>                                 
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php }  ?>
                        
                        </tbody>
                    </table>
                </div>
            </div> <!--end item-->

            <div class = "main-title">
                <h2>Pagos eliminados</h1>
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
                                <TH>Metodo de pago</TH>
                                <th>Recuperar</th>
                        </thead>

                        <tbody>
                            <?php
                                if($cons_pago){
                                    if(mysqli_num_rows($cons_pago) > 0){
                                        while($obj=mysqli_fetch_object($cons_pago)){?>
                                <tr>
                                    <th class="id-azul"><?php echo $obj->ID_PAGO?></th>
                                    <td><?php echo $obj->FCHA_PAGO?></td>
                                    <td><?php echo $obj->MES?></td>
                                    <td><?php echo $obj->MONTO?></td>
                                    <td><?php echo $obj->RECIBIDO?></td>
                                    <td><?php echo $obj->RESPONSABLE?></td>
                                    <td><?php echo $obj->TITULAR?></td>
                                    <td><?php echo $obj->TIPO?></td>
                                    <td>
                                        <a href="../configuraciones/oper_papelera/recuperar_pago.php?id_=<?php echo $obj->ID_PAGO; ?> " onclick='return confirmacion_rec()'><i id = "editar" class="fa-solid fa-clock-rotate-left"></i></a>
                                    </td>
                                </tr>
                            <?php } } }?>
                        </tbody>

                    </table>
                </div>    
            </div> <!--end item-->

            <div class = "main-title">
                <h2>Adeudos eliminados</h1>
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
                                <th>Titular</th>
                                <th>Domicilio</th>
                                <th>Recuperar</th>
                        </thead>

                        <tbody>
                            <?php
                                if($cons_ade){
                                    if(mysqli_num_rows($cons_ade) > 0){
                                        while($obj=mysqli_fetch_object($cons_ade)){?>
                                <tr>
                                    <th class="id-azul"><?php echo $obj->ID_PAGO?></th>
                                    <td><?php echo $obj->FCHA_PAGO?></td>
                                    <td><?php echo $obj->MES?></td>
                                    <td><?php echo $obj->MONTO?></td>
                                    <td><?php echo $obj->RECIBIDO?></td>
                                    <td><?php echo $obj->TITULAR?></td>
                                    <td><?php echo $obj->DOMICILIO?></td>
                                    
                                    <td>
                                        <a href="../configuraciones/oper_papelera/recuperar_pago.php?id_=<?php echo $obj->ID_PAGO; ?> " onclick='return confirmacion_rec()'><i id = "editar" class="fa-solid fa-clock-rotate-left"></i></a>
                                    </td>
                                    
                                </tr>
                            <?php } } }?>
                        </tbody>
                        
                    </table>
                </div>               
            </div> <!--end item-->

            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src = "../js/alerta_eliminar.js"></script>
</body>
</html>