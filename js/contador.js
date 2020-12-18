var inputCantidad = document.querySelector(".cantidad input");
var precioFinal = document.querySelector("#PrecioFinal");
var precioUnitario = precioFinal.innerHTML;

function btnMenos() {
  if (inputCantidad.value > 1) {
    inputCantidad.value--;
  }
  var sub = precioUnitario.substr(1);
  precioFinal.innerHTML = "$"+(parseInt(sub)*inputCantidad.value);
}

function btnMas() {
  if (inputCantidad.value < 3) {
    inputCantidad.value++;
  }
  var sub = precioUnitario.substr(1);
  precioFinal.innerHTML = "$"+(parseInt(sub)*inputCantidad.value);
}

function seguir(){
    var Precio = precioFinal.innerHTML.substr(1);
    window.location.replace("php/guarda_eleccion.php?cant="+ inputCantidad.value +"&pTotal="+ Precio +"&enviar=total", " ");
}
