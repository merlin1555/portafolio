<?php  /*  Registro de mi CPT */

function contacto_register() {

    $labels = array(
        'name' => _x('Contacto', 'post type general name'),
        'singular_name' => _x('contacto', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'contacto item'),
        'add_new_item' => __('Agregar nuevo contacto'),
        'edit_item' => __('Editar contacto'),
        'view_item' => __('Ver contacto'),
        'search_items' => __('Buscar contacto'),
        'not_found' =>  __('No se encontraró'),
        'not_found_in_trash' => __('No se encontro en la basura'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon'  => 'dashicons-phone',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'taxonomies'  => array( 'categoria-contacto ' ),
        'rewrite' => array('slug' => 'contacto', 'with_front' => FALSE)
      ); 

    register_post_type( 'contacto' , $args );
}

add_action('init', 'contacto_register');


/*categorias personalizadas para contacto*/
function categoria_contacto() {

	register_taxonomy(
		'categoria-contacto',
		'contacto',
		array(
			'label' => __( 'Categoria contacto' ),
			'rewrite' => array( 'slug' => 'categoria-contacto' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_contacto' );