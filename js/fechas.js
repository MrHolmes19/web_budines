var fecha = new Date();
var dia = fecha.getDate();
if (dia < 10) {
  dia = "0" + dia;
}
var mes = fecha.getMonth() + 1;
if (mes < 10) {
  mes = "0" + mes;
}
var ano = fecha.getFullYear();
var fechaM = new Date();
var fechaF = dia + "-" + mes + "-" + ano;
document.getElementById("fechaEntrega").min = ano + "-" + mes + "-" + dia;
var diaActual = fecha.getDate();
var diaMaximo = diaActual + 7;
fecha.setDate(diaMaximo);
var dia1 = fecha.getDate();
if (dia1 < 10) {
  dia1 = "0" + dia1;
}
var mes1 = fecha.getMonth() + 1;
if (mes1 < 10) {
  mes1 = "0" + mes1;
}
var ano1 = fecha.getFullYear();

fechaM = ano1 + "-" + mes1 + "-" + dia1;
document.getElementById("fechaEntrega").max = fechaM;
