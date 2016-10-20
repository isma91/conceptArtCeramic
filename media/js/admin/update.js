$(document).ready(function () {
    var maintenance;
    if ($.trim($("div.info").html()) !== "") {
        $("#maintenance").prop('checked', true);
    } else {
        $("#maintenance").prop('checked', false);
    }
    $("select").material_select();
});