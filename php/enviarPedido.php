<?php include("conexion.php");

if (isset($_GET["nombre"])) {
    //guardo todo en sesion


    $_SESSION["pago"] = "aprovado";

    $_SESSION["nombre"] = $_GET["nombre"];
    $_SESSION["telefono"] = $_GET["telefono"];
    $_SESSION["email"] = $_GET["email"];
    $_SESSION["direccion"] = $_GET["direccion"];
    //doy vuelta la fecha por que html me da fecha yyyy-mm-dd;
    $fechaEntrega = $_GET["fechaEntrega"];
    $tmp = explode("-", $fechaEntrega);
    $fechaEntrega = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0] . "-";

    $_SESSION["fechaEntrega"] = $fechaEntrega;
    $_SESSION["formaPago"] = $_GET["formaPago"];
    $_SESSION["comentarios"] = $_GET["comentarios"];

    if ($_SESSION["formaPago"] == "Mercado Pago") {
        header("Location: btnMercadoPago.php");
    }
}
//guardo sesion en variables

if($_SESSION["formaPago"] != "Mercado Pago" or isset($_GET["status"])){



$nombre = $_SESSION["nombre"];
$telefono = $_SESSION["telefono"];
$direccion = $_SESSION["direccion"];
$email = $_SESSION["nombre"];
$fechaEntrega = $_SESSION["fechaEntrega"];
$formaPago = $_SESSION["formaPago"];
$comentarios = $_SESSION["comentarios"];

$forma = $_SESSION["forma"];
$sabor = $_SESSION["sabor"];

$n = $_SESSION["nAgregados"];
$Agregado1 = "no";
$Agregado2 = "no";
$Agregado3 = "no";

if ($n > 0) {
    $Agregado1 = $_SESSION["agregado1"];
}
if ($n > 1) {
    $Agregado2 = $_SESSION["agregado1"];
}
if ($n > 2) {
    $Agregado3 = $_SESSION["agregado1"];
}

$cobertura = $_SESSION["cobertura"];
$cantidad = $_SESSION["cantidad"];
$precioTotal = $_SESSION["precioTotal"];
$precioUnitario = $precioTotal / $cantidad;

//creo fecha actual
$fechaPedido = date("d-m-yy");


//echos de prueba
/*
    echo $nombre;
    echo $telefono;
    echo $direccion;
    echo $email;
    echo $telefono;
    echo $fechaPedido;
    echo $fechaEntrega;
    echo $formaPago;
    echo $comentarios;
    echo $forma;
    echo $sabor;
    echo $Agregado1;
    echo $Agregado2;
    echo $Agregado3;
    echo $cobertura;
    echo $cantidad;
    echo $precioUnitario;
    echo $precioTotal;
    */
//mando variables a mysql


$query = "insert into pedidos(ID, fechapedido, fecha, nombre, sabor, forma, extra1, extra2, extra3, cobertura,
    preciounitario, cantidad, preciototal, formapago, direccion, telefono, comentarios, estado) values 
    ('0', '$fechaPedido', '$fechaEntrega', '$nombre', '$sabor', '$forma',
     '$Agregado1', '$Agregado2', '$Agregado3', '$cobertura', '$precioUnitario', '$cantidad', '$precioTotal',
     '$formaPago', '$direccion', '$telefono', '$comentarios', 'Pendiente')";

$result = mysqli_query($conexion, $query);
if (!$result) {
    //die("query fallida");
    header("Location: ../error.php");
}

header("Location: ../despedida.php");
}