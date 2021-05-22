/* Tabla de excel exportada. */

var tableToExcel = (function () {
  var uri = "data:application/vnd.ms-excel;base64,",
    template =
      '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
    base64 = function (s) {
      return window.btoa(unescape(encodeURIComponent(s)));
    },
    format = function (s, c) {
      return s.replace(/{(\w+)}/g, function (m, p) {
        return c[p];
      });
    };
  return function (table) {
    if (!table.nodeType) table = document.getElementById(table);
    var ctx = { worksheet: "reporte" || "Worksheet", table: table.innerHTML };
    var link = document.createElement("a");
    
    //tomo el titulo de la tabla y la fecha actual
    var fecha = new Date;
    var tituloTabla = document.querySelector("#lista #dinamica caption").innerHTML;
    var tabla = tituloTabla.split(" ");
    
    //le doy nombre al archivo
    link.download = tabla[tabla.length-1]+ " "+fecha.toLocaleDateString()+".xls";
    link.href = uri + base64(format(template, ctx));
    link.click();
  };
})();
