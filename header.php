<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/html5.js"></script>
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/ie.css" type="text/css">
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<!-- Preloader >
	<div class="preloader">
		<div class="status">&nbsp;</div>
	</div>
	<!-- Preloader -->

	<!-- Header -->
	<header id="home" class="header">
		<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">
			<div class="container">
				<div class="navbar-header responsive-logo">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only"><?php _e('Menu','womoz-brasil'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-womoz-brasil.png" alt="<?php echo get_bloginfo('title'); ?>">
					</a>
				</div>
				<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation">
					<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'womoz-brasil' ); ?></a>
					<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list', 'fallback_cb'     => 'zerif_wp_page_menu')); ?>
				</nav>
			</div>
		</div>
	</header>
	<!-- //Header -->
