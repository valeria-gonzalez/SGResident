<?php 
    include_once '../conexion_bd.php';
    include_once 'datos_mod_res.php';

    $id = $_GET['id_'];
    
    if(isset($_POST['btn-resi-mod'])){
        
       
        /*$nombres = getNombres();
        $apellido1 = getApellido1();
        $apellido2 = getApellido2();
        $edad = getEdad();
        $sexo = getSexo();
        $telefono = getTelefono();
        $celular = getCelular();
        $mod_dom = modDom();
        

        $insert_tit = "UPDATE titular 
                       SET NOMBRE = '$nombres', PR_APELL = '$apellido1', SEG_APELL = '$apellido2', 
                           SEXO = '$sexo', EDAD = $edad, CELULAR = '$celular', TEL_CASA = '$telefono'
                       WHERE ID_TITULAR = $";
                  

        $resultado_tit = mysqli_query($conexion, $insert_tit);

        if($resultado_tit){
            $id = mysqli_query($conexion, "SELECT MAX(ID_TITULAR) FROM titular");

            $id_tit = mysqli_fetch_array($id);

            if($existeDom == "No"){
                $domicilio = getDomicilio();
                $noCasa = getNoCasa();
                $vialidad1 = getVialidad1();
                $vialidad2 = getVialidad2();
                $referencias = getReferencias();

                $insert_dom = "INSERT INTO domicilio (CALLE, NO_CASA, VIALIDAD_1, VIALIDAD_2, REFERENCIAS, ID_TITULAR)
                                VALUES ('$domicilio', $noCasa, '$vialidad1', '$vialidad2', '$referencias', $id_tit[0])";
                
                $resultado_dom = mysqli_query($conexion, $insert_dom);
            }
            else{
                $domExistente = getDomExistente();
                $values = explode("+", $domExistente);
                $insert_dom = "UPDATE domicilio SET ID_TITULAR = $id_tit[0] WHERE CALLE = '$values[0]' AND NO_CASA = '$values[1]'";
                $resultado_dom = mysqli_query($conexion, $insert_dom);
            }
        }

        $cerrar_cn = mysqli_close($conexion);*/
        header("location: ../../secciones/vista_res.php");
    }
?>

