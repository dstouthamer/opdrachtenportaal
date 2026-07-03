<?php
/**
 * Inline SVG-icoontjes (stroke-stijl, kleur via currentColor).
 *
 * @package gdh-autoschade
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Geef een SVG-icoon terug.
 *
 * @param string $name Icoonnaam.
 * @return string SVG-markup.
 */
function gdh_icon( $name ) {
	$attrs = 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"';

	$icons = array(
		'phone'     => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.4 2.1L8.1 10a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.6 2z"/>',
		'mail'      => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
		'pin'       => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
		'clock'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
		'check'     => '<path d="m4 12 5 5L20 6"/>',
		'arrow'     => '<path d="M5 12h14"/><path d="m13 6 6 6-6 6"/>',
		'arrows'    => '<path d="M8 3 4 7l4 4"/><path d="M4 7h16"/><path d="m16 21 4-4-4-4"/><path d="M20 17H4"/>',
		'calendar'  => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
		'car'       => '<path d="M5 11 6.5 6.5A2 2 0 0 1 8.4 5h7.2a2 2 0 0 1 1.9 1.5L19 11"/><path d="M3 13a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v4h-2m-14 0H3v-4z"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/>',
		'camper'    => '<path d="M2 16V8a2 2 0 0 1 2-2h11l5 4h1a1 1 0 0 1 1 1v5h-2"/><path d="M2 16h4m4 0h6"/><circle cx="8" cy="17" r="2"/><circle cx="18" cy="17" r="2"/><path d="M9 6v4H2m13-4v4h5"/>',
		'spray'     => '<path d="M9 3h6v4H9z"/><path d="M10 7h4l2 4v9a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-9l2-4z"/><path d="M12 12v4"/>',
		'shield'    => '<path d="M12 22s8-3 8-10V5l-8-3-8 3v7c0 7 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
		'file'      => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h4"/>',
		'user'      => '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
		'search'    => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>',
		'wrench'    => '<path d="M14.7 6.3a4.5 4.5 0 0 0 6 6L13 20a2.1 2.1 0 0 1-3-3l7.7-7.7a4.5 4.5 0 0 0-3-3z"/><path d="M8 8 3.5 3.5"/><circle cx="6" cy="6" r="0.5"/>',
		'checklist' => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="m8 9 1.5 1.5L12.5 7.5M8 15l1.5 1.5 3-3"/><path d="M15 9h2m-2 6h2"/>',
		'key'       => '<circle cx="7.5" cy="15.5" r="4.5"/><path d="m11 12 9-9m-3 3 3 3m-6 0 2 2"/>',
		'star'      => '<path d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21l1.2-6.8-5-4.9 6.9-1z" fill="currentColor" stroke="none"/>',
		'handshake' => '<path d="m11 17 2 2a2.1 2.1 0 0 0 3-3l-5-5"/><path d="m14 14 2.5 2.5a2.1 2.1 0 0 0 3-3L14 8a5.8 5.8 0 0 0-8 0L2.5 11.5a2.1 2.1 0 0 0 3 3L8 12"/>',
		'truck'     => '<path d="M14 17H2V5h12v12z"/><path d="M14 8h4l4 4v5h-8V8z"/><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/>',
		'euro'      => '<path d="M18 6a7.5 7.5 0 1 0 0 12"/><path d="M4 10h9M4 14h9"/>',
		'facebook'  => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
		'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.5"/>',
	);

	if ( empty( $icons[ $name ] ) ) {
		return '';
	}

	return '<svg ' . $attrs . '>' . $icons[ $name ] . '</svg>';
}

/**
 * Echo-variant.
 *
 * @param string $name Icoonnaam.
 */
function gdh_the_icon( $name ) {
	echo gdh_icon( $name ); // phpcs:ignore WordPress.Security.EscapeOutput -- vaste interne SVG's.
}
