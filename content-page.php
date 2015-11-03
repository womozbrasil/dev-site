<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continuar lendo %s <span class="meta-nav">&rarr;</span>', 'womoz-brasil' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Páginas:', 'womoz-brasil' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<?php edit_post_link( __( 'Editar', 'womoz-brasil' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
	</article>
