<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_search() ) : ?>

		<?php if ( has_post_thumbnail()) : ?>
			<div class="post-img-wrap">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					<?php the_post_thumbnail("post-thumbnail"); ?>
				</a>
			</div>

			<div class="listpost-content-wrap">

		<?php else: ?>
			<div class="listpost-content-wrap-full">
		<?php endif; ?>

	<?php else:  ?>
		<div class="listpost-content-wrap-full">
	<?php endif; ?>

			<div class="list-post-top">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

					<?php if ( 'post' == get_post_type() ) : ?>

						<div class="entry-meta">
							<?php zerif_posted_on(); ?>
						</div>
					<?php endif; ?>
				</header>

				<?php if ( is_search() ) : ?>

					<div class="entry-summary">
						<?php the_excerpt(); ?>

				<?php else : ?>

					<div class="entry-content">
						<?php
						the_excerpt();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Páginas:', 'womoz-brasil' ),
							'after'  => '</div>',
						) );

				endif; ?>

					<footer class="entry-footer">
						<?php if ( 'post' == get_post_type() ) : ?>
						<?php
							$categories_list = get_the_category_list( __( ', ', 'womoz-brasil' ) );
							if ( $categories_list && zerif_categorized_blog() ) :
						?>
								<span class="cat-links">
									<?php printf( __( 'Postado em %1$s', 'womoz-brasil' ), $categories_list ); ?>
								</span>

						<?php endif; ?>

						<?php
							$tags_list = get_the_tag_list( '', __( ', ', 'womoz-brasil' ) );
							if ( $tags_list ) :
								?>

							<span class="tags-links">
								<?php printf( __( 'Tags: %1$s', 'womoz-brasil' ), $tags_list ); ?>
							</span>

						<?php endif; ?>

					<?php endif; ?>

					<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

						<span class="comments-link"><?php comments_popup_link( __( 'Deixe um comentário', 'womoz-brasil' ), __( '1 Comentário', 'womoz-brasil' ), __( '% Comentários', 'womoz-brasil' ) ); ?></span>

					<?php endif; ?>

					<?php edit_post_link( __( 'Editar', 'womoz-brasil' ), '<span class="edit-link">', '</span>' ); ?>

				</footer>
			</div>
		</div>
	</div>
</article>
