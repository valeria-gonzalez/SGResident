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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel = "stylesheet" href = "../../css/tablas_opc.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <script src="https://kit.fontawesome.com/e35dd15ecb.js" crossorigin="anonymous"></script>
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
</head>
<body>
    <?php
        if(mysqli_num_rows($consulta_pago) > 0 || mysqli_num_rows($consulta_adeudo) > 0){
    ?>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav index.html"); ?> 
        <!---main-->
        <div class = "main">
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/"; include($IPATH . "nav-sin-buscar index.html"); ?>
            <!--aqui buscar-->
            <?php if(mysqli_num_rows($consulta_pago) > 0){ ?>
                <div class = "main-title">
                <h1 class = "wow-title" id="index">Coincidencias de pago</h1>
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
                                        <button id = "res" class = "editar" type="button" data-bs-toggle="modal" data-bs-target="#editar-pago">
                                                <i id = "editar" class="fa-solid fa-square-pen"></i>
                                        </button>
                                        <figcaption>Eliminar</figcaption>
                                        <a href="eliminar_pago.php?id_=<?php echo $row['ID_PAGO']; ?>" onclick='return confirmacion()'>
                                        <i id="eliminar" class="fa-solid fa-eraser"></i>
                                        </a>
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
                                <td><?php echo $row["TITULAR"];?></td>
                                <td><?php echo $row["DOMICILIO"];?></td> 
                                <td class ="iconos-borde">
                                    <div class = "iconos">
                                        <figcaption>Editar</figcaption>
                                        <button id = "res" class = "editar" type="button" data-bs-toggle="modal" data-bs-target="#editar-pago">
                                                <i id = "editar" class="fa-solid fa-square-pen"></i>
                                        </button>
                                        <figcaption>Eliminar</figcaption>
                                        <a href="eliminar_pago.php?id_=<?php echo $row['ID_PAGO']; ?>" onclick='return confirmacion()'><i id = "eliminar" class="fa-solid fa-user-slash"></i></a>
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


     <!-- -----------------------------------------------Aqui es para editar un pago--------------------------------------------------------------->
     <div class="modal fade" id="editar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <div class="h1-modal">
                        <label>Agregar pago</label>
                    </div>
                    <!--end h1-modal-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-header" id="indicacion">
                    <label>Llena los campos del formulario para agregar un pago o adeudo</label>
                </div>
                <!--end modal-header-->

                <div class="modal-body">
                    <form action="../configuraciones/operaciones_pago/agregar_pago.php" method="POST" class="row g-3 needs-validation was-validated">
                        <!-- Aqui esta el select para el titular -->
                        <div class="col-md-9">
                            <label for="adeudo" class="form-label">¿Está ingresando un adeudo?</label>
                            <SELECT required class="form-select" name="esAdeudo" onchange="if(this.value=='No') {document.getElementById('nombre_pagador').disabled = false , document.getElementById('apellido_1_pagador').disabled = false , document.getElementById('apellido_2_pagador').disabled = false, 
                                                                                                                document.getElementById('forma_pago').disabled = false} else 
                                                                                                                {document.getElementById('nombre_pagador').disabled = true , document.getElementById('apellido_1_pagador').disabled = true , document.getElementById('apellido_2_pagador').disabled = true, 
                                                                                                                document.getElementById('forma_pago').disabled = true} ;">
                                <option selected="" disabled="" value="">Responder (Sí/No)...</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="id_titular" class="form-label">Nombre del titular</label>
                            <select class="form-select" name="selTitular" id="id_titular" required="">
                                <option selected="" disabled="" value="">Escoger titular...</option>
                                <?php
                                $rsM = mysqli_query($conexion, "SELECT * FROM titular WHERE INACTIVO = 0");
                                //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                while ($titular = mysqli_fetch_array($rsM)) {
                                    echo "<option value = '$titular[0]'> $titular[1] $titular[2] $titular[3]  </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!-- -->

                        <div class="col-md-6">
                            <label for="domiciliopago" class="form-label">Domicilio </label>
                            <div class="input-group has-validation">
                                <select name="selDomPago" class="form-select" id="domiciliopago" required="">
                                    <option selected="" disabled="" value="">Escoger domicilio...</option>
                                    <?php
                                    $rsM = mysqli_query($conexion, "SELECT * FROM domicilio WHERE ID_TITULAR IS NOT NULL");
                                    //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                    while ($domicilio = mysqli_fetch_array($rsM)) {
                                        echo "<option value = '$domicilio[0]+$domicilio[1]'> $domicilio[0] $domicilio[1] </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Selecciona el domicilio del residente
                                </div>
                            </div>

                        </div>

                        <div class="modal-header" id="indicacion2">
                            <label>Ingrese la información del responsable del pago</label>
                        </div>
                        <!--end modal-header-->

                        <div class="col-md-4">
                            <label for="nombre_pagador" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre_pagador" required name="txtResponsable" autocomplete="off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_1_pagador" class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" id="apellido_1_pagador" required="" name="txtApell1Res" autocomplete="off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="apellido_2_pagador" class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" id="apellido_2_pagador" required="" name="txtApell2Res" autocomplete="off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div>

                        <div class="modal-header" id="indicacion2">
                            <label>Ingrese la información referente al pago</label>
                        </div>
                        <!--end modal-header-->

                        <div class="col-md-4">
                            <label for="concepto" class="form-label">Concepto</label>
                            <select class="form-select" id="id_titular" required="" name="selMes">
                                <option selected="" disabled="" value="">Elija un mes...</option>
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Diciembre</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="monto" class="form-label">Monto a pagar</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name="txtMonto" autocomplete="off" type="number" step="0.01" value="320" class="form-control is-invalid" id="monto" aria-describedby="inputGroupPrepend3 montoFeedback" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="recibido" class="form-label">Monto recibido</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name="txtRecibido" autocomplete="off" type="number" step="0.01" value="320" class="form-control is-invalid" id="recibido" aria-describedby="inputGroupPrepend3 montoFeedback" required="">
                            </div>
                        </div>


                        <div class="modal-header" id="indicacion2">
                            <label>Elija un método de pago</label>
                        </div>
                        <!--end modal-header-->

                        <!--Select para la forma de pago-->
                        <div class="col-md-5">
                            <label for="forma_pago" class="form-label">Método de pago</label>
                            <SELECT id="forma_pago" disabled class="form-select" name="formaPago" onchange="if(this.value=='Tarjeta') {document.getElementById('num_tarjeta').disabled = false , document.getElementById('fecha_exp').disabled = false , document.getElementById('cvv').disabled = false} else 
                                                                                              {document.getElementById('num_tarjeta').disabled = true , document.getElementById('fecha_exp').disabled = true , document.getElementById('cvv').disabled = true} ;
                                                         if(this.value=='Cheque')  {document.getElementById('num_cheque').disabled = false } else 
                                                         {document.getElementById('num_cheque').disabled = true } 
                                                         if(this.value=='Transferencia')  {document.getElementById('clave_transferencia').disabled = false } else 
                                                         {document.getElementById('clave_transferencia').disabled = true }">
                                <option selected="" disabled="" value="">Escoger un método...</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Efectivo">Efectivo</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="num_cheque" class="form-label">Número de Cheque</label>
                            <input class="form-control" type="text" id="num_cheque" name="txtNoCheque" autocomplete="off" disabled>
                        </div>

                        <div class="col-md-9">
                            <label for="num_tarjeta" class="form-label">Número de tarjeta</label>
                            <input class="form-control" type="text" id="num_tarjeta" name="txNoTarjeta" disabled autocomplete="off">
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_exp" class="form-label">Fecha de expiracion (MM/AA)</label>
                            <input class="form-control" type="text" id="fecha_exp" name="txtFechaExp" disabled autocomplete="off">
                        </div>

                        <div class="col-md-4">
                            <label for="cvv" class="form-label">CVV</label>
                            <input class="form-control" type="text" id="cvv" name="txtCVV" disabled autocomplete="off">
                        </div>

                        <div class="col-md-9">
                            <label for="clave_transferencia" class="form-label">Clave transferencia</label>
                            <input class="form-control" type="text" id="clave_transferencia" name="txtClaveTrans" disabled autocomplete="off">
                        </div>
                        <!-- -->



                        <div class="modal-footer">


                            <button name="btn-agr-pago" class="btn btn-primary" type="submit">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src="../../js/alerta_eliminar.js"></script>
</body>
</html>