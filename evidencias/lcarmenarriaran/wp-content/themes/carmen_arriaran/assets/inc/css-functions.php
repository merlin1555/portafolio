<?php
    /*assets styles*/
    function lcarmenarrairan_css() {
        // Registramos los estilos:
        // Boostrap CSS CDN
        wp_register_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css','all');
        // Google Fonts
        wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Oswald&display=swap', array(), null, 'all');
        // Estilos locales
        wp_register_style('styles-css', get_template_directory_uri() . '/assets/librerias/css/styles.css', array(), '1.0', 'all');
        wp_register_style('colors-css', get_template_directory_uri() . '/assets/librerias/css/colors.css', array(), '1.0', 'all');
        wp_register_style('effects-css', get_template_directory_uri() . '/assets/librerias/css/effects.css', array(), '1.0', 'all');

        // Encolamos los estilos:
        // Bootstrap CDN
        wp_enqueue_style('bootstrap-css');
        // Google Fonts
        wp_enqueue_style('google-fonts');
        // Estilos locales
        wp_enqueue_style('styles-css');
        wp_enqueue_style('colors-css');
        wp_enqueue_style('effects-css');
    }
    add_action('wp_enqueue_scripts','lcarmenarrairan_css');