<html>
<head>
    <META name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Modificar Residentes</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel = "stylesheet" href = "../../css/style.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 
    <script>
        $(document).ready(function(){
            $("#modificar-residente").modal('show');
        });
    </script>
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
        </div>
    </div>

    <!---------------------------aqui se modfica un residente-------------------------------------------------------------->
    <div class="modal fade" id="modificar-residente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="h1-modal">
                        <label>Modificar residente</label>
                    </div>
                    <!--end h1-modal-->
                    
                </div>
                <!--end modal-header-->

                <div class="modal-header" id="indicacion">
                    <label>Llena los campos del formulario para modificar un residente</label>
                </div>
                <!--end modal-header-->

                <div class="modal-body">
                    <form method="POST" class="row g-3 needs-validation was-validated">
                        <div class="col-md-4">
                            <label for="nombre_residente" class="form-label">Nombre(s)</label>
                            <input type="text" name="txtNombre" class="form-control" id="nombreresidente" autocomplete="off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga un nombre
                            </div>
                        </div>
                        <!--end col-md-4-->

                        <div class="col-md-4">
                            <label for="apellido_1_residente" class="form-label">Apellido 1</label>
                            <input type="text" name="txtApellido1" class="form-control" id="apellido_1_residente" autocomplete="off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el primer apellido
                            </div>
                        </div>
                        <!--end col-md-4-->

                        <div class="col-md-4">
                            <label for="apellido_2_residente" class="form-label">Apellido 2</label>
                            <input type="text" name="txtApellido2" class="form-control" id="apellido_2_residente" autocomplete="off" required>
                            <div class="valid-feedback">
                                OK!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ponga el segundo apellido
                            </div>
                        </div>
                        <!--end col-md-4-->

                        <div class="col-md-5">
                            <label for="edad" class="form-label">Edad</label>
                            <div class="input-group has-validation">

                                <input type="number" name="txtEdad" class="form-control" id="edad" aria-describedby="inputGroupPrepend" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Por favor ponga la edad
                                </div>
                            </div>
                        </div>
                        <!--end col-md-5-->

                        <div class="col-md-5">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select name="selSexo" class="form-select" id="sexo" required>
                                <option selected="" disabled="" value="">Escoger sexo...</option>
                                <option value="M">Mujer</option>
                                <option value="H">Hombre</option>
                                <option value="O">Otro</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!--end col-md-5-->

                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" name="txtTelefono" class="form-control" id="telefono" required="10" autocomplete="off">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" name="txtCelular" class="form-control" id="celular" type="number" required autocomplete="off">
                            <div class="invalid-feedback">
                                Numero a 10 digitos.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="modal-header" id="indicacion2">
                            <label>Elige si quieres modificar el domicilio que le corresponde al titular</label>
                        </div>
                        <!--end modal-header-->
                        <div class="col-md-6">
                            <label for="existe-dom" class="form-label">¿Desea modificar el domicilio?</label>
                            <select class="form-select" required name="mod-dom" onchange="if(this.value=='No') {document.getElementById('existe-dom').disabled = true, document.getElementById('domicilio').disabled = true , document.getElementById('numerocasa').disabled = true , document.getElementById('entrevialidad1').disabled = true, 
                                                                                                          document.getElementById('entrevialidad2').disabled = true, document.getElementById('referencias').disabled = true, document.getElementById('selDom').disabled = true} else 
                                                                                                            {document.getElementById('existe-dom').disabled = false}">
                                <option selected="" disabled="" value="">Responder (Sí/No)</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="existe-dom" class="form-label">¿Ya existe el domicilio?</label>
                            <select disabled class="form-select" id= "existe-dom" required name="existe-dom" onchange="if(this.value=='No') {document.getElementById('domicilio').disabled = false , document.getElementById('numerocasa').disabled = false , document.getElementById('entrevialidad1').disabled = false, 
                                                                                                          document.getElementById('entrevialidad2').disabled = false, document.getElementById('referencias').disabled = false, document.getElementById('selDom').disabled = true} else 
                                                                                                            {document.getElementById('domicilio').disabled = true , document.getElementById('numerocasa').disabled = true , document.getElementById('entrevialidad1').disabled = true, 
                                                                                                          document.getElementById('entrevialidad2').disabled = true, document.getElementById('referencias').disabled = true, document.getElementById('selDom').disabled = false}">
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
                            <select name="selDom" class="form-select" id="selDom" required disabled>
                                <option selected="" disabled="" value="">Escoger domicilio...</option>
                                <?php
                                $rsM = mysqli_query($conexion, "SELECT * FROM domicilio WHERE ID_TITULAR IS NULL");
                                //recorriendo por todos los materiales que existen en la bd, rsM es el resultado de la consulta de arriba
                                while ($domicilio = mysqli_fetch_array($rsM)) {
                                    echo "<option value = '$domicilio[0]+$domicilio[1]'> $domicilio[0] $domicilio[1] </option>"; //material[0] es el id (el valor) y material[1] es el nombre (que se muestra en la opcion)
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione una opcion
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="domicilio" class="form-label">Calle</label>
                            <input type="text" name="txtDomicilio" class="form-control" id="domicilio" autocomplete="off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba la calle.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="numero_casa" class="form-label">Número de casa</label>
                            <input type="text" name="txtNoCasa" class="form-control" id="numerocasa" autocomplete="off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba el número de casa.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_1" class="form-label">Entre vialidad 1</label>
                            <input type="text" name="txtVialidad1" class="form-control" id="entrevialidad1" autocomplete="off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 1.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-md-6">
                            <label for="entrevialidad_2" class="form-label">Entre vialidad 2</label>
                            <input type="text" name="txtVialidad2" class="form-control" id="entrevialidad2" autocomplete="off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba la entre vialidad 2.
                            </div>
                        </div>
                        <!--end col-md-6-->

                        <div class="col-12">
                            <label for="referencias" class="form-label">Referencias</label>
                            <input type="text" name="txtReferencias" class="form-control" id="referencias" autocomplete="off" required disabled>
                            <div class="invalid-feedback">
                                Por favor escriba algunas referencias.
                            </div>
                        </div>
                        <!--end col-12-->

                        <!-- Fin del formulario para agregar residente-->

                        <div class="modal-footer">
                            <!-- En este botón lleva a una modal para confirmar que se quieren guardar los datos del residente-->
                            
                            <button class="btn btn-primary" name="btn-resi-mod" type="submit">Guardar</button>
                            
                            <!-- En este botón cierra el modal para residente-->
                            <a href = "../../secciones/vista_res.php">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </a>
                            <!-- -->

                        </div>
                        <!--end modal-footer-->
                    </form>
                    <!--end form-->
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
    <!--end modal fade-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/sgclaro/cabeceras/";
    include($IPATH . "scripts-fin.html"); ?>
</body>
</html>