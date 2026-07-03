<?php
/**
 * Template Name: Contact
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
				<span class="gdh-kicker"><?php esc_html_e( 'Contact', 'gdh-autoschade' ); ?></span>
				<h1><?php esc_html_e( 'Neem contact met ons op', 'gdh-autoschade' ); ?></h1>
				<p><?php esc_html_e( 'Bel, mail of vul het formulier in — we reageren zo snel mogelijk. Binnenlopen zonder afspraak kan natuurlijk ook.', 'gdh-autoschade' ); ?></p>
			</div>
		</section>

		<div class="gdh-page-content">
			<div class="gdh-container">
				<div class="gdh-grid-2">
					<div>
						<?php get_template_part( 'template-parts/contact-form' ); ?>
					</div>
					<div>
						<?php get_template_part( 'template-parts/info-card' ); ?>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
