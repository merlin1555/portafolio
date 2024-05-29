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

    /* Cambio de colores para el Modo oscuro */
    $("#modo_oscuro").click(function(){
		$("#banner").removeClass('atardecer');  // Fondo cielo
        $("main").removeClass('main_claro'); // Main
        $("nav").removeClass('modo_claro'); // Menú principal
        $("nav").removeClass('modo_claro_sombra');  // Sombra inferior del menú principal
        $(".menu_principal a").removeClass('modo_claro_fuente');    // Links del menú principal
        $(".lista_evidencias li").removeClass('link_modo_claro');   // Lista de evidencias
        $(".menu_social a").removeClass('link_modo_claro');    // Links sociales
        $(".menu_social button").removeClass('link_modo_claro');    // Links sociales
        $(".caja_desplegable").removeClass('footer_claro');    // Caja de Evidencias
        $(".lista_evidencias button").removeClass('link_modo_claro');    // Botones Desplegables de las Evidencias
        $("#contacto").removeClass('footer_claro');    // Caja de Correo desplegable

        $("#modo_oscuro").hide();       // Esconder el boton Sol
        $("#modo_claro").fadeIn(500);   // Mostrar el boton Luna
	});
    $("#modo_claro").click(function(){
		$("#banner").addClass('atardecer'); // Fondo cielo
		$("main").addClass('main_claro'); // Main
		$("nav").addClass('modo_claro');    // Menú principal
		$("nav").addClass('modo_claro_sombra'); // Sombra inferior del menú principal
		$(".menu_principal a").addClass('modo_claro_fuente');   // Links del menú principal
		$(".lista_evidencias li").addClass('link_modo_claro');  // Lista de evidencias
		$(".menu_social a").addClass('link_modo_claro');   // Links sociales
		$(".menu_social button").addClass('link_modo_claro');   // Links sociales
		$(".caja_desplegable").addClass('footer_claro');   // Caja de Evidencias
		$(".lista_evidencias button").addClass('link_modo_claro');   // Botones Desplegables de las Evidencias
		$("#contacto").addClass('footer_claro');   // Caja de Correo desplegable

        $("#modo_claro").hide();        // Esconder el boton Luna
        $("#modo_oscuro").fadeIn(500);  // Mostrar el boton Sol
	});

    /* Iconos contacto */
    $(".menu_social").children().mouseenter(function(){
        $(this).children().children().slideDown();
    });
    $(".menu_social").children().mouseleave(function(){
        $(this).children().children("span").slideUp();
    });
});