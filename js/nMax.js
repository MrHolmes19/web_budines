
var max = 3;

$(document).ready(function () {

    $("input:checkbox").click(function () {

        var bol = $("input:checkbox:checked").length >= max;

        $("input:checkbox").not(":checked").attr("disabled", bol);

    })

});
