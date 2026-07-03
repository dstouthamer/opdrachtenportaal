# GDH Autoschade — WordPress-thema

Custom WordPress-thema voor [gdhautoschade.nl](https://gdhautoschade.nl): autoschadeherstel en camperherstel in Apeldoorn. Het thema bouwt het aangeleverde ontwerp 1-op-1 na (oranje/wit, afgeronde kaarten, hero met CTA's, diensten, werkwijze in 5 stappen, reviews met voor/na-schuif, FAQ en contactformulier).

## Installatie

1. Zip de map `gdh-autoschade-theme` (of upload de map via FTP naar `wp-content/themes/`).
2. Ga in WordPress naar **Weergave → Thema's → Nieuw thema → Thema uploaden** en activeer *GDH Autoschade*.
3. Bij activatie worden automatisch aangemaakt:
   - Alle pagina's: Home, Autoschadeherstel, Spuitwerk, Afhandeling met verzekeraar, Camperherstel, Over ons, Werkwijze, Veelgestelde vragen, Contact, Privacyverklaring, Algemene voorwaarden.
   - Het hoofdmenu (met "Diensten"-dropdown), gekoppeld aan de menulocatie.
   - De homepage wordt als statische voorpagina ingesteld.

## Instellen na installatie

Alles staat in de **Customizer** (Weergave → Aanpassen):

- **GDH — Contactgegevens**: telefoonnummer, e-mail, adres, openingstijden en social-media-links. Deze worden overal op de site gebruikt (header, contactkaarten, footer).
- **GDH — Foto's**: vervang de vier SVG-placeholders (hero, pand, voor-foto, na-foto) door echte foto's uit de mediabibliotheek.
- **GDH — Contactformulier**: optioneel een afwijkend ontvangstadres voor formulierberichten (standaard het e-mailadres uit Contactgegevens).
- **Site-identiteit**: upload het echte logo (anders wordt het ingebouwde schild-logo getoond).

## Contactformulier

Het formulier (homepage, contact- en FAQ-pagina) verstuurt via `wp_mail()` met nonce-beveiliging en een honeypot tegen spam. Voor betrouwbare aflevering wordt een SMTP-plugin aangeraden (bijv. *WP Mail SMTP*).

## Aanpassen van teksten

- Reviews, diensten, werkwijze-stappen en USP's: in `front-page.php` en `templates/*.php` (bewust hardcoded zodat de klant niets kan slopen).
- FAQ-vragen: in `template-parts/faq-list.php`.
- Extra inhoud per pagina kan gewoon via de WordPress-editor worden toegevoegd; die verschijnt onder de vaste secties.

## Structuur

```
gdh-autoschade-theme/
├── style.css               # Theme-header + volledige styling
├── functions.php           # Setup, enqueue, helpers
├── front-page.php          # Homepage met alle secties
├── header.php / footer.php
├── page.php / index.php
├── inc/
│   ├── customizer.php      # Customizer-instellingen
│   ├── contact-form.php    # Formulierafhandeling (admin-post + wp_mail)
│   ├── setup-pages.php     # Auto-aanmaak pagina's + menu bij activatie
│   └── icons.php           # Inline SVG-iconen
├── templates/              # Paginatemplates (dienst, over ons, werkwijze, faq, contact)
├── template-parts/         # Herbruikbaar: faq-lijst, contactformulier, infokaart
├── js/main.js              # Mobiel menu, FAQ-accordion, voor/na-schuif
└── assets/img/             # SVG-placeholders (vervangen via Customizer)
```
