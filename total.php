<?php include("php/conexion.php");
include("php/traerPrecio.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Resumen del pedido</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="../Imagenes/icono.png" type="image/png">

</head>

<body>

    <?php if ($_SESSION["pestaña"] < 5) {
        $_SESSION["pestaña"] = 5;
    }
    include("php/navbar.php") ?>


    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Resumen de tu pedido</h1>
            </div>
            <div id="logo">
                <img src="imagenes/logo.png" alt="logo de El Rincon de los budines" title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2>Nombre, Has elegido:</h2>
            <table id="total">
                <tr>
                    <td class="descripcion"> <?= $_SESSION["sabor"] ?> </td>
                    <td class="precio"> $<?= $precioSabor ?> </td>
                </tr>

                <?php
                $n = $_SESSION["nAgregados"];

                if ($n > 0) {  ?>
                    <tr>
                        <td class="descripcion"> <?= $_SESSION["agregado1"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado1 ?> </td>
                    </tr>
                <?php   }
                if ($n > 1) {  ?>
                    <tr>
                        <td class="descripcion"> <?= $_SESSION["agregado2"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado2 ?> </td>
                    </tr>
                <?php   }
                if ($n > 2) {  ?>
                    <tr>
                        <td class="descripcion"> <?= $_SESSION["agregado3"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado3 ?> </td>
                    </tr>
                <?php }
                if ($_SESSION["tieneCobertura"] == "SI" && $_SESSION["cobertura"] != "no") {    ?>
                    <tr>
                        <td class="descripcion"> <?= $_SESSION["cobertura"] ?> </td>
                        <td class="precio"> $<?= $precioCobertura ?> </td>
                    </tr>

                <?php   }    ?>
                <tr>
                    <td class="descripcion"> Total: </td>
                    <td class="precio"> $<?= $total ?> </td>
                </tr>
            </table>


            <div class="footer_blanco"> </div>
        </article>

        <?php include("php/footer.php") ?>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>
    <!-- -->
</body>

</html>