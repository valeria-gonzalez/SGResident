<?php 
    include_once '../conexion_bd.php';
    include_once 'obtener_datos.php';

    
    if(isset($_POST['btn-resi-agr'])){
        $nombres = getNombres();
        $apellido1 = getApellido1();
        $apellido2 = getApellido2();
        $edad = getEdad();
        $sexo = getSexo();
        $telefono = getTelefono();
        $celular = getCelular();
        $domicilio = getDomicilio();
        $noCasa = getNoCasa();
        $vialidad1 = getVialidad1();
        $vialidad2 = getVialidad2();
        $referencias = getReferencias();

        $insert_tit = "INSERT INTO titular(NOMBRE, PR_APELL, SEG_APELL, SEXO, EDAD, CELULAR, TEL_CASA) 
                  VALUES ('$nombres', '$apellido1', '$apellido2', '$sexo', $edad, '$celular', '$telefono')";

        $resultado_tit = mysqli_query($conexion, $insert_tit);

        if($resultado_tit){
            $id = mysqli_query($conexion, "SELECT MAX(ID_TITULAR) FROM titular");

            $id_tit = mysqli_fetch_array($id);
        
            $insert_dom = "INSERT INTO domicilio (CALLE, NO_CASA, VIALIDAD_1, VIALIDAD_2, REFERENCIAS, ID_TITULAR)
                            VALUES ('$domicilio', $noCasa, '$vialidad1', '$vialidad2', '$referencias', $id_tit[0])";
            
            $resultado_dom = mysqli_query($conexion, $insert_dom);
        }

        $cerrar_cn = mysqli_close($conexion);
        header("location: ../../index.php");
    }
    
?>