<?php

//Pantalla de administracion de fotos y logica

// Trae links y nombre de imagenes de la carpeta
$lista = null;
$dir = opendir("../../imagenes/img_subidas");
$img[] = null;   //De la carpeta
$link[] = null; //de la BD
while ($elem = readdir($dir)) {
    if ($elem != '.' && $elem != '..') { //Lee los elementos del directorio exceptuando el directorio mismo (.) y el directorio padre (..)
        if (is_dir("../../imagenes/img_subidas/" . $elem)) {
            $lista .= "<li><a href='../../imagenes/img_subidas/$elem' target='_blank'>$elem/ </a><a href='#'>X</a></li>";
        } else {
            $lista .= "<li><a href='../../imagenes/img_subidas/$elem' target='_blank'>$elem </a><a href='#'>X</a></li>";
            $img[] = $elem;
        }
    }
}

// Trae nombre de imagenes de la base de datos

$fotos = null;
include("../conexion.php");
//union con sabores especiales y agregados y cobeturas para que busque los sabores en todas las tablas.
$sql = "SELECT Foto FROM sabores_clasicos union SELECT Foto FROM sabores_especiales union SELECT Foto FROM preciosagregados union SELECT Foto FROM precioscoberturas";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_array($res)) {
    $fotos .= "<li>" . $row["Foto"] . "</li>";
    $link[] = $row["Foto"];
}

// Comparador entre fotos disponibles en la carpeta y fotos usadas

$fotosEnUso = null;
$fotosSinUso = null;
$feu[] = null;
foreach ($img as $im) {
    foreach ($link as $li) {

        if ($im == $li && $im != "") {
            $fotosEnUso .= "<li>" . $im . "</li>";
            $feu[] = $im;
        }
    }
}

$fotosSinUso = array_diff($img, $feu);
$fotosSinUsoGET = null; //????
?>



<!DOCTYPE html>
<html lang="en">
<!--Parte visual HTML-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloGestorImg.css">
    <title>Document</title>
</head>

<body>

    <section>
        <div>
            <div class="lista">
                <h2>imagenes en servidor:</h2>
                <ul>
                    <?php echo $lista ?>
                </ul>

            </div>
            <div class="lista">
                <h2>fotos de productos:</h2>
                <ul>
                    <?php echo $fotos ?>
                </ul>
            </div>
        </div>

        <div>
            <div class="lista">
                <h2>fotos en uso:</h2>
                <ul>
                    <?php echo $fotosEnUso ?>
                </ul>
            </div>
            <div class="lista">
                <h2>fotos sin uso:</h2>
                <ul>
                    <?php foreach ($fotosSinUso as $fsu) {
                        echo "<li>" . $fsu . "</li>";
                        $fotosSinUsoGET .= $fsu . "/";
                    }  ?>
                </ul>
                <button onclick="window.location.replace('limpiarImagenes.php?fotos=<?= $fotosSinUsoGET ?>')">Borrar imagenes sin uso</button>
            </div>
        </div>
    </section>
</body>

</html>