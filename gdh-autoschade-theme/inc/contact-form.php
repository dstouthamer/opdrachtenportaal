<?php
/**
 * Afhandeling van het contact-/afspraakformulier via admin-post,
 * met nonce, honeypot en wp_mail.
 *
 * @package gdh-autoschade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gdh_handle_contact_form() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect = remove_query_arg( array( 'gdh_form' ), $redirect );

	if ( ! isset( $_POST['gdh_form_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['gdh_form_nonce'] ), 'gdh_contact_form' ) ) {
		wp_safe_redirect( add_query_arg( 'gdh_form', 'error', $redirect ) . '#contact' );
		exit;
	}

	// Honeypot: bots vullen dit verborgen veld in.
	if ( ! empty( $_POST['gdh_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'gdh_form', 'ok', $redirect ) . '#contact' );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['gdh_name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['gdh_phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['gdh_email'] ?? '' ) );
	$plate   = sanitize_text_field( wp_unslash( $_POST['gdh_plate'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['gdh_message'] ?? '' ) );

	if ( '' === $name || '' === $message || ( '' === $phone && '' === $email ) ) {
		wp_safe_redirect( add_query_arg( 'gdh_form', 'invalid', $redirect ) . '#contact' );
		exit;
	}

	$recipient = get_theme_mod( 'gdh_form_recipient' );
	if ( ! is_email( $recipient ) ) {
		$recipient = gdh_get_contact( 'email' );
	}
	if ( ! is_email( $recipient ) ) {
		$recipient = get_option( 'admin_email' );
	}

	$subject = sprintf( __( 'Nieuw verzoek via gdhautoschade.nl van %s', 'gdh-autoschade' ), $name );

	$body  = __( 'Er is een nieuw verzoek binnengekomen via het contactformulier.', 'gdh-autoschade' ) . "\n\n";
	$body .= __( 'Naam:', 'gdh-autoschade' ) . ' ' . $name . "\n";
	$body .= __( 'Telefoonnummer:', 'gdh-autoschade' ) . ' ' . ( $phone ?: '-' ) . "\n";
	$body .= __( 'E-mailadres:', 'gdh-autoschade' ) . ' ' . ( $email ?: '-' ) . "\n";
	$body .= __( 'Kenteken:', 'gdh-autoschade' ) . ' ' . ( $plate ?: '-' ) . "\n\n";
	$body .= __( 'Bericht:', 'gdh-autoschade' ) . "\n" . $message . "\n";

	$headers = array();
	if ( is_email( $email ) ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}

	$sent = wp_mail( $recipient, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'gdh_form', $sent ? 'ok' : 'error', $redirect ) . '#contact' );
	exit;
}
add_action( 'admin_post_gdh_contact', 'gdh_handle_contact_form' );
add_action( 'admin_post_nopriv_gdh_contact', 'gdh_handle_contact_form' );

/**
 * Statusmelding boven het formulier.
 */
function gdh_form_notice() {
	if ( empty( $_GET['gdh_form'] ) ) {
		return;
	}

	$status = sanitize_key( $_GET['gdh_form'] );

	if ( 'ok' === $status ) {
		echo '<div class="gdh-form__notice gdh-form__notice--ok">' . esc_html__( 'Bedankt voor uw bericht! We nemen zo snel mogelijk contact met u op.', 'gdh-autoschade' ) . '</div>';
	} elseif ( 'invalid' === $status ) {
		echo '<div class="gdh-form__notice gdh-form__notice--error">' . esc_html__( 'Vul minimaal uw naam, een bericht en een telefoonnummer of e-mailadres in.', 'gdh-autoschade' ) . '</div>';
	} else {
		echo '<div class="gdh-form__notice gdh-form__notice--error">' . esc_html__( 'Er ging iets mis bij het versturen. Probeer het opnieuw of bel ons direct.', 'gdh-autoschade' ) . '</div>';
	}
}
