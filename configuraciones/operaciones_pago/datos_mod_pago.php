<?php
    function esAdeudo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['esAdeudo'];
    }

    function getTitular(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') //esta linea resulta necesaria pq se debe diferenciar si se manda por post o get
            return $_POST['selTitular']; //guardamos el valor del campo referenciandolo por su nombre
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

    function getRecibido(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtRecibido'];
    }

    function getFormaPago(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['formaPago'];
    }

    function getNoCheque(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtNoCheque'];
    }

    function getNoTarjeta(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtNoTarjeta'];
    }

    function getFechaExp(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtFechaExp'];
    }

    function getCVV(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtCVV'];
    }

    function getClaveTrans(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['txtClaveTrans'];
    }

    function convertirAdeudo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['convertirAdeudo'];
    }

    function modMetodo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['mod-met'];
    }

?>