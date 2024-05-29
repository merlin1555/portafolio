<?php
    /*widget assets*/
    // Removemos el tema de soporte de widgets para un mejor manejo de ellos:
    function example_theme_support() {
        remove_theme_support('widgets-block-editor');
    }
    add_action('after_setup_theme','example_theme_support');

    // Registramos los widgets que se usaran:
    function zona_widget() {
        // Widget Barra de Búsqueda
        register_sidebar(array(
            // Le damos ID y nombre al widget
            'name'=>'Barra de Búsqueda',
            'id'=>'search_bar',
            // Añadimos un contenedor con ID y clase
            'before_widget'=>'<div id="%1$s" class="search_bar">',
            'after_widget'=>'</div>',
            // Añadimos titulo al contenedor
            'before_title'=>'<h5 class="">',
            'afet_title'=>'</h5>',
        ));
    }
    add_action('widgets_init','zona_widget');
