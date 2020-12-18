<?php include("php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Bienvenida</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">

</head>

<body>

    <!----------------- Barra navegacion------------------->
    <?php
    $_SESSION["pestaña"] = 0;
    include("php/navbar.php") ?>
    <!----------------- Encabezado ------------------>
    <section id="wrap" class="wrap">

        <article class="nombre">

            <h2>Antes de empezar, decime tu nombre</h2>
            <form action="php/guarda_eleccion.php">
                <input type="text" name="nombre">
                <button name="enviar" value="nombre"> Siguente </button>
            </form>



            <div class="footer_blanco"> </div>

        </article>

        <footer>
            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>

    <!----------------- Javascript------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>


    <!-- -->
</body>

</html>