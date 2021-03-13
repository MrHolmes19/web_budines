<?php

$fotos = $_GET["fotos"];

echo $fotos;

$borrar = explode("/", $fotos);

foreach ($borrar as $img) {
    if ($img != "") {
        unlink('../../imagenes/img_subidas/' . $img);
    }
}


header("Location: archivos.php");