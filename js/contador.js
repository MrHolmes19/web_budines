//funciones para el input de cantidad de budines
var inputCantidad = document.querySelector(".cantidad input");
var precioFinal = document.querySelector("#PrecioFinal strong");
var precioUnitario = precioFinal.innerHTML;

function btnMenos() {
  if (inputCantidad.value > 1) { //minimo 1 budin
    inputCantidad.value--;       //resta 1
  }
  var sub = precioUnitario.substr(1); //le quito el $ al precio total
  precioFinal.innerHTML = "$"+(parseInt(sub)*inputCantidad.value); //multiplico cantidad por precio y le agrego el $
}

function btnMas() { 
  if (inputCantidad.value < 3) { //maximo 3 budines
    inputCantidad.value++;       //suma 1
  }
  var sub = precioUnitario.substr(1); //idem anterior
  precioFinal.innerHTML = "$"+(parseInt(sub)*inputCantidad.value);
}

//manda a guarda_eleccion los datos
function seguir(){
    var Precio = precioFinal.innerHTML.substr(1);
    window.location.replace("../guarda_eleccion.php?cant="+ inputCantidad.value +"&pTotal="+ Precio +"&enviar=total", " ");
}
