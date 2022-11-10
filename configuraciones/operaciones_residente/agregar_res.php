<?php 
    include_once '../conexion_bd.php';

    
    if(isset($_POST['btn-resi-agr'])){
        $nombres = $_POST['txtNombre'];
        $apellido1 = $_POST['txtApellido1'];
        $edad = $_POST['txtEdad'];

        if(!empty($_POST['selSexo']))
            $sexo = $_POST['selSexo'];

        $telefono = $_POST['txtTelefono'];
        $celular = $_POST['txtCelular'];
        $domicilio = $_POST['txtDomicilio'];
        $noCasa = $_POST['txtNoCasa'];
        $vialidad1 = $_POST['txtVialidad1'];
        $vialidad2 = $_POST['txtVialidad2'];
        $referencias = $_POST['txtReferencia'];

        $query = "INSERT INTO residentes(nombres, apellido1, edad, sexo, telefono, celular, domicilio, noCasa, 
                                         vialidad1, vialidad2, referencias) 
                  VALUES ('$nombres', '$apellido1', '$edad', '$sexo', '$telefono', '$celular', '$domicilio', 
                          '$noCasa', '$vialidad1', '$vialidad2', '$referencias')";

        $resultado = mysqli_query($conexion, $query);
    }
    
    


?>