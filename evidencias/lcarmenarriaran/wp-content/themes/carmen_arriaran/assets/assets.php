<?php
    // Añade el extracto en el WP
    add_post_type_support('page','excerpt');

    // Se incluyen los CSS
    include get_template_directory().'/assets/inc/css-functions.php';
    // Se incluyen los JS
    include get_template_directory().'/assets/inc/js-functions.php';
    // Se incluyen los modulos
    include get_template_directory().'/assets/inc/modulos-functions.php';
    // Se incluyen los widgets
    include get_template_directory().'/assets/inc/widgets-functions.php';