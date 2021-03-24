<?php
//si existe una peticion post[login] guarda user y pass
if (isset($_POST["login"])) {

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    //echo $user . $pass;

    $md5user = md5($user);
    $md5pass = md5($pass);

    include("../conexion.php");

    //busca en la bbdd si hay algun match
    $query = "select * from admin where User = '$md5user' and Pass= '$md5pass'";
    $result = mysqli_query($conexion, $query);

    //cuenta las filas devueltas
    $cant = mysqli_num_rows($result);


    //si encontro registro avanza con el login
    if ($cant > 0) {
        $_SESSION["admin"] = true;
        header("Location: administrador.php");

        //sino vuelve a index
    } else {
        header("Location: ../../index.html");
    }
}

//logout
if (isset($_GET["logout"])) {

    //destruye la session y vuelve a index
    session_start();
    $_SESSION["admin"] = false;
    if(session_destroy()){
    header("Location: ../../index.html");}
}
