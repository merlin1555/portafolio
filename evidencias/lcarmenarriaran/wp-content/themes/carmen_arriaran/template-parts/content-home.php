<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Liceo_Carmen_Arriaran
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'carmen_arriaran' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
<section id="noticias_comunicados">
	<h2>Noticias y Comunicados</h2>
	<div class="noticias_comunicados">
		<?php include get_template_directory() . '/assets/modulos/modulo-noticias/loop-noticias.php'; ?>
		<?php include get_template_directory() . '/assets/modulos/modulo-comunicados/loop-comunicados.php'; ?>
	</div><!-- .noticias_comunicados -->
</section>

<section id="conocenos">
	<h2>Conócenos</h2>
	<?php include get_template_directory() . '/assets/modulos/modulo-jornadas/loop-jornadas.php'; ?>
</section>

<section id="map">
	<div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.674571149278!2d-70.5887430248729!3d-33.509843000555286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662d04543964f29%3A0x98da4b89b65073fb!2sLiceo%20Carmen%20Arriaran!5e0!3m2!1ses!2scl!4v1698048183011!5m2!1ses!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<div id="contacto">
		<ul>
		<h2>Contacto</h2>
			<li><p><i class="fa-solid fa-location-dot"></i> Departamental 4850 - Peñalolen</p></li>
			<li><p><i class="fa-solid fa-phone"></i> 02-2286 2340</p></li>
			<li><p><i class="fa-regular fa-envelope"></i> lcarmenarriaran@gmail.com</p></li>
		</ul>
	
	</div>
</section>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'carmen_arriaran' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
