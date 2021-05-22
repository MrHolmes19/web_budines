//setea fecha de hoy
var fecha = new Date();
//getDate saca los dias(le concateno un cero si es menor a 10 para quede siempre con dos digitos)
var dia = fecha.getDate();
if (dia < 10) {
  dia = "0" + dia;
}
//lo mismo con meses
var mes = fecha.getMonth() + 1;
if (mes < 10) {
  mes = "0" + mes;
}
//el año es mas facil(desaconsejan la Ñ por cuestiones de charset)
var ano = fecha.getFullYear();

//pongo la fecha de hoy como minimo(formato yyyy-mm-dd)
document.getElementById("fechaEntrega").min = ano + "-" + mes + "-" + dia;

//le sumo 7 al dia actual(hay que usar el metodo set date para los cambios de mes, para que no quede por ej: 35-02-2020)
var diaActual = fecha.getDate();
var diaMaximo = diaActual + 7;
fecha.setDate(diaMaximo);


//idem anterior pero para fecha maxima
var dia1 = fecha.getDate();
if (dia1 < 10) {
  dia1 = "0" + dia1;
}
var mes1 = fecha.getMonth() + 1;
if (mes1 < 10) {
  mes1 = "0" + mes1;
}
var ano1 = fecha.getFullYear();

//pongo la fecha de hoy + 7 como maximo(formato yyyy-mm-dd)
var fechaM = ano1 + "-" + mes1 + "-" + dia1;
document.getElementById("fechaEntrega").max = fechaM;
