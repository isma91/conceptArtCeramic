$(document).ready(function () {
    var maintenance;
    if ($.trim($("div.info").html()) !== "") {
        $("#maintenance").prop('checked', true);
    } else {
        $("#maintenance").prop('checked', false);
    }
    $("select").material_select();
    $(document).on("change", "#addImg", function () {
        if ($(this).prop('checked') === true) {
            $('#imgField').html('<div class="row"><div class="file-field input-field"><div class="btn"><span>Image</span><input type="file" name="newImg[]" multiple></div><div class="file-path-wrapper"><input class="file-path validate" type="text"></div></div></div>');
        } else {
            $('#imgField').html('');
        }
    });
    $(document).on("click", ".oldImg", function () {
        var id = $(this).attr('checkbox');
        $("[for='" + id + "']").click();
    });
});