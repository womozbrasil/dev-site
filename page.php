<?php get_header(); ?>

			<div id="content" class="site-content">
				<div class="container">
					<div class="content-left-wrap col-md-9">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">
								<?php while ( have_posts() ) : the_post();

								get_template_part( 'content', 'page' );

								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;

								endwhile;
								?>
							</main>
						</div>
					</div>
					<div class="sidebar-wrap col-md-3 content-left-wrap">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
