<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <title>Bienvenido: Inicia sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="form-body">
        <div class="content">
            <div class="title">
                <h1>Actualizar<br>contraseña</h1>

                <p>Ingresa una nueva contraseña</p>

                <?php
                include "./configuraciones/conexion_bd.php";


                ?>


                <?php
                if (isset($_POST['enviar'])) {
                    $contra = $_POST['contra'];

                    $sql = "update login set contrasena='$contra' where usuario = 'admin' ";
                    $resultado = (mysqli_query($conexion, $sql));
                    if ($resultado) {
                        echo "<script language='JavaScript'>
                        alert('Los datos se actualizaron');

                        </script>";
                        header("location: index.php");
                        mysqli_close($conexion);
                    } else {
                        echo "<script language='JavaScript'>
                        alert('Los datos se actualizaron');
                        
                        </script>";
                        mysqli_close($conexion);
                    }
                } else {
                    $sql = "select * from login where usuario = 'admin'";
                    $resultado = (mysqli_query($conexion, $sql));
                    $fila = mysqli_fetch_assoc($resultado);


                    mysqli_close($conexion);





                ?>


            </div>
            <div class="form">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" action="">
                    <input type="text" placeholder="Nueva contraseña" name="contra" />

                    <button name="enviar">Actualizar</button>



                </form>


                <a href="index.php">
                    <button>Volver al login</button>
                </a>
            </div>

        </div>
        <div class="img-container">
            <img src="src/184.png" class="img">
        </div>

    </div>





    <script>
        let form = document.querySelector('.form input');
        let form1 = document.querySelector('.form input + input');

        form.onclick = function() {
            form.classList.toggle('active')
        }

        form1.onclick = function() {
            form1.classList.toggle('active')
        }

        setTimeout(() => {
            const box = document.getElementById('alert');

            // 👇️ removes element from DOM
            box.style.display = 'none';

            // 👇️ hides element (still takes up space on page)
            // box.style.visibility = 'hidden';
        }, 2500);
    </script>
</body>

<?php
                }
?>

</html>