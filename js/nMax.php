<script>
//guarda el limite de agregados que me trae la sesion segun el sabor
var max = <?= $_SESSION["lim_agregados"] ?>;

//al llegar a la cantidad de checks bloquea los que no estan checkeados.
$(document).ready(function () {

    $("input:checkbox").click(function () {

        var bol = $("input:checkbox:checked").length >= max;

        $("input:checkbox").not(":checked").attr("disabled", bol);

    })

});

//si el maximo es 0 bloquea todos
if(max == 0){
    $("input:checkbox").not(":checked").attr("disabled", true);
}
</script>