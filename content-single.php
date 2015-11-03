<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php zerif_posted_on(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Páginas:', 'womoz-brasil' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<footer class="entry-footer">
		<?php
   	$category_list = get_the_category_list( __( ', ', 'womoz-brasil' ) );
		$tag_list = get_the_tag_list( '', __( ', ', 'womoz-brasil' ) );

		if ( ! zerif_categorized_blog() ) {
			if ( '' != $tag_list ) {
				$meta_text = __( 'Esta entrada foi marcada com a tag %2$s. Adicione o <a href="%3$s" rel="bookmark">link permamente</a> aos seus favoritos.', 'womoz-brasil' );
			} else {
				$meta_text = __( 'Adicione o <a href="%3$s" rel="bookmark">link permamente</a> aos seus favoritos.', 'womoz-brasil' );
			}
		} else {

			if ( '' != $tag_list ) {
				$meta_text = __( 'Esta entrada foi publicada em %1$s  e marcada com a tag %2$s. Adicione o <a href="%3$s" rel="bookmark">link permamente</a> aos seus favoritos.', 'womoz-brasil' );
			} else {
				$meta_text = __( 'Esta entrada foi publicada em %1$s. Adicione o <a href="%3$s" rel="bookmark">link permamente</a> aos seus favoritos.', 'womoz-brasil' );
			}
		}

		printf( $meta_text, $category_list, $tag_list, get_permalink() ); ?>

		<?php edit_post_link( __( 'Editar', 'womoz-brasil' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
