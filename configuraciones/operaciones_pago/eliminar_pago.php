<?php
include_once '../conexion_bd.php';
$id = $_GET['id_'];

$query_update = "UPDATE pago SET inactivo = 1 WHERE id_pago = $id";


$update = $conexion -> query($query_update);
header("location: ../../secciones/vista_pago.php");
$cerrar_cn = mysqli_close($conexion);
?>