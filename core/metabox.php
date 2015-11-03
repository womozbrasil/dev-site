<?php

add_filter( 'rwmb_meta_boxes', 'womoz_register_meta_boxes' );

function womoz_register_meta_boxes( $meta_boxes ){
	$prefix = 'womoz_';

	// Pages
	$meta_boxes[] = array(
		'id' 					=> 'page',
		'title' 			=> __( 'Configurações da Página', 'womoz' ),
		'post_types'	=> array( 'page' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 			=> array(
			// Subtitle
			array(
				'name' 	=> __( 'Subtítulo da Página:', 'womoz' ),
				'id' 		=> "{$prefix}page_subtitle",
				'desc' 	=> __( 'Insira o subtítulo da página.', 'womoz' ),
				'type' 	=> 'text',
			),
			array(
				'name' 	=> __( 'Resumo da Página:', 'womoz' ),
				'id' 		=> "{$prefix}page_excerpt",
				'type' 	=> 'wysiwyg',
				'raw' => false,
				'options' => array(
					'textarea_rows' => 10,
					'teeny' => true,
					'media_buttons' => true,
				),
			)
		)
	);

	$meta_boxes[] = array(
		'id' 					=> 'time',
		'title' 			=> __( 'Redes Sociais', 'womoz' ),
		'post_types'	=> array( 'time' ),
		'context' 		=> 'normal',
		'priority' 		=> 'high',
		'autosave' 		=> true,
		'fields' 			=> array(
			// Facebook
			array(
				'name' 	=> __( 'Facebook:', 'womoz' ),
				'id' 		=> "{$prefix}time_social_fb",
				'desc' 	=> __( 'Ex: https://facebook.com/seuusurio.', 'womoz' ),
				'type' 	=> 'url',
			),
			// Twitter
			array(
				'name' 	=> __( 'Twitter:', 'womoz' ),
				'id' 		=> "{$prefix}time_social_tw",
				'desc' 	=> __( 'Ex: https://twitter.com/seuusurio.', 'womoz' ),
				'type' 	=> 'url',
			),
			// Linkedin
			array(
				'name' 	=> __( 'Linkedin:', 'womoz' ),
				'id' 		=> "{$prefix}time_social_in",
				'desc' 	=> __( 'Ex: https://linkedin.com/seuusurio.', 'womoz' ),
				'type' 	=> 'url',
			),
			// Site
			array(
				'name' 	=> __( 'Site:', 'womoz' ),
				'id' 		=> "{$prefix}time_social_site",
				'desc' 	=> __( 'Ex: http://www.meusite.com.br', 'womoz' ),
				'type' 	=> 'url',
			),
		)
	);

	return $meta_boxes;
}
