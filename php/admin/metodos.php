<?php
function traerFila($id, $tabla)
{
    include("../conexion.php");
    $sql = "SELECT * FROM `$tabla` where Id = '$id'";
    $res = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($res);
    return $row;

}