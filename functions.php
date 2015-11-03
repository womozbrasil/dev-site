<?php
/**
* Requires
*/
require_once 'core/cpt.php';
require_once 'core/metabox.php';
require_once 'core/customizer.php';
require_once 'core/extras.php';
require_once 'core/jetpack.php';
require_once 'core/template-tags.php';


function zerif_setup() {
	global $content_width;

	if (!isset($content_width)) {
		$content_width = 640;
	}

	//
	load_theme_textdomain('womoz-brasil', get_template_directory() . '/languages');

	//
	add_theme_support('automatic-feed-links');

	add_theme_support('post-thumbnails');

	/* Set the image size by cropping the image */
	add_image_size('post-thumbnail', 250, 250, true);
	add_image_size( 'post-thumbnail-large', 750, 500, true ); /* blog thumbnail */
	add_image_size( 'post-thumbnail-large-table', 600, 300, true ); /* blog thumbnail for table */
	add_image_size( 'post-thumbnail-large-mobile', 400, 200, true ); /* blog thumbnail for mobile */
	add_image_size('zerif_project_photo', 285, 214, true);
	add_image_size('zerif_our_team_photo', 174, 174, true);

	/* Register primary menu */
	register_nav_menus(array(
	                   'primary' => __('Primary Menu', 'zerif-lite'),
	                   ));

	/**/
	add_theme_support( 'title-tag' );

	/* Enable support for Post Formats. */
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

	/* Setup the WordPress core custom background feature. */
	add_theme_support('custom-background', apply_filters('zerif_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => get_stylesheet_directory_uri() . "/assets/images/bg.jpg",
    )));

	/* Enable support for HTML5 markup. */
	add_theme_support('html5', array(
	                  'comment-list',
	                  'search-form',
	                  'comment-form',
	                  'gallery',
	                  ));
}
add_action('after_setup_theme', 'zerif_setup');

function zerif_slug_fonts_url() {
	$fonts_url = '';
	$lato = _x( 'on', 'Lato font: on or off', 'zerif-lite' );
	$homemade = _x( 'on', 'Homemade font: on or off', 'zerif-lite' );
	$monserrat = _x( 'on', 'Monserrat font: on or off', 'zerif-lite' );
	if ( 'off' !== $lato || 'off' !== $monserrat|| 'off' !== $homemade ) {
		$font_families = array();

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:300,400,700,400italic';
		}
		if ( 'off' !== $monserrat ) {
			$font_families[] = 'Montserrat:700';
		}

		if ( 'off' !== $homemade ) {
			$font_families[] = 'Homemade Apple';
		}
		$query_args = array(
		                    'family' => urlencode( implode( '|', $font_families ) ),
		                    'subset' => urlencode( 'latin,latin-ext' ),
		                    );
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	return $fonts_url;
}

function zerif_scripts() {
	wp_enqueue_style('zerif_font', zerif_slug_fonts_url(), array(), null );
	wp_enqueue_style( 'zerif_font_all', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600italic,600,700,700italic,800,800italic');

	wp_enqueue_style('zerif_bootstrap_style', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_style_add_data( 'zerif_bootstrap_style', 'rtl', 'replace' );

	wp_enqueue_style('zerif_fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), 'v1');
	wp_enqueue_style('zerif_pixeden_style', get_template_directory_uri() . '/assets/css/pixeden-icons.css', array('zerif_fontawesome'), 'v1');

	wp_enqueue_style('zerif_style', get_stylesheet_uri(), array('zerif_pixeden_style'), 'v1');
	wp_enqueue_style('zerif_responsive_style', get_template_directory_uri() . '/assets/css/responsive.css', array('zerif_style'), 'v1');

	if ( wp_is_mobile() ){
		wp_enqueue_style( 'zerif_style_mobile', get_template_directory_uri() . '/assets/css/style-mobile.css', array('zerif_bootstrap_style', 'zerif_style'),'v1' );
	}

	wp_enqueue_script('jquery');

	wp_enqueue_script('zerif_bootstrap_script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20120206', true);
	wp_enqueue_script('zerif_knob_nav', get_template_directory_uri() . '/assets/js/jquery.knob.js', array("jquery"), '20120206', true);
	wp_enqueue_script('zerif_smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array("jquery"), '20120206', true);
	if ( !wp_is_mobile() ){
		wp_enqueue_script( 'zerif_scrollReveal_script', get_template_directory_uri() . '/assets/js/scrollReveal.js', array("jquery"), '20120206', true  );
	}
	wp_enqueue_script('zerif_script', get_template_directory_uri() . '/assets/js/zerif.js', array("jquery", "zerif_knob_nav"), '20120206', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'zerif_scripts');

function zerif_wp_page_menu() {
	echo '<ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">';
	wp_list_pages(array('title_li' => '', 'depth' => 1));
	echo '</ul>';
}

function zerif_excerpt_more( $more ) {
	return '<a href="'.get_permalink().'">[...]</a>';
}
add_filter('excerpt_more', 'zerif_excerpt_more');

function womoz_add_excerpts_to_pages(){
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'womoz_add_excerpts_to_pages');

function remove_class_function( $classes ) {
	if ( !is_home() ) {
		$key = array_search('custom-background', $classes);
		unset($classes[$key]);
	}
	return $classes;
}
add_filter( 'body_class', 'remove_class_function' );
