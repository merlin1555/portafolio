<div id="noticias">
<?php
$temp = $wp_query;
$paged = (get_query_var('paged'));
$post_per_page = 3; //-1 for all posts
$args = array(
    'post_type' => 'noticias',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page
);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<a href="<?php the_permalink(); ?>">
<figure>
    <div class="the_time"><?php the_time('j F'); ?></div>
    <div>
        <h6><?php the_title(); ?></h6>
        <p><span><i class="fa-solid fa-user"></i></span><span><?php the_author(); ?></span></p>
    </div>
</figure></a>

<?php endwhile; else : ?>
<p class="text-center tittle-sm mb-0">No hay noticias que mostrar</p>
<?php endif;
wp_reset_query();
$wp_query = $temp ?>
</div>