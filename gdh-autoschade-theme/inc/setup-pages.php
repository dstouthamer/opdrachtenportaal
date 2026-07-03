<?php
/**
 * Maakt bij themaselectie automatisch alle pagina's en het hoofdmenu aan,
 * zodat de site direct compleet staat.
 *
 * @package gdh-autoschade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gdh_setup_site_content() {
	if ( get_option( 'gdh_pages_created' ) ) {
		return;
	}

	$pages = array(
		'home' => array(
			'title'    => 'Home',
			'template' => '',
		),
		'autoschadeherstel' => array(
			'title'    => 'Autoschadeherstel',
			'template' => 'templates/service.php',
		),
		'spuitwerk' => array(
			'title'    => 'Spuitwerk',
			'template' => 'templates/service.php',
		),
		'afhandeling-met-verzekeraar' => array(
			'title'    => 'Afhandeling met verzekeraar',
			'template' => 'templates/service.php',
		),
		'camperherstel' => array(
			'title'    => 'Camperherstel',
			'template' => 'templates/service.php',
		),
		'over-ons' => array(
			'title'    => 'Over ons',
			'template' => 'templates/over-ons.php',
		),
		'werkwijze' => array(
			'title'    => 'Werkwijze',
			'template' => 'templates/werkwijze.php',
		),
		'veelgestelde-vragen' => array(
			'title'    => 'Veelgestelde vragen',
			'template' => 'templates/faq.php',
		),
		'contact' => array(
			'title'    => 'Contact',
			'template' => 'templates/contact.php',
		),
		'privacyverklaring' => array(
			'title'    => 'Privacyverklaring',
			'template' => '',
		),
		'algemene-voorwaarden' => array(
			'title'    => 'Algemene voorwaarden',
			'template' => '',
		),
	);

	$ids = array();

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );

		if ( $existing instanceof WP_Post ) {
			$ids[ $slug ] = $existing->ID;
			continue;
		}

		$id = wp_insert_post( array(
			'post_title'   => $page['title'],
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );

		if ( $id && ! is_wp_error( $id ) ) {
			if ( $page['template'] ) {
				update_post_meta( $id, '_wp_page_template', $page['template'] );
			}
			$ids[ $slug ] = $id;
		}
	}

	// Homepage instellen.
	if ( ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
	}

	// Hoofdmenu opbouwen.
	$menu = wp_get_nav_menu_object( 'Hoofdmenu' );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( 'Hoofdmenu' );

		if ( $menu_id && ! is_wp_error( $menu_id ) ) {
			$diensten_id = wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'  => 'Diensten',
				'menu-item-url'    => gdh_page_url( 'autoschadeherstel' ),
				'menu-item-status' => 'publish',
			) );

			foreach ( array( 'autoschadeherstel', 'spuitwerk', 'afhandeling-met-verzekeraar' ) as $slug ) {
				if ( ! empty( $ids[ $slug ] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-object-id' => $ids[ $slug ],
						'menu-item-object'    => 'page',
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
						'menu-item-parent-id' => $diensten_id,
					) );
				}
			}

			foreach ( array( 'camperherstel', 'over-ons', 'werkwijze', 'veelgestelde-vragen', 'contact' ) as $slug ) {
				if ( ! empty( $ids[ $slug ] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-object-id' => $ids[ $slug ],
						'menu-item-object'    => 'page',
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
				}
			}

			$locations            = get_theme_mod( 'nav_menu_locations', array() );
			$locations['primary'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	update_option( 'gdh_pages_created', 1 );
}
add_action( 'after_switch_theme', 'gdh_setup_site_content' );
