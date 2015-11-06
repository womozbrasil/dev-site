<?php get_header(); ?>



<?php



/* Banner */

$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('WOMOZ BRASIL','womoz-brasil'));

$zerif_bigtitle_redbutton_label = get_theme_mod('zerif_bigtitle_redbutton_label',__('Participe','womoz-brasil'));

$zerif_bigtitle_redbutton_url = get_theme_mod('zerif_bigtitle_redbutton_url', esc_url( home_url( '/' ) ).'#contact');

$zerif_bigtitle_greenbutton_label = get_theme_mod('zerif_bigtitle_greenbutton_label',__("Conheça o projeto",'womoz-brasil'));

$zerif_bigtitle_greenbutton_url = get_theme_mod('zerif_bigtitle_greenbutton_url',esc_url( home_url( '/' ) ).'#aboutus');



/* Projetos */

$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

$zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('PROJETOS','womoz-brasil'));

$zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('Promover a inclusão não é uma tarefa fácil e para isso, realizamos e planejamos várias ações, para que nosso projeto possa chegar ao maior número de cidades possíveis. Conheça alguns projetos que desenvolvemos e apoiamos. Quem sabe você pode nos ajudar a levá-los para sua região!','womoz-brasil'));



/* WoMoz 360 */

$zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

$zerif_latestnews_title = get_theme_mod('zerif_latestnews_title',__('WOMOZ 360','womoz-brasil'));

$zerif_latestnews_subtitle = get_theme_mod('Acompanhe nossas atividades e experiências ao redor do Brasil','zerif_latestnews_subtitle');



/* Destaque */

$zerif_bottomribbon_text = get_theme_mod('zerif_bottomribbon_text',__('No WoMoz, trabalhamos junto a vários projetos criados e mantidos pela Mozilla, como MDN, Mozilla Learning Network , Thimble, entre outros. Somos abertos a receber sugestões de projetos, ligados ou não a comunidade Mozilla, desde que sejam compatíveis com nossos princípios de inclusão e fortalecimento da presença de minorias na tecnologia e no mundo open-source.','womoz-brasil'));

$zerif_bottomribbon_buttonlabel = get_theme_mod('zerif_bottomribbon_buttonlabel',__('QUERO AJUDAR!','womoz-brasil'));

$zerif_bottomribbon_buttonlink = get_theme_mod('zerif_bottomribbon_buttonlink');

