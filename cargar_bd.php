<!----------------- Codigo con formulario para cargar una imagen-------------------> 

<?php include("php/conexion.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - cargar imagen</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">
</head>

<body>
    <form action="datosImagen.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td> <label for="imagen" > imagen: </label> </td>
            <td> <input type="file" name="imagen" size="20"> </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center"> <input type="submit" value="Enviar Imagen"> </td>
        </tr>
    </table>

</body>

    <!--enctype=multipart/form data para informacion de tipo imagen -->

</html>