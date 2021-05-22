/* setea la selección de los radiobutton disponibilidad y cobertura segun info del registro de la bd */

var radioSi = document.querySelector("#dispSi");
var radioNo = document.querySelector("#dispNo");

if (disponible == "SI") {
  radioSi.checked = true;
}

if (disponible == "NO") {
  radioNo.checked = true;
}


var radioSi2 = document.querySelector("#coberSi");
var radioNo2 = document.querySelector("#coberNo");

if (cobertura == "SI") {
  radioSi2.checked = true;
}

if (cobertura == "NO") {
  radioNo2.checked = true;
}
