<?php include("../conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Despedida</title>

    <link rel="stylesheet" href="../../css/headerBudines.css">
    <link rel="stylesheet" href="../../css/bodyBudines.css">
    <link rel="stylesheet" href="../../css/footerBudines.css">
    <link rel="stylesheet" href="../../css/animaciones.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../Imagenes/icono.png" type="image/png">

</head>

<body>

    <?php

    $id = $_GET["id"];

    ?>
    <!----------------- Encabezado ------------------>
    <section id="wrap" class="wrap2">

        <article class="nombre">
            <h2 class="tituloDespedida">¡COMPRA EXITOSA!</h2>
            <h3 class="disfrutes">Que disfrutes tu budin</h3>
            <h3 class="gracias">Gracias por elegirnos!</h3>
            <div class="despedida">
                <button onclick="window.location.replace('../../index.html')">Volver al inicio</button>
                <button onclick="window.location.replace('forma.php')">Pedir otro budin</button>
                <button onclick="window.open('../admin/imprimirPedidoPDF.php?id=<?= $id ?>')">Imprimir comprobante</button>
            </div>
        </article>

        <footer>
            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>

    <!----------------- Javascript------------------->
    <script src="js/footer.js"></script>
    <!-- -->
</body>

</html>