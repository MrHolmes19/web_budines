<!-- Recibe los datos y los actualiza en la BBDD: Tabla pedidos -->

<?php
include("../conexion.php");

if (isset($_POST["editar"])) {
    $id = $_POST["id"];
    $fechaPedido = $_POST["fechaPedido"];
    $fechaEntrega = $_POST["fechaEntrega"];
    $nombre = $_POST["nombre"];
    $sabor = $_POST["producto"];
    $agregado1 = $_POST["agregado1"];
    $agregado2 = $_POST["agregado2"];
    $agregado3 = $_POST["agregado3"];
    $cobertura = $_POST["cobertura"];
    $precioU = $_POST["precioU"];
    $cantidad = $_POST["cantidad"];
    $precioT = $precioU * $cantidad;
    $formaPago = $_POST["formaPago"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $comentarios = $_POST["comentario"];
    $estado = $_POST["estado"];

        
    $query = "update pedidos set fechapedido = '$fechaPedido', fecha = '$fechaEntrega', nombre = '$nombre',
        sabor = '$sabor', extra1 = '$agregado1', extra2 = '$agregado2', extra3 = '$agregado3', cobertura = '$cobertura',
        preciounitario = '$precioU', cantidad = '$cantidad', preciototal = '$precioT', formapago = '$formaPago',
        direccion = '$direccion', telefono = '$telefono', comentarios = '$comentarios', estado = '$estado' where ID= $id";


    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("query fallida");
    }

    if ($result) {
        $_SESSION["alerta"] = true;
        $_SESSION["alertaTipo"] = "editar";
        $_SESSION["mensaje"] = "Pedido editado con exito";
    }

    header("Location: administrador.php");

    
}
