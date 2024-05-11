(function($) {
//  Inicializa Wow.js 
//new WOW().init();
//  Opacidad con animacion
function aparecerElementos() {
    var elementos = document.querySelectorAll(".nombre_entrada");
    elementos.forEach(function(elemento) {
      elemento.style.display = "block";
      elemento.style.opacity = 1;
    });
}
$(document).ready(function () {
    // Consulta inicial con la API-Rest para la página de "entradas"
    $.get("http://localhost/norellana/que_aprendi/wp-json/wp/v2/posts?per_page=20&orderby=date&order=asc", function (data, state) {
    //    $.get("https://norellana.laboratoriodiseno.cl/blog/wp-json/wp/v2/posts?per_page=20&orderby=date&order=asc", function (data, state) {
        console.log(data);

        var tableBody = $('#entradas_container');
        var contador = 1;

        // Posiciones iniciales para la espiral
        var centerX = 55;
        var centerY = 30;
        var angle = 0;
        var radiusIncrement = 11;
        var angleIncrement = 0.4;

        $.each(data, function (i, entry) {
            var entryContent = entry.content ? entry.content.rendered : '';
            var entryDate = new Date(entry.date).toLocaleDateString(); // Obtener y formatear la fecha

            // Agregar elementos al contenedor
            if (contador === 1) {
                tableBody.append(`
                <article class="planeta wow fadeIn" data-wow-delay="${contador}s" id="planeta-${contador}">
                    <div class="entrada" id="entrada-${contador}">
                        <a href="#" class="sparkle_effect"><div class="sparkle"><i class="fa-solid fa-star"></i></div></a>
                    </div>
                    <p class="nombre_entrada">${contador}). ${entry.title.rendered}</p>
                </article>
                <div class="box_entrada">
                    <div class="contenido_entrada">
                        <div class="header_entrada">
                            <span class="entrada_close_button"><i class="fa-solid fa-xmark"></i></span>
                        </div>
                        <div class="secciones_entrada">
                            <div class="contenido_entrada_texto">
                                <p class="nombre_entrada">${contador}). ${entry.title.rendered}</p>
                                <article class="entrada_texto">${entry.content.rendered}</article>
                                <p>Fecha de Publicación: ${entryDate}</p>
                            </div>
                            <div>
                                <div class="planeta_entrada">
                                </div>
                            </div>
                            <div>
                                <a class="visitar_button logro_2" href="${entry.link}"><i class="fa-solid fa-rocket"></i></i></a>
                                <p>Visitar</p>
                            </div>
                        </div>
                    </div>
                </div>
                `);
            } else {
                // Calcular la posición en espiral para los elementos siguientes
                var x, y;
                if (contador < 10) {
                    // Para los primeros 13 elementos
                    x = centerX + (angle * Math.cos(angle)) * radiusIncrement;
                    y = centerY + (angle * Math.sin(angle)) * radiusIncrement;
                } else {
                    // A partir del elemento 14, cambia la inclinación
                    x = centerX - 20 + (angle * Math.cos(angle - Math.PI)) * radiusIncrement;
                    y = centerY - 4 + (angle * Math.sin(angle - Math.PI)) * radiusIncrement;
                }
                // Convertir las coordenadas a porcentaje
                var xPercentage = x + '%';
                var yPercentage = y + '%';
                // Segundo elemento en adelante (Posicionamiento variable)
                tableBody.append(`
                <article class="planeta wow fadeIn" data-wow-delay="${contador}s" id="planeta-${contador}" style="position: absolute; top: ${yPercentage}; left: ${xPercentage};">
                    <div class="entrada" id="entrada-${contador}">
                        <a href="#" class="sparkle_effect"><div class="sparkle"><i class="fa-solid fa-star"></i></div></a>
                    </div>
                    <p class="nombre_entrada">${contador}). ${entry.title.rendered}</p>
                </article>
                <div class="box_entrada">
                    <div class="contenido_entrada">
                        <div class="header_entrada">
                            <span class="entrada_close_button"><i class="fa-solid fa-xmark"></i></span>
                        </div>
                        <div class="secciones_entrada">
                            <div class="contenido_entrada_texto">
                                <p class="nombre_entrada">${contador}). ${entry.title.rendered}</p>
                                <article class="entrada_texto">${entry.content.rendered}</article>
                                <p>Fecha de Publicación: ${entryDate}</p>
                            </div>
                            <div>
                                <div class="planeta_entrada">
                                </div>
                            </div>
                            <div>
                                <a class="visitar_button" href="${entry.link}"><i class="fa-solid fa-rocket"></i></i></a>
                                <p>Visitar</p>
                            </div>
                        </div>
                    </div>
                </div>
                `);
                // Incrementar el ángulo para el siguiente elemento
                angle += angleIncrement;
            }
            contador++;
        });
        // Efecto para los titulos de las estrellas =========================================================================================================
        $(".entrada").mouseenter(function(){
            $(this).parent().children(".nombre_entrada").show(200);
            $(this).children().children().css('background', 'transparent');
            $(this).children().children().css('box-shadow', 'none');
            $(this).children().children().children("i").css('font-size', '90%');
            $(this).children().children("sparkle").css('padding', '1.4em');
        }).mouseleave(function(){
            $(this).parent().children(".nombre_entrada").hide(200);
            $(this).children().children().css('background', 'radial-gradient(circle, rgb(94 94 94 / 50%) 0%, rgb(255 255 255 / 20%) 100%)');
            $(this).children().children().css('box-shadow', '0 0 20px #fff');
            $(this).children().children().children(".sparkle i").css('font-size', '50%')
        });
        $(".entrada").click(function(){
            $(this).parent().next(".box_entrada").show(200);
        });
        $(".entrada_close_button").click(function(){
            $(this).parent().parent().parent().hide(100);
            $("#pantalla_oscura").hide();
        });
        $(".entrada").click(function(){
            $("#pantalla_oscura").show();
        });


        $(".logro_2").on("click", function() {
            // Obtén el valor del logro_id
            var logro_id = 2; // Puedes cambiar esto según tus necesidades
                    
            // Utiliza Ajax para enviar una solicitud al archivo PHP
            $.ajax({
                type: "POST",
                url: "../logros_insertar.php",
                data: { logro_id: logro_id },
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                },
                error: function(error) {
                    // Manejar errores
                    console.error("Error en la solicitud Ajax:", error);
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            // Selecciona todos los elementos con la clase '.planeta'
            var planetas = document.querySelectorAll("#entradas_container .planeta");
        
            // Configura la animación para cada elemento
            planetas.forEach(function (planeta, index) {
              gsap.from(planeta, {
                opacity: 0,           // Inicia con opacidad cero
                y: 30,                // Desplaza hacia abajo 30 pixels
                duration: 1,          // Duración de la animación en segundos
                delay: index * 0.5,   // Retraso basado en el índice del elemento
              });
            });
        });

    }).fail(function (error) {
        console.error("Error en la solicitud principal:", error);
    });

    // Efectos para botones
    $(".close_button").click(function(){
        $(this).parent().parent().hide();
    });
    $(".register_button").click(function(){
        $(this).parent().siblings("#register_box").show(100);
        $(this).parent().siblings("#login_box").hide(100);
    });
    $(".login_button").click(function(){
        $(this).parent().siblings("#login_box").show(100);
        $(this).parent().siblings("#register_box").hide(100);
    });
    $(".account_button").click(function(){
        $(this).parent().siblings("#login_box").show(100);
    });

    //  Funciones para obtener los logros ======================================================================================================================================================
    //  ======================================================================================================================================================================================== 
   
    /*$(document).on("click", ".visitar_button", function() {
        // Incrementar el contador
        logro_3++;
    
        // Verificar si el contador ha alcanzado 14
        if (logro_3 === 14) {
            // Obtén el valor del logro_id
            var logro_id = 3; // Puedes cambiar esto según tus necesidades
    
            // Utiliza Ajax para enviar una solicitud al archivo PHP
            $.ajax({
                type: "POST",
                url: "../logros_insertar.php",
                data: { logro_id: logro_id },
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                },
                error: function(error) {
                    // Manejar errores
                    console.error("Error en la solicitud Ajax:", error);
                }
            });
    
            // Reiniciar el contador
            logro_3 = 0;
        }
    });*/
    
    // Espera 299792 horas antes de ejecutar la función
    setTimeout(function() {
        // Obtén el valor del logro_id y el nombre del logro (puedes cambiar esto según tus necesidades)
        var logro_id = 6;
        var nombreLogro = "Cuánto Tiempo ah pasado..."; // Nombre del logro

        // Utiliza Ajax para enviar una solicitud al archivo PHP
        $.ajax({
            type: "POST",
            url: "../logros_insertar.php",
            data: { logro_id: logro_id },
            success: function(response) {
                // Manejar la respuesta del servidor
                console.log(response);

                // Muestra un pop-up (usando SweetAlert2) informando sobre el logro ganado
                Swal.fire({
                    title: '¡Logro desbloqueado!',
                    text: 'Has ganado el logro #' + logro_id + ' - ' + nombreLogro,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(error) {
                console.error("Error en la solicitud Ajax:", error);
            }
        });
    }, 299792 * 60 * 60 * 1000); // Multiplica por 60 minutos por 60 segundos por 1000 para convertir horas a milisegundos

});
})(jQuery);

