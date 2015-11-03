<?php

// Separando o Menu
class Custom_Menu_Separator {
	function __construct() {
		add_action( 'init_custom_menu_separator', array( &$this, 'add_admin_menu_separator' ) );
		add_action( 'init', array( &$this, 'set_admin_menu_separator' ) );
	}

	function add_admin_menu_separator( $position ) {
		global $menu;

		$menu[$position] = array(
			0   =>  '',
			1   =>  'read',
			2   =>  'separator' . $position,
			3   =>  '',
			4   =>  'wp-menu-separator'
		);
	}

	function set_admin_menu_separator() {
		do_action( 'init_custom_menu_separator', 27 );
	}
}
new Custom_Menu_Separator();

// Register Custom Post Type Projetos
function womoz_projects_post_type() {

	$labels = array(
		'name'                => _x( 'Projetos', 'Post Type General Name', 'womoz' ),
		'singular_name'       => _x( 'Projeto', 'Post Type Singular Name', 'womoz' ),
		'menu_name'           => __( 'Projetos', 'womoz' ),
		'parent_item_colon'   => __( 'Projeto Parente:', 'womoz' ),
		'all_items'           => __( 'Todos os projetos', 'womoz' ),
		'view_item'           => __( 'Visualizar projeto', 'womoz' ),
		'add_new_item'        => __( 'Adicionar novo projeto', 'womoz' ),
		'add_new'             => __( 'Adicionar novo', 'womoz' ),
		'edit_item'           => __( 'Editar projeto', 'womoz' ),
		'update_item'         => __( 'Atualizar projeto', 'womoz' ),
		'search_items'        => __( 'Pesquisar projeto', 'womoz' ),
		'not_found'           => __( 'Nenhum projeto encontrado', 'womoz' ),
		'not_found_in_trash'  => __( 'Nenhum projeto encontrado na Lixeira', 'womoz' ),
	);

	$args = array(
		'label'               => __( 'projetos', 'womoz' ),
		'description'         => __( 'Projetos do WoMoz', 'womoz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-media-code',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'projetos', $args );
}
add_action( 'init', 'womoz_projects_post_type', 0 );

// Register Custom Post Type Timw
function womoz_group_post_type() {

	$labels = array(
		'name'                => _x( 'Integrantes', 'Post Type General Name', 'womoz' ),
		'singular_name'       => _x( 'Integrante', 'Post Type Singular Name', 'womoz' ),
		'menu_name'           => __( 'Time', 'womoz' ),
		'parent_item_colon'   => __( 'Integrante Parente:', 'womoz' ),
		'all_items'           => __( 'Todos os integrantes', 'womoz' ),
		'view_item'           => __( 'Visualizar integrante', 'womoz' ),
		'add_new_item'        => __( 'Adicionar novo integrante', 'womoz' ),
		'add_new'             => __( 'Adicionar novo', 'womoz' ),
		'edit_item'           => __( 'Editar integrante', 'womoz' ),
		'update_item'         => __( 'Atualizar integrante', 'womoz' ),
		'search_items'        => __( 'Pesquisar integrante', 'womoz' ),
		'not_found'           => __( 'Nenhum integrante encontrado', 'womoz' ),
		'not_found_in_trash'  => __( 'Nenhum integrante encontrado na Lixeira', 'womoz' ),
	);

	$args = array(
		'label'               => __( 'integrantes', 'womoz' ),
		'description'         => __( 'Time do WoMoz', 'womoz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 27,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'time', $args );
}
add_action( 'init', 'womoz_group_post_type', 0 );
