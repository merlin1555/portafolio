<div id="comunicados">
<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = 2; //-1 for all posts
$args = array(
    'post_type' => 'comunicados',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<figure>

    <div class="the_time"><?php the_time('j F'); ?></div>

    <?php carmen_arriaran_post_thumbnail(); ?>

    <h4><?php the_title(); ?></h4>

    <?php the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>" class="btn_custom_2">Ver Más</a>

</figure>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
</div>