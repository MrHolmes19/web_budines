<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Error</title>

    <link rel="stylesheet" href="../../css/headerBudines.css">
    <link rel="stylesheet" href="../../css/bodyBudines.css">
    <link rel="stylesheet" href="../../css/footerBudines.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../Imagenes/icono.png" type="image/png">

</head>

<?php if (isset($_GET["error"])) {
    $error = $_GET["error"];
} else {
    $error = "Error inesperado";
}
?>

<body>
    <!----------------- Encabezado ------------------>
    <section id="wrap" class="wrap2">

        <article class="nombre">
            <h2>Algo salio mal!</h2>
            <img class="warning" src="imagenes/error.png" />
            <div class="error">
                <h2> <?= $error ?> </h2>
                <button onclick="window.location.replace('index.html')">Volver al inicio</button>
                <button onclick="window.location.replace('forma.php')">Pedir otro budin</button>
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