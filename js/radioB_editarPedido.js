
var radioPendiente = document.querySelector("#pendiente");
var radioEntregado = document.querySelector("#entregado");

if (estado == "Pendiente") {
  radioPendiente.checked = true;
}

if (estado == "Entregado") {
  radioEntregado.checked = true;
}