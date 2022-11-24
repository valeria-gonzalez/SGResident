<?php
include_once '../configuraciones/conexion_bd.php';
$query_consulta = "SELECT *  FROM pago ORDER BY ID_PAGO	 DESC LIMIT 1 ";
$consulta = mysqli_query($conexion, $query_consulta);

$query_consulta2 = "SELECT *  FROM titular where ID_TITULAR = $query_consulta ";
$consulta2 = mysqli_query($conexion, $query_consulta2);


$fila = mysqli_fetch_array($consulta);
mysqli_free_result($consulta);
?>

<!doctype HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META name="viewport" content="width = device-width, initial-scale = 1.0">
    <title>Recibo</title>


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
                <p class="price">$<?php echo $fila['RECIBIDO']; ?></p>
                <p class="includes">Id del residente titular: <?php echo $fila['ID_TITULAR']; ?></p>


            </div>
            <p class="includes">Pagado por: <?php echo $fila['NOM_PAGADOR']; ?>
                <?php echo $fila['PAG_APELL_1']; ?> <?php echo $fila['PAG_APELL_2']; ?></p>

            <p class="includes">Pagó el mes de: <?php echo $fila['MES']; ?></p>

            <p class="includes">Fecha y hora del pago</p>
            <th><?php echo $fila['FCHA_PAGO']; ?></th>

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