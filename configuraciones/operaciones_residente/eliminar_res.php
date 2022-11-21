<?php
include_once '../conexion_bd.php';
$id = $_GET['id_titular'];
$query_eliminar = "DELETE FROM titular WHERE id_titular = $id";
$eliminar=mysqli_query($conexion,$query_eliminar);
header("location: consulta_residente.php");
mysqli_close($conexion);
?>