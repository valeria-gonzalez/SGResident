<?php
session_start();
if (isset($_POST['botoningresar'])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = $conexion->query("select * from login where usuario='$usuario' and contrasena= '$password' ");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["usuario"] = $datos->usuario;
            header("location: ./secciones/index.php");
            mysqli_close($conexion);
        } else {
            echo "<script>
            alert('Usuario o contraseña incorrectos');
        </script>";
        }
    } 
}

if (isset($_POST['enviar'])) {
    if (!empty($_POST["respuesta"])) {
        $respuesta = $_POST["respuesta"];

        $sql1 = $conexion->query("select * from login where respuesta='$respuesta'  ");
        if ($datos = $sql1->fetch_object()) {
            header("location: modificarcontra.php");
            mysqli_close($conexion);
        } else {
            echo "<script>
            alert('Respuesta incorrecta');
        </script>";
        }
    } 
}
