<?php

function mis_estilos()
{
	// Bootstrap Css
    wp_register_style('online-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', 'all');
    // Css Local
    wp_register_style('css-local', get_template_directory_uri() . '/assets/css/style.css', 'all');
    // Css para los colores
    wp_register_style('css-colores', get_template_directory_uri() . '/assets/css/colores.css', 'all');;
    // Css para los efectos especiales
    wp_register_style('css-effects', get_template_directory_uri() . '/assets/css/effects.css', 'all');
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap', array(), null );
    
    wp_enqueue_style('online-css');
    wp_enqueue_style('css-local');
    wp_enqueue_style('css-colores');
    wp_enqueue_style('css-effects');
    wp_enqueue_style('google-fonts');
}
add_action('wp_enqueue_scripts', 'mis_estilos');

//codigo para llamar a mis script.
function mis_script() {
    if (!is_admin()) {
        // Bootstrap Js
        wp_enqueue_script('online-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
        // Js Local
        wp_enqueue_script('local-js', get_template_directory_uri() . '/assets/js/js.js', array('jquery'), '1', true);
        // Font Awesome
        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/675de1f9fe.js', array(), null, false);
        // jQuery - CDN Google
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true);
    }
}
add_action("wp_enqueue_scripts", "mis_script", 1);

//custom post type

//include get_template_directory() . '/assets/modulos/modulo-rapcaviar/core-rapcaviar.php';

?>
