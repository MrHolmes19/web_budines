<?php
//Interfaz para la creacion de un nuevo producto
include("metodos.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Editar</title>

    <link rel="stylesheet" href="../../css/administrador_tablas.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../imagenes/icono.png" type="image/png">
</head>

<?php

if (isset($_GET["tabla"])) {
    $tabla = $_GET["tabla"];
}
?>

<body id="cuerpoEditar">
    <header>
        <h1>Interfaz de administrador - Editar <?= $tabla ?></h1>
    </header>

    <section id="listaEditable">
        <div class="contenido2">
            <h2>Edita tu producto:</h2>
            <!-----Inputs----->
            <form action="agregarProducto.php" id="formulario1" method="POST" enctype="multipart/form-data">
                <div id="formulario">
                    <div id="valores">
                        <input type="hidden" name="tabla" value="<?= $tabla ?>">

                        <label for="producto">Producto
                            <input type="text" name="producto" id="producto" value="" required></label>

                        <label for="precio">Precio
                            <input type="text" name="precio" id="precio" value="" required></label>


                        <?php
                        if ($tabla == "sabores_clasicos" or $tabla == "sabores_especiales") { ?>

                            <label for="agregadosmax">Maximo de agregados
                                <input type="number" name="agregadosmax" id="agregadosmax" value="1" min="0" max="3" required></label>

                            <label for="">Cobertura
                                <div class="radio">
                                    <label for="coberSi">Si<input type="radio" name="cobertura" id="coberSi" value="SI"></label>
                                    <label for="coberNo">No<input type="radio" name="cobertura" id="coberNo" value="NO"></label>
                                </div>
                            </label>

                        <?php
                        } ?>
                        <label for="">Disponible
                            <div class="radio">
                                <label for="dispSi">Si<input type="radio" name="disponible" id="dispSi" value="SI"></label>
                                <label for="dispNo">No<input type="radio" name="disponible" id="dispNo" value="NO"></label>
                            </div>
                        </label>

                    </div>
                    <div id="img-producto"><img id="vistaPrevia" src="../../imagenes/img_subidas/<?= $row['Foto'] ?>" alt="">
                        <input type="file" name="imagen" size="20" onchange="document.getElementById('vistaPrevia').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                    </div>
                </div>
            </form>
            <!-----Botones----->
            <div class="botones" id="botones">
                <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Cancelar" onclick="window.location.replace('administrador.php')"> </div>
                <div class="boton"> <input type="submit" form="formulario1" name="agregar" class="btn-reportepdf" id="btn-reporteecxel" value="Agregar Producto"> </div>

            </div>

        </div>
    </section>
    <!----------------- Javascript------------------->

    <!-- -->

</body>

</html>