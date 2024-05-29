<div id="indice">
<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = 9; //-1 for all posts
$args = array(
    'post_type' => 'protocolos',
    'orderby' => 'date',
    'order' => 'ASC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<figure><a href="#<?php the_field('id'); ?>">
        <p><span>0<?php the_field('id'); ?>).</span></p>    

        <h4><?php the_title(); ?></h4>
        <hr class="rojo_1">
</figure></a>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
</div>