<?php get_header(); ?>

<div id="content" class="site-content">
	<div class="container">
		<div class="content-left-wrap col-md-9">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Resultados da pesquisa por: %s', 'womoz-brasil' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>

						<?php zerif_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

				</main>
			</div>
		</div>
		<div class="sidebar-wrap col-md-3 content-left-wrap">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
