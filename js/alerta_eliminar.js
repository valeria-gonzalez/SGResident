function confirmacion(){
    var respuesta = confirm("¿Está seguro que desea eliminar este registro?");

    if(respuesta == true)
        return true;
    else
        return false;
}

function confirmar_venta(){
    var respuesta = confirm("El pedido ha sido vendido\n¿Es correcto?");

    if(respuesta == true)
        return true;
    else
        return false;
}

function confirmacion_rec(){
    var respuesta = confirm("¿Está seguro que desea recuperar este registro?");

    if(respuesta == true)
        return true;
    else
        return false;
}

function confirm_register(){
    var respuesta = alert("Registro ingresado correctamente");
}


