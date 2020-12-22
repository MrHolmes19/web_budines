<script>
//en caso de que el budin no admita cobertura la pagina de agregados salta al 
//total, pero todavia se podia volver con la flecha para atras. con esto vuelve, pero queda todo bloqueado.
var cobertura = '<?=$_SESSION["tieneCobertura"];?>';

if(cobertura == "NO"){
    $("input:radio").attr("disabled", true);

let nota = document.querySelector(".nota");
nota.innerHTML = "*Tu budin no admite cobertura!"

}
</script>