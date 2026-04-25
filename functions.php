<?php
/**
 * Theme Name: La Flambée
 * Theme URI: https://laflambee-mirepoix.fr
 * Author: Dev Senior WordPress
 * Description: Thème rustique-chic pour le restaurant La Flambée à Mirepoix. Mobile-first, CTA flottant, prêt pour la traduction.
 * Version: 3.0.0
 * License: GPL v2 or later
 * Text Domain: la-flambee
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LAFLAMBEE_VERSION', '3.0.6');
define('LAFLAMBEE_DIR', get_template_directory());
define('LAFLAMBEE_URI', get_template_directory_uri());

function laflambee_get_lcp_asset() {
    $basename = '';

    if (is_front_page()) {
        $basename = 'salle-restaurant-verriere';
    } elseif (is_page_template('page-carte.php')) {
        $basename = 'carte-des-vins';
    } elseif (is_page_template('page-contact.php')) {
        $basename = 'bar-restaurant';
    } elseif (is_page_template('page-equipe.php')) {
        $basename = 'salle-interieure-poutres';
    }

    if (!$basename) {
        return null;
    }

    $base_path = LAFLAMBEE_DIR . '/assets/images/';
    $base_uri = LAFLAMBEE_URI . '/assets/images/';

    $candidates = [
        [$basename . '-1200.avif', 'image/avif'],
        [$basename . '-1200.webp', 'image/webp'],
        [$basename . '-1200.jpg', 'image/jpeg'],
        [$basename . '.jpg', 'image/jpeg'],
    ];

    foreach ($candidates as $candidate) {
        if (file_exists($base_path . $candidate[0])) {
            return [
                'href' => $base_uri . $candidate[0],
                'type' => $candidate[1],
            ];
        }
    }

    return null;
}

add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

    $lcp_asset = laflambee_get_lcp_asset();
    if (!$lcp_asset) {
        return;
    }

    printf(
        '<link rel="preload" as="image" href="%s" type="%s" fetchpriority="high">' . "\n",
        esc_url($lcp_asset['href']),
        esc_attr($lcp_asset['type'])
    );
}, 1);

/* ─────────────────────────────────────────────
   THEME SETUP
   ───────────────────────────────────────────── */
add_action('after_setup_theme', function () {

    load_theme_textdomain('la-flambee', LAFLAMBEE_DIR . '/languages');

    register_nav_menus([
        'primary' => __('Menu Principal', 'la-flambee'),
        'footer'  => __('Menu Footer', 'la-flambee'),
    ]);

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);

    add_theme_support('title-tag');

    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'script', 'style',
    ]);

    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    // Custom image sizes
    add_image_size('hero', 1920, 1080, true);
    add_image_size('card', 800, 600, true);
    add_image_size('portrait', 600, 900, true);
    add_image_size('gallery-thumb', 600, 400, true);
});

/* ─────────────────────────────────────────────
   ENQUEUE STYLES & SCRIPTS
   ───────────────────────────────────────────── */
add_action('wp_enqueue_scripts', function () {

    // Google Fonts: trimmed weights for faster render
    wp_enqueue_style(
        'la-flambee-fonts',
        'https://fonts.googleapis.com/css2?family=Anybody:wght@500;600&family=Libre+Caslon+Display&family=Reenie+Beanie&family=Source+Sans+3:wght@400;600&display=swap',
        [],
        null
    );

    // Theme stylesheet (style.css — WP requires it)
    wp_enqueue_style(
        'la-flambee-base',
        get_stylesheet_uri(),
        [],
        LAFLAMBEE_VERSION
    );

    // Main design system
    wp_enqueue_style(
        'la-flambee-main',
        LAFLAMBEE_URI . '/css/main.css',
        ['la-flambee-base'],
        LAFLAMBEE_VERSION
    );

    // Responsive overrides
    wp_enqueue_style(
        'la-flambee-responsive',
        LAFLAMBEE_URI . '/css/responsive.css',
        ['la-flambee-main'],
        LAFLAMBEE_VERSION
    );

    // Animations
    wp_enqueue_style(
        'la-flambee-animations',
        LAFLAMBEE_URI . '/css/animations.css',
        ['la-flambee-main'],
        LAFLAMBEE_VERSION
    );

    // Navigation JS
    wp_enqueue_script(
        'la-flambee-navigation',
        LAFLAMBEE_URI . '/js/navigation.js',
        [],
        LAFLAMBEE_VERSION,
        true
    );

});

