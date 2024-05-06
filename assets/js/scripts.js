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

$(document).ready(function( ){
    /* Carga de los elementos del menu */
    $("#menu_bio").slideDown(900);
    $("#menu_evi").slideDown(1200);
    $("#menu_item").slideDown(1500);
    $("#menu_cont").slideDown(1800);

    /* Modo oscuro */
    $("#modo_oscuro").click(function(){
		$("body").removeClass('atardecer');
		$("main").removeClass('fondo_claro');
        $("nav").removeClass('modo_claro');
        $("#biografia").removeClass('modo_claro');
        $("nav").removeClass('modo_claro_sombra');
        $(".menu_principal a").removeClass('modo_claro_fuente');
        $(".lista_evidencias li").removeClass('link_modo_claro');
        $(".menu_social li").removeClass('link_modo_claro');

        $(".circles li").removeClass('circles_modo_claro');
        $("#modo_oscuro").hide();
        $("#modo_claro").fadeIn(500);
	});
    $("#modo_claro").click(function(){
		$("body").addClass('atardecer');
		$("main").addClass('fondo_claro');
		$("nav").addClass('modo_claro');
		$("#biografia").addClass('modo_claro');
		$("nav").addClass('modo_claro_sombra');
		$(".menu_principal a").addClass('modo_claro_fuente');
		$(".lista_evidencias li").addClass('link_modo_claro');
		$(".menu_social li").addClass('link_modo_claro');

		$(".circles li").addClass('circles_modo_claro');
        $("#modo_claro").hide();
        $("#modo_oscuro").fadeIn(500);
	});

    $(".btn_desplegable").click(function(){
        /*$(".caja_desplegable").slideToggle('slow');*/
        $(this).siblings(".caja_desplegable").slideToggle('slow');
    });

    /* Iconos contacto */
    $(".menu_social").children().mouseenter(function(){
        $(this).children().slideDown();
    });
    $(".menu_social").children().mouseleave(function(){
        $(this).children("span").slideUp();
    });
});