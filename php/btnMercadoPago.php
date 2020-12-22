<?php
include("conexion.php");

$sabor = $_SESSION["sabor"];
$cantidad = $_SESSION["cantidad"];
$precioT = $_SESSION["precioTotal"];
$precioU = $precioT / $cantidad;
//Acc. token HM: APP_USR-376455656503130-121115-e1b8a468b29323fed7ec3e3afdfa3707-257158044
//acc. token de prueba(vendedor): APP_USR-1862746880528926-121613-159b155b6704728ac0b049f99740e4ba-688245007

//comando para pedir usuario de prueba:
//curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=APP_USR-376455656503130-121115-e1b8a468b29323fed7ec3e3afdfa3707-257158044" -d "{'site_id':'MLA'}"

//usuarios de prueba:
//usuario1(comprador): {"id":688244677,"nickname":"TESTLVJNF2JF","password":"qatest2658","site_status":"active","email":"test_user_30512169@testuser.com"}
//usuario2(vendedor): {"id":688245007,"nickname":"TETE6653982","password":"qatest1519","site_status":"active","email":"test_user_49750911@testuser.com"}

// SDK de Mercado Pago
require __DIR__ .  '/../vendor/autoload.php';

// Agrega credenciales de vendedor
MercadoPago\SDK::setAccessToken('APP_USR-1862746880528926-121613-159b155b6704728ac0b049f99740e4ba-688245007');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

//paginas de retorno
$preference->back_urls = array(
  "success" => "http://localhost/web_budines/php/enviarPedido.php",
  "failure" => "http://localhost/web_budines/error.php",
  "pending" => "http://localhost/web_budines/error.php"
);
$preference->auto_return = "approved";


// Crea un ítem en la preferencia 
$item = new MercadoPago\Item();
$item->title = 'Budin de '.$sabor;
$item->quantity = $cantidad;
$item->unit_price = $precioU;
$preference->items = array($item);
$preference->save();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
  //crea el btn de MP para pagar el item que creamos
</script>
<style>
.mercadopago-button{
display: none;
}

</style>
<script>
  //lo clickea
  var btnMP = document.querySelector(".mercadopago-button");
  btnMP.click();
</script>

</body>
</html>