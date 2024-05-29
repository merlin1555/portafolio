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
	<section id="reglamento">
		<h2>RICE: Reglamento Interno de Convivencia Escolar.</h2>
		<hr>
		<iframe src="http://localhost/norellana/evidencias/lcarmenarriaran/wp-content/uploads/2024/05/ReglamentodeConvivencia-2022.pdf" width="100%"></iframe>
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
