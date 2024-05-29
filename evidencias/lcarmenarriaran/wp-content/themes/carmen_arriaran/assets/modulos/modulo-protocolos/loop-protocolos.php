<div id="protocolos">
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

<figure id="<?php the_field('id'); ?>">

    <h2>0<?php the_field('id'); ?>). <?php the_title(); ?></h2>

    <?php the_excerpt(); ?>

    <div class="botones_download">    

        <h6><a href="<?php the_field('link'); ?>?download=1" class="btn_custom_2" download>Descargar <i class="fa-solid fa-download"></i></a></h6>

        <h6><a href="<?php the_field('link');?>" target="_blank" class="btn_custom_2">Ver más <i class="fa-solid fa-arrow-right"></i></a></h6>

    </div>

</figure>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay contenido que mostrar</p>

<?php endif;
wp_reset_query();
$wp_query = $temp ?>
</div>