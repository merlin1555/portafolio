<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Que_Aprendí_-_Blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("content_panel"); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', ' de Usuario</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog_theme' ),
				'after'  => '</div>',
			)
		);
		?>
		<div id="logro_1" class="logros_contenedor">
			<h2>Logros :</h2>
			<?php if (is_user_logged_in()) { ?>
				<div id="logros_contenedor">
					<!-- <a href="#" id="desbloquear_logro_1">Logro</a> -->
					<?php include("logros.php"); ?>
				</div>
			<?php } else { ?>
				<p>Inicie Sesión para ver sus logros</p>
			<?php } ?>
		</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<script>
	$(document).ready(function() {
		document.getElementById("logro_1").addEventListener("click", function() {
        // Obtén el valor del logro_id
        var logro_id = 1; // Puedes cambiar esto según tus necesidades
    
        // Utiliza Ajax para enviar una solicitud al archivo PHP
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../logros_insertar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("logro_id=" + logro_id);
		});
	}); 
</script>