<?php
/**
 * Kaart met contactgegevens en openingstijden.
 *
 * @package gdh-autoschade
 */
?>
<div class="gdh-infocard">
	<div class="gdh-contactline">
		<?php gdh_the_icon( 'phone' ); ?>
		<a href="<?php echo esc_url( gdh_phone_href() ); ?>"><?php echo esc_html( gdh_get_contact( 'phone' ) ); ?></a>
	</div>
	<div class="gdh-contactline">
		<?php gdh_the_icon( 'mail' ); ?>
		<a href="mailto:<?php echo esc_attr( gdh_get_contact( 'email' ) ); ?>"><?php echo esc_html( gdh_get_contact( 'email' ) ); ?></a>
	</div>
	<div class="gdh-contactline">
		<?php gdh_the_icon( 'pin' ); ?>
		<span><?php echo nl2br( esc_html( gdh_get_contact( 'address' ) ) ); ?></span>
	</div>
	<div class="gdh-contactline">
		<?php gdh_the_icon( 'clock' ); ?>
		<span><?php echo esc_html( gdh_get_contact( 'hours_week' ) ); ?><br><?php echo esc_html( gdh_get_contact( 'hours_weekend' ) ); ?></span>
	</div>
</div>
