<?php 
    include_once '../conexion_bd.php';
    include_once 'obten_datos.php';

    $domicilio = getDomicilio();
    $noCasa = getNoCasa();

    $repetido = "SELECT * FROM domicilio WHERE CALLE = '$domicilio' AND NO_CASA = '$noCasa'";
    $query_repetido = mysqli_query($conexion, $repetido);

    if(isset($_POST['btn-dom-agr'])){
        $domicilio = getDomicilio();
        $noCasa = getNoCasa();
        $vialidad1 = getVialidad1();
        $vialidad2 = getVialidad2();
        $referencias = getReferencias();

        if(mysqli_num_rows($query_repetido) == 0){

        $insert_dom = "INSERT INTO domicilio (CALLE, NO_CASA, VIALIDAD_1, VIALIDAD_2, REFERENCIAS)
                        VALUES ('$domicilio', $noCasa, '$vialidad1', '$vialidad2', '$referencias')";
                
        $resultado_dom = mysqli_query($conexion, $insert_dom);
        }
        $cerrar_cn = mysqli_close($conexion);
        header("location: ../../secciones/index.php");
    }
    
?>