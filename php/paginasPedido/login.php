<?php include("../conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>El Rincon de los budines - Bienvenida</title>

    <link rel="stylesheet" href="../../css/headerBudines.css">
    <link rel="stylesheet" href="../../css/bodyBudines.css">
    <link rel="stylesheet" href="../../css/footerBudines.css">
    <link rel="stylesheet" href="../../css/animaciones.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../imagenes/icono.png" type="image/png">

</head>

<body>

    <!----------------- Barra navegacion------------------->
    <?php
    $_SESSION["pestaña"] = 1;
    include("navbar.php") ?>
    <!----------------- Encabezado ------------------>
    <!-- Pagina para ingresar el nombre, lo manda por formulario a guarda_eleccion.php --->
    <section id="wrap" class="wrap">

        <article class="nombre">

            
            <form class="formLogin" action="guarda_eleccion.php">
                <h2>Antes de empezar, decime tu nombre</h2>
                <input type="text" name="nombre">
                <button name="enviar" value="nombre"> Siguente </button>
            </form>

        </article>

        <footer>
            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>

    <!----------------- Javascript------------------->
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/menu.js"></script>
    <script src="../../js/footer.js"></script>
    <!-- -->
</body>

</html>