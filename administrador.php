<?php include("php/conexion.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincon de los budines - Administrador de tablas</title>

    <link rel="stylesheet" href="css/administrador_tablas.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="icon" href="Imagenes/icono.png" type="image/png">
</head>

<body>
    <header>
        <h1>Interfaz de administrador - Tablas de budines</h1>
    </header>

    <section id="lista">
    <div class="contenido">
        <h2>Elegí que tabla querés visualizar o modificar</h1>
        <!-----Lista desplegable----->
        <form action="" method="POST">
        <select class="select" name="tablas">
            <option value="0">--- Seleccionar ---</option> 
            <option value="1">Sabores clasicos</option> 
            <option value="2">Sabores especiales</option> 
            <option value="3">Agregados</option>
            <option value="4">Coberturas</option> 
            <option value="5">Pedidos</option> 
        </select>
        <input type="submit" name="formTabla" value="Traer tabla">
        </form>
        <?php
            if(isset($_POST["formTabla"])){
            $item_seleccionado = $_POST["tablas"]; //quitar
            $listaTablas = array('','sabores_clasicos', 'sabores_especiales', 'preciosagregados', 'precioscoberturas', 'Pedidos');
            $tabla_seleccionada = $listaTablas[$_POST['tablas']]; 
            }
        ?>

        <!-----Tabla dinamica----->
        
        <div class="contenedor-tabla">
        <table id="dinamica">
        <caption> Tabla de <?php echo $tabla_seleccionada ?></caption>
        <?php      
       
        $sql = "SELECT * from $tabla_seleccionada";
        $result = mysqli_query($conexion, $sql);

        $sql_nombreColumnas = "SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tabla_seleccionada'";
        $result2 = mysqli_query($conexion, $sql_nombreColumnas); // or die(mysqli_error());
             
        $titulosTabla[] = 0;
        $i = 0;
             
        while ($nombreColumnas = mysqli_fetch_array($result2)) {
            $titulosTabla[$i] = $nombreColumnas['COLUMN_NAME'];
            $i++;
        }
        
        $Ncolumnas=count($titulosTabla);
        ?>
            <tr>
                <?php
                    for($i=0;$i<$Ncolumnas;$i++){
                    echo "<th>".$titulosTabla[$i]."</th>";            
                    }
                ?> 
            </tr>  
        <?php
            while ($mostrar = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <?php
                    for($j=0;$j<$Ncolumnas;$j++){
                    echo "<td>".$mostrar[$titulosTabla[$j]]."</td>";            
                    }
                ?> 
                         
                <td class="editar"><a href=# id="btn-editar-fila" class="btn-editar-fila"> <span class="icon-pencil"></span> <i class="fas fa-times"> </i> </a></td>
                <td class="eliminar"><a href=# id="btn-eliminar-fila" class="btn-eliminar-fila"> <span class="icon-cross"></span> <i class="fas fa-times"> </i> </a></td>
            </tr> 
        <?php
            }
        ?>             
        </table>
        </div>
        

        <!-----Botones con funcionalidades----->
        <div class="botones" id="botones">
            <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Reporte PDF"> </div>
            <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Reporte Excel"> </div>
            <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Modificar"> </div>
            <div class="boton"> <input type="submit" class="btn-reportepdf" id="btn-reportepdf" value="Actualizar precios"> </div>
            
        </div>
        
    </div>
    </section>

    <!-- -->

</body>

</html>