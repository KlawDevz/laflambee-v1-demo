<?php
/**
 * Template Name: Contact
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

get_header();

$phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
$address     = get_theme_mod('laflambee_address', '24/25 Place Maréchal Leclerc, 09500 Mirepoix');
$map_url     = get_theme_mod('laflambee_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.721323381485!2d1.8719266!3d43.0863073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a87bc1a6b0c2e3%3A0xc3b8a1f8c6b7a0b0!2s24%20Pl.%20Mar%C3%A9chal%20Leclerc%2C%2009500%20Mirepoix!5e0!3m2!1sfr!2sfr');
?>

<section class="contact-hero">
    <div class="contact-hero__media">
        <?php
        echo laflambee_picture('bar-restaurant', esc_attr__('Bar du restaurant', 'la-flambee'), [
            'sizes' => '(max-width: 1200px) 100vw, 1200px',
            'width' => '2000',
            'height' => '1335',
            'loading' => 'eager',
            'fetchpriority' => 'high'
        ]);
        ?>
    </div>
    <div class="contact-hero__content container" data-reveal>
        <h1><?php esc_html_e('Contact & Accès', 'la-flambee'); ?></h1>
    </div>
</section>

<section class="contact">
    <div class="container">
        <div class="contact__grid" data-reveal>

            <div class="contact-card">
                <div class="contact-card__header">
                    <h2 class="contact-card__title"><?php esc_html_e('Nous contacter', 'la-flambee'); ?></h2>
                    <p class="contact-card__sub text-fancy"><?php esc_html_e('Réservation conseillée, surtout le week-end.', 'la-flambee'); ?></p>
                </div>

                <div class="contact-card__cta">
                    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="btn btn--primary btn--lg contact-card__btn phone-fancy">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>

                <div class="contact-card__separator"></div>

                <div class="contact-card__rows">
                    <div class="contact-card__row">
                        <div class="contact-card__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <p class="contact-card__label"><?php esc_html_e('Adresse', 'la-flambee'); ?></p>
                            <p class="contact-card__value"><?php echo esc_html($address); ?></p>
                            <a href="https://maps.app.goo.gl/rWJrZBGipexgKH6k9" target="_blank" rel="noopener noreferrer" class="contact-card__link">
                                <?php esc_html_e('Voir l\'itinéraire', 'la-flambee'); ?> →
                            </a>
                        </div>
                    </div>

                    <div class="contact-card__row">
                        <div class="contact-card__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div>
                            <p class="contact-card__label"><?php esc_html_e('Horaires', 'la-flambee'); ?></p>
                            <table class="hours-table hours-table--compact">
                                <caption class="sr-only"><?php esc_html_e('Horaires d\'ouverture', 'la-flambee'); ?></caption>
                                <tbody>
                                    <tr><th scope="row"><?php esc_html_e('Lundi', 'la-flambee'); ?></th><td>12h–14h / 19h–22h</td></tr>
                                    <tr><th scope="row"><?php esc_html_e('Mardi', 'la-flambee'); ?></th><td>12h–14h / 19h–22h</td></tr>
                                    <tr class="is-closed"><th scope="row"><?php esc_html_e('Mercredi', 'la-flambee'); ?></th><td><?php esc_html_e('Fermé', 'la-flambee'); ?></td></tr>
                                    <tr class="is-closed"><th scope="row"><?php esc_html_e('Jeudi', 'la-flambee'); ?></th><td><?php esc_html_e('Fermé', 'la-flambee'); ?></td></tr>
                                    <tr><th scope="row"><?php esc_html_e('Vendredi', 'la-flambee'); ?></th><td>12h–14h / 19h–22h</td></tr>
                                    <tr><th scope="row"><?php esc_html_e('Samedi', 'la-flambee'); ?></th><td>12h–14h / 19h–22h</td></tr>
                                    <tr><th scope="row"><?php esc_html_e('Dimanche', 'la-flambee'); ?></th><td>12h–14h / 19h–22h</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-card contact-card--map">
                <div class="contact__map">
                    <iframe src="<?php echo esc_url($map_url); ?>" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e('Localisation de La Flambée sur Google Maps', 'la-flambee'); ?>"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
