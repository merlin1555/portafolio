<?php
    /*assets scripts*/
    function lcarmenarrairan_js() {
        // Nos aseguramos que no estamos en el area de administracion
        if (!is_admin()) {
            // Registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
            // En adicion a las dependencias podemos indicar que este archivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer

            // Registramos los JS que usaremos:
            // JQuery Google CDN
            wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',true);
            // Bootstrap JS CDN
            wp_register_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',true);
            // Font Awesome
            wp_register_script('font-awesome', 'https://kit.fontawesome.com/675de1f9fe.js', array(), null, false);
            // Scripts locales
            wp_register_script('custom-js', get_template_directory_uri() . '/assets/librerias/js/scripts.js', array('jquery'), '1', true);
            
            // Encolamos los JS:
            wp_enqueue_script('jquery');
            wp_enqueue_script('custom-js', array('jquery'),true);
            wp_enqueue_script('bootstrap-js');
            wp_enqueue_script('font-awesome');
        }
    }
    add_action("wp_enqueue_scripts","lcarmenarrairan_js", 1);
    //primero encolamos los scripts, despues en las '', ponemos el nombre de la funcion de arriba, por ultimo priorizamos la carga del js
