<?php get_header(); ?>

<div id="content" class="site-content">
	<div class="container">

		<div class="content-left-wrap col-md-9">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title">
								<?php
								if ( is_category() ) :
									single_cat_title();

								elseif ( is_tag() ) :
									single_tag_title();

								elseif ( is_author() ) :
									printf( __( 'Autor: %s', 'womoz-brasil' ), '<span class="vcard">' . get_the_author() . '</span>' );

								elseif ( is_day() ) :
									printf( __( 'Dia: %s', 'womoz-brasil' ), '<span>' . get_the_date() . '</span>' );

								elseif ( is_month() ) :
									printf( __( 'Mês: %s', 'womoz-brasil' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'womoz-brasil' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( __( 'Ano: %s', 'womoz-brasil' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'womoz-brasil' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galerias', 'womoz-brasil');

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Imagens', 'womoz-brasil');

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Vídeos', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Citações', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :

									_e( 'Links', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									_e( 'Status', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Áudios', 'womoz-brasil' );

								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									_e( 'Chats', 'womoz-brasil' );

								else :
									_e( 'Arquivos', 'womoz-brasil' );

								endif;
								?>
							</h1>

							<?php
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
							?>
						</header>

						<?php while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;

						zerif_paging_nav();

					else:
						get_template_part( 'content', 'none' );
					endif; ?>
				</main>
			</div>
		</div>

		<div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

	<?php get_footer(); ?>
