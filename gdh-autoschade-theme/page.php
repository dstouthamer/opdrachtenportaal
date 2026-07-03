<?php
/**
 * Standaard paginatemplate met paginahero.
 *
 * @package gdh-autoschade
 */

get_header();
?>

<main>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="gdh-pagehero">
			<div class="gdh-container">
				<h1><?php the_title(); ?></h1>
			</div>
		</section>

		<div class="gdh-page-content">
			<div class="gdh-container">
				<div class="gdh-prose">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
