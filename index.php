<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible"content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Bienvenido: Inicia sesión</title>
</head>
<body>
    <div class="form-body">
        <div class = "content">
            <div class="title">
                <h1>Bienvenido <br> de vuelta</h1>
                <p>Ingresa tú usuario y contraseña</p>

            </div>
            <div class = "form">
                <form method="post">
                    <input type="text" placeholder="Nombre de usuario" name="text" required autocomplete = "off"/>
                    <input type="password" placeholder="Contraseña" name="password" required autocomplete = "off"/>
                    <button>Iniciar sesión</button>

                    <?php
                        if(!empty($_POST['text']) && !empty($_POST['password'])){
                            $text = $_POST['text'];
                            $password = $_POST['password'];
                            if($text == 'usuario' && $password == "sgresident"){
                                header("location: secciones/index.php");

                            }else{
                                echo"<div id = 'alert' class='alert alert - danger'>Usuario o contraseña incorrectos</div>
                                ";
                            }
                        }

                    ?>
                </form>
                <button class = "simple">Olvidaste tus credenciales?</button>
            </div>
            
        </div>
        <div class="img-container">
            <img src="src/184.png" class = "img">
        </div>
        
    </div>

    <script>
        let form = document.querySelector('.form input');
        let form1 = document.querySelector('.form input + input');

        form.onclick = function(){
            form.classList.toggle('active')
        }

        form1.onclick = function(){
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
</html>