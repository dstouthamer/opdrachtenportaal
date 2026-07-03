<?php
/**
 * Footer met copyright, juridische links en social icons.
 *
 * @package gdh-autoschade
 */
?>
<footer class="gdh-footer">
	<div class="gdh-container gdh-footer__inner">
		<span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Alle rechten voorbehouden.', 'gdh-autoschade' ); ?></span>

		<div class="gdh-footer__links">
			<a href="<?php echo esc_url( gdh_page_url( 'privacyverklaring' ) ); ?>"><?php esc_html_e( 'Privacyverklaring', 'gdh-autoschade' ); ?></a>
			<a href="<?php echo esc_url( gdh_page_url( 'algemene-voorwaarden' ) ); ?>"><?php esc_html_e( 'Algemene voorwaarden', 'gdh-autoschade' ); ?></a>
		</div>

		<div class="gdh-footer__social">
			<?php if ( gdh_get_contact( 'facebook' ) ) : ?>
				<a href="<?php echo esc_url( gdh_get_contact( 'facebook' ) ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php gdh_the_icon( 'facebook' ); ?></a>
			<?php endif; ?>
			<?php if ( gdh_get_contact( 'instagram' ) ) : ?>
				<a href="<?php echo esc_url( gdh_get_contact( 'instagram' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php gdh_the_icon( 'instagram' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
