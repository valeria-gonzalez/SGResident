<?php
    function getDomicilio(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['domCalle'];
    }

    function getNoCasa(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['domNoCasa'];
    }

    function getVialidad1(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['domVial1'];
    }

    function getVialidad2(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['domVial2'];
    }

    function getReferencias(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return $_POST['domReferencias'];
    }
?>