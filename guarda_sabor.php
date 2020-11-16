<?php include("php/conexion.php"); 

if (isset($_GET["sabor"])){
    $sabor = $_GET["sabor"];
    
    $sql = "select * from sabores_clasicos where Producto = '$sabor' union select * from sabores_especiales where Producto = '$sabor'";
    $result = mysqli_query($conexion, $sql);
    while ($mostrar = mysqli_fetch_array($result)) {
    
    $_SESSION["sabor"] = $sabor;
    $_SESSION["lim_agregados"] = $mostrar['LimAgregados'];
    
    header("Location: agregados.php");
    }
}

?>