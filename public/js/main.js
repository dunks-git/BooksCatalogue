$(document).ready(function () {
    $("nav.navbar > a").click(function (e) {
        $("nav.navbar > a").removeClass("font-weight-bolder");
        $(this).addClass("font-weight-bolder");
    });
});
