<?php include("conexion.php");

if ($_GET["enviar"] == "nombre") {

    $nombre = $_GET["nombre"];
    $_SESSION["nombre"] = $nombre;

    header("Location: ../forma.php");

}
if ($_GET["enviar"] == "forma") {

    $forma = $_GET["forma"];
    $_SESSION["forma"] = $forma;

    header("Location: ../sabor.php");

}

if ($_GET["enviar"] == "sabor") {
    if (isset($_GET["sabor"])) {
        $sabor = $_GET["sabor"];

        $sql = "select * from sabores_clasicos where Producto = '$sabor' union select * from sabores_especiales where Producto = '$sabor'";
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {

            $_SESSION["sabor"] = $sabor;
            $_SESSION["lim_agregados"] = $mostrar['LimAgregados'];
            $_SESSION["tieneCobertura"] = $mostrar['Cobertura'];

            if ($_SESSION["lim_agregados"] > 0) {
                header("Location: ../agregados.php");
            } else {
                if ($_SESSION["tieneCobertura"] == "SI") {

                    header("Location: ../cobertura.php");
                } else {
                    header("Location: ../total.php");
                }
                $_SESSION["nAgregados"] = 0;
            }
        }
    } else {
        header("Location: ../sabor.php");
    }
}

if ($_GET["enviar"] == "agregados") {
    if (isset($_GET["agregados"])) {

        $_SESSION["nAgregados"] = sizeof($_GET["agregados"]);


        $i = 1;

        foreach ($_GET["agregados"] as $ag) {

            $_SESSION["agregado" . $i] = $ag;

            $i++;
        }
    } else {
        $_SESSION["nAgregados"] = 0;
    }

    if ($_SESSION["tieneCobertura"] == "SI") {

        header("Location: ../cobertura.php");
    } else {
        header("Location: ../total.php");
    }
}

if (isset($_GET["cobertura"])) {

    $_SESSION["cobertura"] = $_GET["cobertura"];

    header("Location: ../total.php");
}

if ($_GET["enviar"] == "total") {

    $_SESSION["precioTotal"] = $_GET["pTotal"];
    $_SESSION["cantidad"] = $_GET["cant"];

    header("Location: ../formulario.php");
}