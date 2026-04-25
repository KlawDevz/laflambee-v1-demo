<?php
/**
 * Footer Template
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

$phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
$address     = get_theme_mod('laflambee_address', '24/25 Place Maréchal Leclerc, 09500 Mirepoix');
$facebook    = get_theme_mod('laflambee_facebook', '');
$instagram   = get_theme_mod('laflambee_instagram', '');
$hours       = get_theme_mod('laflambee_hours', __('Lun-Dim : 12h-14h / 19h-22h', 'la-flambee'));
$privacy_url = get_privacy_policy_url();
$legal_page  = get_page_by_path('mentions-legales');
$legal_url   = $legal_page ? get_permalink($legal_page) : '';
$contact_url = home_url('/contact/');
?>

    </main><!-- .site-main -->

    <!-- FOOTER -->
    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer__grid">

                <!-- Col 1: Brand -->
                <div class="footer__col">
                    <p class="footer__brand-title"><?php bloginfo('name'); ?></p>
                    <p class="footer__desc">
                        <?php esc_html_e('Cuisine traditionnelle, pizzas au feu de bois et produits du terroir au cœur de la cité médiévale de Mirepoix.', 'la-flambee'); ?>
                    </p>
                    <?php if ($facebook || $instagram) : ?>
                    <div class="footer__social">
                        <?php if ($facebook) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Facebook', 'la-flambee'); ?>">
                            <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <?php endif; ?>
                        <?php if ($instagram) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Instagram', 'la-flambee'); ?>">
                            <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Col 2: Hours -->
                <div class="footer__col">
                    <p class="footer__col-title"><?php esc_html_e('Horaires', 'la-flambee'); ?></p>
                    <div class="footer__hours">
                        <?php echo nl2br(esc_html($hours)); ?>
                    </div>
                </div>

                <!-- Col 3: Contact -->
                <div class="footer__col">
                    <p class="footer__col-title"><?php esc_html_e('Contact', 'la-flambee'); ?></p>
                    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="footer__phone phone-fancy">
                        <?php echo esc_html($phone); ?>
                    </a>
                    <p class="footer__address"><?php echo esc_html($address); ?></p>
                    <a href="https://maps.app.goo.gl/rWJrZBGipexgKH6k9" target="_blank" rel="noopener noreferrer" class="footer__directions">
                        <?php esc_html_e('Itinéraire', 'la-flambee'); ?> →
                    </a>
                    <div class="footer__actions">
                        <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="footer__action footer__action--primary">
                            <?php esc_html_e('Réserver', 'la-flambee'); ?>
                        </a>
                        <a href="<?php echo esc_url($contact_url); ?>" class="footer__action footer__action--ghost">
                            <?php esc_html_e('Nous écrire', 'la-flambee'); ?>
                        </a>
                    </div>
                </div>

                <!-- Col 4: Nav -->
                <div class="footer__col">
                    <p class="footer__col-title"><?php esc_html_e('Navigation', 'la-flambee'); ?></p>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'footer__menu',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ]);
                    ?>
                </div>

            </div>

            <div class="footer__bottom">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                    <?php esc_html_e('Tous droits réservés.', 'la-flambee'); ?>
                </p>
                <?php if ($privacy_url || $legal_url) : ?>
                <nav class="footer__legal" aria-label="<?php esc_attr_e('Liens légaux', 'la-flambee'); ?>">
                    <?php if ($legal_url) : ?>
                    <a href="<?php echo esc_url($legal_url); ?>"><?php esc_html_e('Mentions légales', 'la-flambee'); ?></a>
                    <?php endif; ?>
                    <?php if ($privacy_url) : ?>
                    <a href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Politique de confidentialité', 'la-flambee'); ?></a>
                    <?php endif; ?>
                </nav>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
