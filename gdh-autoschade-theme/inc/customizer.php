<?php
/**
 * Customizer-instellingen: contactgegevens, openingstijden, social media
 * en foto-overrides voor de placeholderafbeeldingen.
 *
 * @package gdh-autoschade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gdh_customize_register( $wp_customize ) {

	/* --- Contactgegevens --- */
	$wp_customize->add_section( 'gdh_contact', array(
		'title'    => __( 'GDH — Contactgegevens', 'gdh-autoschade' ),
		'priority' => 30,
	) );

	$fields = array(
		'phone'         => array( __( 'Telefoonnummer', 'gdh-autoschade' ), '+31 6 21 33 05 48' ),
		'email'         => array( __( 'E-mailadres', 'gdh-autoschade' ), 'info@gdhautoschade.nl' ),
		'address'       => array( __( 'Adres', 'gdh-autoschade' ), "Gladsaxe 24,\n7327 JZ Apeldoorn" ),
		'hours_week'    => array( __( 'Openingstijden (ma-vr)', 'gdh-autoschade' ), 'Ma - Vr: 08:00 - 17:30' ),
		'hours_weekend' => array( __( 'Openingstijden (weekend)', 'gdh-autoschade' ), 'Za - Zo: Gesloten' ),
		'facebook'      => array( __( 'Facebook-URL', 'gdh-autoschade' ), '' ),
		'instagram'     => array( __( 'Instagram-URL', 'gdh-autoschade' ), '' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting( 'gdh_' . $key, array(
			'default'           => $field[1],
			'sanitize_callback' => 'address' === $key ? 'sanitize_textarea_field' : 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'gdh_' . $key, array(
			'label'   => $field[0],
			'section' => 'gdh_contact',
			'type'    => 'address' === $key ? 'textarea' : 'text',
		) );
	}

	/* --- Foto's --- */
	$wp_customize->add_section( 'gdh_photos', array(
		'title'       => __( 'GDH — Foto\'s', 'gdh-autoschade' ),
		'description' => __( 'Vervang hier de placeholderafbeeldingen door echte foto\'s van de werkplaats.', 'gdh-autoschade' ),
		'priority'    => 31,
	) );

	$photos = array(
		'hero'   => __( 'Hero-foto (auto + camper in werkplaats)', 'gdh-autoschade' ),
		'pand'   => __( 'Foto van het pand (sectie Over ons)', 'gdh-autoschade' ),
		'before' => __( 'Voor-foto (schade)', 'gdh-autoschade' ),
		'after'  => __( 'Na-foto (hersteld)', 'gdh-autoschade' ),
	);

	foreach ( $photos as $key => $label ) {
		$wp_customize->add_setting( 'gdh_img_' . $key, array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gdh_img_' . $key, array(
			'label'     => $label,
			'section'   => 'gdh_photos',
			'mime_type' => 'image',
		) ) );
	}

	/* --- Formulier --- */
	$wp_customize->add_section( 'gdh_form', array(
		'title'    => __( 'GDH — Contactformulier', 'gdh-autoschade' ),
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'gdh_form_recipient', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'gdh_form_recipient', array(
		'label'       => __( 'Ontvanger formulierberichten', 'gdh-autoschade' ),
		'description' => __( 'Leeg = het e-mailadres bij Contactgegevens.', 'gdh-autoschade' ),
		'section'     => 'gdh_form',
		'type'        => 'email',
	) );
}
add_action( 'customize_register', 'gdh_customize_register' );
