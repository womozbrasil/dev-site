<?php
$zerif_slack = get_theme_mod('zerif_slack','<a target="_blank" href="https://womozbrasil.herokuapp.com/">Canal do Slack</a>');
$zerif_slack_icon = get_theme_mod('zerif_slack_icon',get_template_directory_uri().'/assets/images/canal-womozbrazil-slack.png');

$zerif_telegram = get_theme_mod('zerif_telegram',__('<a target="_blank" href="https://telegram.me/joinchat/A6qaqwDUyN90zRyW-FXBzg">Canal do Telegram</a>','zerif-lite'));
$zerif_telegram_icon = get_theme_mod('zerif_telegram_icon',get_template_directory_uri().'/assets/images/canal-womozbrasil-telegram.png');

$zerif_lista = get_theme_mod('zerif_lista','<a target="_blank" href="http://lists.mozillabrasil.org.br/mailman/listinfo/womoz_lists.mozillabrasil.org.br">Lista de Discussão</a>');
$zerif_lista_icon = get_theme_mod('zerif_lista_icon',get_template_directory_uri().'/assets/images/canal-womozbrasil-lista.png');

$zerif_socials_texto = get_theme_mod('zerif_socials_texto','');
$zerif_socials_github = get_theme_mod('zerif_socials_github','#');
$zerif_socials_trello = get_theme_mod('zerif_socials_trello','#');
$zerif_socials_slack = get_theme_mod('zerif_socials_slack','#');
$zerif_socials_email = get_theme_mod('zerif_socials_email','#');
?>

	<!-- footer  -->
	<footer id="footer" role="contentinfo">
		<div class="container">

			<?php if( !empty($zerif_slack) ): ?>
			<div class="col-md-3 company-details">
				<div class="icon-top red-text">
					<?php if( !empty($zerif_slack_icon) ) echo '<img width="64" src="'.esc_url($zerif_slack_icon).'" alt="<?php echo $zerif_slack; ?>" />'; ?>
				</div>
				<?php echo $zerif_slack; ?>
			</div>
			<?php endif; ?>

			<?php if( !empty($zerif_telegram) ): ?>
			<div class="col-md-3 company-details">
				<div class="icon-top red-text">
					<?php if( !empty($zerif_telegram_icon) ) echo '<img width="64" src="'.esc_url($zerif_telegram_icon).'" alt="<?php echo $zerif_telegram; ?>" />'; ?>
				</div>
				<?php echo $zerif_telegram; ?>
			</div>
			<?php endif; ?>

			<?php if( !empty($zerif_lista) ): ?>
			<div class="col-md-3 company-details">
				<div class="icon-top red-text">
					<?php if( !empty($zerif_lista_icon) ) echo '<img width="64" src="'.esc_url($zerif_lista_icon).'" alt="<?php echo $zerif_lista; ?>" />'; ?>
				</div>
				<?php echo $zerif_lista; ?>
			</div>
			<?php endif; ?>

			<div class="col-md-3 copyright">
				<?php if( !empty($zerif_socials_texto) ): echo '<p><small>'.$zerif_socials_texto.'</small></p>'; endif; ?>
				<?php if( !empty($zerif_socials_github) || !empty($zerif_socials_trello) || !empty($zerif_socials_slack) || !empty($zerif_socials_email) ): ?>
				<ul class="social">
					<?php
					// github
					if( !empty($zerif_socials_github) ):
						echo '<li><a target="_blank" href="'.esc_url($zerif_socials_github).'"><i class="fa fa-github"></i></a></li>';
					endif;
					// trello
					if( !empty($zerif_socials_trello) ):
						echo '<li><a target="_blank" href="'.esc_url($zerif_socials_trello).'"><i class="fa fa-trello"></i></a></li>';
					endif;
					// slack
					if( !empty($zerif_socials_slack) ):
						echo '<li><a target="_blank" href="'.esc_url($zerif_socials_slack).'"><i class="fa fa-slack"></i></a></li>';
					endif;
					// email
					if( !empty($zerif_socials_email) ):
						echo '<li><a target="_blank" href="'.esc_url($zerif_socials_email).'"><i class="fa fa-envelope-o"></i></a></li>';
					endif;
					?>
				</ul>
				<?php endif; ?>
				<div class="zerif-copyright-box">
					<small>Feito com <3</small>
				</div>
			</div>

		</div>
	</footer>
	<!-- //footer -->

	<!-- JS -->
	<?php wp_footer(); ?>
</body>
</html>
