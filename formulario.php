<?php include("php/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Datos de entrega</title>

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
    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Datos de envio</h1>
            </div>
            <div id="logo">
                <img src="imagenes/logo.png" alt="logo de El Rincon de los budines" title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2><?= $_SESSION["nombre"] ?>, ya casi tenes tu budin:</h2>
            <!----------------- Formulario ------------------->
            <form action="php/enviarPedido.php" id="formulario" class="datos">

                <label for="nombre"> Nombre*
                    <input type="text" name="nombre" id="nombre" placeholder="Ej.: Juan" value="<?= $_SESSION["nombre"] ?>" required> </label>
                <label for="nombre"> Telefono*
                    <input type="tel" name="telefono" id="telefono" placeholder="Ej.: 1234-5678" required> </label>
                <label for="nombre"> Email*
                    <input type="email" name="email" id="email" placeholder="Ej.: juan@perez.com" required> </label>
                <label for="nombre"> Direccion*
                    <input type="text" name="direccion" id="direccion" placeholder="Ej.: calle 123 - localidad" required> </label>
                <label for="nombre"> Fecha de entrega*
                    <input type="date" id="fechaEntrega" name="fechaEntrega" value="" min="" max="" required> </label>
                <label for="nombre"> Forma de pago
                    <select name="formaPago" id="formaPago">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Mercado Pago">Mercado Pago</option>
                        <option value="Transferencia">Transferencia</option>
                    </select> </label>
                <label for="nombre"> Comentarios
                    <textarea name="comentarios" id="comentarios" cols="30" rows="4" placeholder="Que te gustaria decirnos?"></textarea>
                </label>
            </form>
            <div class="footer_blanco"> </div>
        </article>
        <!----------------- Footer ------------------->
        <footer>
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="imagenes/flechas/flecha-rosa-atras.png" alt="flecha atras"> </a>
                </div>
                <div class=flecha_siguiente>
                    <button type="submit" onclick="enviarFormulario()" form="formulario" name="enviar" value="final"> <img src="imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </button>
                </div>
            </div>

            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer>
    </section>
    <!----------------- Javascript------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/fechas.js"></script>
    <script src="js/flechaAtras.js"></script>
    <script>
        //validar el envio del formulario
        function enviarFormulario() {
            let nombre = document.querySelector("#nombre").value;
            let telefono = document.querySelector("#telefono").value;
            let email = document.querySelector("#email").value;
            let direccion = document.querySelector("#direccion").value;
            let entrega = document.querySelector("#fechaEntrega").value;

            if (nombre != "" && telefono != "" && email != "" && direccion != "" && entrega != "") {
                document.querySelector("#formulario").submit();
            }
        }
    </script>
    <!-- -->
</body>

</html>