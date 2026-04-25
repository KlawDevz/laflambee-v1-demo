<?php
/**
 * Front Page Template (Homepage)
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

get_header();

$phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
?>

<!-- ═══════════════════════════════════════════════
     HERO
     ═══════════════════════════════════════════════ -->
<section class="hero">
    <div class="hero__bg">
        <?php
        echo laflambee_picture('salle-restaurant-verriere', esc_attr__('Salle verrière La Flambée', 'la-flambee'), [
            'sizes' => '(max-width: 1200px) 100vw, 1200px',
            'width' => '2000',
            'height' => '1335',
            'class' => 'hero__img',
            'img_class' => 'hero__img',
            'loading' => 'eager',
            'fetchpriority' => 'high'
        ]);
        ?>
    </div>

    <div class="hero__content">
        <div class="hero__inner">
            <h1 class="hero__image-title"><?php esc_html_e('Restaurant La Flambée', 'la-flambee'); ?></h1>
            <p class="hero__image-subtitle text-fancy"><?php esc_html_e('Cuisine artisanale du Sud-Ouest, midi et soir à Mirepoix.', 'la-flambee'); ?></p>
            <div class="hero__cta-group">
                <a href="<?php echo esc_url(home_url('/la-carte')); ?>" class="btn btn--outline-light">
                    <?php esc_html_e('Voir la carte', 'la-flambee'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     INTRO
     ═══════════════════════════════════════════════ -->
<section class="intro" data-reveal>
    <div class="container">
        <div class="intro__split">
            <div class="intro__text">
                <span class="section-label text-fancy"><?php esc_html_e('Bienvenue', 'la-flambee'); ?></span>
                <h2><?php esc_html_e('Cuisine du terroir à Mirepoix : braise, produits locaux et convivialité', 'la-flambee'); ?></h2>
                <p>
                    <?php esc_html_e('Une cuisine artisanale, des produits du Sud-Ouest et un accueil simple, chaleureux et généreux.', 'la-flambee'); ?>
                </p>
                <div class="intro__quickfacts" aria-label="Informations pratiques">
                    <span class="intro__fact text-fancy"><?php esc_html_e('Place Maréchal Leclerc, Mirepoix', 'la-flambee'); ?></span>
                    <span class="intro__fact text-fancy"><?php esc_html_e('Service midi et soir selon les jours', 'la-flambee'); ?></span>
                </div>
            </div>

            <div class="intro__image">
                <?php
                echo laflambee_picture('entree_salade_foie_gras_magret', esc_attr__('Entrée salade foie gras', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 600px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
        </div>

        <div class="features" data-reveal-stagger>
            <div class="feature">
                <svg class="feature__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M24 4C24 4 8 16 8 28a16 16 0 0032 0C40 16 24 4 24 4z"/>
                    <path d="M24 44V28"/>
                    <path d="M16 36c0-4.4 3.6-8 8-8s8 3.6 8 8"/>
                </svg>
                <h3 class="feature__title"><?php esc_html_e('Fait maison', 'la-flambee'); ?></h3>
                <p class="feature__text text-fancy"><?php esc_html_e('Entrées, plats et desserts préparés sur place.', 'la-flambee'); ?></p>
            </div>
            <div class="feature">
                <svg class="feature__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M24 4v8"/>
                    <path d="M8 24h8"/>
                    <path d="M32 24h8"/>
                    <circle cx="24" cy="24" r="12"/>
                    <path d="M24 16c-2 2-4 5-4 8s2 6 4 8c2-2 4-5 4-8s-2-6-4-8z"/>
                </svg>
                <h3 class="feature__title"><?php esc_html_e('Produits locaux', 'la-flambee'); ?></h3>
                <p class="feature__text text-fancy"><?php esc_html_e('Sélection de producteurs de l\'Ariège et du Sud-Ouest.', 'la-flambee'); ?></p>
            </div>
            <div class="feature">
                <svg class="feature__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 40h24"/>
                    <path d="M20 40V28c0-2.2-1.8-4-4-4H8l4-12h4"/>
                    <path d="M28 40V28c0-2.2 1.8-4 4-4h8l-4-12h-4"/>
                    <path d="M24 4c-2 4-2 8 0 12"/>
                    <path d="M20 6c-2 3-2 6 0 10"/>
                    <path d="M28 6c2 3 2 6 0 10"/>
                </svg>
                <h3 class="feature__title"><?php esc_html_e('Cuisson au feu de bois', 'la-flambee'); ?></h3>
                <p class="feature__text text-fancy"><?php esc_html_e('Pizzas croustillantes et goût fumé signature.', 'la-flambee'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     PLATS PHARES
     ═══════════════════════════════════════════════ -->
<section class="dishes" id="carte" data-reveal>
    <div class="container">
        <div class="section-header section-header--center">
            <span class="section-label text-fancy"><?php esc_html_e('Nos signatures', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('Les incontournables', 'la-flambee'); ?></h2>
            <p class="section-desc text-fancy">
                <?php esc_html_e('Trois assiettes qui racontent notre cuisine.', 'la-flambee'); ?>
            </p>
        </div>

        <div class="dishes__grid" data-reveal-stagger>
            <article class="dish">
                <div class="dish__img">
                    <?php
                    echo laflambee_picture('entree_salade_foie_gras_magret', esc_attr__('Salade gourmande au foie gras', 'la-flambee'), [
                        'sizes' => '(max-width: 768px) 100vw, 400px',
                        'width' => '1200',
                        'height' => '800',
                        'loading' => 'lazy'
                    ]);
                    ?>
                </div>
                <div class="dish__body">
                    <h3 class="dish__name"><?php esc_html_e('Salade gourmande au foie gras', 'la-flambee'); ?></h3>
                    <p class="dish__desc text-fancy"><?php esc_html_e('Magret fumé, foie gras et assaisonnement maison.', 'la-flambee'); ?></p>
                    <span class="dish__price">18 &euro;</span>
                </div>
            </article>

            <article class="dish">
                <div class="dish__img">
                    <?php
                    echo laflambee_picture('plat_entrecote_frites_sauce', esc_attr__('Entrecôte grillée frites maison', 'la-flambee'), [
                        'sizes' => '(max-width: 768px) 100vw, 400px',
                        'width' => '1200',
                        'height' => '800',
                        'loading' => 'lazy'
                    ]);
                    ?>
                </div>
                <div class="dish__body">
                    <h3 class="dish__name"><?php esc_html_e('Entrecôte grillée', 'la-flambee'); ?></h3>
                    <p class="dish__desc text-fancy"><?php esc_html_e('Frites maison et sauce du Sud-Ouest.', 'la-flambee'); ?></p>
                    <span class="dish__price">19,50 &euro;</span>
                </div>
            </article>

            <article class="dish">
                <div class="dish__img">
                    <?php
                    echo laflambee_picture('dessert_mousse_au_chocolat_maison', esc_attr__('Mousse au chocolat maison', 'la-flambee'), [
                        'sizes' => '(max-width: 768px) 100vw, 400px',
                        'width' => '1200',
                        'height' => '800',
                        'loading' => 'lazy'
                    ]);
                    ?>
                </div>
                <div class="dish__body">
                    <h3 class="dish__name"><?php esc_html_e('Mousse au chocolat maison', 'la-flambee'); ?></h3>
                    <p class="dish__desc text-fancy"><?php esc_html_e('Chocolat noir, texture légère, gourmandise pure.', 'la-flambee'); ?></p>
                    <span class="dish__price">6 &euro;</span>
                </div>
            </article>

        </div>

        <div class="dishes__cta">
            <a href="<?php echo esc_url(home_url('/la-carte')); ?>" class="btn btn--primary btn--lg">
                <?php esc_html_e('Découvrir toutes nos spécialités', 'la-flambee'); ?>
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     PREUVE SOCIALE (Trustindex)
     ═══════════════════════════════════════════════ -->
<section class="wine" data-reveal>
    <div class="container">
        <div class="wine__grid">
            <div class="wine__media">
                <?php
                echo laflambee_picture('carte-des-vins', esc_attr__('Carte des vins', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 520px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="wine__content">
                <span class="section-label text-fancy"><?php esc_html_e('Les vins', 'la-flambee'); ?></span>
                <h2><?php esc_html_e('L\'art de la table et des accords', 'la-flambee'); ?></h2>
                <p><?php esc_html_e('Vins du Sud‑Ouest, pépites de petits domaines et conseils maison pour accompagner nos plats.', 'la-flambee'); ?></p>
                <div class="wine__note accent-script"><?php esc_html_e('“Une sélection pensée comme un voyage.”', 'la-flambee'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     AMBIANCE
     ═══════════════════════════════════════════════ -->
<section class="ambiance" data-reveal>
    <div class="container">
        <div class="section-header">
            <span class="section-label text-fancy"><?php esc_html_e('L\'ambiance', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('Mirepoix en images', 'la-flambee'); ?></h2>
            <p class="ambiance__lead text-fancy">
                <?php esc_html_e('Découvrez l\'ambiance du restaurant en images.', 'la-flambee'); ?>
            </p>
        </div>

        <div class="ambiance__grid">
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('terrasse-exterieure-mirepoix', esc_attr__('Terrasse extérieure Mirepoix', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('bar-restaurant', esc_attr__('Bar du restaurant', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('table_plats_viande_et_pates', esc_attr__('Table de plats du terroir', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('vin_blanc_glace_degustation', esc_attr__('Vin blanc en dégustation', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('salle-interieure-poutres', esc_attr__('Salle intérieure avec poutres', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('cuisine_cuisiniers_preparation', esc_attr__('Cuisine en action', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('plat_entrecote_frites_sauce', esc_attr__('Entrecôte frites maison', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="ambiance__item">
                <?php
                echo laflambee_picture('plat_gambas_grillees_riz', esc_attr__('Gambas grillées et riz', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 400px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     DE L'ENTREE AU DESSERT
     ═══════════════════════════════════════════════ -->
<section class="menu-teaser" data-reveal>
    <div class="container">
        <div class="section-header section-header--center">
            <span class="section-label text-fancy"><?php esc_html_e('La carte', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('De l\'entrée au dessert', 'la-flambee'); ?></h2>
            <p class="section-desc text-fancy"><?php esc_html_e('Trois univers pour composer un repas généreux.', 'la-flambee'); ?></p>
        </div>
        <div class="menu-teaser__grid" data-reveal-stagger>
            <a class="menu-teaser__card" href="<?php echo esc_url(home_url('/la-carte')); ?>#entrees">
                <?php
                echo laflambee_picture('entrees_table_salade_au_fromage', esc_attr__('Entrées', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 360px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
                <span><?php esc_html_e('Entrées', 'la-flambee'); ?></span>
            </a>
            <a class="menu-teaser__card" href="<?php echo esc_url(home_url('/la-carte')); ?>#plats">
                <?php
                echo laflambee_picture('plat_pave_saumon_riz_legumes', esc_attr__('Plats', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 360px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
                <span><?php esc_html_e('Plats', 'la-flambee'); ?></span>
            </a>
            <a class="menu-teaser__card" href="<?php echo esc_url(home_url('/la-carte')); ?>#desserts">
                <?php
                echo laflambee_picture('desserts_patisseries_fruits', esc_attr__('Desserts', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 360px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
                <span><?php esc_html_e('Desserts', 'la-flambee'); ?></span>
            </a>
        </div>
        <div class="menu-teaser__cta">
            <a href="<?php echo esc_url(home_url('/la-carte')); ?>" class="btn btn--outline">
                <?php esc_html_e('Voir la carte complète', 'la-flambee'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
