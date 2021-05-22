<!-- Codigo para guardar datos del pedido a la BBDD y notificacion e-mail -->

<?php 
include("../conexion.php");

//guardo todo lo que viene del formulario en session
if (isset($_GET["nombre"])) {

    $_SESSION["pago"] = "aprobado";
    $_SESSION["nombre"] = $_GET["nombre"];
    $_SESSION["telefono"] = $_GET["telefono"];
    $_SESSION["email"] = $_GET["email"];
    $_SESSION["direccion"] = $_GET["direccion"];
    //doy vuelta la fecha por que html me da fecha yyyy-mm-dd;
    $fechaEntrega = $_GET["fechaEntrega"];
    $tmp = explode("-", $fechaEntrega);
    $fechaEntrega = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0] . "-";

    $_SESSION["fechaEntrega"] = $fechaEntrega;
    $_SESSION["formaPago"] = $_GET["formaPago"];
    $_SESSION["comentarios"] = $_GET["comentarios"];

    //si la forma de pago es MP manda al boton de MP
    if ($_SESSION["formaPago"] == "Mercado Pago") {
        header("Location: btnMercadoPago.php");
    }
}

//envia el pedido a la BD si la forma de pago no es MP (efectivo o transferencia) o el pago a MP esta aprobado.
if ($_SESSION["formaPago"] != "Mercado Pago" or isset($_GET["status"])) {


    //guardo toda la session en variables
    $nombre = $_SESSION["nombre"];
    $telefono = $_SESSION["telefono"];
    $direccion = $_SESSION["direccion"];
    $email = $_SESSION["nombre"];
    $fechaEntrega = $_SESSION["fechaEntrega"];
    $formaPago = $_SESSION["formaPago"];
    $comentarios = $_SESSION["comentarios"];

    $forma = $_SESSION["forma"];
    $sabor = $_SESSION["sabor"];

    $n = $_SESSION["nAgregados"];
    $Agregado1 = "no";
    $Agregado2 = "no";
    $Agregado3 = "no";

    if ($n > 0) {
        $Agregado1 = $_SESSION["agregado1"];
    }
    if ($n > 1) {
        $Agregado2 = $_SESSION["agregado1"];
    }
    if ($n > 2) {
        $Agregado3 = $_SESSION["agregado1"];
    }

    $cobertura = $_SESSION["cobertura"];
    $cantidad = $_SESSION["cantidad"];
    $precioTotal = $_SESSION["precioTotal"];
    $precioUnitario = $precioTotal / $cantidad;

    //creo fecha actual
    $fechaPedido = date("d-m-Y"); //la Y en mayuscula para tener el año en formato de 4 digitos

    //mando variables a mysql
    $query = "insert into pedidos(ID, fechapedido, fecha, nombre, sabor, forma, extra1, extra2, extra3, cobertura,
    preciounitario, cantidad, preciototal, formapago, direccion, telefono, comentarios, estado) values 
    ('0', '$fechaPedido', '$fechaEntrega', '$nombre', '$sabor', '$forma',
     '$Agregado1', '$Agregado2', '$Agregado3', '$cobertura', '$precioUnitario', '$cantidad', '$precioTotal',
     '$formaPago', '$direccion', '$telefono', '$comentarios', 'Pendiente')";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        //die("query fallida");
        header("Location: error.php?error=error al cargar pedido");
    }
    if ($result) {
        //echo "Query exitosa ". $nombre;
        $id = mysqli_insert_id($conexion); //me devulve con que id guardo el pedido, esto lo mando a la pag. despedida para imprimir el comprobante
    }
    
    // Envio de mail con la notificacion del pedido
    //manda mail cuando se hace un pedido, no funciona en heliohost ya que outlook(no se Gmail) lo tiene bloqueado(ni al spam llegan).
    $asuntoMail = $nombre . " te ha pedido un budin";
    $textoMail = $nombre . " ha realizado un pedido para el dia " . $fechaEntrega;
    $destinatario = "lmarquez@mgl-ingenieria.com.ar";

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $header .= "From: Budines Web < budines@sensei.heliohost.us >\r\n";

    $exito = mail($destinatario, $asuntoMail, $textoMail, $header);

    if (!$exito) {

        echo "error de mail";
        die;
    }

    //Dirige a pagina de despedida

    if ($result) {
        $_SESSION["idPedido"] = $id;
        header("Location: despedida.php");
    }
}
