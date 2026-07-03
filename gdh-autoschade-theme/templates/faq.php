<?php
/**
 * Template Name: Veelgestelde vragen
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
				<span class="gdh-kicker"><?php esc_html_e( 'Veelgestelde vragen', 'gdh-autoschade' ); ?></span>
				<h1><?php esc_html_e( 'Antwoorden op veelgestelde vragen', 'gdh-autoschade' ); ?></h1>
				<p><?php esc_html_e( 'Staat uw vraag er niet tussen? Neem gerust contact met ons op — we helpen u graag verder.', 'gdh-autoschade' ); ?></p>
			</div>
		</section>

		<div class="gdh-page-content">
			<div class="gdh-container">
				<div class="gdh-grid-2">
					<div>
						<?php get_template_part( 'template-parts/faq-list' ); ?>
						<?php the_content(); ?>
					</div>
					<div>
						<?php get_template_part( 'template-parts/contact-form' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
