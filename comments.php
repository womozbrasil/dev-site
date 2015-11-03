<?php if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
				printf( _nx( 'Um comentário em &ldquo;%2$s&rdquo;', '%1$s comentários em &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'womoz-brasil' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'zerif-lite' ); ?></h2>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Comentários Antigos', 'womoz-brasil' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Comentários Recentes &rarr;', 'womoz-brasil' ) ); ?></div>
		</nav>

		<?php endif; ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
				) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'zerif-lite' ); ?></h2>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zerif-lite' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zerif-lite' ) ); ?></div>
		</nav>

		<?php endif; ?>

	<?php endif; ?>

	<?php
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'zerif-lite' ); ?></p>

	<?php endif; ?>
	<?php comment_form(array('comment_notes_after' => '')); ?>
</div>
