<?php
include_once '../conexion_bd.php';
$id = $_GET["search"];
//Hacemos la consulta
$query_consulta = "SELECT * FROM pago WHERE id_pago = '$id'";
$consulta=mysqli_query($conexion,$query_consulta);
mysqli_close($conexion);
?>