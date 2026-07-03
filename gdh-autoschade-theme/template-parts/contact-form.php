<?php
/**
 * Contact-/afspraakformulier (herbruikbaar op homepage en contactpagina).
 *
 * @package gdh-autoschade
 */
?>
<div class="gdh-formcard" id="contact">
	<span class="gdh-kicker"><?php esc_html_e( 'Vrijblijvend contact', 'gdh-autoschade' ); ?></span>
	<h2><?php esc_html_e( 'Plan een afspraak of vraag een terugbelverzoek aan', 'gdh-autoschade' ); ?></h2>

	<?php gdh_form_notice(); ?>

	<form class="gdh-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
		<input type="hidden" name="action" value="gdh_contact">
		<?php wp_nonce_field( 'gdh_contact_form', 'gdh_form_nonce' ); ?>
		<p class="screen-reader-text" aria-hidden="true">
			<label><?php esc_html_e( 'Laat dit veld leeg', 'gdh-autoschade' ); ?><input type="text" name="gdh_website" tabindex="-1" autocomplete="off"></label>
		</p>

		<div class="gdh-form__row">
			<input type="text" name="gdh_name" placeholder="<?php esc_attr_e( 'Naam', 'gdh-autoschade' ); ?>" required>
			<input type="tel" name="gdh_phone" placeholder="<?php esc_attr_e( 'Telefoonnummer', 'gdh-autoschade' ); ?>">
		</div>
		<div class="gdh-form__row">
			<input type="email" name="gdh_email" placeholder="<?php esc_attr_e( 'E-mailadres', 'gdh-autoschade' ); ?>">
			<input type="text" name="gdh_plate" placeholder="<?php esc_attr_e( 'Kenteken (optioneel)', 'gdh-autoschade' ); ?>">
		</div>
		<textarea name="gdh_message" placeholder="<?php esc_attr_e( 'Uw bericht', 'gdh-autoschade' ); ?>" required></textarea>

		<button type="submit" class="gdh-btn gdh-btn--primary">
			<?php esc_html_e( 'Verstuur verzoek', 'gdh-autoschade' ); ?>
			<?php gdh_the_icon( 'arrow' ); ?>
		</button>
	</form>
</div>
