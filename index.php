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
                <h1>Bienvenido <br> de vuelta</h1>

                <p>Ingresa tú usuario y contraseña</p>

                <?php
                include "./configuraciones/conexion_bd.php";
                include "./configuraciones/controladorlogin.php";

                ?>


            </div>
            <div class="form">
                <form method="post" action="">
                    <input type="text" placeholder="Nombre de usuario" name="usuario" autocomplete = "off" required pattern="[A-Za-z0-9._-]+" title="Simbolos alfanuméricos._- solamente"  />
                    <input type="password" placeholder="Contraseña" name="password" autocomplete = "off" required/>
                    <button name="botoningresar">Iniciar sesión</button>


                </form>

                <a href="preguntaseguridad.php">
                    <button class="simple">Olvidaste tus credenciales?</button>
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
    </script>
</body>

</html>