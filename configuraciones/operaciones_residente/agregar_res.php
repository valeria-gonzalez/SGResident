<?php 
    include_once '../conexion_bd.php';
    include_once 'obtener_datos.php';

    $nombres = getNombres();
    $apellido1 = getApellido1();
    $apellido2 = getApellido2();
    $repetido_res = "SELECT * FROM titular WHERE NOMBRE = '$nombres' AND PR_APELL = '$apellido1' AND SEG_APELL = '$apellido2' AND INACTIVO = '0'";
    $query_repetido_res = mysqli_query($conexion, $repetido_res);

    $domicilio = getDomicilio();
    $noCasa = getNoCasa();
    $repetido_dom = "SELECT * FROM domicilio WHERE CALLE = '$domicilio' AND NO_CASA = '$noCasa'";
    $query_repetido_dom = mysqli_query($conexion, $repetido_dom);

    if(isset($_POST['btn-resi-agr'])){
        $nombres = getNombres();
        $apellido1 = getApellido1();
        $apellido2 = getApellido2();
        $edad = getEdad();
        $sexo = getSexo();
        $telefono = getTelefono();
        $celular = getCelular();
        $existeDom = existeDom();

        if(mysqli_num_rows($query_repetido_res) == 0 && mysqli_num_rows($query_repetido_dom) == 0){

        $insert_tit = "INSERT INTO titular(NOMBRE, PR_APELL, SEG_APELL, SEXO, EDAD, CELULAR, TEL_CASA) 
                  VALUES ('$nombres', '$apellido1', '$apellido2', '$sexo', $edad, '$celular', '$telefono')";

        $resultado_tit = mysqli_query($conexion, $insert_tit);

        if($resultado_tit){
            $id = mysqli_query($conexion, "SELECT MAX(ID_TITULAR) FROM titular");

            $id_tit = mysqli_fetch_array($id);

            if($existeDom == "No"){
                $domicilio = getDomicilio();
                $noCasa = getNoCasa();
                $vialidad1 = getVialidad1();
                $vialidad2 = getVialidad2();
                $referencias = getReferencias();
            
                $insert_dom = "INSERT INTO domicilio (CALLE, NO_CASA, VIALIDAD_1, VIALIDAD_2, REFERENCIAS, ID_TITULAR)
                                VALUES ('$domicilio', $noCasa, '$vialidad1', '$vialidad2', '$referencias', $id_tit[0])";
                
                $resultado_dom = mysqli_query($conexion, $insert_dom);
            }
            else{
                $domExistente = getDomExistente();
                $values = explode("+", $domExistente);
                $insert_dom = "UPDATE domicilio SET ID_TITULAR = $id_tit[0] WHERE CALLE = '$values[0]' AND NO_CASA = '$values[1]'";
                $resultado_dom = mysqli_query($conexion, $insert_dom);
            }
        }
    }
        $cerrar_cn = mysqli_close($conexion);
        header("location: ../../secciones/index.php");
    
}
?>