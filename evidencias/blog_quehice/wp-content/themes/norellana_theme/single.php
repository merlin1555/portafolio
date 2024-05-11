<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package norellana_theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		<?php get_sidebar(); ?>

	</main><!-- #main -->
	<!-- Navegación para las entradas -->
	<div class="col_full pagination">
		<hr>
		<h5>Navegación de Entradas:</h5>
		<div>
			<?php the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Entrada Anterior:', 'norellana_theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Siguiente Entrada:', 'norellana_theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			); ?>
		</div>
		<hr>
	</div>

<?php
get_footer();
