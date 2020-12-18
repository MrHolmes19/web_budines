<script>
var max = <?= $_SESSION["lim_agregados"] ?>;

$(document).ready(function () {

    $("input:checkbox").click(function () {

        var bol = $("input:checkbox:checked").length >= max;

        $("input:checkbox").not(":checked").attr("disabled", bol);

    })

});

if(max == 0){
    $("input:checkbox").not(":checked").attr("disabled", true);
}
</script>