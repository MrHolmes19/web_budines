<?php

function traerPrecio($producto, $tabla)
{
    include("conexion.php");

    $sql = "SELECT Precio FROM `$tabla` WHERE Producto = '$producto' union select Precio from sabores_especiales where Producto = '$producto'";
    $res = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($res)) {

        $precio = $row['Precio'];
        return $precio;
    }

}

$precioAgregado1 = 0;
$precioAgregado2 = 0;
$precioAgregado3 = 0;
$precioCobertura = 0;


$precioSabor = traerPrecio($_SESSION["sabor"], "sabores_clasicos");

$n = $_SESSION["nAgregados"];

if($n > 0){

    $precioAgregado1 = traerPrecio($_SESSION["agregado1"], "preciosagregados");

}
if($n > 1){

    $precioAgregado2 = traerPrecio($_SESSION["agregado2"], "preciosagregados");

}
if($n > 2){

    $precioAgregado3 = traerPrecio($_SESSION["agregado3"], "preciosagregados");

}



if ($_SESSION["tieneCobertura"] == "SI" && $_SESSION["cobertura"] != "no") {  

    $precioCobertura = traerPrecio($_SESSION["cobertura"], "precioscoberturas");

}

$total = $precioSabor + $precioAgregado1 + $precioAgregado2 + $precioAgregado3 + $precioCobertura;

$_SESSION["total"] = $total;