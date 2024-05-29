/* Fade In */
document.addEventListener('DOMContentLoaded', function() {
    var fadeInSection = document.querySelectorAll('.fade-in-section');
    var options = {
        threshold: 0.33 // Cambia el umbral al 33%
    };

    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.intersectionRatio > 0) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    fadeInSection.forEach(function(section) {
        observer.observe(section);
    });
});

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

    $(".receta_card article").mouseenter(function(){
        $(this).children().children(".ver_receta").slideDown(200);
    });
    $(".receta_card article").mouseleave(function(){
        $(this).children().children(".ver_receta").slideUp(200);
    });
});
