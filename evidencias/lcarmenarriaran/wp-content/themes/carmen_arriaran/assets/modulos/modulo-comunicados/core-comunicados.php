<?php  /*  Registro de mi CPT */
function comunicados_register() {
    $labels = array(
        'name' => _x('Comunicados', 'post type general name'),
        'singular_name' => _x('comunicados', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'comunicados item'),
        'add_new_item' => __('Agregar nueva comunicado'),
        'edit_item' => __('Editar comunicado'),
        'new_item' => __('Nuevo comunicado'),
        'view_item' => __('Ver comunicado'),
        'search_items' => __('Buscar comunicados'),
        'not_found' =>  __('No se encontraron comunicados'),
        'not_found_in_trash' => __('No se encontro en la basura'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true, // El tipo de contenido es público y se mostrará en la API REST.
        'show_in_rest' => true, // Habilita la API REST
        'publicly_queryable' => true, // Puede ser consultado públicamente.
        'show_ui' => true, // Mostrará una interfaz de administración en el panel de WordPress.
        'query_var' => true, // Se puede consultar mediante una variable de consulta.
        'rewrite' => true, // Habilita la reescritura de URL.
        'exclude_from_search' => false, // No está excluido de las búsquedas.
        'capability_type' => 'post', // Define el tipo de capacidad (post o page).
        'menu_icon'  => 'dashicons-megaphone', // Icono del menú (puedes cambiarlo según tus necesidades).
        'hierarchical' => false, // No es jerárquico (como las páginas).
        'menu_position' => null, // La posición en el menú (usará la posición predeterminada).
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'), // Admite estos campos en el editor.
        'taxonomies'  => array( 'categoria-comunicados'),
        'rewrite' => array('slug' => 'comunicados', 'with_front' => false), // Configuración de reescritura de URL.
      ); 

    register_post_type( 'comunicados' , $args );
}
add_action('init', 'comunicados_register');

/*categorias personalizadas para comunicados*/
function categoria_comunicados() {

	register_taxonomy(
		'categoria-comunicados',
		'comunicados',
		array(
			'label' => __( 'Categoria comunicados' ),
			'rewrite' => array( 'slug' => 'categoria-comunicados' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_comunicados' );
