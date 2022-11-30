<?php
include_once '../conexion_bd.php';
$id = $_GET['id_'];

$query_update = "UPDATE titular SET inactivo = 1 WHERE id_titular = $id";
$upd_tit_pago = "UPDATE pago SET INACTIVO = 1 WHERE ID_TITULAR = $id";
$upd_tit_dom = "UPDATE domicilio SET ID_TITULAR = NULL WHERE ID_TITULAR = $id";

$update = $conexion -> query($query_update);
$update_pgo = $conexion -> query($upd_tit_pago);
$update_dom = $conexion -> query($upd_tit_dom);

header("location: ../../secciones/vista_res.php");
$cerrar_cn = mysqli_close($conexion);
?>