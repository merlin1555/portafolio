<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package norellana_theme
 */

get_header();
?>

	<main id="primary" class="site-main col_full">
		<div class="search_container">
			<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados para: %s', 'norellana_theme' ), '<span>"' . get_search_query() . '"</span>' );
					?>
				</h1>
			</div><!-- .page-header -->
			<div class="search_results">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</div>
		
		<div>
			<?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
