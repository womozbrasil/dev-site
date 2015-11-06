<?php get_header(); ?>

<section class="our-team" id="team">
	<div class="container">
		<?php $time = new WP_Query( array( 'post_type' => 'time', 'post_status' => 'publish', 'posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC' ) ); ?>
		<div class="section-header">
			<h2 class="dark-text"><?php _e( 'Time', 'womoz-brasil' ); ?></h2>
		</div>

		<div class="entry-content">
			<p><?php _e( 'Quem está envolvido no WoMoz Brasil', 'womoz-brasil' ); ?></p>
			<p><?php _e( '<strong>Voluntários:</strong> são todos aqueles que participam desenvolvendo ações para o WoMoz, seja de ativismo, organização de eventos e oficinas em sua localidade. Além disso, contribuindo também com a equipe em mídias ˜sociais, documentação, gestão de conteúdo para o blog e/ou site e acolhendo novos participantes, dando lhes orientação de como começar na comunidade.', 'womoz-brasil' ); ?></p>
			<p><?php _e( '<strong>Coordenador do WoMoz Brasil:</strong> O coordenador é responsável por liderar a equipe que trabalha nas diversas localidades do país, dando a capacitação necessária para a equipe desenvolver as ações, planejar as reuniões mensais e tomar decisões junto a equipe de voluntários. A cada semestre (sempre 6 meses) um novo coordenador é eleito pela equipe de voluntários, de tal forma que todos possam ter chances de liderar a equipe, mas seguindo todos os prinícipos, objetivos, motivações e valores estabelecidos.', 'womoz-brasil' ); ?></p>
			<p><?php _e( '<strong>Instituições privadas e ONG’s:</strong> todos aqueles que contribuem de diversas formas, como cedendo infra-estrutura, viabilizando o acontecimento de nossas ações;', 'womoz-brasil' ); ?></p>
		</div>

		<?php if( $time->have_posts() ): ?>

			<h3><?php _e( 'Conheça nosso time', 'womoz-brasil' ); ?></h3>

			<div class="row" data-scrollreveal="enter left after 0s over 0.1s">
				<?php while ( $time->have_posts() ) : $time->the_post(); ?>
					<div class="col-lg-3 col-sm-3 team-box">
						<div class="team-member">
							<figure class="profile-pic">
								<?php if( has_post_thumbnail() ): ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></a>
								<?php else: ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/blank-latestposts.png"></a>
								<?php endif; ?>
							</figure>
							<div class="member-details">
								<h5 class="dark-text red-border-bottom"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
								<div class="position"><?php the_excerpt(); ?></div>
							</div>
							<div class="social-icons">
								<ul>
									<?php if( rwmb_meta( 'womoz_time_social_fb' ) ): ?><li><a target="_blank" href="<?php echo rwmb_meta( 'womoz_time_social_fb' ) ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
									<?php if( rwmb_meta( 'womoz_time_social_tw' ) ): ?><li><a target="_blank" href="<?php echo rwmb_meta( 'womoz_time_social_tw' ) ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
									<?php if( rwmb_meta( 'womoz_time_social_in' ) ): ?><li><a target="_blank" href="<?php echo rwmb_meta( 'womoz_time_social_in' ) ?>"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

		<?php else: ?>

		<?php endif; ?>

	</div>
</section>


<?php get_footer(); ?>
