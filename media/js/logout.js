$(document).ready(function(){
    var pathname, arrayPathname, pathCount, pathToAjax, i, url;
    pathname = $(location).attr('pathname');
    pathname = pathname.replace(/^\//, '');
    arrayPathname = pathname.split('/');
    pathCount = arrayPathname.length;
    pathToAjax = "";
    if (pathCount === 0) {
        pathToAjax = "index.php?url=logout";
    } else {
        for (i = 0; i < pathCount; i = i + 1) {
            pathToAjax = pathToAjax + "../";
        }
        pathToAjax = pathToAjax + "index.php?url=logout";
    }
    url = $(location).attr('href').substr(0, $(location).attr('href').length - pathname.length).replace(/\/$/, "");
    $(document).on('click', '#logout', function() {
        $.post(pathToAjax, {token: $(this).attr('token')}, function (data) {
            if (data === "true") {
                window.location.replace(url + "/admin");
            }
        });
    });
});