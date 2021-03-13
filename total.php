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
<!----------------- Barra navegacion------------------->
    <?php if ($_SESSION["pestaña"] < 6) {
        $_SESSION["pestaña"] = 6;
    }
    include("php/navbar.php") ?>

    <!----------------- Encabezado ------------------>
    <!-- Pagina para visualizar el resumen del pedido, se traen las elecciones de la sesion y con esos datos el--->
    <!-- archivo traerPrecio.php(include) busca en la bbdd los precios y guarda en variables para luego llenar la--->
    <!-- tabla con esos datos. con un input y dos btn se puede seleccionar la cantidad(controlado por contador.js) --->
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
            <h2><?= $_SESSION["nombre"] ?>, Has elegido sabiamente:</h2>
            <table id="total">
                <tr>
                    <td class="descripcion">Budin de: <?= $_SESSION["sabor"] ?> </td>
                    <td class="precio"> $<?= $precioSabor ?> </td>
                </tr>

                <?php
                $n = $_SESSION["nAgregados"];

                if ($n > 0) {  ?>
                    <tr>
                        <td class="descripcion">Con agregado de: <?= $_SESSION["agregado1"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado1 ?> </td>
                    </tr>
                <?php   }
                if ($n > 1) {  ?>
                    <tr>
                        <td class="descripcion">Con agregado de: <?= $_SESSION["agregado2"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado2 ?> </td>
                    </tr>
                <?php   }
                if ($n > 2) {  ?>
                    <tr>
                        <td class="descripcion">Con agregado de: <?= $_SESSION["agregado3"] ?> </td>
                        <td class="precio"> $<?= $precioAgregado3 ?> </td>
                    </tr>
                <?php }
                if ($_SESSION["tieneCobertura"] == "SI" && $_SESSION["cobertura"] != "no") {    ?>
                    <tr>
                        <td class="descripcion">Con cobertura de: <?= $_SESSION["cobertura"] ?> </td>
                        <td class="precio">$<?= $precioCobertura ?></td>
                    </tr>

                <?php   }    ?>
                <tr>
                    <td class="descripcion"><strong> Cantidad:</strong> </td>
                    <td class="cantidad">
                            <button class="btn menos" onclick="btnMenos()">-</button>
                            <input class="" min="1" max="3" name="cantidad" value="1" type="number" readonly>
                            <button class="btn mas" onclick="btnMas()">+</button>
                    </td>
                </tr>
                <tr>
                    <td class="descripcion"><strong> Total: </strong></td>
                    <td class="precio" id="PrecioFinal"><strong>$<?= $total ?></strong></td>
                </tr>
            </table>


            <div class="footer_blanco"> </div>
        </article>

        <footer>
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="imagenes/flechas/flecha-rosa-atras.png" alt="flecha atras"> </a>
                </div>
                <div class=flecha_siguiente>
                    <button name="enviar" value="agregados" onclick="seguir()"> <img src="imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </button>
                </div>
            </div>

            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/contador.js"></script>
    <script src="js/flechaAtras.js"></script>
    <script src="js/footer.js"></script>
    <!-- -->
</body>

</html>