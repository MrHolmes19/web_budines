<?php include("../conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Elección de la cobertura</title>

    <link rel="stylesheet" href="../../css/headerBudines.css">
    <link rel="stylesheet" href="../../css/bodyBudines.css">
    <link rel="stylesheet" href="../../css/footerBudines.css">
    <link rel="stylesheet" href="../../css/animaciones.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../imagenes/icono.png" type="image/png">
</head>

<body>

    <!----------------- Barra navegacion------------------->
    <?php if ($_SESSION["pestaña"] < 5) {
        $_SESSION["pestaña"] = 5;
    }
    include("navbar.php") ?>
    <!----------------- Encabezado ------------------>
    <!---Pagina para elegir la cobertura, una tabla que se llena desde la bbdd, cada item se genera dinamicamente --->
    <!--y tiene su boton de vista previa el cual llama a la funcion abrirpopup(de la pagina popup.js) --->
    <!--la eleccion se manda por formulario, al final se agrega un item que por defecto viene seleccionado (sin cobertura) --->
    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Cobertura del budín</h1>
            </div>
            <div id="logo">
                <img src="../../imagenes/logo.png" alt="logo de El Rincon de los budines" title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2><?= $_SESSION["nombre"] ?>, elegí la cobertura de tu budín</h2>

            <!----------------- Tabla coberturas---------------------->
            <h3>Coberturas</h3>
            <form action="guarda_eleccion.php" method="get">
                <table id="clasicos">
                    <?php
                    $sql = "SELECT * from precioscoberturas";
                    $result = mysqli_query($conexion, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>

                        <tr>
                            <td class="descripcion">
                                <label for="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>"><input type="radio" name="cobertura" class="radiobutton" id="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>" value="<?php echo $mostrar['Producto'] ?>">
                                    <?php echo $mostrar['Producto'] ?> </label>
                            </td>
                            <td class="precio"> $ <?php echo $mostrar['Precio'] ?>.- </td>
                            <td class="boton"><button onclick="abrirPopup('<?php echo $mostrar['Foto'] ?>','<?php echo $mostrar['Producto'] ?>', event)" class="btn-abrir-popup"> Vista previa </button> </td>
                        </tr>
                    <?php
                    }
                    mysqli_close($conexion);
                    ?>
                    <tr>
                        <td class="descripcion">
                            <label for="sinCobertura">
                                <input type="radio" name="cobertura" class="radiobutton" id="sinCobertura" value="no" checked> Sin Cobertura</label>
                        </td>
                        <td class="precio"> $ 0.- </td>
                    </tr>
                </table>

                <section class="nota">
                    *Se permite una sola cobertura
                </section>
                <div class="footer_blanco"> </div>
        </article>

        <footer>
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="../../imagenes/flechas/Flecha-rosa-atras.png" alt="flecha atras"> </a>
                </div>
                <div class=flecha_siguiente>
                    <button name="enviar" value="cobertura"> <img src="../../imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </button>
                </div>
            </div>

            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
        </form>
    </section>
    <!----------------- Ventana emergente------------------->
    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a href='#' id="btn-cerrar-popup" class="btn-cerrar-popup"> <span class="icon-cross"></span> <i class="fas fa-times"> </i> </a>
            <h4 id="titulo-popup">titulo</h4>
            <h5>La cobertura preferida de Mirta Legrand</h5>
            <img id="img-popup" src="" alt="Imagen del budin">
            <input type="submit" class="btn-elegir" id="btn-elegir" value="Elegir este budín">
        </div>
    </div>

    <!----------------- Javascript------------------->
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/menu.js"></script>
    <script src="../../js/popup.js"></script>
    <script src="../../js/flechaAtras.js"></script>
    <script src="../../js/footer.js"></script>
    <?php include("../../js/noCobertura.php") ?>
    <!-- -->
</body>

</html>