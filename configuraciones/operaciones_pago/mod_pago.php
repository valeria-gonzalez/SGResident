<?php 
    include_once '../conexion_bd.php';
    include_once 'datos_mod_pago.php';

    $id = $_GET['id_'];
    $rsP = mysqli_query($conexion, "SELECT * FROM pago WHERE ID_PAGO = $id");
    $pago = mysqli_fetch_array($rsP);
    $adeudo = "Nose";

    if($pago[8] == 0){
        $adeudo = "No";
    }else{
        $adeudo = "Si";
    }
    
    if(isset($_POST['btn-mod-pago'])){
        ///actuar si es un adeudo o pago
        if($adeudo == "Si"){
            //si es adeudo
            $convertirAdeudo = convertirAdeudo();
            if($convertirAdeudo == "Si"){
                //si lo quiere dejar como adeudo y solo modificar campos
                $titular = getTitular();
                $mes = getMes();
                $monto = getMonto();
                $recibido = getRecibido();

                $query = "UPDATE pago 
                          SET MES = '$mes', MONTO = $monto, RECIBIDO = $recibido, ID_TITULAR = $titular
                          WHERE ID_PAGO = $id";
                $resultado = mysqli_query($conexion, $query);
            }
            else{
                //quiere convertir un adeudo en pago y agregar campos
                $titular = getTitular();
                $nomRes = getNombre();
                $apell1Res = getApellido1();
                $apell2Res = getApellido2();
                $mes = getMes();
                $monto = getMonto();
                $recibido = getRecibido();

                $conv_pago = "UPDATE pago 
                              SET MES = '$mes', MONTO = $monto, RECIBIDO = $recibido, NOM_PAGADOR = '$nomRes', PAG_APELL_1 = '$apell1Res', 
                                  PAG_APELL_2 = '$apell2Res', ADEUDO = 0, ID_TITULAR = $titular
                              WHERE ID_PAGO = $id";
                
                $resConv = mysqli_query($conexion, $conv_pago);

                if($resConv){
                    //si se pudo convertir en pago, ahora modificamos el metodo de pago si asi lo quiere
                    $modMet = modMetodo();

                    if($modMet == "Si"){
                        //quiere agregar el metodo de pago
                        $formaPago = getFormaPago();

                        if($formaPago == "Cheque"){
                            //si es un cheque
                            $noCheque = getNoCheque();
                            $insert_cheque = "INSERT INTO metodo_pago(TIPO, NO_CHEQUE, ID_PAGO) 
                                            VALUES ('$formaPago','$noCheque', $id)";
        
                            $resultado_cheque = mysqli_query($conexion, $insert_cheque);
        
                        }else if($formaPago == "Tarjeta"){
                            //si es una tarjeta
                            $noTarjeta = getNoTarjeta();
                            $fechaExp = getFechaExp();
                            $cvv = getCVV();
        
                            $insert_tarjeta = "INSERT INTO metodo_pago(TIPO, NO_TARJETA, FCHA_EXP, COD_TARJETA, ID_PAGO) 
                                            VALUES ('$formaPago','$noTarjeta', '$fechaExp', '$cvv', $id)";
                            
                            $res_tarjeta = mysqli_query($conexion, $insert_tarjeta);
        
                        }else if($formaPago == "Transferencia"){
                            //si es una transferencia
                            $claveTrans = getClaveTrans();
        
                            $insert_trans = "INSERT INTO metodo_pago(TIPO, NO_TRANSFERENCIA, ID_PAGO) 
                                            VALUES ('$formaPago','$claveTrans', $id)";
        
                            $resultado_trans = mysqli_query($conexion, $insert_trans);
        
                        }
                        else if ($formaPago == "Efectivo"){
                            //si es efectivo
                            $insert_efec = "INSERT INTO metodo_pago(TIPO, ID_PAGO) 
                                            VALUES ('$formaPago', $id)";
        
                            $resultado_efec = mysqli_query($conexion, $insert_efec);
                        }
                    }
                }
            }
        }
        else{
            //si es pago
            $convertirAdeudo = convertirAdeudo();
            if($convertirAdeudo == "Si"){
                //lo quiere convertir en adeudo
                $titular = getTitular();
                $mes = getMes();
                $monto = getMonto();
                $recibido = getRecibido();

                $query_pago = "UPDATE pago 
                          SET MES = '$mes', MONTO = $monto, RECIBIDO = $recibido, NOM_PAGADOR = NULL, PAG_APELL_1 = NULL, 
                                          PAG_APELL_2 = NULL, ADEUDO = 1, ID_TITULAR = $titular
                          WHERE ID_PAGO = $id";

                $query_metodo = "DELETE FROM metodo_pago WHERE ID_PAGO = $id";

                $resultado_pago = mysqli_query($conexion, $query_pago);
                $resultado_metodo = mysqli_query($conexion, $query_metodo);
            }else{
                //lo quiere dejar como pago y solo quiere modificar campos
                $titular = getTitular();
                $nomRes = getNombre();
                $apell1Res = getApellido1();
                $apell2Res = getApellido2();
                $mes = getMes();
                $monto = getMonto();
                $recibido = getRecibido();

                $mod_pago = "UPDATE pago 
                              SET MES = '$mes', MONTO = $monto, RECIBIDO = $recibido, NOM_PAGADOR = '$nomRes', PAG_APELL_1 = '$apell1Res', 
                                  PAG_APELL_2 = '$apell2Res', ID_TITULAR = $titular
                              WHERE ID_PAGO = $id";
                
                $resmod = mysqli_query($conexion, $mod_pago);

                //si se pudo modificar, vemos si quiere modificar el metodo de pago
                if($resmod){
                    //si se pudo modificar el pago, ahora modificamos el metodo de pago si asi lo quiere
                    $modMet = modMetodo();
                    if($modMet == "Si"){
                        //eliminamos el metodo previo que tenia
                        $elim_met = "DELETE FROM metodo_pago WHERE ID_PAGO = $id";
                        $reselim = mysqli_query($conexion, $elim_met);

                        //si se pudo eliminar
                        if($reselim){
                            $formaPago = getFormaPago();
                            
                            if($formaPago == "Cheque"){
                                //si es un cheque
                                $noCheque = getNoCheque();
                                $insert_cheque = "INSERT INTO metodo_pago(TIPO, NO_CHEQUE, ID_PAGO) 
                                                VALUES ('$formaPago','$noCheque', $id)";
            
                                $resultado_cheque = mysqli_query($conexion, $insert_cheque);
            
                            }else if($formaPago == "Tarjeta"){
                                //si es una tarjeta
                                $noTarjeta = getNoTarjeta();
                                $fechaExp = getFechaExp();
                                $cvv = getCVV();
            
                                $insert_tarjeta = "INSERT INTO metodo_pago(TIPO, NO_TARJETA, FCHA_EXP, COD_TARJETA, ID_PAGO) 
                                                VALUES ('$formaPago','$noTarjeta', '$fechaExp', '$cvv', $id)";
                                
                                $res_tarjeta = mysqli_query($conexion, $insert_tarjeta);
            
                            }else if($formaPago == "Transferencia"){
                                //si es una transferencia
                                $claveTrans = getClaveTrans();
            
                                $insert_trans = "INSERT INTO metodo_pago(TIPO, NO_TRANSFERENCIA, ID_PAGO) 
                                                VALUES ('$formaPago','$claveTrans', $id)";
            
                                $resultado_trans = mysqli_query($conexion, $insert_trans);
            
                            }
                            else if ($formaPago == "Efectivo"){
                                //si es efectivo
                                $insert_efec = "INSERT INTO metodo_pago(TIPO, ID_PAGO) 
                                                VALUES ('$formaPago', $id)";
            
                                $resultado_efec = mysqli_query($conexion, $insert_efec);
                            }
                        }

                    }
                }

            }
        }
        
        //regresamos a la pagina de residentes
        header("location: ../../secciones/vista_pago.php");
    }
