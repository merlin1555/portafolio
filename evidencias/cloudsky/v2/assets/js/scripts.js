$(document).ready(function(){
    $(".close_button").click(function(){
        $(this).parent().slideUp();
    });

    $("#iniciar_sesion").click(function(){
        if ($(".registrarse").is(":visible")) {
            $(".registrarse").slideUp(function() {
                $(".iniciar_sesion").slideDown();
            });
        } else {
            $(".iniciar_sesion").slideDown();
        }
    });

    $("#registrarse").click(function(){
        if ($(".iniciar_sesion").is(":visible")) {
            $(".iniciar_sesion").slideUp();
        } else { }
    });
});
