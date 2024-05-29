
<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = 1; //-1 for all posts
$args = array(
    'post_type' => 'contacto',
    'orderby' => 'date',
    'order' => 'ASC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<figure>
    <h2><?php the_title(); ?></h2>
    <p><i class="fa-solid fa-location-dot"></i><?php the_field('direccion'); ?></p>
    <p><i class="fa-solid fa-phone"></i><?php the_field('telefono'); ?></p>
    <p><i class="fa-solid fa-envelope"></i><?php the_field('correo'); ?></p>
    <p><i class="fa-solid fa-globe"></i>Síquenos en:</p>
</figure>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
