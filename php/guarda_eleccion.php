<?php include("conexion.php");

if (isset($_GET["sabor"])) {
    $sabor = $_GET["sabor"];

    $sql = "select * from sabores_clasicos where Producto = '$sabor' union select * from sabores_especiales where Producto = '$sabor'";
    $result = mysqli_query($conexion, $sql);
    while ($mostrar = mysqli_fetch_array($result)) {

        $_SESSION["sabor"] = $sabor;
        $_SESSION["lim_agregados"] = $mostrar['LimAgregados'];
        $_SESSION["tieneCobertura"] = $mostrar['Cobertura'];

        header("Location: ../agregados.php");
    }
}


if (isset($_GET["agregados"])) {

    $_SESSION["nAgregados"] = sizeof($_GET["agregados"]);


    $i = 1;

    foreach ($_GET["agregados"] as $ag) {

        $_SESSION["agregado" . $i] = $ag;

        $i++;
    }

    header("Location: ../cobertura.php");
}


if (isset($_GET["cobertura"])) {

    $_SESSION["cobertura"] = $_GET["cobertura"];

    header("Location: ../total.php");
}

