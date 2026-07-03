<?php
/**
 * GDH Autoschade theme functions.
 *
 * @package gdh-autoschade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GDH_THEME_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/contact-form.php';
require_once get_template_directory() . '/inc/setup-pages.php';
require_once get_template_directory() . '/inc/icons.php';

/**
 * Theme setup.
 */
function gdh_setup() {
	load_theme_textdomain( 'gdh-autoschade', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 120,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Hoofdmenu', 'gdh-autoschade' ),
		'footer'  => __( 'Footermenu', 'gdh-autoschade' ),
	) );
}
add_action( 'after_setup_theme', 'gdh_setup' );

/**
 * Enqueue styles & scripts.
 */
function gdh_assets() {
	wp_enqueue_style( 'gdh-style', get_stylesheet_uri(), array(), GDH_THEME_VERSION );
	wp_enqueue_script( 'gdh-main', get_template_directory_uri() . '/js/main.js', array(), GDH_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'gdh_assets' );

/**
 * Contactgegevens met Customizer-fallbacks.
 */
function gdh_get_contact( $key ) {
	$defaults = array(
		'phone'         => '+31 6 21 33 05 48',
		'email'         => 'info@gdhautoschade.nl',
		'address'       => "Gladsaxe 24,\n7327 JZ Apeldoorn",
		'hours_week'    => 'Ma - Vr: 08:00 - 17:30',
		'hours_weekend' => 'Za - Zo: Gesloten',
		'facebook'      => '',
		'instagram'     => '',
	);

	$value = get_theme_mod( 'gdh_' . $key, $defaults[ $key ] ?? '' );

	return $value;
}

/**
 * Telefoonnummer als tel:-link.
 */
function gdh_phone_href() {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', gdh_get_contact( 'phone' ) );
}

/**
 * URL van een pagina op slug, met fallback naar homepage-anker.
 */
function gdh_page_url( $slug, $fallback = '' ) {
	$page = get_page_by_path( $slug );

	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		return get_permalink( $page );
	}

	return $fallback ? home_url( $fallback ) : home_url( '/' );
}

/**
 * Afbeelding uit de theme-assets (placeholder) of een media-override
 * via de Customizer.
 */
function gdh_image( $key, $placeholder ) {
	$attachment_id = (int) get_theme_mod( 'gdh_img_' . $key, 0 );

	if ( $attachment_id ) {
		$url = wp_get_attachment_image_url( $attachment_id, 'full' );
		if ( $url ) {
			return $url;
		}
	}

	return get_template_directory_uri() . '/assets/img/' . $placeholder;
}

/**
 * Fallback-menu zolang er geen menu is toegewezen.
 */
function gdh_nav_fallback() {
	$items = array(
		'autoschadeherstel'   => __( 'Diensten', 'gdh-autoschade' ),
		'camperherstel'       => __( 'Camperherstel', 'gdh-autoschade' ),
		'over-ons'            => __( 'Over ons', 'gdh-autoschade' ),
		'werkwijze'           => __( 'Werkwijze', 'gdh-autoschade' ),
		'veelgestelde-vragen' => __( 'Veelgestelde vragen', 'gdh-autoschade' ),
		'contact'             => __( 'Contact', 'gdh-autoschade' ),
	);

	echo '<ul>';
	foreach ( $items as $slug => $label ) {
		echo '<li><a href="' . esc_url( gdh_page_url( $slug ) ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}
