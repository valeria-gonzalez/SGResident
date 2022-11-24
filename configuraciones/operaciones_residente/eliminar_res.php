<?php
include_once '../conexion_bd.php';
$id = $_GET['id_'];
$query_update = "UPDATE titular SET inactivo = 1 WHERE id_titular = $id";
$update = $conexion -> query($query_update);
header("location: ../../secciones/vista_res.php");
$cerrar_cn = mysqli_close($conexion);
?>