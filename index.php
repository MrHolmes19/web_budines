<?php include("php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Elección del sabor</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">

</head>

<body>

    <!----------------- Barra navegacion------------------->
    <?php
    $_SESSION["pestaña"] = 2;
    include("php/navbar.php") ?>
    
    <!----------------- Encabezado ------------------>
    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Sabor del budín</h1>
            </div>
            <div id="logo">
                <img src="imagenes/logo.png" alt="logo de El Rincon de los budines" title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2>Nombre, elegí el sabor de tu budín</h2>

            <!----------------- Tabla sabores clasicos------------------->
            <h3>Sabores clásicos</h3>
            <form action="php/guarda_eleccion.php" method="get">
                <table id="clasicos">
                    <?php
                    $sql = "SELECT * from sabores_clasicos";
                    $result = mysqli_query($conexion, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="descripcion">
                                <label for="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>"><input type="radio" name="sabor" class="radiobutton" id="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>" value="<?php echo $mostrar['Producto'] ?>">
                                    <?php echo $mostrar['Producto'] ?> </label>
                            </td>
                            <td class="precio"> $ <?php echo $mostrar['Precio'] ?>.- </td>
                            <td class="boton"><button onclick="abrirPopup('<?php echo $mostrar['Foto'] ?>','<?php echo $mostrar['Producto'] ?>', event)" class="btn-abrir-popup"> Vista previa </button> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <!----------------- Tabla sabores especiales------------------->
                <h3>Sabores Especiales</h3>
                <table id="especiales">
                    <?php
                    $sql = "SELECT * from sabores_especiales";
                    $result = mysqli_query($conexion, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>

                        <tr>
                            <td class="descripcion">
                                <label for="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>"> <input type="radio" name="sabor" class="radiobutton" id="<?php echo str_replace(' ', '_', $mostrar['Producto']) ?>" value="<?php echo $mostrar['Producto'] ?>">
                                    <?php echo $mostrar['Producto'] ?> </label>
                            </td>
                            <td class="precio"> $ <?php echo $mostrar['Precio'] ?>.- </td>
                            <td class="boton"><button onclick="abrirPopup('<?php echo $mostrar['Foto'] ?>','<?php echo $mostrar['Producto'] ?>', event)" class="btn-abrir-popup"> Vista previa </button> </td>
                        </tr>
                    <?php
                    }
                    mysqli_close($conexion);
                    ?>
                </table>

                <section class="nota">
                    *Se permite un solo sabor por pedido
                </section>
                <div class="footer_blanco"> </div>
        </article>

        <footer>
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="imagenes/flechas/flecha-rosa-atras.png" alt="flecha atras"> </a>
                </div>

                <div class=flecha_siguiente>
                    <button name="enviar" value="sabor" onclick="validacion(event)"> <img src="imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </button>
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
            <a href=# id="btn-cerrar-popup" class="btn-cerrar-popup"> <span class="icon-cross"></span> <i class="fas fa-times"> </i> </a>
            <h4 id="titulo-popup">titulo</h4>
            <h5>El budin preferido por todos y que nunca falla</h5>
            <img id="img-popup" src="" alt="Imagen del budin">
            <input type="submit" class="btn-elegir" id="btn-elegir" value="Elegir este budín">
        </div>
    </div>
    <!----------------- Javascript------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script><!--libreria para alertas-->
    <script src="js/menu.js"></script>
    <script src="js/popup.js"></script>
    <script>
        function validacion(e) {
            if (document.querySelector('input[name="sabor"]:checked') == null) {
                //alert("elegi uno papa!");
                Swal.fire('No seas hijo de puta y elegi uno!!');

                e = e || window.event; //capturo el evento
                e.preventDefault(); //evita que envie el formulario
            }

        };
    </script>
    <!-- -->
</body>

</html>