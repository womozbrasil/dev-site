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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
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


/*========================================
=            Add project icon            =
========================================*/
function projeto_icone($object) {
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
	?>
	<div>
	<label for="icone"></label>
	<select name="icone">
			<?php
			$icons = array(
				"Nenhum" 		=> null,
				"Educação"	=> "fa-heart",
				"Dev"				=> "fa-github-alt",
				"Eventos"		=> "fa-camera-retro"
			);
			foreach($icons as $name => $icon) {
				if($icon == get_post_meta($object->ID, "icone", true)) {
					echo "<option selected value='$icon'>$name</option>";
				}else{
					echo "<option value='$icon'>$name</option>";
				}
			}
			?>
		</select>
	</div>
	<?php
}

function save_custom_meta_box($post_id, $post, $update) {
	if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
		return $post_id;

	if(!current_user_can("edit_post", $post_id))
		return $post_id;

	if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return $post_id;

	$slug = "projetos";
	if($slug != $post->post_type)
		return $post_id;

	$meta_box_dropdown_value = "";

	if(isset($_POST["icone"])) {
		$meta_box_dropdown_value = $_POST["icone"];
	}

	update_post_meta($post_id, "icone", $meta_box_dropdown_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

function add_custom_meta_box() {
	add_meta_box("icone", "Ícone", "projeto_icone", "projetos", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");

/*=====  End of project icon  ======*/
