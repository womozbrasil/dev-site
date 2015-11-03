<?php
/**
 * zerif Theme Customizer
 *
 * @package zerif
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zerif_customize_register( $wp_customize ) {
	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	class Zerif_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
			<?php
		}
	}

	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_general', array(
		                         'priority' => 30,
		                         'capability' => 'edit_theme_options',
		                         'theme_supports' => '',
		                         'title' => __( 'Opções Gerais', 'zerif-lite' )
		                         ) );

		/* LOGO	*/
		$wp_customize->add_setting( 'zerif_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
	                           'label'    => __( 'Logo', 'zerif-lite' ),
	                           'section'  => 'title_tagline',
	                           'settings' => 'zerif_logo',
	                           'priority'    => 1,
	                           )));

		/* Social */
		$wp_customize->add_section( 'zerif_general_socials_section' , array(
	                           'title'       => __( 'Social Media', 'zerif-lite' ),
	                           'priority'    => 31,
	                           'panel' => 'panel_general'
	                           ));
		/* Texto */
		$wp_customize->add_setting( 'zerif_socials_texto', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('algum texto sobre os canais de comunicação','zerif-lite')));
		$wp_customize->add_control( 'zerif_socials_texto', array(
		                           'label'    => __( 'Texto', 'zerif-lite' ),
		                           'section'  => 'zerif_general_socials_section',
		                           'settings' => 'zerif_socials_texto',
		                           'priority'    => 3,
		                           ));

		/* Github */
		$wp_customize->add_setting( 'zerif_socials_github', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_github', array(
	                           'label'    => __( 'Github', 'zerif-lite' ),
	                           'section'  => 'zerif_general_socials_section',
	                           'settings' => 'zerif_socials_github',
	                           'priority'    => 4,
	                           ));
		/* Trello */
		$wp_customize->add_setting( 'zerif_socials_trello', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_trello', array(
	                           'label'    => __( 'Trello', 'zerif-lite' ),
	                           'section'  => 'zerif_general_socials_section',
	                           'settings' => 'zerif_socials_trello',
	                           'priority'    => 5,
	                           ));
		/* Slack */
		$wp_customize->add_setting( 'zerif_socials_slack', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_slack', array(
	                           'label'    => __( 'Slack', 'zerif-lite' ),
	                           'section'  => 'zerif_general_socials_section',
	                           'settings' => 'zerif_socials_slack',
	                           'priority'    => 6,
	                           ));
		/* E-mail */
		$wp_customize->add_setting( 'zerif_socials_email', array('sanitize_callback' => 'esc_url_raw','default' => '#'));
		$wp_customize->add_control( 'zerif_socials_email', array(
	                           'label'    => __( 'E-mail', 'zerif-lite' ),
	                           'section'  => 'zerif_general_socials_section',
	                           'settings' => 'zerif_socials_email',
	                           'priority'    => 7,
	                           ));

		/* Rodapé */
		$wp_customize->add_section( 'zerif_general_footer_section' , array(
	                           'title'       => __( 'Rodapé', 'zerif-lite' ),
	                           'priority'    => 32,
	                           'panel' => 'panel_general'
	                           ));

		/* Slack - Ícone */
		$wp_customize->add_setting( 'zerif_slack_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/assets/images/canal-womozbrazil-slack.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_slack_icon', array(
	                           'label'    => __( 'Slack - Ícone', 'zerif-lite' ),
	                           'section'  => 'zerif_general_footer_section',
	                           'settings' => 'zerif_slack_icon',
	                           'priority'    => 9,
	                           )));
		/* Slack */
		$wp_customize->add_setting( 'zerif_slack', array( 'sanitize_callback' => 'zerif_sanitize_text','default' => '<a target="_blank" href="https://womozbrasil.herokuapp.com/">Canal do Slack</a>') );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_slack', array(
	                           'label'   => __( 'Slack', 'zerif-lite' ),
	                           'section' => 'zerif_general_footer_section',
	                           'settings'   => 'zerif_slack',
	                           'priority' => 10
	                           )) );

		/* Telegram - Ícone */
		$wp_customize->add_setting( 'zerif_telegram_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/assets/images/canal-womozbrasil-telegram.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_telegram_icon', array(
	                           'label'    => __( 'Telegram - Ícone', 'zerif-lite' ),
	                           'section'  => 'zerif_general_footer_section',
	                           'settings' => 'zerif_telegram_icon',
	                           'priority'    => 11,
	                           )));
		/* Telegram */
		$wp_customize->add_setting( 'zerif_telegram', array('sanitize_callback' => 'zerif_sanitize_number','default' => '<a target="_blank" href="https://telegram.me/joinchat/A6qaqwDUyN90zRyW-FXBzg">Canal do Telegram</a>') );
		$wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_telegram', array(
	                           'label'   => __( 'Telegram', 'zerif-lite' ),
	                           'section' => 'zerif_general_footer_section',
	                           'settings'   => 'zerif_telegram',
	                           'priority' => 12
	                           )) );

		/* Lista de Discussão - Ícone */
		$wp_customize->add_setting( 'zerif_lista_icon', array('sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/assets/images/canal-womozbrasil-lista.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_lista_icon', array(
	                           'label'    => __( 'Lista de Discussão - Ícone', 'zerif-lite' ),
	                           'section'  => 'zerif_general_footer_section',
	                           'settings' => 'zerif_lista_icon',
	                           'priority'    => 13,
	                           )));
		/* Lista de Discussão */
		$wp_customize->add_setting( 'zerif_lista', array( 'sanitize_callback' => 'zerif_sanitize_text', 'default' => __('<a target="_blank" href="http://lists.mozillabrasil.org.br/mailman/listinfo/womoz_lists.mozillabrasil.org.br">Lista de Discussão</a>','zerif-lite') ) );
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_lista', array(
	                           'label'   => __( 'Lista de Discussão', 'zerif-lite' ),
	                           'section' => 'zerif_general_footer_section',
	                           'settings'   => 'zerif_lista',
	                           'priority' => 14
	                           )) ) ;
	endif;

	/* BANNER
	/****************************************************/
	$wp_customize->add_section( 'zerif_bigtitle_section' , array(
	                           'title'       => __( 'Banner', 'zerif-lite' ),
	                           'priority'    => 31
	                           ));

	/* Exibir/Ocultar */
	$wp_customize->add_setting( 'zerif_bigtitle_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
	                           'zerif_bigtitle_show',
	                           array(
	                                 'type' => 'checkbox',
	                                 'label' => __('Ocultar o banner ?','zerif-lite'),
	                                 'section' => 'zerif_bigtitle_section',
	                                 'priority'    => 1,
	                                 )
	                           );

	/* Título */
	$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('WOMOZ BRASIL','zerif-lite')));
	$wp_customize->add_control( 'zerif_bigtitle_title', array(
	                           'label'    => __( 'Título', 'zerif-lite' ),
	                           'section'  => 'zerif_bigtitle_section',
	                           'settings' => 'zerif_bigtitle_title',
	                           'priority'    => 2,
	                           ));

	/* Primeiro Botão */
	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Participe','zerif-lite')));
	$wp_customize->add_control( 'zerif_bigtitle_redbutton_label', array(
	                           'label'    => __( 'Primeiro botão', 'zerif-lite' ),
	                           'section'  => 'zerif_bigtitle_section',
	                           'settings' => 'zerif_bigtitle_redbutton_label',
	                           'priority'    => 3,
	                           ));
	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array('sanitize_callback' => 'esc_url_raw','default' => esc_url( home_url( '/' ) ).'#contact'));
	$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
	                           'label'    => __( 'Primeiro botão link', 'zerif-lite' ),
	                           'section'  => 'zerif_bigtitle_section',
	                           'settings' => 'zerif_bigtitle_redbutton_url',
	                           'priority'    => 4,
	                           ));

	/* Segundo Botão */
	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __("Conheça o projeto",'zerif-lite')));
	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(
	                           'label'    => __( 'Segundo botão', 'zerif-lite' ),
	                           'section'  => 'zerif_bigtitle_section',
	                           'settings' => 'zerif_bigtitle_greenbutton_label',
	                           'priority'    => 5,
	                           ));
	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array('sanitize_callback' => 'esc_url_raw','default' => esc_url( home_url( '/' ) ).'#aboutus'));
	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
	                           'label'    => __( 'Segundo botão link', 'zerif-lite' ),
	                           'section'  => 'zerif_bigtitle_section',
	                           'settings' => 'zerif_bigtitle_greenbutton_url',
	                           'priority'    => 6,
	                           ));

	/* PROJETOS
	/********************************************************************/
	$wp_customize->add_section( 'zerif_ourfocus_section' , array(
	                           'title'       => __( 'Projetos', 'zerif-lite' ),
	                           'priority'    => 32
	                           ));

	/* Exibir/Ocultar */
	$wp_customize->add_setting( 'zerif_ourfocus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
	                           'zerif_ourfocus_show',
	                           array(
	                                 'type' => 'checkbox',
	                                 'label' => __('Ocultar os projetos?','zerif-lite'),
	                                 'section' => 'zerif_ourfocus_section',
	                                 'priority'    => 1,
	                                 )
	                           );

	/* Título */
	$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('PROJETOS','zerif-lite')));
	$wp_customize->add_control( 'zerif_ourfocus_title', array(
	                           'label'    => __( 'Título', 'zerif-lite' ),
	                           'section'  => 'zerif_ourfocus_section',
	                           'settings' => 'zerif_ourfocus_title',
	                           'priority'    => 2,
	                           ));

	/* Descritivo */
	$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Promover a inclusão não é uma tarefa fácil e para isso, realizamos e planejamos várias ações, para que nosso projeto possa chegar ao maior número de cidades possíveis. Conheça alguns projetos que desenvolvemos e apoiamos. Quem sabe você pode nos ajudar a levá-los para sua região!','zerif-lite')));
	$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
	                           'label'    => __( 'Descrição', 'zerif-lite' ),
	                           'section'  => 'zerif_ourfocus_section',
	                           'settings' => 'zerif_ourfocus_subtitle',
	                           'priority'    => 3,
	                           ));

	/* SOBRE NÓS
	/************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):

		$wp_customize->add_panel( 'panel_about', array(
		                         'priority' => 33,
		                         'capability' => 'edit_theme_options',
		                         'theme_supports' => '',
		                         'title' => __( 'Sobre Nós', 'zerif-lite' )
		                         ) );

		$wp_customize->add_section( 'zerif_aboutus_settings_section' , array(
	                           'title'       => __( 'Conteúdo', 'zerif-lite' ),
	                           'priority'    => 1,
	                           'panel' => 'panel_about'
	                           ));
		/* about us show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
	                           'zerif_aboutus_show',
	                           array(
	                                 'type' => 'checkbox',
	                                 'label' => __('Ocultar o Sobre Nós?','zerif-lite'),
	                                 'section' => 'zerif_aboutus_settings_section',
	                                 'priority'    => 1,
	                                 )
	                           );

		$wp_customize->add_section( 'zerif_aboutus_main_section' , array(
	                           'title'       => __( 'Main content', 'zerif-lite' ),
	                           'priority'    => 2,
	                           'panel' => 'panel_about'
	                           ));

		/* title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_title', array(
	                           'label'    => __( 'Title', 'zerif-lite' ),
	                           'section'  => 'zerif_aboutus_main_section',
	                           'settings' => 'zerif_aboutus_title',
	                           'priority'    => 2,
	                           ));
		/* subtitle */
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Use this section to showcase important details about your business.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
	                           'label'    => __( 'Subtitle', 'zerif-lite' ),
	                           'section'  => 'zerif_aboutus_main_section',
	                           'settings' => 'zerif_aboutus_subtitle',
	                           'priority'    => 3,
	                           ));

		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Everything you see here is responsive and mobile-friendly.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
	                           'label'    => __( 'Big left side title', 'zerif-lite' ),
	                           'section'  => 'zerif_aboutus_main_section',
	                           'settings' => 'zerif_aboutus_biglefttitle',
	                           'priority'    => 4,
	                           ));

		/* text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite')));
		$wp_customize->add_control( 'zerif_aboutus_text', array(
	                           'label'    => __( 'Text', 'zerif-lite' ),
	                           'section'  => 'zerif_aboutus_main_section',
	                           'settings' => 'zerif_aboutus_text',
	                           'priority'    => 5,
	                           ));

		$wp_customize->add_section( 'zerif_aboutus_feat1_section' , array(
	                           'title'       => __( 'Feature no#1', 'zerif-lite' ),
	                           'priority'    => 3,
	                           'panel' => 'panel_about'
	                           ));
	endif;

	/* WOMOZ 360
	/**********************************************/
	$wp_customize->add_section( 'zerif_latestnews_section' , array(
                           'title'       => __( 'WoMoz 360', 'zerif-lite' ),
                           'priority'    => 34
                           ));

	/* Exibir/Ocultar */
	$wp_customize->add_setting( 'zerif_latestnews_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
                           'zerif_latestnews_show',
                           array(
                                 'type' => 'checkbox',
                                 'label' => __('Ocultar WoMoz 360?','zerif-lite'),
                                 'section' => 'zerif_latestnews_section',
                                 'priority'    => 1,
                                 )
                           );

	/* Título */
	$wp_customize->add_setting( 'zerif_latestnews_title', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_latestnews_title', array(
                           'label'    		=> __( 'Título', 'zerif-lite' ),
                           'section'  		=> 'zerif_latestnews_section',
                           'settings' 		=> 'zerif_latestnews_title',
                           'priority'    	=> 2,
                           ));

	/* Descritivo */
	$wp_customize->add_setting( 'zerif_latestnews_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
                           'label'    		=> __( 'Descritivo', 'zerif-lite' ),
                           'section'  		=> 'zerif_latestnews_section',
                           'settings' 		=> 'zerif_latestnews_subtitle',
                           'priority'   	=> 3,
                           ));

	/* Destaque
	/**********************************************************/
	$wp_customize->add_section( 'zerif_bottomribbon_section' , array(
                           'title'       => __( 'Destaque', 'zerif-lite' ),
                           'priority'    => 35
                           ));

	/* Texto */
	$wp_customize->add_setting( 'zerif_bottomribbon_text', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('No WoMoz, trabalhamos junto a vários projetos criados e mantidos pela Mozilla, como MDN, Mozilla Learning Network , Thimble, entre outros. Somos abertos a receber sugestões de projetos, ligados ou não a comunidade Mozilla, desde que sejam compatíveis com nossos princípios de inclusão e fortalecimento da presença de minorias na tecnologia e no mundo open-source.','zerif-lite')));
	$wp_customize->add_control( 'zerif_bottomribbon_text', array(
                           'label'    => __( 'Texto', 'zerif-lite' ),
                           'section'  => 'zerif_bottomribbon_section',
                           'settings' => 'zerif_bottomribbon_text',
                           'priority'    => 1,
                           ));

	/* Botão */
	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('QUERO AJUDAR!','zerif-lite')));
	$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
                           'label'    => __( 'Botão', 'zerif-lite' ),
                           'section'  => 'zerif_bottomribbon_section',
                           'settings' => 'zerif_bottomribbon_buttonlabel',
                           'priority'    => 2,
                           ));

	/* Botão link */
	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
                           'label'    => __( 'Botão Link', 'zerif-lite' ),
                           'section'  => 'zerif_bottomribbon_section',
                           'settings' => 'zerif_bottomribbon_buttonlink',
                           'priority'    => 3,
                           ));

	/* CONTATO
	/*******************************************************/
	$zerif_contact_us_section_description = '';
	$wp_customize->add_section( 'zerif_contactus_section' , array(
                           'title'       => __( 'Contato', 'zerif-lite' ),
                           'description' => $zerif_contact_us_section_description,
                           'priority'    => 38
                           ));

	/* Exibir/Ocultar */
	$wp_customize->add_setting( 'zerif_contactus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
                           'zerif_contactus_show',
                           array(
                                 'type' => 'checkbox',
                                 'label' => __('Hide contact us section?','zerif-lite'),
                                 'section' => 'zerif_contactus_section',
                                 'priority'    => 1,
                                 )
                           );
}
add_action( 'customize_register', 'zerif_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zerif_customize_preview_js() {
	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zerif_customize_preview_js' );
function zerif_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
function zerif_sanitize_number( $input ) {
	return force_balance_tags( $input );
}
