<?php
    function getTitular(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') //esta linea resulta necesaria pq se debe diferenciar si se manda por post o get
            return $_POST['selTitular']; //guardamos el valor del campo referenciandolo por su nombre
    }

    function getDomicilio(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['Domicilio'];
    }

    function getNombre(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtResponsable'];
    }

    function getApellido1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtApell1Res'];
    }

    function getApellido2(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtApell2Res'];
    }

    function getMes(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['selMes'];
    }

    function getMonto(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtMonto'];
    }

    function getTelefono(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtTelefono'];
    }

    function getCelular(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtCelular'];
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