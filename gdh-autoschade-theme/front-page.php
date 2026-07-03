<?php
/**
 * Homepage: hero, diensten, over ons, waarom-strip, werkwijze,
 * reviews + voor/na, merken en FAQ + contactformulier.
 *
 * @package gdh-autoschade
 */

get_header();
?>

<main>

	<!-- Hero -->
	<section class="gdh-hero">
		<div class="gdh-container">
			<div class="gdh-hero__grid">
				<div>
					<span class="gdh-kicker"><?php esc_html_e( 'Autoschadeherstel & camperherstel Apeldoorn', 'gdh-autoschade' ); ?></span>
					<h1>
						<?php esc_html_e( 'Schade aan uw auto of camper?', 'gdh-autoschade' ); ?>
						<span><?php esc_html_e( 'Wij herstellen het vakkundig.', 'gdh-autoschade' ); ?></span>
					</h1>
					<p class="gdh-hero__lead">
						<?php esc_html_e( 'Snel herstel, vrijblijvend advies en professionele service. Wij zorgen dat u veilig en zorgeloos weer de weg op kunt.', 'gdh-autoschade' ); ?>
					</p>
					<div class="gdh-hero__cta">
						<a class="gdh-btn gdh-btn--primary" href="<?php echo esc_url( gdh_page_url( 'contact', '/#contact' ) ); ?>">
							<?php esc_html_e( 'Afspraak maken', 'gdh-autoschade' ); ?>
							<?php gdh_the_icon( 'calendar' ); ?>
						</a>
						<a class="gdh-btn gdh-btn--outline" href="<?php echo esc_url( gdh_phone_href() ); ?>">
							<?php esc_html_e( 'Bel direct', 'gdh-autoschade' ); ?>
							<?php gdh_the_icon( 'phone' ); ?>
						</a>
					</div>
				</div>
				<div class="gdh-hero__media">
					<img src="<?php echo esc_url( gdh_image( 'hero', 'hero.svg' ) ); ?>" alt="<?php esc_attr_e( 'Auto en camper in de werkplaats van GDH Autoschade', 'gdh-autoschade' ); ?>">
				</div>
			</div>

			<div class="gdh-usps">
				<?php
				$gdh_usps = array(
					__( 'Gratis en vrijblijvend advies', 'gdh-autoschade' ),
					__( 'Uitsluitend kwaliteit', 'gdh-autoschade' ),
					__( 'Snelle doorlooptijd', 'gdh-autoschade' ),
					__( 'Tevreden klanten', 'gdh-autoschade' ),
				);
				foreach ( $gdh_usps as $gdh_usp ) :
					?>
					<span class="gdh-usp"><span class="gdh-check"><?php gdh_the_icon( 'check' ); ?></span><?php echo esc_html( $gdh_usp ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Diensten -->
	<section class="gdh-services" id="diensten">
		<div class="gdh-container">
			<div class="gdh-section-head">
				<span class="gdh-kicker"><?php esc_html_e( 'Onze diensten', 'gdh-autoschade' ); ?></span>
				<h2><?php esc_html_e( 'Waarmee kunnen we u helpen?', 'gdh-autoschade' ); ?></h2>
			</div>

			<div class="gdh-services__grid">
				<?php
				$gdh_services = array(
					array(
						'icon'  => 'car',
						'title' => __( 'Autoschadeherstel', 'gdh-autoschade' ),
						'text'  => __( 'Vakkundig herstel van alle soorten autoschade. Van deuk tot zware schade.', 'gdh-autoschade' ),
						'slug'  => 'autoschadeherstel',
					),
					array(
						'icon'  => 'camper',
						'title' => __( 'Camperherstel', 'gdh-autoschade' ),
						'text'  => __( 'Specialist in schadeherstel voor campers en recreatievoertuigen.', 'gdh-autoschade' ),
						'slug'  => 'camperherstel',
					),
					array(
						'icon'  => 'spray',
						'title' => __( 'Spuitwerk', 'gdh-autoschade' ),
						'text'  => __( 'Hoogwaardig spuitwerk met oog voor detail en perfecte kleurmatch.', 'gdh-autoschade' ),
						'slug'  => 'spuitwerk',
					),
					array(
						'icon'  => 'file',
						'title' => __( 'Afhandeling met verzekeraar', 'gdh-autoschade' ),
						'text'  => __( 'Wij regelen de schadeafhandeling snel en zorgeloos voor u.', 'gdh-autoschade' ),
						'slug'  => 'afhandeling-met-verzekeraar',
					),
				);
				foreach ( $gdh_services as $gdh_service ) :
					?>
					<div class="gdh-card">
						<span class="gdh-card__icon"><?php gdh_the_icon( $gdh_service['icon'] ); ?></span>
						<h3><?php echo esc_html( $gdh_service['title'] ); ?></h3>
						<p><?php echo esc_html( $gdh_service['text'] ); ?></p>
						<a class="gdh-card__arrow" href="<?php echo esc_url( gdh_page_url( $gdh_service['slug'] ) ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Meer over %s', 'gdh-autoschade' ), $gdh_service['title'] ) ); ?>">
							<?php gdh_the_icon( 'arrow' ); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Over ons -->
	<section id="over-ons">
		<div class="gdh-container">
			<div class="gdh-about__grid">
				<div>
					<span class="gdh-kicker"><?php esc_html_e( 'Over GDH Autoschade', 'gdh-autoschade' ); ?></span>
					<h2><?php esc_html_e( 'Uw schade, onze zorg.', 'gdh-autoschade' ); ?></h2>
					<p><?php esc_html_e( 'GDH Autoschade in Apeldoorn is uw betrouwbare partner voor autoschadeherstel en camperherstel. Met moderne apparatuur, vakmensen en persoonlijke service zorgen wij voor een perfect eindresultaat en een zorgeloze ervaring.', 'gdh-autoschade' ); ?></p>

					<ul class="gdh-about__list">
						<?php
						$gdh_points = array(
							__( 'Ervaren en gecertificeerde specialisten', 'gdh-autoschade' ),
							__( 'Moderne werkplaats en apparatuur', 'gdh-autoschade' ),
							__( 'Kwaliteit, snelheid en garantie', 'gdh-autoschade' ),
							__( 'Altijd persoonlijk contact', 'gdh-autoschade' ),
						);
						foreach ( $gdh_points as $gdh_point ) :
							?>
							<li><span class="gdh-check"><?php gdh_the_icon( 'check' ); ?></span><?php echo esc_html( $gdh_point ); ?></li>
						<?php endforeach; ?>
					</ul>

					<a class="gdh-btn gdh-btn--ghost" href="<?php echo esc_url( gdh_page_url( 'over-ons' ) ); ?>">
						<?php esc_html_e( 'Meer over ons', 'gdh-autoschade' ); ?>
						<?php gdh_the_icon( 'arrow' ); ?>
					</a>
				</div>

				<div class="gdh-about__media">
					<img src="<?php echo esc_url( gdh_image( 'pand', 'pand.svg' ) ); ?>" alt="<?php esc_attr_e( 'Het pand van GDH Autoschade in Apeldoorn', 'gdh-autoschade' ); ?>">
					<div class="gdh-about__contactcard">
						<div class="gdh-contactline">
							<?php gdh_the_icon( 'phone' ); ?>
							<a href="<?php echo esc_url( gdh_phone_href() ); ?>"><?php echo esc_html( gdh_get_contact( 'phone' ) ); ?></a>
						</div>
						<div class="gdh-contactline">
							<?php gdh_the_icon( 'mail' ); ?>
							<a href="mailto:<?php echo esc_attr( gdh_get_contact( 'email' ) ); ?>"><?php echo esc_html( gdh_get_contact( 'email' ) ); ?></a>
						</div>
						<div class="gdh-contactline">
							<?php gdh_the_icon( 'pin' ); ?>
							<span><?php echo nl2br( esc_html( gdh_get_contact( 'address' ) ) ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Waarom kiezen voor -->
	<section class="gdh-why">
		<div class="gdh-container">
			<div class="gdh-section-head">
				<span class="gdh-kicker"><?php esc_html_e( 'Waarom kiezen voor GDH Autoschade?', 'gdh-autoschade' ); ?></span>
			</div>
			<div class="gdh-why__strip">
				<?php
				$gdh_reasons = array(
					array( 'shield', __( 'Vakmanschap en ervaring', 'gdh-autoschade' ) ),
					array( 'check', __( 'Transparant en eerlijk', 'gdh-autoschade' ) ),
					array( 'clock', __( 'Snelle doorlooptijd', 'gdh-autoschade' ) ),
					array( 'wrench', __( 'Garantie op herstel', 'gdh-autoschade' ) ),
					array( 'user', __( 'Persoonlijke service', 'gdh-autoschade' ) ),
					array( 'truck', __( 'Haal- en brengservice mogelijk', 'gdh-autoschade' ) ),
				);
				foreach ( $gdh_reasons as $gdh_reason ) :
					?>
					<div class="gdh-why__item"><?php gdh_the_icon( $gdh_reason[0] ); ?><span><?php echo esc_html( $gdh_reason[1] ); ?></span></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Werkwijze -->
	<section class="gdh-steps" id="werkwijze">
		<div class="gdh-container">
			<div class="gdh-section-head">
				<span class="gdh-kicker"><?php esc_html_e( 'Zo werkt het', 'gdh-autoschade' ); ?></span>
				<h2><?php esc_html_e( 'Onze werkwijze in 5 stappen', 'gdh-autoschade' ); ?></h2>
			</div>

			<div class="gdh-steps__grid">
				<?php
				$gdh_steps = array(
					array( 'user', __( 'Aanmelden', 'gdh-autoschade' ), __( 'U neemt contact met ons op via telefoon, mail of het contactformulier.', 'gdh-autoschade' ) ),
					array( 'search', __( 'Inspectie & advies', 'gdh-autoschade' ), __( 'We bekijken de schade en geven u een helder, vrijblijvend advies.', 'gdh-autoschade' ) ),
					array( 'wrench', __( 'Herstelwerk', 'gdh-autoschade' ), __( 'Onze specialisten gaan vakkundig en zorgvuldig voor u aan de slag.', 'gdh-autoschade' ) ),
					array( 'checklist', __( 'Kwaliteitscontrole', 'gdh-autoschade' ), __( 'We controleren alles grondig voor een perfect eindresultaat.', 'gdh-autoschade' ) ),
					array( 'key', __( 'Oplevering', 'gdh-autoschade' ), __( 'Uw auto of camper is weer als nieuw. U kunt veilig en zorgeloos de weg op.', 'gdh-autoschade' ) ),
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

	<!-- Reviews & voor/na -->
	<section class="gdh-reviews">
		<div class="gdh-container">
			<span class="gdh-kicker"><?php esc_html_e( 'Wat onze klanten zeggen', 'gdh-autoschade' ); ?></span>

			<div class="gdh-reviews__grid">
				<?php
				$gdh_reviews = array(
					array( __( 'Topservice! Mijn auto ziet er weer als nieuw uit. Snelle communicatie en helder advies.', 'gdh-autoschade' ), 'Mark de Vries', 'Apeldoorn' ),
					array( __( 'Deskundig team en perfect herstel van onze camper. Echte vakmensen met passie!', 'gdh-autoschade' ), 'Fam. Jansen', 'Beekbergen' ),
					array( __( 'Duidelijke afspraken, snel geholpen en geen verrassingen achteraf. Zeer tevreden!', 'gdh-autoschade' ), 'S. van Dijk', 'Apeldoorn' ),
				);
				foreach ( $gdh_reviews as $gdh_review ) :
					?>
					<div class="gdh-review">
						<div class="gdh-stars">
							<?php for ( $gdh_s = 0; $gdh_s < 5; $gdh_s++ ) { gdh_the_icon( 'star' ); } ?>
						</div>
						<p><?php echo esc_html( $gdh_review[0] ); ?></p>
						<div class="gdh-review__author">
							<span class="gdh-review__avatar"><?php echo esc_html( strtoupper( mb_substr( $gdh_review[1], 0, 1 ) ) ); ?></span>
							<span><strong><?php echo esc_html( $gdh_review[1] ); ?></strong><small><?php echo esc_html( $gdh_review[2] ); ?></small></span>
						</div>
					</div>
				<?php endforeach; ?>

				<div class="gdh-beforeafter">
					<div class="gdh-ba" data-ba>
						<img class="gdh-ba__after" src="<?php echo esc_url( gdh_image( 'after', 'na.svg' ) ); ?>" alt="<?php esc_attr_e( 'Auto na het herstel', 'gdh-autoschade' ); ?>">
						<img class="gdh-ba__before" src="<?php echo esc_url( gdh_image( 'before', 'voor.svg' ) ); ?>" alt="<?php esc_attr_e( 'Auto met schade, voor het herstel', 'gdh-autoschade' ); ?>">
						<span class="gdh-ba__label gdh-ba__label--before"><?php esc_html_e( 'Voor', 'gdh-autoschade' ); ?></span>
						<span class="gdh-ba__label gdh-ba__label--after"><?php esc_html_e( 'Na', 'gdh-autoschade' ); ?></span>
						<div class="gdh-ba__handle"></div>
					</div>
					<a class="gdh-beforeafter__link" href="<?php echo esc_url( gdh_page_url( 'over-ons' ) ); ?>">
						<?php esc_html_e( 'Bekijk meer voor & na projecten', 'gdh-autoschade' ); ?>
						<?php gdh_the_icon( 'arrow' ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Merken -->
	<section class="gdh-brands">
		<div class="gdh-container">
			<span class="gdh-kicker"><?php esc_html_e( 'Vertrouwd door topmerken', 'gdh-autoschade' ); ?></span>
			<div class="gdh-brands__row">
				<?php foreach ( array( 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Škoda', 'Seat', 'Fiat', 'Ford', 'Opel' ) as $gdh_brand ) : ?>
					<span class="gdh-brand"><?php echo esc_html( $gdh_brand ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- FAQ + contact -->
	<section class="gdh-faqcontact">
		<div class="gdh-container">
			<div class="gdh-faqcontact__grid">
				<div>
					<span class="gdh-kicker"><?php esc_html_e( 'Veelgestelde vragen', 'gdh-autoschade' ); ?></span>
					<h2><?php esc_html_e( 'Antwoorden op veelgestelde vragen', 'gdh-autoschade' ); ?></h2>
					<?php get_template_part( 'template-parts/faq-list', null, array( 'limit' => 4 ) ); ?>
					<a class="gdh-btn gdh-btn--outline" href="<?php echo esc_url( gdh_page_url( 'veelgestelde-vragen' ) ); ?>">
						<?php esc_html_e( 'Bekijk alle veelgestelde vragen', 'gdh-autoschade' ); ?>
						<?php gdh_the_icon( 'arrow' ); ?>
					</a>
				</div>

				<div>
					<?php get_template_part( 'template-parts/contact-form' ); ?>
				</div>

				<div class="gdh-faqcontact__aside">
					<?php get_template_part( 'template-parts/info-card' ); ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
