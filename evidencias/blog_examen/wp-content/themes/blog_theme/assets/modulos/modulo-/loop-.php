<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = -1; //-1 for all posts
$args = array(
    'post_type' => 'playlist',
    'orderby' => 'date',
    'order' => 'ASC',
    'paged' => $paged,
    'post_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<div>
	<a href="#">
	<figure><?php spotify_norellana_post_thumbnail(); ?></figure>
	<h5><?php echo get_the_title(); ?></h5>
	<p><?php echo get_the_excerpt(); ?></p>
	</a>
</div>

<?php endwhile; else : ?>

<p class="text-center tittle-sm mb-0">Oops!, Lo sentimos, no hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
