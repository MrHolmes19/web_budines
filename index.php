<?php
$conexion = mysqli_connect(    /*funcion para conectarse a la bd. La guarda en una variable para utilizarla luego*/
  'localhost',          /*servidor local*/
  'root',             	/*usuario por defecto*/
  '',               /*sin contraseña*/
  'bd_budines'         /*nombre bd*/     
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Elección del sabor</title>

    <link rel="stylesheet" href="css/headerBudines.css">
    <link rel="stylesheet" href="css/bodyBudines.css">
    <link rel="stylesheet" href="css/footerBudines.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">
</head>

<body>
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><Span class="icon-menu"></Span> Menu</a>
        </div>
        <div id="menu">
            <nav>
                <ul class="enlaces">
                    <li> <a href="#"> <span class="icon-cart"></span>Inicio </a> </li>
                    <li> <a href="#"> <span class="icon-magic-wand"></span>Forma </a> </li>
                    <li> <a href="#"> <span class="icon-pacman"></span>Sabor </a> </li>
                    <li> <a href="#"> <span class="icon-fire"></span>Agregados </a> </li>
                    <li> <a href="#"> <span class="icon-download"></span>Cobertura </a> </li>
                    <li> <a href="#"> <span class="icon-clipboard"></span>Resumen </a> </li>
                    <li> <a href="#"> <span class="icon-file-text2"></span>Datos</a> </li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="wrap">
        <section id="encabezado">
            <div id="titulo">
                <h1>Sabor del budín</h1>
            </div>
            <div id="logo">
                <img src="imagenes/logo.png" alt="logo de El Rincon de los budines"
                    title="logo El Rincon de los budines">
            </div>
        </section>
        <article>
            <h2>Nombre, elegí el sabor de tu budín</h2>
            <h3>Sabores clásicos</h3>
            <table id="clasicos">
                <?php
                $sql="SELECT * from sabores_clasicos";
                $result=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                    ?>                

                <tr>
                    <td class="descripcion">
                        <input type="radio" name="sabores" class="radiobutton" value="saborx"> 
                        <?php echo $mostrar['Producto'] ?>
                    </td>
                    <td class="precio"> <?php echo $mostrar['Precio'] ?> </td>
                    <td class="boton"><button> Vista previa </button> </td>
                </tr>
                <?php
                }
                ?>            
            </table>

            <h3>Sabores Especiales</h3>
            <table id="especiales">
                <?php
                $sql="SELECT * from sabores_especiales";
                $result=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                    ?>                

                <tr>
                    <td class="descripcion">
                        <input type="radio" name="sabores" class="radiobutton" value="saborx"> 
                        <?php echo $mostrar['Producto'] ?>
                    </td>
                    <td class="precio"> <?php echo $mostrar['Precio'] ?> </td>
                    <td class="boton"><button> Vista previa </button> </td>
                </tr>
                <?php
                }
                ?>            
            </table>
            <section class="nota">
                *Se permite un solo sabor por pedido
            </section>
            <div class="footer_blanco"> </div>
        </article>

        <footer>            
            <div class="flechas">
                <div class=flecha_atras>
                    <a href="#"> <img src="imagenes/flechas/flecha-rosa-atras.png" alt="flecha atras"> </a> 
                </div>
                <div class=flecha_siguiente>
                    <a href="#"><img src="imagenes/flechas/flecha-rosa-siguiente.png" alt="flecha atras"> </a>
                </div>
            </div>

            <div id="copyright">
                <p> ©2020 LAGH. Todos los derechos reservados.</p>
            </div>
        </footer> 

        <div class="overlay">
        <div class="popup">
        <a href=# id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"> </i> </a>
        <h2>Budin de Banana</h2>
        <h3><h3>
    </section>

    
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="js/menu.js"></script>
    <!-- -->
</body>

</html>