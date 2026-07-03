<?php
/**
 * Herbruikbare FAQ-accordion.
 *
 * Verwacht optioneel $args['limit'] (int) om het aantal vragen te beperken.
 *
 * @package gdh-autoschade
 */

$gdh_faqs = array(
	array(
		'q' => __( 'Hoe lang duurt een schadeherstel?', 'gdh-autoschade' ),
		'a' => __( 'Dat hangt af van de omvang van de schade. Kleine schades herstellen we vaak binnen 1 tot 2 werkdagen; grotere schades duren gemiddeld 3 tot 5 werkdagen. Na de inspectie geven we u altijd een duidelijke planning.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Regelen jullie de schade met mijn verzekeraar?', 'gdh-autoschade' ),
		'a' => __( 'Ja, wij nemen de volledige schadeafhandeling met uw verzekeraar uit handen. U levert de auto of camper bij ons af en wij regelen de rest — snel en zorgeloos.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Krijg ik garantie op het herstel?', 'gdh-autoschade' ),
		'a' => __( 'Zeker. Op al ons herstelwerk en spuitwerk geven wij garantie. Kwaliteit staat bij ons voorop en dat mag u ook merken.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Bieden jullie ook leenauto\'s aan?', 'gdh-autoschade' ),
		'a' => __( 'In overleg is een leenauto mogelijk, zodat u mobiel blijft terwijl wij aan uw auto of camper werken. Vraag ernaar bij het maken van uw afspraak.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Kan ik vrijblijvend een offerte krijgen?', 'gdh-autoschade' ),
		'a' => __( 'Ja, advies en een offerte zijn bij ons altijd gratis en vrijblijvend. Kom langs, bel ons of stuur een paar foto\'s van de schade via het contactformulier.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Herstellen jullie ook campers en recreatievoertuigen?', 'gdh-autoschade' ),
		'a' => __( 'Ja, camperherstel is een van onze specialismen. Onze werkplaats is ingericht op grotere voertuigen zoals campers, buscampers en caravans.', 'gdh-autoschade' ),
	),
	array(
		'q' => __( 'Wat kost schadeherstel?', 'gdh-autoschade' ),
		'a' => __( 'Dat verschilt per schade. Na een gratis inspectie ontvangt u van ons een heldere en transparante offerte, zonder verrassingen achteraf. Loopt het via de verzekeraar, dan betaalt u vaak alleen het eigen risico.', 'gdh-autoschade' ),
	),
);

$gdh_limit = isset( $args['limit'] ) ? (int) $args['limit'] : 0;
if ( $gdh_limit > 0 ) {
	$gdh_faqs = array_slice( $gdh_faqs, 0, $gdh_limit );
}
?>
<div class="gdh-faq">
	<?php foreach ( $gdh_faqs as $gdh_faq ) : ?>
		<div class="gdh-faq__item">
			<button class="gdh-faq__q" type="button" aria-expanded="false">
				<?php echo esc_html( $gdh_faq['q'] ); ?>
			</button>
			<div class="gdh-faq__a"><p><?php echo esc_html( $gdh_faq['a'] ); ?></p></div>
		</div>
	<?php endforeach; ?>
</div>
