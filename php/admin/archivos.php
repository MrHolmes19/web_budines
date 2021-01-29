<?php

$lista = null;
$dir = opendir("../../img_subidas");
$img[] = null;
$link[] = null;
while ($elem = readdir($dir)) {
    if ($elem != '.' && $elem != '..') {
        if (is_dir("../../img_subidas/" . $elem)) {
            $lista .= "<li><a href='../../img_subidas/$elem' target='_blank'>$elem/ </a><a href='#'>X</a></li>";
        } else {
            $lista .= "<li><a href='../../img_subidas/$elem' target='_blank'>$elem </a><a href='#'>X</a></li>";
            $img[] = $elem;
        }
    }
}
$fotos = null;
include("../conexion.php");
//union con sabores especiales para que busque los sabores en ambas tablas.
$sql = "SELECT Foto FROM sabores_clasicos union SELECT Foto FROM sabores_especiales union SELECT Foto FROM preciosagregados union SELECT Foto FROM precioscoberturas";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_array($res)) {
    $fotos .= "<li>" . $row["Foto"] . "</li>";
    $link[] = $row["Foto"];
}


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
$fotosSinUsoGET = null;
/*
unlink('../../img_subidas/pendientes.txt');
*/



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloGestorImg.css">
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