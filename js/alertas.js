



function confirmacion(){
    var respuesta = confirm("¿Está seguro que desea agregar la informacion?");

    if(respuesta == true)
        return true;
    else
        return false;
}


function contraseña_actualizada(){
    var respuesta = confirm("¿Actualizar Contraseña?");

    if(respuesta == true)
        return true;
    else
        return false;
}

function modificar(){
    var respuesta = confirm("Esta seguro que desea modificar los datos?");

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