<?php
/**
 * Algemene fallback-template.
 *
 * @package gdh-autoschade
 */

get_header();
?>

<main>
	<section class="gdh-pagehero">
		<div class="gdh-container">
			<h1><?php echo is_home() ? esc_html__( 'Nieuws', 'gdh-autoschade' ) : wp_kses_post( get_the_archive_title() ); ?></h1>
		</div>
	</section>

	<div class="gdh-page-content">
		<div class="gdh-container gdh-prose">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class(); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p><?php esc_html_e( 'Er is hier nog geen inhoud gevonden.', 'gdh-autoschade' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
