<?php
// Plantilla para posterior impresion en PDF (Comprobante)
include("../conexion.php"); ?>
<?php include("metodos.php"); ?>
<?php
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

$row = traerFila($id, "pedidos");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pedido n° <?= $id ?> <?= $row['fechapedido'] ?> </title>
    <link rel="stylesheet" href="../../css/estiloPDF_pedidos.css">
</head>

<body>

    <?php /*Se carga imagen desde PHP, porque la liberia no soporta desde el HTML*/
    $path = '../../imagenes/logopg.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>

    <table>
        <tr>
            <td colspan="2"> <img src="<?php echo $base64 ?>" alt=""> </td>
        </tr>
        <tr>
            <th> ID del pedido </th>
            <td> <?= $id ?> </td>
        </tr>
        <tr>
            <th> Nombre </th>
            <td> <?= $row['nombre'] ?> </td>
        </tr>
        <tr>
            <th> Fecha de Pedido </th>
            <td> <?= $row['fechapedido'] ?> </td>
        </tr>
        <tr>
            <th> Fecha de entrega </th>
            <td> <?= $row['fecha'] ?> </td>
        </tr>
        <tr>
            <th> Sabor </th>
            <td> <?= $row['sabor'] ?> </td>
        </tr>
        <tr>
            <th> Forma </th>
            <td> <?= $row['forma'] ?> </td>
        </tr>
        <tr>
            <th> Agregado 1 </th>
            <td> <?= $row['extra1'] ?> </td>
        </tr>
        <tr>
            <th> Agregado 2 </th>
            <td> <?= $row['extra2'] ?> </td>
        </tr>
        <tr>
            <th> Agregado 3 </th>
            <td> <?= $row['extra3'] ?> </td>
        </tr>
        <tr>
            <th> Cobertura </th>
            <td> <?= $row['cobertura'] ?> </td>
        </tr>
        <tr>
            <th> Precio Unitario </th>
            <td> $<?= $row['preciounitario'] ?> </td>
        </tr>
        <tr>
            <th> Cantidad </th>
            <td> <?= $row['cantidad'] ?> </td>
        </tr>
        <tr>
            <th> Precio Total </th>
            <td> $<?= $row['preciounitario'] * $row['cantidad'] ?> </td>
        </tr>
        <tr>
            <th> Forma de pago </th>
            <td> <?= $row['formapago'] ?> </td>
        </tr>
        <tr>
            <th> Direccion </th>
            <td> <?= $row['direccion'] ?> </td>
        </tr>
        <tr>
            <th> Telefono </th>
            <td> <?= $row['telefono'] ?> </td>
        </tr>
        <tr>
            <th> Comentarios </th>
            <td> <?= $row['comentarios'] ?> </td>
        </tr>

    </table>
    
    <style> /*Estilo - La libreria no soporte CSS externo*/
        table {
            border: 1px solid black;
            text-align: center;
        }

        tr {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }

        img {
            width: 300px;
        }
    </style>
</body>

</html>