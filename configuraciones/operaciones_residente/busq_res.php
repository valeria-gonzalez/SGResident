<?php
include_once '../conexion_bd.php';
$id = $_POST["buscar"];
$query_consulta = "SELECT * FROM titular WHERE id_titular = $id AND inactivo = 0";
$consulta = $conexion -> query($query_consulta);
?>


<!doctype HTML>
<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Residentes</title>
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel = "stylesheet" href = "../../css/tablas_opc.css">
    <script src="https://kit.fontawesome.com/e35dd15ecb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class = "container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."header-nav.html"); ?> 
        <!---main-->
        <div class = "main">
            <!--aqui buscar-->
            

            <div class = "main-title">
                <h1 class = "wow-title">Coincidencias de residente</h1>
            </div>

            <div class = "item" id = "tabla-res">
                <div class="table-wrapper">
                    <table class="styled-table">
                        <thead>
                            <h2>
                                <th class = "id-azul">Id</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Celular</th>
                                <th>Telefono de casa</th>
                                <th>Opciones</th>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($consulta) > 0){
                            while($row=$consulta -> fetch_assoc()){?>
                            <tr>
                                <!-- Imprimiremos con obj todo aquella columna a mostrar junto con sus 
                                datos -->
                                <th class="id-azul"><?php echo $row['ID_TITULAR'];?></th>
                                <td><?php echo $row['NOMBRE'];?></td>
                                <td><?php echo $row['PR_APELL'];?></td>
                                <td><?php echo $row['SEG_APELL'];?></td>
                                <td><?php echo $row['SEXO'];?></td>
                                <td><?php echo $row['EDAD'];?></td>
                                <td><?php echo $row['CELULAR'];?></td>
                                <td><?php echo $row['TEL_CASA'];?></td>
                                <td class ="iconos-borde">
                                    <div class = "iconos">
                                        <figcaption>Editar</figcaption>
                                        <a href="#"><i id = "editar" class="fa-solid fa-square-pen"></i></a>
                                        <figcaption>Eliminar</figcaption>
                                        <a href="eliminar_res.php?id_=<?php echo $row['ID_TITULAR']; ?> " onclick='return confirmacion()'><i id = "eliminar" class="fa-solid fa-user-slash"></i></a>
                                    </div>
                                </td>
                            
                            </tr>
                            <!-- Abrimos de nuevo código php para cerrar todas nuestras iteraciones
                                abiertas-->
                            <?php } 
                            }
                            else {
                                echo "<script>
                                alert('No hay coincidencias');
                                history.back();
                                </script>";
                            }?>
                                    
                        </tbody>
                        
                    </table>
                </div>
            </div> <!--end item-->
        </div> <!--end main-->

    </div> <!--end container-->

    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/sgclaro/cabeceras/"; include($IPATH."scripts-fin.html"); ?> <!--codigo php usado para incluir el header sin necesidad del codigo-->
    <script src="../../js/alerta_eliminar.js"></script>
</body>
</html>