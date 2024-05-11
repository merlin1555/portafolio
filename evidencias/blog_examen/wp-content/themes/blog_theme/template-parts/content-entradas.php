<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Que_Aprendí_-_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("orbita"); ?>>
	<header class="entry-header">
		<h3 class="entradas_page_tittle">Seleccione un mundo y comience a explorar</h3>
	</header><!-- .entry-header -->

	
	<div class="estrellas_container" id="entradas_container">
	</div>

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
	</div><!-- .entry-content -->
<div id="pantalla_oscura"></div>
</article><!-- #post-<?php the_ID(); ?> -->