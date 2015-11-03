
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Não encontrado', 'womoz-brasil' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Pronto para publicar o seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'womoz-brasil' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Desculpe, nada combina com as palavras de sua pesquisa. Por favor, tente novamente com termos diferentes.', 'womoz-brasil' ); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'Nós não encontramos o que você está procurando. Talvez utilizar a pesquisa pode ajudar.', 'womoz-brasil' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>
