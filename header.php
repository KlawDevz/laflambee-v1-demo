<?php
/**
 * Header Template
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

$phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <a href="#main-content" class="sr-only">
        <?php esc_html_e('Aller au contenu principal', 'la-flambee'); ?>
    </a>

    <!-- HEADER -->
    <header class="site-header">
        <div class="container">
            <div class="header__inner">

                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <span><?php bloginfo('name'); ?></span>
                </a>

                <!-- Desktop Nav -->
                <nav class="nav" aria-label="<?php esc_attr_e('Navigation principale', 'la-flambee'); ?>">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                        'link_before'    => '',
                        'link_after'     => '',
                        'walker'         => new class extends Walker_Nav_Menu {
                            function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                $classes  = in_array('current-menu-item', $item->classes) ? ' aria-current="page"' : '';
                                $output  .= '<a href="' . esc_url($item->url) . '" class="nav__link"' . $classes . '>';
                                $output  .= esc_html($item->title);
                                $output  .= '</a>';
                            }
                            function end_el(&$output, $item, $depth = 0, $args = null) {}
                            function start_lvl(&$output, $depth = 0, $args = null) {}
                            function end_lvl(&$output, $depth = 0, $args = null) {}
                        },
                    ]);
                    ?>
                    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="btn btn--primary btn--phone-icon">
                        <?php esc_html_e('Réserver', 'la-flambee'); ?>
                    </a>
                </nav>

                <!-- Hamburger (mobile) -->
                <button
                    class="menu-toggle"
                    type="button"
                    aria-label="<?php esc_attr_e('Ouvrir le menu', 'la-flambee'); ?>"
                    data-label-open="<?php esc_attr_e('Ouvrir le menu', 'la-flambee'); ?>"
                    data-label-close="<?php esc_attr_e('Fermer le menu', 'la-flambee'); ?>"
                    aria-controls="mobile-nav"
                    aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>
        </div>
    </header>

    <!-- Mobile Nav Overlay -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="<?php esc_attr_e('Navigation mobile', 'la-flambee'); ?>" aria-hidden="true" hidden inert>
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
            'depth'          => 1,
            'walker'         => new class extends Walker_Nav_Menu {
                function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                    $output .= '<a href="' . esc_url($item->url) . '" class="mobile-nav__link">';
                    $output .= esc_html($item->title);
                    $output .= '</a>';
                }
                function end_el(&$output, $item, $depth = 0, $args = null) {}
                function start_lvl(&$output, $depth = 0, $args = null) {}
                function end_lvl(&$output, $depth = 0, $args = null) {}
            },
        ]);
        ?>
        <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="mobile-nav__phone phone-fancy">
            <?php echo esc_html($phone); ?>
        </a>
    </nav>

    <!-- Main Content -->
    <main id="main-content" class="site-main">
