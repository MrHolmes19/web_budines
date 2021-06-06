<?php
// Mecanismo de seguridad
include("../conexion.php");
if (!isset($_SESSION["admin"])) {
    header("Location: ../../index.html");
}
?>



<!DOCTYPE html>
<html lang="en">
<!--Pagina de administrador-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Administrador de tablas</title>

    <link rel="stylesheet" href="../../css/administrador_tablas.css">
    <link rel="stylesheet" href="../../fonts.css">
    <link rel="icon" href="../../imagenes/icono.png" type="image/png">
    
</head>

<body>
    <header>
        <h1>Interfaz de administrador - Tablas de budines</h1>
    </header>

    <section id="lista">
        <div class="contenido">
            <h2>Elegí que tabla querés visualizar o modificar</h1>
                <!-----Lista desplegable----->
                <form action="" method="POST" id="form">
                    <select class="select" name="tablas" onchange="mandarForm()" id="select">
                        <option value="0">--- Seleccionar ---</option>
                        <option value="1">Sabores clasicos</option>
                        <option value="2">Sabores especiales</option>
                        <option value="3">Agregados</option>
                        <option value="4">Coberturas</option>
                        <option value="5">Pedidos</option>
                    </select>
                    <input type="hidden" name="formTabla" value="Traer tabla" id="btn-form">
                </form>
                <?php
                if (isset($_POST["formTabla"])) {
                    $item_seleccionado = $_POST["tablas"]; //quitar
                    $listaTablas = array('', 'sabores_clasicos', 'sabores_especiales', 'preciosagregados', 'precioscoberturas', 'pedidos');
                    $tabla_seleccionada = $listaTablas[$_POST['tablas']];
                    $_SESSION["tablaSeleccionada"] = $tabla_seleccionada;
                } else {
                    if (isset($_SESSION["tablaSeleccionada"])) {
                        $tabla_seleccionada = $_SESSION["tablaSeleccionada"];
                    } else {
                        $tabla_seleccionada = "pedidos";
                    }
                }
                ?>

                

                <div class="contenedor-tabla">
                    <table id="dinamica"><!-----Tabla dinamica----->


                        <caption> Tabla de <?php echo $tabla_seleccionada ?></caption>
                        <?php
                        $sql = "SELECT * from $tabla_seleccionada";
                        $result = mysqli_query($conexion, $sql);

                        $sql_nombreColumnas = "SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tabla_seleccionada'";
                        $result2 = mysqli_query($conexion, $sql_nombreColumnas); // or die(mysqli_error());

                        $titulosTabla[] = 0;
                        $i = 0;

                        while ($nombreColumnas = mysqli_fetch_array($result2)) {
                            $titulosTabla[$i] = $nombreColumnas['COLUMN_NAME'];
                            $i++;
                        }

                        $Ncolumnas = count($titulosTabla);
                        ?>

                        <tr class="fijo">
                            <?php
                            for ($i = 0; $i < $Ncolumnas; $i++) {
                                echo "<th>" . $titulosTabla[$i] . "</th>";
                            }
                            ?>

                            <th colspan="2">Acciones</th>
                        </tr>


                        <?php
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <?php
                                for ($j = 0; $j < $Ncolumnas; $j++) {
                                    echo "<td>" . $mostrar[$titulosTabla[$j]] . "</td>";
                                }

                                if ($tabla_seleccionada == "Pedidos") {
                                ?>
                                    <td class="editar"><a href="editarPedido.php?id=<?= $mostrar[$titulosTabla[0]] ?>&tabla=<?= $tabla_seleccionada ?>" id="btn-editar-fila" class="btn-editar-fila"> <span class="icon-pencil"></span> <i class="fas fa-times"> </i> </a></td>
                                <?php } else { ?>
                                    <td class="editar"><a href="editar.php?id=<?= $mostrar[$titulosTabla[0]] ?>&tabla=<?= $tabla_seleccionada ?>" id="btn-editar-fila" class="btn-editar-fila"> <span class="icon-pencil"></span> <i class="fas fa-times"> </i> </a></td>
                                <?php } ?>
                                <td class="eliminar"><a href="#!" onclick="eliminar('<?= $mostrar[$titulosTabla[0]] ?>', '<?= $mostrar[$titulosTabla[1]] ?>', '<?= $tabla_seleccionada ?>')" id="btn-eliminar-fila" class="btn-eliminar-fila"> <span class="icon-cross"></span> <i class="fas fa-times"> </i> </a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>


                <!-----Botones con funcionalidades----->
                <div class="botones" id="botones">

                    <?php if ($tabla_seleccionada != "Pedidos") { ?>
                        <div class="boton"> <input type="submit" class="" id="btn-nuevo" value="Nuevo Producto" onclick="window.location.replace('nuevoProducto.php?tabla=<?php echo $tabla_seleccionada ?>')"> </div>
                    <?php }
                    if ($tabla_seleccionada == "pedidos") { ?>
                        <div class="boton"> <input type="submit" class="" id="btn-reportepdf" value="Reporte PDF" onclick="window.open('imprimirTablaPDF.php?tabla=<?php echo $tabla_seleccionada ?>', '_blank')"> </div>
                        <div class="boton"> <input type="submit" class="" id="btn-reporteecxel" onclick="tableToExcel('dinamica')" value="Reporte Excel"> </div>
                    <?php } ?>
                    <div class="boton"> <input type="submit" class="" id="btn-modificar" value="Administrar Fotos" onclick="window.open('archivos.php')"> </div>
                    <div class="boton"> <input type="submit" class="" id="btn-actualizar" value="Salir" onclick="window.location.replace('login.php?logout=true')"></div>

                </div>

        </div>
    </section>
    <?php include("toast.php") ?>
    <!----------------- Javascript------------------->
    <script src="../../js/tabla_a_excel.js"></script>
    <script src="../../js/eliminar.js"></script>
    <script src="../../js/listaDesplegable.js"></script>
    <script src="../../js/sweetalert2.js"></script>
    <!-- -->

</body>

</html>