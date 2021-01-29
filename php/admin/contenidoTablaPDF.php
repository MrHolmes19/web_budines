<?php include("../conexion.php");

$tabla_seleccionada = $_GET["tabla"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="a.css">
</head>

<body>


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

            $Ncolumnas = count($titulosTabla);
            ?>
            <tr>
                <?php
                for ($i = 0; $i < $Ncolumnas; $i++) {
                    echo "<th>" . $titulosTabla[$i] . "</th>";
                }
                ?>
            </tr>
            <?php
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <?php
                    for ($j = 0; $j < $Ncolumnas; $j++) {
                        echo "<td>" . $mostrar[$titulosTabla[$j]] . "</td>";
                    }
                    ?>

                </tr>
            <?php } ?>
        </table>
    </div>

    <style>


/*------------------------- Tabla ---------------------------*/


table caption {
    font-weight: bold;
    padding: 10px 0 10px 0;
    margin-bottom: 20px;
  }

  
  table {
    width: 100%;
    /*max-height: 450px;*/
    font-size: 16px;
    margin-bottom: 10px;
    border-collapse: collapse;
    overflow: auto;
  }
  
  table tr th {
    padding: 2px 2px;
    text-align: center; /*Igual se centran solas*/
    font-size: 16px; /*por defecto viene 16 px*/
    border: 1px solid #000;
    background-color: rgba(39, 82, 38, 0.3);
  }
  
  table tr td {
    padding: 2px 2px;
    text-align: center;
    border: 1px solid #000;
  }
  
  table tr:hover {
    background-color: rgba(71, 136, 70, 0.3);
  }
  
  table tr td div {
    overflow: hidden; /*Que hacia esto?*/
  }
  
  .descripcion {
    /*Cambiar al nombre de clase de cada columna*/
    width: 55%;
  }


    </style>

</body>

</html>