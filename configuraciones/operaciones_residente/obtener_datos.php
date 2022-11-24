<?php
    function getNombres(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') //esta linea resulta necesaria pq se debe diferenciar si se manda por post o get
            return $_POST['txtNombre']; //guardamos el valor del campo referenciandolo por su nombre
    }

    function getApellido1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtApellido1'];
    }

    function getApellido2(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtApellido2'];
    }

    function getEdad(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtEdad'];
    }

    function getSexo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['selSexo'];
    }

    function getTelefono(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtTelefono'];
    }

    function getCelular(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtCelular'];
    }

    function getDomicilio(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtDomicilio'];
    }

    function getNoCasa(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtNoCasa'];
    }

    function getVialidad1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtVialidad1'];
    }

    function getVialidad2(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtVialidad2'];
    }

    function getReferencias(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtReferencias'];
    }

    function getDomExistente(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['selDom'];
    }

    function existeDom(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['existe-dom'];
    }

?>