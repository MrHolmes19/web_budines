<?php include("metodos.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Editar</title>

    <link rel="stylesheet" href="../../css/administrador_tablas.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../Imagenes/icono.png" type="image/png">
</head>

<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $tabla = $_GET["tabla"];
}
$row = traerFila($id, $tabla);
?>

<body id="cuerpoEditar">
    <header>
        <h1>Interfaz de administrador - Editar Pedido N°<?= $id ?></h1>
    </header>

    <section id="listaEditable">
        <div class="contenido2">
            <h2>Edita el pedido:</h2>
            <!-----Inputs----->
            <form action="edicionPedido.php" id="formulario1" method="POST" enctype="multipart/form-data">
                <div id="formulario">
                    <div id="valores">
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                        <input type="hidden" name="tabla" value="<?= $tabla ?>">

                        <label for="producto">Sabor
                            <input type="text" name="producto" id="producto" value="<?= $row['sabor'] ?>"></label>

                        <label for="precio">Forma
                            <input type="text" name="precio" id="precio" value="<?= $row['forma'] ?>"></label>

                        <label for="precio">Agregados
                            <input type="text" name="agregado1" id="agregado1" value="<?= $row['extra1'] ?>">

                            <input type="text" name="agregado2" id="agregado2" value="<?= $row['extra2'] ?>">

                            <input type="text" name="agregado3" id="agregado3" value="<?= $row['extra3'] ?>"></label>

                        <label for="precio">Cobertura
                            <input type="text" name="cobertura" id="cobertura" value="<?= $row['cobertura'] ?>"></label>

                        <label for="precio">Precio Unitario
                            <input type="text" name="precioU" id="precioU" value="<?= $row['preciounitario'] ?>"></label>

                        <label for="precio">Cantidad
                            <input type="text" name="cantidad" id="cantidad" value="<?= $row['cantidad'] ?>"></label>

                        <label for="comentario">Comentarios
                            <input type="text" name="comentario" id="comentario" value="<?= $row['comentarios'] ?>"></label>

                    </div>

                    <div id="valores">

                        <label for="producto">Nombre
                            <input type="text" name="nombre" id="nombre" value="<?= $row['nombre'] ?>"></label>

                        <label for="precio">Fecha de pedido
                            <input type="text" name="fechaPedido" id="fechaPedido" value="<?= $row['fechapedido'] ?>"></label>

                        <label for="precio">Fecha de entrega
                            <input type="text" name="fechaEntrega" id="fechaEntrega" value="<?= $row['fecha'] ?>"></label>

                        <label for="precio">Forma de pago
                            <input type="text" name="formaPago" id="formaPago" value="<?= $row['formapago'] ?>"></label>

                        <label for="precio">Direccion
                            <input type="text" name="direccion" id="direccion" value="<?= $row['direccion'] ?>"></label>

                        <label for="precio">Telefono
                            <input type="text" name="telefono" id="telefono" value="<?= $row['telefono'] ?>"></label>

                        <label for="" class="labelRadio">Estado
                            <div class="radio">
                                <label for="Pendiente">Pendiente<input type="radio" name="estado" id="pendiente" value="Pendiente"></label>
                                <label for="Entregado" style="margin-left: 10px;">Entregado<input type="radio" name="estado" id="entregado" value="Entregado"></label>
                            </div>
                        </label>
                        <script>
                            var estado = '<?= $row['estado'] ?>';
                        </script>

                    </div>

                </div>
            </form>
            <form id="formID" action="../admin/imprimirPedidoPDF.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
            </form>
            <!-----Botones----->
            <div class="botones" id="botones">
                <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Cancelar" onclick="window.location.replace('administrador.php')"> </div>
                <div class="boton"> <input type="submit" form="formID" class="btn-reportepdf" value="PDF"> </div>
                <div class="boton"> <input type="submit" form="formulario1" name="editar" class="btn-reportepdf" id="btn-reporteecxel" value="Guardar cambios"> </div>

            </div>

        </div>
    </section>
    <!----------------- Javascript------------------->
    <script src="../../js/radioB_editarPedido.js"></script>
    <!-- -->

</body>

</html>