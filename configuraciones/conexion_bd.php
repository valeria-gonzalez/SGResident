<?php
      $host = "localhost";
      $user = "admin_sgresident";
      $pass = "usuario1234";
      $db = "sgresident";
    
      $conexion = mysqli_connect($host, $user, $pass, $db);

      $cerrar_cn = mysqli_close($conexion);
?>