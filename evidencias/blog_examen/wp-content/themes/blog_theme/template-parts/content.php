<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Que_Aprendí_-_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("entradas_content"); ?>>
<div class="entradas_content_contenedor">
<div class="entrada_img_contenedor">
		<div class="entrada_img">
			<?php blog_theme_post_thumbnail(); ?>
		</div>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				blog_theme_posted_on();
				blog_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog_theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<hr>
		<div>
			<h3>Comentarios :</h3>
			<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
<script>
	$(document).ready(function() {
		document.getElementById("submit").addEventListener("click", function() {
			// Obtén el valor del logro_id
			var logro_id = 4; // Puedes cambiar esto según tus necesidades
		
			// Utiliza Ajax para enviar una solicitud al archivo PHP
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "../logros_insertar.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("logro_id=" + logro_id);
		});
		
		$(".wp-image-24").on("click", function() {
			// Obtén el valor del logro_id
			var logro_id = 7; // Puedes cambiar esto según tus necesidades
			
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
	}); 
</script>