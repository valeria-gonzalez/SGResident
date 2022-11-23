<?php 
    include_once '../conexion_bd.php';
    include_once 'obtener_datos.php';

    
    if(isset($_POST['btn-agr-pago'])){
        $adeudo = esAdeudo();

        if($adeudo == "Si"){
            $titular = getTitular();
            $domicilio = getDomicilio();
            $mes = getMes();
            $monto = getMonto();
            $recibido = getRecibido();

            $insert_adeudo = "INSERT INTO pago(MES, MONTO, RECIBIDO, ID_TITULAR, ADEUDO) 
                              VALUES ('$mes', $monto, $recibido, $titular, 1)";

            $resultado_adeudo = mysqli_query($conexion, $insert_adeudo);

        }else{
            $titular = getTitular();
            $nombre = getNombre();
            $apellido1 = getApellido1();
            $apellido2 = getApellido2();
            $mes = getMes();
            $monto = getMonto();
            $recibido = getRecibido();
            $formaPago = getFormaPago();

            $insert_pago = "INSERT INTO pago(MES, MONTO, RECIBIDO, NOM_PAGADOR, PAG_APELL_1, PAG_APELL_2, ID_TITULAR) 
                  VALUES ('$mes', $monto, $recibido, '$nombre', '$apellido1', '$apellido2', $titular)";

            $resultado_pago = mysqli_query($conexion, $insert_pago);

            if($resultado_pago){
                $id = mysqli_query($conexion, "SELECT MAX(ID_PAGO) FROM pago");
                $id_pago = mysqli_fetch_array($id);

                if($formaPago == "Cheque"){
                    $noCheque = getNoCheque();
                    $insert_cheque = "INSERT INTO metodo_pago(TIPO, NO_CHEQUE, ID_PAGO) 
                                      VALUES ('$formaPago','$noCheque', $id_pago[0])";

                    $resultado_cheque = mysqli_query($conexion, $insert_cheque);

                }else if($formaPago == "Tarjeta"){
                    $noTarjeta = getNoTarjeta();
                    $fechaExp = getFechaExp();
                    $cvv = getCVV();

                    $insert_tarjeta = "INSERT INTO metodo_pago(TIPO, NO_TARJETA, FCHA_EXP, COD_TARJETA, ID_PAGO) 
                                       VALUES ('$formaPago','$noTarjeta', '$fechaExp', '$cvv', $id_pago[0])";
                    
                    $res_tarjeta = mysqli_query($conexion, $insert_tarjeta);

                }else if($formaPago == "Transferencia"){
                    $claveTrans = getClaveTrans();

                    $insert_trans = "INSERT INTO metodo_pago(TIPO, NO_TRANSFERENCIA, ID_PAGO) 
                                      VALUES ('$formaPago','$claveTrans', $id_pago[0])";

                    $resultado_trans = mysqli_query($conexion, $insert_trans);

                }
                else if ($formaPago == "Efectivo"){
                    $insert_efec = "INSERT INTO metodo_pago(TIPO, ID_PAGO) 
                                      VALUES ('$formaPago', $id_pago[0])";

                    $resultado_efec = mysqli_query($conexion, $insert_efec);
                }
            }
        }

        $cerrar_cn = mysqli_close($conexion);
        header("location: ../../secciones/index.php");
    }
    
?>