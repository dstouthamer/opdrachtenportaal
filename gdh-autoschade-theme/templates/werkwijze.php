<?php
/**
 * Template Name: Werkwijze
 *
 * @package gdh-autoschade
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main>
		<section class="gdh-pagehero">
			<div class="gdh-container">
				<span class="gdh-kicker"><?php esc_html_e( 'Zo werkt het', 'gdh-autoschade' ); ?></span>
				<h1><?php esc_html_e( 'Onze werkwijze in 5 stappen', 'gdh-autoschade' ); ?></h1>
				<p><?php esc_html_e( 'Van aanmelding tot oplevering: bij ons weet u altijd precies waar u aan toe bent.', 'gdh-autoschade' ); ?></p>
			</div>
		</section>

		<section class="gdh-steps">
			<div class="gdh-container">
				<div class="gdh-steps__grid">
					<?php
					$gdh_steps = array(
						array( 'user', __( 'Aanmelden', 'gdh-autoschade' ), __( 'U neemt contact met ons op via telefoon, mail of het contactformulier. Stuur gerust alvast foto\'s van de schade mee.', 'gdh-autoschade' ) ),
						array( 'search', __( 'Inspectie & advies', 'gdh-autoschade' ), __( 'We bekijken de schade en geven u een helder, vrijblijvend advies met een transparante offerte.', 'gdh-autoschade' ) ),
						array( 'wrench', __( 'Herstelwerk', 'gdh-autoschade' ), __( 'Onze specialisten gaan vakkundig en zorgvuldig voor u aan de slag met moderne apparatuur.', 'gdh-autoschade' ) ),
						array( 'checklist', __( 'Kwaliteitscontrole', 'gdh-autoschade' ), __( 'We controleren alles grondig voor een perfect eindresultaat, tot in de kleinste details.', 'gdh-autoschade' ) ),
						array( 'key', __( 'Oplevering', 'gdh-autoschade' ), __( 'Uw auto of camper is weer als nieuw. U kunt veilig en zorgeloos de weg op — met garantie.', 'gdh-autoschade' ) ),
					);
					foreach ( $gdh_steps as $gdh_i => $gdh_step ) :
						?>
						<div class="gdh-step">
							<div class="gdh-step__badge">
								<span class="gdh-step__num"><?php echo esc_html( $gdh_i + 1 ); ?></span>
								<?php gdh_the_icon( $gdh_step[0] ); ?>
							</div>
							<h3><?php echo esc_html( $gdh_step[1] ); ?></h3>
							<p><?php echo esc_html( $gdh_step[2] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<div class="gdh-page-content" style="padding-top: 0;">
			<div class="gdh-container">
				<div class="gdh-prose">
					<?php the_content(); ?>
					<p>
						<a class="gdh-btn gdh-btn--primary" href="<?php echo esc_url( gdh_page_url( 'contact', '/#contact' ) ); ?>">
							<?php esc_html_e( 'Plan direct een afspraak', 'gdh-autoschade' ); ?>
							<?php gdh_the_icon( 'arrow' ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
