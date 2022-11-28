<?php
include_once '../configuraciones/conexion_bd.php';
$query_consulta = "SELECT 
 c1.ID_PAGO, c1.FCHA_PAGO, c1.MES, c1.MONTO, c1.RECIBIDO, 
                        CONCAT(c1.NOM_PAGADOR, ' ', c1.PAG_APELL_1, ' ', c1.PAG_APELL_2) AS RESPONSABLE,
                        CONCAT(c2.NOMBRE, ' ', c2.PR_APELL, ' ', c2.SEG_APELL) AS TITULAR,
                        CONCAT(c3.CALLE, ' ', c3.NO_CASA) AS DOMICILIO
                    FROM
                        pago c1 
INNER JOIN titular c2 USING (ID_TITULAR)
INNER JOIN domicilio c3 USING (ID_TITULAR)
ORDER BY ID_PAGO DESC LIMIT 1;";


$consulta = mysqli_query($conexion, $query_consulta);


if ($consulta) {
    if (mysqli_num_rows($consulta) > 0) {
        $obj = mysqli_fetch_object($consulta);
    }
}

?>

<!doctype HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META name="viewport" content="width = device-width, initial-scale = 1.0">
    <title>Recibo</title>
    <link rel="icon" type = "image" href="/sgclaro/favicon.png"> 

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilorecibo.css">
    <link rel="stylesheet" href="../css/modal.css">
    <!--<script src="../js/jquery-3.6.0.min.js"></script>-->
    <!--link rel="shortcut icon" href="src/1.png"-->
</head>

<body>


    <div id="general">
        <div class="card">
            <p class="title">Recibo</p>
            <div class="pricecontainer">
                <p class="price">Pagó la cantidad de:</p>
                <p class="price">$<?php echo  $obj->RECIBIDO; ?></p>
                <p class="includes">Residente titular: <?php echo $obj->TITULAR ?></p>
                <p class="includes">Domicilio: <?php echo $obj->DOMICILIO ?> </p>


            </div>
            <p class="includes">Pagado por: <?php echo $obj->RESPONSABLE ?></p>

            <p class="includes">Pagó el mes de: <?php echo $obj->MES ?></p>

            <p class="includes">Fecha y hora del pago: <?php echo $obj->FCHA_PAGO ?></p>


            <p class="includes">ID del pago: <?php echo $obj->ID_PAGO ?></p>


            <div class="btncontainer">
                <button value="Imprimir" class="printbutton">Imprimir</button>
            </div>
        </div>
    </div>


</body>

<script>
    document.querySelectorAll('.printbutton').forEach(function(element) {
        element.addEventListener('click', function() {
            print();
        });
    });
</script>