?>



		<!-- Banner -->

		<div class="home-header-wrap">

			<div class="header-content-wrap">

				<div class="container">

					<?php

						if( !empty($zerif_bigtitle_title) ):

							echo '<h1 class="intro-text">'.$zerif_bigtitle_title.'</h1>';

						endif;

					?>



					<?php

					if( (!empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url)) || (!empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url))):

						echo '<div class="buttons">';



							if ( !empty($zerif_bigtitle_redbutton_label) && !empty($zerif_bigtitle_redbutton_url) ):

								echo '<a href="'.$zerif_bigtitle_redbutton_url.'" class="btn btn-primary custom-button red-btn">'.$zerif_bigtitle_redbutton_label.'</a>';

							endif;



							if ( !empty($zerif_bigtitle_greenbutton_label) && !empty($zerif_bigtitle_greenbutton_url) ):

								echo '<a href="'.$zerif_bigtitle_greenbutton_url.'" class="btn btn-primary custom-button green-btn">'.$zerif_bigtitle_greenbutton_label.'</a>';

							endif;

						echo '</div>';

					endif;

					?>

				</div>

			</div>

			<div class="clear"></div>

		</div>

		<!-- //Banner -->



		<!-- site-content -->

		<div id="content" class="site-content">



			<?php $projetos = new WP_Query( array( 'post_type' => 'projetos', 'post_status' => 'publish', 'posts_per_page' => '4', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>

			<?php if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 && $projetos->have_posts() ): ?>

			<!-- Projetos -->

			<section class="focus" id="focus">

				<div class="container">

					<div class="section-header">

						<?php

						// Título

						if( !empty($zerif_ourfocus_title) ):

							echo '<h2 class="dark-text">'.$zerif_ourfocus_title.'</h2>';

						endif;



						// Descrição

						if( !empty($zerif_ourfocus_subtitle) ):

							echo '<div class="section-legend">'.$zerif_ourfocus_subtitle.'</div>';

						endif;

						?>

					</div>

					<div class="row">

						<?php while ( $projetos->have_posts() ) : $projetos->the_post(); ?>

							<div class="col-lg-3 col-sm-3 focus-box" data-scrollreveal="enter left after 0.15s over 1s">

								<div class="service-icon">

									<i class="pixeden" style="background:url(http://demo.themeisle.com/zerif-lite/wp-content/uploads/2015/05/parallax.png) no-repeat center;width:100%; height:100%;"></i>

								</div>

								<h3 class="red-border-bottom"><?php the_title(); ?></h3>

								<?php the_excerpt(); ?>

							</div>

						<?php endwhile; ?>

					</div>

				</div>

			</section>

			<!-- //Projetos -->

			<?php endif; ?>



			<!-- WoMoz -->

			<section class="about-us" id="aboutus">

				<div class="container">

					<div class="section-header">

						<h2 class="white-text">WOMOZ</h2>

						<div class="white-text section-legend"></div>

					</div>

					<div class="row">



						<div class="col-lg-4 col-md-4 column zerif-rtl-big-title">

							<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">

								O futuro da web esta em nossas mãos. Venha lutar com a gente!

							</div>

						</div>



						<div class="col-lg-8 col-md-8 column zerif_about_us_center" data-scrollreveal="enter bottom after 0s over 1s">

							<p>WoMoz (Women & Mozilla) é uma comunidade composta por entusiastas da web aberta, com foco no empoderamento feminino na tecnologia. Trabalhamos com diversos projetos para incentivar e dar maior visibilidade a participação e contribuição de mulheres e minorias na Mozilla e no mundo open-souce. Acreditamos que a internet, os projetos open-source e a tecnologia em geral devem permanecer abertos e livres para participação, ou seja, isto significa que além da tecnologia, deve ser acessível da mesma forma a todos - homens e mulheres - igualmente. </p>

							<p>O WoMoz existe desde 2009 e tem passado por reformulações de objetivos, a medida que ele cresce ao redor do mundo. No Brasil, o movimento foi iniciado em Outubro de 2014, por um grupo de voluntárias da comunidade brasileira. Desde o ínicio das atividades, nosso grupo participou e organizou inúmeras atividades de capacitação e inclusão, marcou presença em grandes fóruns de tecnologia, levando nossa proposta e missão de criar um ambiente melhor de convivência para todos, em especial, dando voz às mulheres e minorias. Todos podem participar do projeto, independentemente de sexo, idade, trabalho e etc, pois defendemos a premissa de que para incluir, não é necessário excluir! Basta você acreditar e defender a importância da liberdade e envolvimento de mulheres e minorias nas diversas áreas da tecnologia. A tecnologia pode e deve ser feita por todos, o futuro da web está em nossas mãos. Venha lutar com a gente! o/</p>

						</div>
						<div class="clear"></div>
						<div class="col-lg-4 col-md-4 column zerif-rtl-skills">

							<h3><i class="fa fa-heart fa-6"></i>Nosso valores</h3>

						</div>

<div class="col-lg-4 col-md-4 column zerif-rtl-skills">

						<ul class="skills" data-scrollreveal="enter right after 0s over 1s">

								<li class="skill">

									Respeito

								</li>

<li class="skill">

									Companheirismo e Trabalho em equipe - Juntos, nós podemos mais!

								</li>

							</ul>

						</div>



						<div class="col-lg-4 col-md-4 column zerif-rtl-skills">

							<ul class="skills" data-scrollreveal="enter right after 0s over 1s">

								<li class="skill">

									Abertura

								</li>

<li class="skill">

									Transparência

								</li>

							</ul>

						</div>

<div class="clear"></div>

<div class="col-lg-4 col-md-4 column zerif-rtl-skills">

<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/kumi.png" alt="Kumi">

							<h3>Motivações</h3>

						</div>

<div class="col-lg-8 col-md-8 column zerif-rtl-skills">

							<ul class="skills" data-scrollreveal="enter right after 0s over 1s">

<li class="skill">O WoMoz Brasil surge como uma vertente de inclusão, novas e justas oportunidades para mulheres, que atualmente são sub representadas na área de tecnologia e recebem rotulações, tratamento e respeito inferior aos homens, em diversos ambientes. Na internet, essas situações são intensificadas e afetam diversas minorias, muitas vezes com apelos sexistas. Defedemos e lutamos pela inclusão e também por uma mudança profunda na cultura de quem faz ou usa tecnologia em geral, para que ela seja uma ferramenta de evolução.	</li>

<li class="skill">

									Levar oportunidades de participação de mulheres no open-souce e tecnologia em geral

								</li>

<li class="skill">

									Contribuir para o aprimoramento de competências e habilidades de mulheres e minorias através da tecnologia

								</li>

<li class="skill">

									Garantir igualdade de acesso a tecnologias e a comunidades open-source às minorias, quebrando preconceitos e estereótipos

								</li>

							</ul>

						</div>



					</div>

				</div>

			</section>

			<!-- //WoMoz -->



			<?php $posts = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => '3', 'ignore_sticky_posts' => true, 'order' => 'DESC' ) ); ?>

			<?php if( isset($zerif_latestnews_show) && $zerif_latestnews_show != 1 && $posts->have_posts() ): ?>



			<!-- Novidades -->

			<section class="latest-news" id="latestnews">

				<div class="container">



					<div class="section-header">

						<?php

						if( !empty($zerif_latestnews_title) ):

							echo '<h2 class="dark-text">' . $zerif_latestnews_title . '</h2>';

						endif;



						if( !empty($zerif_latestnews_subtitle) ):

							echo '<div class="dark-text section-legend">Acompanhe nossas atividades e experiências ao redor do Brasil.</div>';

						endif;

						?>

					</div>



					<div class="clear"></div>



					<div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">

						<div class="carousel-inner" role="listbox">

							<div class="item active">

							<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

								<div class="col-sm-3 latestnews-box">

									<div class="latestnews-img">

										<a class="latestnews-img-a" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

											<?php if ( has_post_thumbnail() ) :

												the_post_thumbnail();

											else:

												echo '<img src="'.esc_url( get_template_directory_uri() ).'/assets/images/blank-latestposts.png" alt="'.get_the_title().'" />';

											endif;

											?>

										</a>

									</div>

									<div class="latesnews-content">

										<h3 class="latestnews-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

										<?php the_excerpt(); ?>

									</div>

								</div>

							<?php endwhile; ?>

								<div class="clear"></div>

							</div>

						</div>

					</div>



				</div>

			</section>

			<!-- //Novidades -->

			<?php endif; ?>



			<?php if( !empty($zerif_bottomribbon_text) ): ?>

			<!-- Destaque -->

			<section class="separator-one">

				<div class="color-overlay">

					<h3 class="container text" data-scrollreveal="enter left after 0s over 1s"><?php echo $zerif_bottomribbon_text; ?></h3>

					<?php if( !empty($zerif_bottomribbon_buttonlabel) && !empty($zerif_bottomribbon_buttonlink) ):

					echo '<div data-scrollreveal="enter right after 0s over 1s">';

						echo '<a href="'.$zerif_bottomribbon_buttonlink.'" class="btn btn-primary custom-button red-btn">'.$zerif_bottomribbon_buttonlabel.'</a>';

					echo '</div>';

					endif;

					?>

				</div>

			</section>

			<!-- Destaque -->

			<?php endif; ?>



			<?php $contato = new WP_Query( array( 'pagename' => 'faca-parte', 'post_status' => 'publish' ) ); ?>

			<?php if( $contato->have_posts() ): ?>

			<!-- Contato -->

			<section class="contact-us" id="contact">

				<div class="container">

					<?php while ( $contato->have_posts() ) : $contato->the_post(); ?>

					<div class="section-header">

						<h2 class="white-text"><?php the_title(); ?></h2>

						<div class="white-text section-legend"><?php the_excerpt(); ?></div>

					</div>



					<div class="row">

						<?php the_content(); ?>

					</div>

					<?php endwhile; ?>

				</div>

			</section>

			<?php endif; ?>

			<!-- //Contato -->



		</div>

		<!-- //site-content -->





<?php get_footer(); ?>
