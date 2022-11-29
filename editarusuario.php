<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <title>Modificar contraseña</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include "../configuraciones/conexion_bd.php";
    ?>
    <div class="form-body">
        <div class="content">
            <div class="title">
                <h1>Bienvenido </h1>

                <p>Modificar contraseña</p>

                <?php
                if (isset($_POST['enviar'])) {
                    $contra = $_POST['contra'];

                    $sql = "update login set contrasena=' " . $contra . " ' where usuario = 'sgresident' ";
                    $resultado = (mysqli_query($conexion, $sql));
                    if ($resultado) {
                        echo "<script language='JavaScript'>
                        alert('Los datos se actualizaron');

                        </script>";
                    } else {
                        echo "<script language='JavaScript'>
                        alert('Los datos se actualizaron');
                        
                        </script>";

                        header("location: ./secciones/modificarcontra.php");
                    }
                } else {
                    $sql = "select * from login where usuario = 'sgresident'";
                    $resultado = (mysqli_query($conexion, $sql));
                    $fila = mysqli_fetch_assoc($resultado);


                    mysqli_close($conexion);





                ?>


            </div>
            <div class="form">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" action="">
                    <input type="text" placeholder="Ingresa nueva contraseña" name="contra" />

                    <button name="enviar">Actualizar</button>

                    <a href="../index.php">
                        <button>Volver al login</button>

                    </a>

                </form>


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

<?php
                }
?>
</body>

</html>