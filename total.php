<?php include("php/conexion.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Resumen del pedido</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="../Imagenes/icono.png" type="image/png">

</head>

<body>

<?php include("php/navbar.php") ?>



    <section id="wrap" class="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Resumen de tu pedido</h1>
            </div>
            <div id="logo">
                <img src="imagenes/logo.png" alt="logo de El Rincon de los budines"
                    title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2>Nombre, Has elegido:</h2>
            <table id="total">
                <tr>
                    <td class="descripcion"> Banana </td>
                    <td class="precio"> $200 </td>          
                </tr>           
                <tr>
                    <td class="descripcion"> Chips de chocolate </td>
                    <td class="precio"> $30 </td>          
                </tr>           
                <tr>
                    <td class="descripcion"> Almendras </td>
                    <td class="precio"> $80 </td>          
                </tr>           
                <tr>
                    <td class="descripcion"> Traza de chocolate </td>
                    <td class="precio"> $85 </td>          
                </tr>           
                <tr>
                    <td class="descripcion"> Total: </td>
                    <td class="precio"> $400 </td>          
                </tr>           
            </table>


            <div class="footer_blanco"> </div>
        </article>

        <?php include("php/footer.php") ?>
        
    </section>

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/popup.js"></script>
    <!-- -->
</body>

</html>