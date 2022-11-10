<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    
    <title>SG Resident</title>
<link href="css/main.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel ="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script  src="js/jquery-3.6.0.min.js"></script>
    
    <link rel="shortcut icon" href="src/1.png">
</head>

  <body>
 
    <!-- Barra de navegacion de aqui a...-->
    <nav class="navbar navbar-expand-lg " style="background-color: #383838;">
      <div class="container-fluid">
        <a class="navbar-brand"  style="color: #e3f2fd;" href="#" target="_blank">Menú</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">
                <button type="button" class="btn btn-outline-info"  data-bs-toggle="modal" data-bs-target="#agregar-residente">
                Agregar Residente
                </button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">
                <button type="button" class="btn btn-outline-info"  data-bs-toggle="modal" data-bs-target="#agregar-pago">
                Agregar Pago
                </button></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="secciones/Buscar_residente.html">
                <button type="button" class="btn btn-outline-info">
                Buscar Residente
                </button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="secciones/Buscar_pago.html">
                <button type="button" class="btn btn-outline-info">
                Buscar pago
                </button></a>
            </li>
              
                
              
    
          </ul>
        </div>
        
      </div>
    </nav>
   <!-- ...Aqui-->
 <br>
 <br>
 <br>
 <br>
  


<!-- Modal, aqui se agrega el residente-->
<div class="modal fade" id="agregar-residente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" >
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar residente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation was-validated" novalidate="">
          <div class="col-md-4">
            <label for="nombre_residente" class="form-label">Nombre(s)</label>
            <input type="text" name = "txtNombre" class="form-control" id="nombreresidente"  required>
            <div class="valid-feedback">
              OK!
            </div>
            <div class="invalid-feedback">
              Por favor ponga un nombre
             </div>
          </div>
          <div class="col-md-4">
            <label for="apellido_1_residente" class="form-label">Apellido</label>
            <input type="text" name = "txtApellido1" class="form-control" id="apellido_1_residente"  required>
            <div class="valid-feedback">
              OK!
            </div>
            <div class="invalid-feedback">
              Por favor ponga el primer apellido
             </div>
          </div>

          <div class="col-md-4">
            <label for="apellido_2_residente" class="form-label">Apellido 2</label>
            <input type="text" name = "txtApellido2" class="form-control" id="apellido_2_residente"  required="">
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
              
              <input type="text" name = "txtEdad" class="form-control" id="edad" type="number" aria-describedby="inputGroupPrepend" required="">
              <div class="invalid-feedback">
               Por favor ponga la edad
              </div>
            </div>

          </div>
          <div class="col-md-5">
            <label for="sexo" class="form-label">Sexo</label>
            <select name = "selSexo" class="form-select" id="sexo" required="">
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
            <input type="text" name = "txtTelefono" class="form-control" id="telefono" type="number" required="10">
            <div class="invalid-feedback">
              Numero a 10 digitos.
            </div>
            </div>
            <div class="col-md-6">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name = "txtCelular" class="form-control" id="celular" type="number" required="10">
            <div class="invalid-feedback">
              Numero a 10 digitos.
            </div>
          </div>
          
          <div class="col-md-6">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" name = "txtDomicilio" class="form-control" id="domicilio" required="">
            <div class="invalid-feedback">
              Por favor escriba el domicilio.
            </div>
          </div>
          <div class="col-md-6">
            <label for="numero_casa" class="form-label">Número de casa</label>
            <input type="text" name = "txtNoCasa" class="form-control" id="numerocasa" required="">
            <div class="invalid-feedback">
              Por favor escriba el número de casa.
            </div>
          </div>
          <div class="col-md-6">
            <label for="entrevialidad_1" class="form-label">Entre vialidad 1</label>
            <input type="text" name = "txtVialidad1" class="form-control" id="entrevialidad1" required="">
            <div class="invalid-feedback">
              Por favor escriba la entre vialidad 1.
            </div>
          </div>
          <div class="col-md-6">
            <label for="entrevialidad_2" class="form-label">Entre vialidad 2</label>
            <input type="text" name = "txtVialidad2" class="form-control" id="entrevialidad2" required="">
            <div class="invalid-feedback">
              Por favor escriba la entre vialidad 2.
            </div>
          </div>
          <div class="col-12">
            <label for="referencias" class="form-label">Referencias</label>
            <input type="text" name = "txtReferencias" class="form-control" id="referencias" required="">
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

<!-- En este modal es para guardar el residente-->
<div class="modal fade" id="validacion-guardar-residente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f50d0d;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Alerta!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Estas seguro que deseas guardar al residente
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#agregar-residente" data-bs-toggle="modal">NO</button>
        <!-- Aqui deberia de ir el backend para guardar en la BD. manda a llamar a la modal que confirma datos-->
        <button type="button" class="btn btn-primary" data-bs-target="#guardado" data-bs-toggle="modal">Si</button>
      <!-- -->
      </div>
    </div>
  </div>
