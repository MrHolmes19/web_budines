<?php include("conexion.php");

//si viene de nombre lo guarda en session y va a forma
if ($_GET["enviar"] == "nombre") {

    $nombre = $_GET["nombre"];
    $_SESSION["nombre"] = $nombre;

    header("Location: ../forma.php");
}

//si viene de forma lo guarda en session y va a sabor
if ($_GET["enviar"] == "forma") {

    $forma = $_GET["forma"];
    $_SESSION["forma"] = $forma;

    header("Location: ../sabor.php");
}

//si viene de nombre lo guarda en session, busca cuantos extras puede llevar ese sabor y si lleva o no cobertura, luego redirige.
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

//si viene de agegados guarda cada uno y el n total y va a cobertura(si lleva, si no a total).
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

//si viene de cobertura lo guarda en session y va a total
if (isset($_GET["cobertura"])) {

    $_SESSION["cobertura"] = $_GET["cobertura"];

    header("Location: ../total.php");
}

//si viene de total guarda la catidad y el precioTotal en session y va al formulario
if ($_GET["enviar"] == "total") {

    $_SESSION["precioTotal"] = $_GET["pTotal"];
    $_SESSION["cantidad"] = $_GET["cant"];

    header("Location: ../formulario.php");
}
