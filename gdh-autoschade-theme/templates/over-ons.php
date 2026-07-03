<?php
/**
 * Template Name: Over ons
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
				<span class="gdh-kicker"><?php esc_html_e( 'Over GDH Autoschade', 'gdh-autoschade' ); ?></span>
				<h1><?php esc_html_e( 'Uw schade, onze zorg.', 'gdh-autoschade' ); ?></h1>
				<p><?php esc_html_e( 'Persoonlijk, vakkundig en betrouwbaar — al jaren het adres voor autoschadeherstel en camperherstel in Apeldoorn en omgeving.', 'gdh-autoschade' ); ?></p>
			</div>
		</section>

		<div class="gdh-page-content">
			<div class="gdh-container">
				<div class="gdh-grid-2">
					<div class="gdh-prose">
						<p><?php esc_html_e( 'GDH Autoschade in Apeldoorn is uw betrouwbare partner voor autoschadeherstel en camperherstel. Met moderne apparatuur, ervaren vakmensen en persoonlijke service zorgen wij voor een perfect eindresultaat en een zorgeloze ervaring.', 'gdh-autoschade' ); ?></p>
						<p><?php esc_html_e( 'Wij geloven in eerlijk en transparant werken: u weet vooraf precies waar u aan toe bent, zonder verrassingen achteraf. Of het nu gaat om een kleine parkeerdeuk of grote aanrijdingsschade — elk voertuig verdient dezelfde zorg en aandacht.', 'gdh-autoschade' ); ?></p>

						<h2><?php esc_html_e( 'Waar wij voor staan', 'gdh-autoschade' ); ?></h2>
						<ul class="gdh-about__list">
							<?php
							$gdh_points = array(
								__( 'Ervaren en gecertificeerde specialisten', 'gdh-autoschade' ),
								__( 'Moderne werkplaats en apparatuur', 'gdh-autoschade' ),
								__( 'Kwaliteit, snelheid en garantie', 'gdh-autoschade' ),
								__( 'Altijd persoonlijk contact', 'gdh-autoschade' ),
								__( 'Haal- en brengservice mogelijk', 'gdh-autoschade' ),
							);
							foreach ( $gdh_points as $gdh_point ) :
								?>
								<li><span class="gdh-check"><?php gdh_the_icon( 'check' ); ?></span><?php echo esc_html( $gdh_point ); ?></li>
							<?php endforeach; ?>
						</ul>

						<?php the_content(); ?>
					</div>

					<div>
						<img src="<?php echo esc_url( gdh_image( 'pand', 'pand.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Het pand van GDH Autoschade in Apeldoorn', 'gdh-autoschade' ); ?>" style="border-radius: 14px; margin-bottom: 22px;">
						<?php get_template_part( 'template-parts/info-card' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