</div>
<!-- fin del modal-->



<!-- Aqui es para guardar un pago-->
<div class="modal fade" id="agregar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar pago</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation was-validated" novalidate="">
          <div class="col-md-4">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha"  required="">
            <div class="valid-feedback">
              OK!
            </div>
            <div class="invalid-feedback">
              formato dd/mm/aaaa
             </div>
          </div>
          <div class="col-md-4">
            <label for="hora" class="form-label">Hora</label>
            <input type="text" class="form-control" id="hora"  required="">
            <div class="valid-feedback">
              OK!
            </div>
            <div class="invalid-feedback">
              formato 24:00
             </div>
          </div>
          <div class="col-md-6">
            <label for="domiciliopago" class="form-label">Domicilio</label>
            <div class="input-group has-validation">
              
              <input type="text" class="form-control" id="domiciliopago" aria-describedby="inputGroupPrepend" required="">
              <div class="invalid-feedback">
               Escriba el domicilio del residente
              </div>
            </div>

          </div>
          
          <div class="col-md-4">
            <label for="numerocasapago" class="form-label">Número de casa</label>
            <input type="text" class="form-control" id="numerocasapago" type="number" required="">
            <div class="invalid-feedback">
              Por favor escriba el número de casa.
            </div>
          </div>
          
          <!-- Aqui esta el select para el titular -->
          <div class="col-md-5">
            <label for="id_titular" class="form-label">Id del titular</label>
            <select class="form-select" id="id_titular" required="">
              <option selected="" disabled="" value="">Escoger...</option>
              <option>Nombre</option>
             
            </select>
            <div class="invalid-feedback">
              Seleccione una opcion
            </div>
          </div>
          <!-- -->

          <div class="col-md-10">
            <label for="nombre_residente_pago" class="form-label">Nombre del residente</label>
            <input type="text" class="form-control" id="nombre_residente_pago"  required="">
            <div class="valid-feedback">
              OK!
            </div>
            <div class="invalid-feedback">
              Por favor ponga el nombre del residente
             </div>
          </div>
<br>
<div id="infopagador">
          Informacion del pagador
        </div>
<br>
          <div class="col-md-4">
          <label for="nombre_pagador" class="form-label">Nombre(s)</label>
          <input type="text" class="form-control" id="nombre_pagador"  required>
          <div class="valid-feedback">
            OK!
          </div>
          <div class="invalid-feedback">
            Por favor ponga un nombre
           </div>
        </div>
        <div class="col-md-4">
          <label for="apellido_1_pagador" class="form-label">Primer apellido</label>
          <input type="text" class="form-control" id="apellido_1_pagador"  required="">
          <div class="valid-feedback">
            OK!
          </div>
          <div class="invalid-feedback">
            Por favor ponga el primer apellido
           </div>
        </div>

        <div class="col-md-4">
          <label for="apellido_2_pagador" class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" id="apellido_2_pagador"  required="">
          <div class="valid-feedback">
            OK!
          </div>
          <div class="invalid-feedback">
            Por favor ponga el segundo apellido
           </div>
        </div>


          <div class="col-md-6">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control" id="concepto" required="">
            
          </div>

          <div class="col-md-4">
            <label for="monto" class="form-label">Monto de pago</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend3">$</span>
              <input type="text" type="number" value="320"class="form-control is-invalid" id="monto" aria-describedby="inputGroupPrepend3 montoFeedback" required="">
              
            </div>
            
          </div>
          

          <!--Select para la forma de pago-->
          <div class="col-md-5">
            <label for="forma_pago" class="form-label">Método de pago</label>
            <select class="form-select" id="forma_pago" required="">
              <option selected="" disabled="" value="">Escoger...</option>
              <option>Cheque</option>
              <option>Tarjeta</option>
              <option>Transferencia</option>
              <option>Efectivo</option>
             
            </select>
            <div class="invalid-feedback">
              Seleccione una opcion
            </div>
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

<!-- En este modal es para guardar el pago-->
<div class="modal fade" id="validacion-guardar-pago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f50d0d;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Alerta! </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Estas seguro que deseas guardar el pago
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#agregar-residente" data-bs-toggle="modal">NO</button>
        <!-- Aqui deberia de ir el backend para guardar en la BD. manda a llamar a la modal que confirma datos-->
        <button type="button" class="btn btn-primary" data-bs-target="#guardado" data-bs-toggle="modal">Si</button>
      <!-- -->
      </div>
    </div>
  </div>
</div>
<!-- fin del modal-->
 
<!-- Esta modal es solo para confirmar que se guardaron datos-->
<div class="modal" id="guardado" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contenido guardado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>:)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        <!-- En este botón cierra el modal para residente-->
       
      </div>
    </div>
  </div>
</div>

   
</body>
</html>
