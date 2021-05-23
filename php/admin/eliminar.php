<?php
// Comando que elimina registro de la tabla. Se activa a través del botón eliminar
include("../conexion.php");

$tabla = $_GET["tabla"];
$id = $_GET["id"];


$query = "delete from `$tabla` where Id= '$id'";
$result_tasks = mysqli_query($conexion, $query);


if($result_tasks){
$_SESSION["alerta"] = true;
$_SESSION["alertaTipo"] = "eliminar";
$_SESSION["mensaje"] = "Elemento eliminado con exito";


header("Location: administrador.php");

}