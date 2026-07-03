<?php
/**
 * Template Name: Dienst
 *
 * Dienstpagina met vaste inhoud per dienst (op paginaslug) plus
 * eventuele extra inhoud uit de editor en een contact-CTA.
 *
 * @package gdh-autoschade
 */

get_header();

$gdh_slug = get_post_field( 'post_name' );

$gdh_content = array(
	'autoschadeherstel' => array(
		'intro'  => __( 'Van een kleine deuk of kras tot zware aanrijdingsschade: bij GDH Autoschade wordt uw auto vakkundig hersteld. Wij werken uitsluitend met hoogwaardige materialen en moderne apparatuur, zodat uw auto er weer uitziet als nieuw.', 'gdh-autoschade' ),
		'points' => array(
			__( 'Uitdeuken, ook uitdeuken zonder spuiten', 'gdh-autoschade' ),
			__( 'Herstel van kras-, parkeer- en aanrijdingsschade', 'gdh-autoschade' ),
			__( 'Richtwerk en chassisherstel', 'gdh-autoschade' ),
			__( 'Vervanging van ruiten, bumpers en plaatwerk', 'gdh-autoschade' ),
			__( 'Garantie op al het herstelwerk', 'gdh-autoschade' ),
		),
	),
	'camperherstel' => array(
		'intro'  => __( 'Campers en recreatievoertuigen vragen om specialistische kennis. Onze werkplaats is ingericht op grote voertuigen en onze vakmensen kennen de materialen en constructies van campers als geen ander. Zo bent u verzekerd van perfect herstel — van polyester zijwand tot volledig plaatwerk.', 'gdh-autoschade' ),
		'points' => array(
			__( 'Schadeherstel voor campers, buscampers en caravans', 'gdh-autoschade' ),
			__( 'Herstel van polyester en sandwichpanelen', 'gdh-autoschade' ),
			__( 'Vocht- en lekkageschade', 'gdh-autoschade' ),
			__( 'Spuitwerk in elke gewenste kleur', 'gdh-autoschade' ),
			__( 'Afhandeling met uw camperverzekeraar', 'gdh-autoschade' ),
		),
	),
	'spuitwerk' => array(
		'intro'  => __( 'Een perfect eindresultaat valt of staat met het spuitwerk. In onze moderne spuiterij zorgen wij voor een strakke lak en een perfecte kleurmatch, zodat herstelde delen niet van nieuw te onderscheiden zijn.', 'gdh-autoschade' ),
		'points' => array(
			__( 'Professionele spuitcabine en kleurmeetapparatuur', 'gdh-autoschade' ),
			__( 'Perfecte kleurmatch met de originele lak', 'gdh-autoschade' ),
			__( 'Deelspuiten of complete overspuit', 'gdh-autoschade' ),
			__( 'Ook voor campers en bedrijfswagens', 'gdh-autoschade' ),
			__( 'Duurzame lakken van topkwaliteit', 'gdh-autoschade' ),
		),
	),
	'afhandeling-met-verzekeraar' => array(
		'intro'  => __( 'Schade is al vervelend genoeg. Daarom nemen wij de volledige afhandeling met uw verzekeraar uit handen. U meldt de schade bij ons, wij regelen de rest — van expertise tot uitbetaling.', 'gdh-autoschade' ),
		'points' => array(
			__( 'Directe afhandeling met alle verzekeraars', 'gdh-autoschade' ),
			__( 'Hulp bij het invullen van het schadeformulier', 'gdh-autoschade' ),
			__( 'Wij regelen de schade-expertise', 'gdh-autoschade' ),
			__( 'Heldere communicatie over eigen risico', 'gdh-autoschade' ),
			__( 'Geen verrassingen achteraf', 'gdh-autoschade' ),
		),
	),
);

$gdh_data = $gdh_content[ $gdh_slug ] ?? null;

while ( have_posts() ) :
	the_post();
	?>
	<main>
		<section class="gdh-pagehero">
			<div class="gdh-container">
				<span class="gdh-kicker"><?php esc_html_e( 'Onze diensten', 'gdh-autoschade' ); ?></span>
				<h1><?php the_title(); ?></h1>
				<?php if ( $gdh_data ) : ?>
					<p><?php echo esc_html( $gdh_data['intro'] ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<div class="gdh-page-content">
			<div class="gdh-container">
				<div class="gdh-grid-2">
					<div class="gdh-prose">
						<?php if ( $gdh_data ) : ?>
							<h2><?php esc_html_e( 'Wat wij voor u doen', 'gdh-autoschade' ); ?></h2>
							<ul class="gdh-about__list">
								<?php foreach ( $gdh_data['points'] as $gdh_point ) : ?>
									<li><span class="gdh-check"><?php gdh_the_icon( 'check' ); ?></span><?php echo esc_html( $gdh_point ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php the_content(); ?>

						<p style="margin-top: 28px;">
							<a class="gdh-btn gdh-btn--primary" href="<?php echo esc_url( gdh_page_url( 'contact', '/#contact' ) ); ?>">
								<?php esc_html_e( 'Vraag vrijblijvend advies aan', 'gdh-autoschade' ); ?>
								<?php gdh_the_icon( 'arrow' ); ?>
							</a>
						</p>
					</div>

					<div>
						<?php get_template_part( 'template-parts/info-card' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
