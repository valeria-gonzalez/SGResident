<?php
    include_once '../configuraciones/conexion_bd.php';
?>

<!doctype HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META name="viewport" content="width = device-width, initial-scale = 1.0">
    <title>Admin Dashboard</title>
    

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel = "stylesheet" href="../css/modal.css">
    <!--<script src="../js/jquery-3.6.0.min.js"></script>-->
    <!--link rel="shortcut icon" href="src/1.png"-->
</head>

<body>
    <div class="container">
        <!--nav aqui-->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
        include($IPATH . "header-nav index.html"); ?>
        <!--codigo php usado para incluir el header sin necesidad del codigo-->
        <!---main-->
        <div class="main">
            <!--aqui buscar-->
            <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
            include($IPATH . "nav-sin-buscar index.html"); ?>
            <!--codigo php usado para incluir el header sin necesidad del codigo-->

            <!--main content, aqui decides si poner las cards o el item-->
            <div class="main-title">
                <h1 class="wow-title" id = "index">Bienvenido de vuelta</h1>
            </div>
            <!--en el index iran las cards, es decir, los cuatro botones-->
            <div class="cardBox">
                <div class="card">
                    <!--carta de agregar residente-->

                    <div>
                        <div class="numbers">Agregar</div>
                        <div class="cardName">Residente</div>
                    </div>
                    <div class="iconBx">
                        
                            <button type="button" class="crd-button" data-bs-toggle="modal" data-bs-target="#agregar-residente">
                                <ion-icon name="people-outline"></ion-icon>
                            </button>

                    </div>


                </div>
                <!--end card-->



                <div class="card">
                    <!--carta de agregar domicilio-->
                    <div>
                        <div class="numbers">Agregar</div>
                        <div class="cardName">Domicilio</div>
                    </div>
                    <div class="iconBx">
                        
                            <button type="button" class="crd-button" data-bs-toggle="modal" data-bs-target="#agregar-domicilio">
                                <ion-icon name="bed-outline"></ion-icon>
                            </button>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <!--carta de agregar pago-->

                    <div>
                        <div class="numbers">Agregar</div>
                        <div class="cardName">Pago</div>
                    </div>
                    <div class="iconBx">
                        <button type="button" class="crd-button" data-bs-toggle="modal" data-bs-target="#agregar-pago">
                            <ion-icon name="card-outline"></ion-icon>
                        </button>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <!--carta de buscar residente-->
                    <div>
                        <div class="numbers">Buscar</div>
                        <div class="cardName">Residente</div>
                    </div>
                    <div class="iconBx">
                        <a href="vista_res.php">
                            <button type="button" class="crd-button">
                                <ion-icon name="search"></ion-icon>
                            </button>
                        </a>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <!--carta de buscar pago-->
                    <div>
                        <div class="numbers">Buscar</div>
                        <div class="cardName">Pago</div>
                    </div>
                    <div class="iconBx">
                        <a href="vista_pago.php">
                            <button type="button" class="crd-button">
                                <ion-icon name="search"></ion-icon>
                            </button>
                        </a>
                    </div>
                </div>
                <!--end card-->

            </div>
            <!--end cardBox-->

        </div>
        <!--end main-->

    </div>
    <!--end container-->


    <!--scripts-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
    include($IPATH . "scripts-fin.html"); ?>
    <!--codigo php usado para incluir el header sin necesidad del codigo-->

    <!--------------------------------------------------------- Modal, aqui se agrega el residente------------------------------------------------------------------->
    <div class="modal fade" id="agregar-residente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="agregarresidente">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class = "h1-modal">
                        <label>Agregar residente</label>
                    </div> <!--end h1-modal-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!--end modal-header-->

                <div class="modal-header" id = "indicacion">
                    <label>Llena los campos del formulario para agregar un residente</label>
                </div> <!--end modal-header-->

                <div class="modal-body">
                    <form action = "../configuraciones/operaciones_residente/agregar_res.php" method = "POST" class="row g-3 needs-validation was-validated">
                        <div class="col-md-4">
                            <label for="nombre_residente" class="form-label">Nombre(s)</label>
                            <input type="text" name = "txtNombre" class="form-control" id="nombreresidente" autocomplete = "off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div> <!--end col-md-4-->

                        <div class="col-md-4">
                            <label for="apellido_1_residente" class="form-label">Apellido 1</label>
                            <input type="text" name = "txtApellido1" class="form-control" id="apellido_1_residente" autocomplete = "off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div> <!--end col-md-4-->

                        <div class="col-md-4">
                            <label for="apellido_2_residente" class="form-label">Apellido 2</label>
                            <input type="text" name = "txtApellido2" class="form-control" id="apellido_2_residente" autocomplete = "off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div> <!--end col-md-4-->

                        <div class="col-md-5">
                            <label for="edad" class="form-label">Edad</label>
                            <div class="input-group has-validation">

                                <input type="number" name = "txtEdad" class="form-control" id="edad"  aria-describedby="inputGroupPrepend" required autocomplete = "off">
                                <div class="invalid-feedback">
                                    Por favor ponga la edad
                                </div>
                            </div>
                        </div> <!--end col-md-5-->

                        <div class="col-md-5">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select name = "selSexo" class="form-select" id="sexo" required>
                                <option selected="" disabled="" value="">Escoger sexo...</option>
                                <option>Mujer</option>
                                <option>Hombre</option>
                                <option>Otro</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div> <!--end col-md-5-->

                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" name = "txtTelefono" class="form-control" id="telefono" required = "10" autocomplete = "off">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" name = "txtCelular" class="form-control" id="celular" type="number" required autocomplete = "off">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="modal-header" id = "indicacion2">
                            <label>Elige o escribe el domicilio que le corresponde al titular</label>
                        </div> <!--end modal-header-->

                        <div class="col-md-5">
                            <label for="existe-dom" class="form-label">Ya existe el domicilio?</label>
                            <select class="form-select" required name="existe-dom" onchange="if(this.value=='No') {document.getElementById('domicilio').disabled = false , document.getElementById('numerocasa').disabled = false , document.getElementById('entrevialidad1').disabled = false, 
                                                                                                          document.getElementById('entrevialidad2').disabled = false, document.getElementById('referencias').disabled = false, document.getElementById('selDom').disabled = true} else 
                                                                                                            {document.getElementById('domicilio').disabled = true , document.getElementById('numerocasa').disabled = true , document.getElementById('entrevialidad1').disabled = true, 
                                                                                                          document.getElementById('entrevialidad2').disabled = true, document.getElementById('referencias').disabled = true, document.getElementById('selDom').disabled = false}" >                                                                                            
                                <option selected="" disabled="" value="">Responder (Sí/No)</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="selDom" class="form-label">Elige un domicilio sin titular</label>
                                <select name = "selDom" class="form-select" id="selDom" required disabled>
                                    <option selected="" disabled="" value="">Escoger domicilio...</option>
                                    <?php 
                                        $rsM = mysqli_query($conexion, "SELECT * FROM domicilio WHERE ID_TITULAR IS NULL");
                                        //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                        while($domicilio = mysqli_fetch_array($rsM)){
                                            echo "<option value = '$domicilio[0]+$domicilio[1]'> $domicilio[0] $domicilio[1] </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                        }      
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                Seleccione una opcion
                                </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="domicilio" class="form-label">Calle</label>
                            <input type="text" name = "txtDomicilio" class="form-control" id="domicilio" autocomplete = "off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba la calle.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="numero_casa" class="form-label">Número de casa</label>
                            <input type="text" name = "txtNoCasa" class="form-control" id="numerocasa" autocomplete = "off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba el número de casa.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_1" class="form-label">Entre vialidad 1</label>
                            <input type="text" name = "txtVialidad1" class="form-control" id="entrevialidad1" autocomplete = "off" required disabled>
                            <div class="invalid-feedback">
                                 Por favor escriba la entre vialidad 1.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_2" class="form-label">Entre vialidad 2</label>
                            <input type="text" name = "txtVialidad2" class="form-control" id="entrevialidad2"  autocomplete = "off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 2.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-12">
                            <label for="referencias" class="form-label">Referencias</label>
                            <input type="text" name = "txtReferencias" class="form-control" id="referencias"  autocomplete = "off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba algunas referencias.
                            </div>
                        </div> <!--end col-12-->

                        <!-- Fin del formulario para agregar residente-->
                        
                        <div class="modal-footer">
                            <!-- En este botón lleva a una modal para confirmar que se quieren guardar los datos del residente-->
                            <button class="btn btn-primary" name = "btn-resi-agr" type="submit">Guardar</button>
            
                            <!-- En este botón cierra el modal para residente-->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <!-- -->

                        </div> <!--end modal-footer-->
                    </form> <!--end form-->
                </div>  <!--end modal-body-->
            </div> <!--end modal-content-->
        </div> <!--end modal-dialog-->
    </div> <!--end modal fade-->

    <!-- -----------------------------------------------Aqui es para guardar un pago--------------------------------------------------------------->
    <div class="modal fade" id="agregar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <div class = "h1-modal">
                        <label>Agregar pago</label>
                    </div> <!--end h1-modal-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-header" id = "indicacion">
                    <label>Llena los campos del formulario para agregar un pago o adeudo</label>
                </div> <!--end modal-header-->

                <div class="modal-body">
                    <form action = "../configuraciones/operaciones_pago/agregar_pago.php" method = "POST" class="row g-3 needs-validation was-validated">
                        <!-- Aqui esta el select para el titular -->
                        <div class="col-md-9">
                            <label for="adeudo" class="form-label">¿Está ingresando un adeudo?</label>
                            <SELECT required class="form-select" name="esAdeudo" onchange="if(this.value=='No') {document.getElementById('nombre_pagador').disabled = false , document.getElementById('apellido_1_pagador').disabled = false , document.getElementById('apellido_2_pagador').disabled = false, 
                                                                                                                document.getElementById('forma_pago').disabled = false} else 
                                                                                                                {document.getElementById('nombre_pagador').disabled = true , document.getElementById('apellido_1_pagador').disabled = true , document.getElementById('apellido_2_pagador').disabled = true, 
                                                                                                                document.getElementById('forma_pago').disabled = true} ;">
                                <option selected="" disabled="" value="">Responder (Sí/No)...</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="id_titular" class="form-label">Nombre del titular</label>
                            <select class="form-select" name = "selTitular" id="id_titular" required="">
                                <option selected="" disabled="" value="">Escoger titular...</option>
                                <?php 
                                    $rsM = mysqli_query($conexion, "SELECT * FROM titular");
                                    //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                    while($titular = mysqli_fetch_array($rsM)){
                                        echo "<option value = '$titular[0]'> $titular[1] $titular[2] $titular[3]  </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                    }      
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!-- -->

                        <div class="col-md-6">
                            <label for="domiciliopago" class="form-label">Domicilio </label>
                            <div class="input-group has-validation">
                                <select name = "selDomPago" class="form-select" id="domiciliopago" required="">
                                    <option selected="" disabled="" value="">Escoger domicilio...</option>
                                    <?php 
                                        $rsM = mysqli_query($conexion, "SELECT * FROM domicilio");
                                        //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                        while($domicilio = mysqli_fetch_array($rsM)){
                                            echo "<option value = '$domicilio[0]+$domicilio[1]'> $domicilio[0] $domicilio[1] </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                        }      
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Selecciona el domicilio del residente
                                </div>
                            </div>

                        </div>

                        <div class="modal-header" id = "indicacion2">
                            <label>Ingrese la información del responsable del pago</label>
                        </div> <!--end modal-header-->
                        
                        <div class="col-md-4">
                            <label for="nombre_pagador" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre_pagador" required name = "txtResponsable" autocomplete = "off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_1_pagador" class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" id="apellido_1_pagador" required="" name = "txtApell1Res" autocomplete = "off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="apellido_2_pagador" class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" id="apellido_2_pagador" required="" name = "txtApell2Res" autocomplete = "off" disabled>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div>
                        
                        <div class="modal-header" id = "indicacion2">
                            <label>Ingrese la información referente al pago</label>
                        </div> <!--end modal-header-->

                        <div class="col-md-4">
                            <label for="concepto" class="form-label">Concepto</label>
                            <select class="form-select" id="id_titular" required="" name = "selMes">
                                <option selected="" disabled="" value="">Elija un mes...</option>
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Diciembre</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="monto" class="form-label">Monto a pagar</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name = "txtMonto" autocomplete = "off"type="number" step = "0.01" value="320" class="form-control is-invalid" id="monto" aria-describedby="inputGroupPrepend3 montoFeedback" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="recibido" class="form-label">Monto recibido</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input name = "txtRecibido" autocomplete = "off"type="number" step = "0.01" value="320" class="form-control is-invalid" id="recibido" aria-describedby="inputGroupPrepend3 montoFeedback" required="">
                            </div>
                        </div>
                        

                        <div class="modal-header" id = "indicacion2">
                            <label>Elija un método de pago</label>
                        </div> <!--end modal-header-->

                        <!--Select para la forma de pago-->
                        <div class="col-md-5">
                            <label for="forma_pago" class="form-label">Método de pago</label>
                            <SELECT id= "forma_pago" disabled class="form-select" name="formaPago" onchange="if(this.value=='Tarjeta') {document.getElementById('num_tarjeta').disabled = false , document.getElementById('fecha_exp').disabled = false , document.getElementById('cvv').disabled = false} else 
                                                                                              {document.getElementById('num_tarjeta').disabled = true , document.getElementById('fecha_exp').disabled = true , document.getElementById('cvv').disabled = true} ;
                                                         if(this.value=='Cheque')  {document.getElementById('num_cheque').disabled = false } else 
                                                         {document.getElementById('num_cheque').disabled = true } 
                                                         if(this.value=='Transferencia')  {document.getElementById('clave_transferencia').disabled = false } else 
                                                         {document.getElementById('clave_transferencia').disabled = true }">
                                <option selected="" disabled="" value="">Escoger un método...</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value = "Efectivo">Efectivo</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="num_cheque" class="form-label">Número de Cheque</label>
                            <input class="form-control" type="text" id="num_cheque" name="txtNoCheque"  autocomplete = "off" disabled>
                        </div>

                        <div class="col-md-9">
                            <label for="num_tarjeta" class="form-label">Número de tarjeta</label>
                            <input class="form-control" type="text" id="num_tarjeta" name="txNoTarjeta" disabled autocomplete = "off">
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_exp" class="form-label">Fecha de expiracion (MM/AA)</label>
                            <input class="form-control" type="text" id="fecha_exp" name="txtFechaExp" disabled autocomplete = "off">
                        </div>

                        <div class="col-md-4">
                            <label for="cvv" class="form-label">CVV</label>
                            <input class="form-control" type="text" id="cvv" name="txtCVV" disabled autocomplete = "off">
                        </div>

                        <div class="col-md-9">
                            <label for="clave_transferencia" class="form-label">Clave transferencia</label>
                            <input class="form-control" type="text" id="clave_transferencia" name="txtClaveTrans" disabled autocomplete = "off">
                        </div>
                        <!-- -->

                    
                    
                        <div class="modal-footer">


                            <button name = "btn-agr-pago" class="btn btn-primary" type="submit">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
    
    <!---------------------------------------------------Modal para agregar domicilio-------------------------------------------->
    <div class="modal fade" id="agregar-domicilio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="agregarresidente">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class = "h1-modal">
                        <label>Agregar domicilio</label>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!--end modal-header-->

                <div class="modal-header" id = "indicacion">
                    <label>Llena los campos del formulario para agregar un domicilio sin residente </label>
                </div> <!--end modal-header-->

                <div class="modal-body">
                    <form action = "../configuraciones/operaciones_dom/agregar_dom.php" method = "POST" class="row g-3 needs-validation was-validated">
                        <div class="col-md-6">
                            <label for="domicilio" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="domicilio" required="" name = "domCalle" autocomplete = "off">
                            <div class="invalid-feedback">
                                Por favor escriba la calle.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="numero_casa" class="form-label">Número de casa</label>
                            <input type="text" class="form-control" id="numerocasa" required="" name = "domNoCasa" autocomplete = "off">
                            <div class="invalid-feedback">
                                Por favor escriba el número de casa.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_1" class="form-label">Entre vialidad 1</label>
                            <input type="text" class="form-control" id="entrevialidad1" required="" name = "domVial1" autocomplete = "off">
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 1.
                            </div>
                        </div> <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_2" class="form-label">Entre vialidad 2</label>
                            <input type="text" class="form-control" id="entrevialidad2" required="" name = "domVial2" autocomplete = "off">
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 2.
                            </div>
                        </div>  <!--end col-md-6-->

                        <div class="col-12">
                            <label for="referencias" class="form-label">Referencias</label>
                            <input type="text" class="form-control" id="referencias" required="" name = "domReferencias" autocomplete = "off">
                            <div class="invalid-feedback">
                                Por favor escriba algunas referencias.
                            </div>
                        </div> <!--end col-md-6-->

                    
                        <!-- Fin del formulario -->
                        <div class="modal-footer">

                            <!-- En este botón lleva a una modal para confirmar que se quieren guardar los datos -->
                            <button name = "btn-dom-agr" class="btn btn-primary" type="submit">Guardar</button>
                            <!-- -->

                            <!-- En este botón cierra el modal -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <!-- -->
                        </div>
                    </form>
                </div> <!--end modal-body-->
            </div> <!--end modal-content-->
        </div> <!--end modal-dialog-->
    </div> <!--end modal fade-->


</body>

</html>