/* ─────────────────────────────────────────────
   BODY CLASSES
   ───────────────────────────────────────────── */
add_filter('body_class', function ($classes) {
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }
    if (is_page_template('page-carte.php')) {
        $classes[] = 'page-carte';
    }
    if (is_page_template('page-contact.php')) {
        $classes[] = 'page-contact';
    }
    if (is_page_template('page-equipe.php')) {
        $classes[] = 'page-equipe';
    }
    if (is_privacy_policy()) {
        $classes[] = 'is-legal-page';
    }
    if (is_page('mentions-legales')) {
        $classes[] = 'is-legal-page';
    }
    return $classes;
});

/* ─────────────────────────────────────────────
   CUSTOMIZER — Restaurant Info
   ───────────────────────────────────────────── */
add_action('customize_register', function ($wp_customize) {

    $wp_customize->add_section('laflambee_info', [
        'title'    => __('Infos Restaurant', 'la-flambee'),
        'priority' => 30,
    ]);

    // Phone
    $wp_customize->add_setting('laflambee_phone', [
        'default'           => '05 61 67 12 70',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('laflambee_phone', [
        'label'   => __('Téléphone', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'text',
    ]);

    // Address
    $wp_customize->add_setting('laflambee_address', [
        'default'           => '24/25 Place Maréchal Leclerc, 09500 Mirepoix',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('laflambee_address', [
        'label'   => __('Adresse', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'textarea',
    ]);

    // Hours
    $wp_customize->add_setting('laflambee_hours', [
        'default'           => "Lundi : 12h–14h / 19h–22h\nMardi : 12h–14h / 19h–22h\nMercredi : Fermé\nJeudi : Fermé\nVendredi : 12h–14h / 19h–22h\nSamedi : 12h–14h / 19h–22h\nDimanche : 12h–14h / 19h–22h",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('laflambee_hours', [
        'label'   => __('Horaires', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'textarea',
    ]);

    // Facebook
    $wp_customize->add_setting('laflambee_facebook', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('laflambee_facebook', [
        'label'   => __('URL Facebook', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'url',
    ]);

    // Instagram
    $wp_customize->add_setting('laflambee_instagram', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('laflambee_instagram', [
        'label'   => __('URL Instagram', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'url',
    ]);

    // Google Maps embed URL
    $wp_customize->add_setting('laflambee_map_url', [
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.721323381485!2d1.8719266!3d43.0863073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a87bc1a6b0c2e3%3A0xc3b8a1f8c6b7a0b0!2s24%20Pl.%20Mar%C3%A9chal%20Leclerc%2C%2009500%20Mirepoix!5e0!3m2!1sfr!2sfr',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('laflambee_map_url', [
        'label'   => __('URL Google Maps Embed', 'la-flambee'),
        'section' => 'laflambee_info',
        'type'    => 'url',
    ]);
});

/* ─────────────────────────────────────────────
   SHORTCODE: [phone_button]
   ───────────────────────────────────────────── */
add_shortcode('phone_button', function ($atts) {
    $atts = shortcode_atts([
        'class' => '',
        'text'  => __('Réserver par téléphone', 'la-flambee'),
    ], $atts);

    $phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
    $phone_clean = preg_replace('/[^0-9+]/', '', $phone);

    return sprintf(
        '<a href="tel:%s" class="btn btn--primary %s">%s</a>',
        esc_attr($phone_clean),
        esc_attr($atts['class']),
        esc_html($atts['text'])
    );
});

/* ─────────────────────────────────────────────
   HELPER: Clean phone number
   ───────────────────────────────────────────── */
function laflambee_phone_clean() {
    $phone = get_theme_mod('laflambee_phone', '05 61 67 12 70');
    return preg_replace('/[^0-9+]/', '', $phone);
}

function laflambee_phone_display() {
    return esc_html(get_theme_mod('laflambee_phone', '05 61 67 12 70'));
}

function laflambee_picture($basename, $alt = '', $args = []) {
    $dir = LAFLAMBEE_URI . '/assets/images/';
    $dir_path = get_stylesheet_directory() . '/assets/images/';
    $manifest_path = $dir_path . 'manifest.json';
    static $manifest = null;

    if ($manifest === null && file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
    }

    $original_width = 1600;
    if (is_array($manifest) && isset($manifest[$basename]['width'])) {
        $original_width = (int) $manifest[$basename]['width'];
    }

    $widths = [480, 768, 1200, 1600];
    $widths = array_filter($widths, function ($w) use ($original_width) {
        return $w <= $original_width;
    });
    if (!in_array($original_width, $widths, true)) {
        $widths[] = $original_width;
    }
    sort($widths);

    $build_srcset = function ($ext) use ($widths, $dir, $dir_path, $basename) {
        $entries = [];

        foreach ($widths as $w) {
            $file_path = $dir_path . $basename . '-' . $w . '.' . $ext;
            if (file_exists($file_path)) {
                $entries[] = $dir . $basename . '-' . $w . '.' . $ext . ' ' . $w . 'w';
            }
        }

        return implode(', ', $entries);
    };

    $srcset_webp = $build_srcset('webp');
    $srcset_jpg = $build_srcset('jpg');
    $srcset_avif = $build_srcset('avif');

    $jpg = $dir . $basename . '.jpg';
    $size_attr = !empty($args['sizes']) ? 'sizes="' . esc_attr($args['sizes']) . '"' : '';
    $loading = isset($args['loading']) ? 'loading="' . esc_attr($args['loading']) . '"' : 'loading="lazy"';
    $width = !empty($args['width']) ? 'width="' . esc_attr($args['width']) . '"' : '';
    $height = !empty($args['height']) ? 'height="' . esc_attr($args['height']) . '"' : '';
    $class = !empty($args['class']) ? 'class="' . esc_attr($args['class']) . '"' : '';
    $decoding = isset($args['decoding']) ? 'decoding="' . esc_attr($args['decoding']) . '"' : 'decoding="async"';
    $fetchpriority = !empty($args['fetchpriority']) ? 'fetchpriority="' . esc_attr($args['fetchpriority']) . '"' : '';

    $img_class = !empty($args['img_class']) ? 'class="' . esc_attr($args['img_class']) . '"' : '';

    $picture = '<picture ' . $class . '>';

    if (!empty($srcset_avif)) {
        $picture .= '<source type="image/avif" srcset="' . esc_attr($srcset_avif) . '" ' . $size_attr . '>';
    }

    if (!empty($srcset_webp)) {
        $picture .= '<source type="image/webp" srcset="' . esc_attr($srcset_webp) . '" ' . $size_attr . '>';
    }

    $picture .= '<img src="' . esc_url($jpg) . '"'
        . (!empty($srcset_jpg) ? ' srcset="' . esc_attr($srcset_jpg) . '"' : '')
        . ' alt="' . esc_attr($alt) . '" ' . $width . ' ' . $height . ' ' . $size_attr . ' ' . $loading . ' ' . $img_class . ' ' . $decoding . ' ' . $fetchpriority . '>';

    $picture .= '</picture>';

    return $picture;
}

/* ─────────────────────────────────────────────
   WIDGET AREAS
   ───────────────────────────────────────────── */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Footer', 'la-flambee'),
        'id'            => 'footer-widgets',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer__widget-title">',
        'after_title'   => '</h4>',
    ]);
});

/* ─────────────────────────────────────────────
   DISABLE EMOJI SCRIPTS (performance)
   ───────────────────────────────────────────── */
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
});
