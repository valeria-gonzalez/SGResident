<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <title>Pregunta de segurida</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="form-body">
        <div class="content">
            <div class="title">
                <h1>Responde la pregunta de seguridad </h1>

                <p>¿Cual es el nombre del proyecto?</p>

                <?php
                include "./configuraciones/conexion_bd.php";
                include "./configuraciones/controladorlogin.php";

                ?>


            </div>
            <div class="form">
                <form method="post" action="">
                    <input type="password" placeholder="Respuesta" name="respuesta" autocomplete = "off" required/>

                    <button name="enviar">Enviar</button>


                </form>
                <a href="index.php">
                    <button class="simple" id = "contra">Cancelar</button>
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