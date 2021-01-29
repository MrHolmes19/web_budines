<?php
function traerFila($id, $tabla)
{
    include("../conexion.php");
//union con sabores especiales para que busque los sabores en ambas tablas.
    $sql = "SELECT * FROM `$tabla` where Id = '$id'";
    $res = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($res);
    return $row;

}