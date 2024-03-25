

// MENU LATERAL

$("#menu_02").click(function () {
    $("#menusub_02").slideToggle(200, "linear");
    $("#menusub_03").slideUp(200, "linear");
});
$("#menu_03").click(function () {
    $("#menusub_03").slideToggle(200, "linear");
    $("#menusub_02").slideUp(200, "linear");
});

var btnMenu = false;
$("#btn-menu, #back-menu").click(function () {
    if (!btnMenu) {
        $(".menu").css({
            "left": "0",
            "transition": "left ease-in-out .2s"
        });
        $("#back-menu").fadeIn(200);
        $("#btn-menu").css({ "color": "#f1f1f1" });
        btnMenu = true;
    } else {
        $(".menu, #btn-menu").removeAttr('style').css({ "transition": "left ease-in-out .2s" });
        $("#back-menu").fadeOut(200);
        btnMenu = false;
    }
});

$("#btn-excluir").click(function () {
    $("#quest-excluir").fadeToggle(200);
})


// TELA DE LOGIN

$("#mostrar-senha").click(function () {
    $("#senha").attr("type", "text");
    $("#mostrar-senha").fadeToggle(0);
    $("#ocultar-senha").fadeToggle(0);
});
$("#ocultar-senha").click(function () {
    $("#senha").attr("type", "password");
    $("#ocultar-senha").fadeToggle(0);
    $("#mostrar-senha").fadeToggle(0);
});