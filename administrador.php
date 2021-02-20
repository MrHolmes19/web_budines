<?php include("php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Administrador de tablas</title>

    <link rel="stylesheet" href="css/administrador_tablas.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">
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
                        <option value="1" >Sabores clasicos</option>
                        <option value="2" >Sabores especiales</option>
                        <option value="3">Agregados</option>
                        <option value="4">Coberturas</option>
                        <option value="5">Pedidos</option>
                    </select>
                    <input type="hidden" name="formTabla" value="Traer tabla" id="btn-form">
                </form>
                <?php
                if (isset($_POST["formTabla"])) {
                    $item_seleccionado = $_POST["tablas"]; //quitar
                    $listaTablas = array('', 'sabores_clasicos', 'sabores_especiales', 'preciosagregados', 'precioscoberturas', 'Pedidos');
                    $tabla_seleccionada = $listaTablas[$_POST['tablas']];
                    $_SESSION["tablaSeleccionada"] = $tabla_seleccionada;
                } else {
                    if (isset($_SESSION["tablaSeleccionada"])) {
                        $tabla_seleccionada = $_SESSION["tablaSeleccionada"];
                    } else {
                        $tabla_seleccionada = "Pedidos";
                    }
                }
                ?>

                <!-----Tabla dinamica----->

                <div class="contenedor-tabla">
                    <table id="dinamica">


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
                                        <td class="editar"><a href="php/admin/editarPedido.php?id=<?= $mostrar[$titulosTabla[0]] ?>&tabla=<?= $tabla_seleccionada ?>" id="btn-editar-fila" class="btn-editar-fila"> <span class="icon-pencil"></span> <i class="fas fa-times"> </i> </a></td>
                                    <?php } else { ?>
                                        <td class="editar"><a href="php/admin/editar.php?id=<?= $mostrar[$titulosTabla[0]] ?>&tabla=<?= $tabla_seleccionada ?>" id="btn-editar-fila" class="btn-editar-fila"> <span class="icon-pencil"></span> <i class="fas fa-times"> </i> </a></td>
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
                    <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-nuevo" value="Nuevo Producto" onclick="window.location.replace('php/admin/nuevoProducto.php?tabla=<?php echo $tabla_seleccionada ?>')"> </div>
                    <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Reporte PDF" onclick="window.open('php/admin/imprimirTablaPDF.php?tabla=<?php echo $tabla_seleccionada ?>', '_blank')"> </div>
                    <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reporteecxel" onclick="tableToExcel('dinamica')" value="Reporte Excel"> </div>
                    <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-modificar" value="Administrar Fotos" onclick="window.open('php/admin/archivos.php')"> </div>
                    <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-actualizar" value="Actualizar precios"> </div>

                </div>

        </div>
    </section>
    <?php include("php/admin/toast.php") ?>
    <!----------------- Javascript------------------->
    <script src="js/tabla_a_excel.js"></script>
    <script src="js/eliminar.js"></script>
    <script src="js/listaDesplegable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- -->

</body>

</html>