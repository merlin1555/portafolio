<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Que_Aprendí_-_Blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("inicio"); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<ul id="lista-entradas"></ul>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
	new WOW().init();
	$(document).ready(function () {
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
	});
</script>