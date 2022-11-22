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
            include($IPATH . "nav-sin-buscar.html"); ?>
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
                        
                            <button type="button" class="crd-button" data-bs-toggle="modal" data-bs-target="#agregar-residente">
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
                        <button type="button" class="crd-button">
                            <ion-icon name="search"></ion-icon>
                        </button>
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
                        <button type="button" class="crd-button">
                            <ion-icon name="search"></ion-icon>
                        </button>
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

    <!-- Modal, aqui se agrega el residente-->
    <div class="modal fade" id="agregar-residente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="agregarresidente">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar residente</h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                </div>

                <div class="modal-header">
                    <label>Llena los campos del formulario para agregar a un residente</label>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation was-validated" novalidate="">
                        <div class="col-md-4">
                            <label for="nombre_residente" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombreresidente" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_1_residente" class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" id="apellido_1_residente" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="apellido_2_residente" class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" id="apellido_2_residente" required="">
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="edad" class="form-label">Edad</label>
                            <div class="input-group has-validation">

                                <input type="text" class="form-control" id="edad" type="number" aria-describedby="inputGroupPrepend" required="">
                                <div class="invalid-feedback">
                                    Por favor ponga la edad
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" id="sexo" required="">
                                <option selected="" disabled="" value="">Escoger...</option>
                                <option>Mujer</option>
                                <option>Hombre</option>
                                <option>Otro</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" type="number" required="10">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" type="number" required="10">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="domicilio" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="domicilio" required="">
                            <div class="invalid-feedback">
                                Por favor escriba la calle.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="numero_casa" class="form-label">Número de casa</label>
                            <input type="text" class="form-control" id="numerocasa" required="">
                            <div class="invalid-feedback">
                                Por favor escriba el número de casa.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="entrevialidad_1" class="form-label">Entre vialidad 1</label>
                            <input type="text" class="form-control" id="entrevialidad1" required="">
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 1.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="entrevialidad_2" class="form-label">Entre vialidad 2</label>
                            <input type="text" class="form-control" id="entrevialidad2" required="">
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 2.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="referencias" class="form-label">Referencias</label>
                            <input type="text" class="form-control" id="referencias" required="">
                            <div class="invalid-feedback">
                                Por favor escriba algunas referencias.
                            </div>
                        </div>

                    </form>
                    <!-- Fin del formulario para agregar residente-->

                </div>
                <div class="modal-footer">

                    <!-- En este botón lleva a una modal para confirmar que se quieren guardar los datos del residente-->
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#validacion-guardar-residente">Guardar</button>
                    <!-- -->

                    <!-- En este botón cierra el modal para residente-->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- -->


                </div>
            </div>
        </div>
    </div>


    <!-- Aqui es para guardar un pago-->
    <div class="modal fade" id="agregar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation was-validated" novalidate="">






                        <!-- Aqui esta el select para el titular -->
                        <div class="col-md-5">
                            <label for="id_titular" class="form-label">Nombre del titular</label>
                            <select class="form-select" id="id_titular" required="">
                                <option selected="" disabled="" value="">Escoger...</option>
                                <option>Nombre</option>

                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!-- -->

                        <div class="col-md-6">
                            <label for="domiciliopago" class="form-label">Domicilio </label>
                            <div class="input-group has-validation">

                                <select class="form-select" id="id_titular" required="">
                                    <option selected="" disabled="" value="">Escoger...</option>
                                    <option>Nombre</option>

                                </select>
                                <div class="invalid-feedback">
                                    Selecciona el domicilio del residente
                                </div>
                            </div>

                        </div>


                        <br>
                        <div id="infopagador">
                            Informacion del responsable
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label for="nombre_pagador" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre_pagador" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="apellido_1_pagador" class="form-label">Apellido 1</label>
                            <input type="text" class="form-control" id="apellido_1_pagador" required="">
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="apellido_2_pagador" class="form-label">Apellido 2</label>
                            <input type="text" class="form-control" id="apellido_2_pagador" required="">
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="concepto" class="form-label">Concepto</label>
                            <select class="form-select" id="id_titular" required="">
                                <option selected="" disabled="" value="">Mes...</option>
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
                            <label for="monto" class="form-label">Monto de pago</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">$</span>
                                <input type="text" type="number" value="320" class="form-control is-invalid" id="monto" aria-describedby="inputGroupPrepend3 montoFeedback" required="">

                            </div>

                        </div>


                        <!--Select para la forma de pago-->
                        <div class="col-md-5">
                            <label for="forma_pago" class="form-label">Método de pago</label>
                            <SELECT class="form-select" name="forma_pago" onchange="if(this.value=='Tarjeta') {document.getElementById('num_tarjeta').disabled = false , document.getElementById('fecha_exp').disabled = false , document.getElementById('cvv').disabled = false} else 
                                                                                              {document.getElementById('num_tarjeta').disabled = true , document.getElementById('fecha_exp').disabled = true , document.getElementById('cvv').disabled = true} ;
                                                         if(this.value=='Cheque')  {document.getElementById('num_cheque').disabled = false } else 
                                                         {document.getElementById('num_cheque').disabled = true } 
                                                         if(this.value=='Transferencia')  {document.getElementById('clave_transferencia').disabled = false } else 
                                                         {document.getElementById('clave_transferencia').disabled = true }">
                                <option selected="" disabled="" value="">Escoger...</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                                <option>Efectivo</option>

                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <div class="col-md-9">
                            <label for="num_cheque" class="form-label">Número de Cheque</label>
                            <input class="form-control" type="text" id="num_cheque" name="num_cheque" disabled>
                        </div>
                        <div class="col-md-9">
                            <label for="num_tarjeta" class="form-label">Número de tarjeta</label>
                            <input class="form-control" type="text" id="num_tarjeta" name="num_tarjeta" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_exp" class="form-label">Fecha de expiracion</label>
                            <input class="form-control" type="text" id="fecha_exp" name="fecha_exp" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="cvv" class="form-label">CVV</label>
                            <input class="form-control" type="text" id="cvv" name="cvv" disabled>
                        </div>

                        <div class="col-md-9">
                            <label for="clave_transferencia" class="form-label">Clave transferencia</label>
                            <input class="form-control" type="text" id="clave_transferencia" name="clave_transferencia" disabled>
                        </div>



                        <!-- -->

                    </form>
                </div>
                <div class="modal-footer">


                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#validacion-guardar-pago">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>

</body>

</html>