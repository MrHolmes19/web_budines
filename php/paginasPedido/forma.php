<?php include("../conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Elección de forma</title>

    <link rel="stylesheet" href="../../css/headerBudines.css">
    <link rel="stylesheet" href="../../css/bodyBudines.css">
    <link rel="stylesheet" href="../../css/footerBudines.css">
    <link rel="stylesheet" href="../../css/animaciones.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../Imagenes/icono.png" type="image/png">

</head>

<body>

    <!----------------- Barra navegacion------------------->
    <?php if ($_SESSION["pestaña"] < 2) {
        $_SESSION["pestaña"] = 2;
    }
    include("navbar.php") ?>
    <!----------------- Encabezado ------------------>
    <!-- Pagina para elegir la forma, cada imagen esta adentro de un link que manda por get la eleccion --->
    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Forma del budín</h1>
            </div>
            <div id="logo">
                <img src="../../imagenes/logo.png" alt="logo de El Rincon de los budines" title="logo El Rincon de los budines">
            </div>
        </section>
        <article class="forma">
            <h2><?= $_SESSION["nombre"] ?>, elegí la forma de tu budín</h2>


                <div class="imagen">
                <div class="comentario">
                    <a href="../guarda_eleccion.php?forma=rectangular&enviar=forma" class="forma">
                    <img src="../../imagenes/formas/formarectangular.jpg" alt=""></a>
                    <h3>Rectangular, si sos mas clasic@</h3> </div>

                    <div class="comentario">
                    <a href="../guarda_eleccion.php?forma=circular&enviar=forma" class="forma">
                    <img src="../../imagenes/formas/formacircular.jpg" alt=""></a>
                    <h3>Redondo, si te sentis atrevid@</h3> </div>
                </div>
                


                <section class="nota">
                    *Independientemente de la forma, el peso no cambia(700gr. aprox.);
                </section>
                <div class="footer_blanco"> </div>

        </article>

        <footer>
        <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>

    <!----------------- Javascript------------------->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/footer.js"></script>

    <!-- -->
</body>

</html>