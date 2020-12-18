<script>
var cobertura = '<?=$_SESSION["tieneCobertura"];?>';

if(cobertura == "NO"){
    $("input:radio").attr("disabled", true);

let nota = document.querySelector(".nota");
nota.innerHTML = "*Tu budin no admite cobertura!"

}



</script>