?>

<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Modificar Residentes</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
    <script>
        $(document).ready(function(){
            $("#editar-pago").modal('show');
        });
    </script>
</head>
<body>
    <div class="container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
        include($IPATH . "header-nav mod.html"); ?>
        <!--codigo php usado para incluir el header sin necesidad del codigo-->
        <!---main-->
        <div class="main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
            include($IPATH . "nav-sin-buscar index.html"); ?>
            <!--codigo php usado para incluir el header sin necesidad del codigo-->
        </div>
    </div>

   <!-- -----------------------------------------------Aqui es para editar un pago--------------------------------------------------------------->
   <div class="modal fade" id="editar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <div class="h1-modal">
                        <label>Modificar pago o adeudo</label>
                    </div>
                    <!--end h1-modal-->

                </div>

                <div class="modal-header" id="indicacion">
                    <label>Llena los campos del formulario para modificar un pago o adeudo</label>
                </div>
                <!--end modal-header-->

                <div class="modal-body">
                    <form method="POST" class="row g-3 needs-validation was-validated">
                        <!-- Aqui esta el select para el titular -->
                        <div class="modal-header" id="indicacion2">
                            <label>Por defecto los campos vienen rellenos con los datos originales, si no se desea modificar un campo, dejarlo igual.</label>
                        </div>

                        <div class="col-md-9">
                            <label for="adeudo" class="form-label">¿Convertir o dejar como adeudo?</label>
                            <SELECT required class="form-select" name="convertirAdeudo" onchange="if(this.value=='No') {document.getElementById('nombre_pagador').disabled = false , document.getElementById('apellido_1_pagador').disabled = false , document.getElementById('apellido_2_pagador').disabled = false, 
                                                                                                                document.getElementById('forma_pago').disabled = true, document.getElementById('mod-met').disabled = false} else 
                                                                                                                {document.getElementById('nombre_pagador').disabled = true , document.getElementById('apellido_1_pagador').disabled = true , document.getElementById('apellido_2_pagador').disabled = true, 
                                                                                                                document.getElementById('forma_pago').disabled = true, document.getElementById('mod-met').disabled = true} ;">
                                <option selected="" disabled="" value="">Responder (Sí/No)...</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="selTitular" class="form-label">Nombre del titular y domicilio</label>
                            <select class="form-select" name="selTitular" id="selTitular">
                                <option disabled="" value="">Escoger titular y su domicilio...</option>
                                <?php
                                $rsM = mysqli_query($conexion, "SELECT * FROM titular WHERE INACTIVO = 0");
                                
                                //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                while ($titular = mysqli_fetch_array($rsM)) {
                                    $rsD = mysqli_query($conexion, "SELECT * FROM domicilio WHERE ID_TITULAR = $titular[0]");
                                    $domres = mysqli_fetch_array($rsD);
                                    if($pago[10] == $titular[0]){
                                        echo "<option selected value='$titular[0]'>$titular[1] $titular[2] $titular[3] - $domres[0] $domres[1]</option>";
                                    }else{
                                    echo "<option value = '$titular[0]'> $titular[1] $titular[2] $titular[3] - $domres[0] $domres[1] </option>"; 
                                    }//material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!-- -->

                        <div class="modal-header" id="indicacion2">
                            <label>Ingrese la información del responsable del pago</label>
                        </div>
                        <!--end modal-header-->

                        <div class="col-md-4">
                            <label for="nombre_pagador" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre_pagador" name="txtResponsable" value = "<?php echo $pago[5]; ?>" autocomplete="off" disabled maxlength="50" required pattern="[a-zA-Z][a-zA-Z\s]+" title="Letras. Tamaño mínimo: 1. Tamaño máximo: 50.">
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_1_pagador" class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" id="apellido_1_pagador" name="txtApell1Res" value = "<?php echo $pago[6]; ?>" autocomplete="off" disabled maxlength="50" required pattern="[A-Za-z]{1,50}" title="Letras. Tamaño mínimo: 1. Tamaño máximo: 50.">
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="apellido_2_pagador" class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" id="apellido_2_pagador" name="txtApell2Res" value = "<?php echo $pago[7]; ?>" autocomplete="off" disabled maxlength="50" required pattern="[A-Za-z]{1,50}" title="Letras. Tamaño mínimo: 1. Tamaño máximo: 50.">
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
                            <select class="form-select" id="id_titular" name="selMes">
                                <option disabled="" selected = "" value="">Elija un mes...</option>
                                <?php
                                    if($pago[1] == "Enero"){
                                        echo "<option selected value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Febrero"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option selected value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Marzo"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option selected value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Abril"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option selected value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Mayo"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option selected value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                        
                                    else if($pago[1] == "Junio"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option selected value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Julio"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option selected value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Agosto"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option selected value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Septiembre"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option selected value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Octubre"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option selected value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Noviembre"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option selected value = 'Noviembre'>Noviembre</option>";
                                        echo "<option value = 'Diciembre'>Diciembre</option>";
                                    }
                                    else if($pago[1] == "Diciembre"){
                                        echo "<option value = 'Enero'>Enero</option>";
                                        echo "<option value = 'Febrero'>Febrero</option>";
                                        echo "<option value = 'Marzo'>Marzo</option>";
                                        echo "<option value = 'Abril'>Abril</option>";
                                        echo "<option value = 'Mayo'>Mayo</option>";
                                        echo "<option value = 'Junio'>Junio</option>";
                                        echo "<option value = 'Julio'>Julio</option>";
                                        echo "<option value = 'Agosto'>Agosto</option>";
                                        echo "<option value = 'Septiembre'>Septiembre</option>";
                                        echo "<option value = 'Octubre'>Octubre</option>";
                                        echo "<option value = 'Noviembre'>Noviembre</option>";
                                        echo "<option selected value = 'Diciembre'>Diciembre</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="monto" class="form-label">Monto a pagar</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name="txtMonto" autocomplete="off" type="number" step="0.01" value = "<?php echo $pago[2]; ?>" class="form-control is-invalid" id="monto" aria-describedby="inputGroupPrepend3 montoFeedback">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="recibido" class="form-label">Monto recibido</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name="txtRecibido" autocomplete="off" type="number" step="0.01" value="<?php echo $pago[3]; ?>" class="form-control is-invalid" id="recibido" aria-describedby="inputGroupPrepend3 montoFeedback">
                            </div>
                        </div>


                        <div class="modal-header" id="indicacion2">
                            <label>Elija un método de pago</label>
                        </div>
                        <!--end modal-header-->
                        <div class="col-md-6">
                            <label for="mod-met" class="form-label">¿Modificar método de pago?</label>
                            <select class="form-select" disabled required id = "mod-met" name="mod-met" onchange="if(this.value=='No') {document.getElementById('forma_pago').disabled = true, document.getElementById('num_tarjeta').disabled = true , document.getElementById('fecha_exp').disabled = true , document.getElementById('cvv').disabled = true, 
                                                                                                          document.getElementById('num_cheque').disabled = true, document.getElementById('clave_transferencia').disabled = true} else 
                                                                                                            {document.getElementById('forma_pago').disabled = false}">
                                <option selected="" disabled="" value="">Responder (Sí/No)</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

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
                            <input class="form-control" type="text" id="num_cheque" name="txtNoCheque" autocomplete="off" disabled required maxlength="20" pattern="^[0-9]+" title="Numeros de 0 a 9. Tamaño máximo: 20 dígitos.">
                        </div>

                        <div class="col-md-9">
                            <label for="num_tarjeta" class="form-label">Número de tarjeta</label>
                            <input class="form-control" type="text" id="num_tarjeta" name="txNoTarjeta" disabled autocomplete="off" required minlength="16" maxlength="20" pattern="^[0-9]+" title="Numeros de 0 a 9. De 16 a 20 dígitos.">
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_exp" class="form-label">Fecha de expiracion (MM/AA)</label>
                            <input class="form-control" type="text" id="fecha_exp" name="txtFechaExp" disabled autocomplete="off" required minlength="5" maxlength="5" pattern="[0-9][0-9]/[0-9][0-9]" title="Numeros de 0 a 9.">
                        </div>

                        <div class="col-md-4">
                            <label for="cvv" class="form-label">CVV</label>
                            <input class="form-control" type="text" id="cvv" name="txtCVV" disabled autocomplete="off" required minlength="3" maxlength="3" pattern="^[0-9]+" title="Numeros de 0 a 9.">
                        </div>

                        <div class="col-md-9">
                            <label for="clave_transferencia" class="form-label">Clave transferencia</label>
                            <input class="form-control" type="text" id="clave_transferencia" name="txtClaveTrans" disabled autocomplete="off" required minlength="1" maxlength="20" pattern="^[0-9]+" title="Numeros de 0 a 9. Tamaño máximo: 20 dígitos.">
                        </div>
                        <!-- -->



                        <div class="modal-footer">
                            <button name="btn-mod-pago" class="btn btn-primary" type="submit">Guardar</button>

                            <a href = "../../secciones/vista_pago.php">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
    include($IPATH . "scripts-fin.html"); ?>
</body>
</html>