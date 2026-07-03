<?php
/**
 * Header met logo, navigatie, telefoonnummer en CTA-knop.
 *
 * @package gdh-autoschade
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="gdh-header">
	<div class="gdh-container gdh-header__inner">
		<a class="gdh-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M32 4 8 12v18c0 16 12 26 24 30 12-4 24-14 24-30V12L32 4z" fill="#17181c"/>
					<path d="M32 9 13 15.5V30c0 13 9.5 21.5 19 25 9.5-3.5 19-12 19-25V15.5L32 9z" fill="#fff"/>
					<path d="M24 34c4-8 12-10 16-9l-6 5 2 4 8-3c-1 5-6 9-12 9l-4 6-4-2 3-5c-2-1-3-3-3-5z" fill="#f5821f"/>
				</svg>
			<?php endif; ?>
			<span><?php bloginfo( 'name' ); ?><em><?php esc_html_e( 'Autoschade & camperherstel', 'gdh-autoschade' ); ?></em></span>
		</a>

		<nav class="gdh-nav" aria-label="<?php esc_attr_e( 'Hoofdmenu', 'gdh-autoschade' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => 'gdh_nav_fallback',
			) );
			?>
		</nav>

		<div class="gdh-header__actions">
			<a class="gdh-header__phone" href="<?php echo esc_url( gdh_phone_href() ); ?>">
				<?php gdh_the_icon( 'phone' ); ?>
				<span><?php echo esc_html( gdh_get_contact( 'phone' ) ); ?></span>
			</a>
			<a class="gdh-btn gdh-btn--primary" href="<?php echo esc_url( gdh_page_url( 'contact', '/#contact' ) ); ?>">
				<?php esc_html_e( 'Afspraak maken', 'gdh-autoschade' ); ?>
			</a>
			<button class="gdh-nav-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu openen', 'gdh-autoschade' ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>
