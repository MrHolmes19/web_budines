<?php
// Comando para eliminar las imagenes no utilizadas en los productos

$fotos = $_GET["fotos"];

$borrar = explode("/", $fotos);

foreach ($borrar as $img) {
    if ($img != "") {
        unlink('../../imagenes/img_subidas/' . $img);
    }
}


header("Location: archivos.php");