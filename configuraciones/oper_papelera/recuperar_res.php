<?php
include_once '../conexion_bd.php';
$id = $_GET['id_'];

$query_update = "UPDATE titular SET INACTIVO = 0 WHERE ID_TITULAR = $id";

$update = $conexion -> query($query_update);

if($update){
    echo "<script>alert('Se ha recuperado el registro correctamente');</script>";
}

header("location: ../../secciones/papelera.php");
$cerrar_cn = mysqli_close($conexion);
?>