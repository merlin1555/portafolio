<div id="jornadas">
<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = 4; //-1 for all posts
$args = array(
    'post_type' => 'jornadas',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<figure>

    <div></div>

    <?php carmen_arriaran_post_thumbnail(); ?>

    <h4><?php the_title(); ?></h4>

</figure>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
</div>