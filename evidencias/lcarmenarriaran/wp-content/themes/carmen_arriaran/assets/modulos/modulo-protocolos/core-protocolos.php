<?php  /*  Registro de mi CPT */

function protocolos_register() {

    $labels = array(
        'name' => _x('Protocolos', 'post type general name'),
        'singular_name' => _x('protocolos', 'post type singular name'),
        'add_new' => _x('Agregar nuevo', 'protocolos item'),
        'add_new_item' => __('Agregar nuevo protocolo'),
        'edit_item' => __('Editar protocolo'),
        'new_item' => __('Nuevo protocolo'),
        'view_item' => __('Ver protocolo'),
        'search_items' => __('Buscar protocolos'),
        'not_found' =>  __('No se encontraron protocolos'),
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
        'menu_icon'  => 'dashicons-media-document',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'taxonomies'  => array( 'categoria-protocolos ' ),
        'rewrite' => array('slug' => 'protocolos', 'with_front' => FALSE)
      ); 

    register_post_type( 'protocolos' , $args );
}

add_action('init', 'protocolos_register');


/*categorias personalizadas para protocolos*/
function categoria_protocolos() {

	register_taxonomy(
		'categoria-protocolos',
		'protocolos',
		array(
			'label' => __( 'Categoria protocolos' ),
			'rewrite' => array( 'slug' => 'categoria-protocolos' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_protocolos' );