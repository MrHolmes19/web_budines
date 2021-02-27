<?php include("php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Desperdida</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">

</head>

<body>

    <?php

    $id = $_GET["id"];

    ?>
    <!----------------- Encabezado ------------------>
    <section id="wrap" class="wrap">

        <article class="nombre">
            <h2>Compra exitosa!</h2>
            <h2>Que disfrutes tu budin</h2>
            <h2>Gracias por elegirnos!</h2>
            <div class="despedida">
                <button onclick="window.location.replace('index.php')">Volver al inicio</button>
                <button onclick="window.location.replace('forma.php')">Pedir otro budin</button>
                <button onclick="window.open('php/admin/imprimirPedidoPDF.php?id=<?= $id ?>')">Imprimir comprobante</button>
            </div>
        </article>

        <footer>
            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>

    <!----------------- Javascript------------------->
    <!-- -->
</body>

</html>