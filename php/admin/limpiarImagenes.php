<?php

$fotos = $_GET["fotos"];

echo $fotos;

$borrar = explode("/", $fotos);

foreach ($borrar as $img) {
    if ($img != "") {
        unlink('../../img_subidas/' . $img);
    }
}


header("Location: archivos.php");