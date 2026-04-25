<?php
/**
 * Template Name: L'Équipe
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

get_header();

$phone = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
?>

<section class="equipe-hero">
    <div class="equipe-hero__media">
        <?php
        echo laflambee_picture('salle-interieure-poutres', esc_attr__('Salle intérieure avec poutres', 'la-flambee'), [
            'sizes' => '(max-width: 768px) 100vw, 1200px',
            'width' => '2000',
            'height' => '1335',
            'loading' => 'eager',
            'fetchpriority' => 'high'
        ]);
        ?>
    </div>
    <div class="equipe-hero__content container" data-reveal>
        <h1><?php esc_html_e('Envie de passer à table ?', 'la-flambee'); ?></h1>
        <p class="equipe-hero__phone phone-fancy"><?php echo esc_html($phone); ?></p>
    </div>
</section>

<section class="equipe" data-reveal>
    <div class="container">
        <div class="equipe__text">
            <span class="section-label text-fancy"><?php esc_html_e('Notre histoire', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('Une passion, deux parcours, un même feu', 'la-flambee'); ?></h2>
            <p>
                <?php esc_html_e('Bienvenue chez La Flambée — une histoire de passion née de la rencontre de Davy et Julie, réunis par l\'amour de la bonne cuisine et de l\'accueil sincère.', 'la-flambee'); ?>
            </p>
            <p>
                <?php esc_html_e('Fort de 10 ans d\'expérience dans des cuisines exigeantes, avec des passages formateurs par Chicago et New York, Davy a posé ses couteaux à Mirepoix pour proposer une cuisine qui lui ressemble : généreuse, technique et profondément ancrée dans le terroir du Sud-Ouest.', 'la-flambee'); ?>
            </p>
            <p>
                <?php esc_html_e('Avec Julie à l\'accueil, ils ont créé un lieu où l\'authenticité se mêle au savoir-faire. Que ce soit pour une pizza au feu de bois, un cassoulet mijoté avec amour ou une crêpe gourmande, tout est fait‑maison avec des produits locaux sélectionnés avec le plus grand soin.', 'la-flambee'); ?>
            </p>
            <p class="equipe__storyline accent-script">
                <?php esc_html_e('Ici, chaque assiette raconte une histoire — celle du terroir, de la passion et du partage.', 'la-flambee'); ?>
            </p>
        </div>
    </div>
</section>

<section class="equipe-split" data-reveal>
    <div class="container">
        <div class="equipe-split__grid">
            <div class="equipe-split__media">
                <?php
                echo laflambee_picture('cuisine_mousses_desserts_montage', esc_attr__('Montage desserts en cuisine', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 520px',
                    'width' => '1200',
                    'height' => '800',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="equipe-split__content">
                <span class="section-label text-fancy"><?php esc_html_e('En cuisine', 'la-flambee'); ?></span>
                <h3><?php esc_html_e('Le goût du fait‑maison', 'la-flambee'); ?></h3>
                <p class="equipe-side__text"><?php esc_html_e('Produits locaux, saisonnalité, gestes précis : la cuisine se construit ici chaque jour, autour du feu et du partage.', 'la-flambee'); ?></p>
                <p class="accent-script"><?php esc_html_e('Le temps est un ingrédient.', 'la-flambee'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="equipe-producers" data-reveal>
    <div class="container">
        <div class="section-header section-header--center">
            <span class="section-label text-fancy"><?php esc_html_e('Le terroir', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('Nos producteurs', 'la-flambee'); ?></h2>
            <p class="section-desc text-fancy"><?php esc_html_e('Des artisans et producteurs proches de nous, choisis pour leur exigence.', 'la-flambee'); ?></p>
        </div>
        <div class="producers__grid" data-reveal-stagger>
            <div class="producer-card">
                <h4><?php esc_html_e('Boucherie de Mirepoix', 'la-flambee'); ?></h4>
                <p><?php esc_html_e('Viandes locales et maturation soignée.', 'la-flambee'); ?></p>
            </div>
            <div class="producer-card">
                <h4><?php esc_html_e('Maraîcher Ariégeois', 'la-flambee'); ?></h4>
                <p><?php esc_html_e('Légumes de saison cueillis le matin.', 'la-flambee'); ?></p>
            </div>
            <div class="producer-card">
                <h4><?php esc_html_e('Fromager des collines', 'la-flambee'); ?></h4>
                <p><?php esc_html_e('Tomes et fromages fermiers.', 'la-flambee'); ?></p>
            </div>
            <div class="producer-card">
                <h4><?php esc_html_e('Vigneron du Sud‑Ouest', 'la-flambee'); ?></h4>
                <p><?php esc_html_e('Bouteilles choisies pour la table.', 'la-flambee'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="equipe-salle" data-reveal>
    <div class="container">
        <div class="equipe-salle__grid">
            <div class="equipe-salle__media">
                <?php
                echo laflambee_picture('salle-restaurant-verriere', esc_attr__('Salle du restaurant sous verrière', 'la-flambee'), [
                    'sizes' => '(max-width: 768px) 100vw, 520px',
                    'width' => '2000',
                    'height' => '1335',
                    'loading' => 'lazy'
                ]);
                ?>
            </div>
            <div class="equipe-salle__content">
                <span class="section-label text-fancy"><?php esc_html_e('En salle', 'la-flambee'); ?></span>
                <h3><?php esc_html_e('L\'accueil comme à la maison', 'la-flambee'); ?></h3>
                <p class="equipe-side__text"><?php esc_html_e('Un service attentif, une ambiance chaleureuse, et le goût de recevoir avec simplicité.', 'la-flambee'); ?></p>
                <p class="accent-script"><?php esc_html_e('Chaque table raconte une rencontre.', 'la-flambee'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery strip -->
<section class="galerie" data-reveal>
    <div class="container">
        <div class="galerie__header">
            <span class="section-label text-fancy"><?php esc_html_e('En images', 'la-flambee'); ?></span>
            <h2><?php esc_html_e('Un aperçu de notre univers', 'la-flambee'); ?></h2>
        </div>

        <div class="galerie__grid" data-reveal-stagger>
            <?php
            $gallery_images = [
                [
                    'basename' => 'salle-restaurant-verriere',
                    'alt' => __('Salle avec verrière', 'la-flambee'),
                    'width' => 2000,
                    'height' => 1335,
                ],
                [
                    'basename' => 'terrasse-exterieure-mirepoix',
                    'alt' => __('Terrasse extérieure', 'la-flambee'),
                    'width' => 768,
                    'height' => 1020,
                ],
                [
                    'basename' => 'salle-interieure-poutres',
                    'alt' => __('Salle intérieure', 'la-flambee'),
                    'width' => 2000,
                    'height' => 1335,
                ],
                [
                    'basename' => 'bar-restaurant',
                    'alt' => __('Bar du restaurant', 'la-flambee'),
                    'width' => 2000,
                    'height' => 1335,
                ],
                [
                    'basename' => 'carte-des-vins',
                    'alt' => __('Carte des vins', 'la-flambee'),
                    'width' => 2000,
                    'height' => 1335,
                ],
                [
                    'basename' => 'salle-restaurant-terrasse',
                    'alt' => __('Terrasse couverte', 'la-flambee'),
                    'width' => 2000,
                    'height' => 1335,
                ],
                [
                    'basename' => 'table_plats_viande_et_pates',
                    'alt' => __('Table de plats du terroir', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
                [
                    'basename' => 'vin_blanc_glace_degustation',
                    'alt' => __('Vin blanc en dégustation', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
                [
                    'basename' => 'verre_bordeaux_sur_table',
                    'alt' => __('Verre de bordeaux sur table', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
                [
                    'basename' => 'desserts_patisseries_fruits',
                    'alt' => __('Desserts maison', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
                [
                    'basename' => 'plat_entrecote_frites_sauce',
                    'alt' => __('Entrecote grillée', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
                [
                    'basename' => 'galette_complete_oeuf_miroir',
                    'alt' => __('Galette complète', 'la-flambee'),
                    'width' => 500,
                    'height' => 400,
                ],
            ];
            foreach ($gallery_images as $image) : ?>
                <div class="galerie__item">
                    <?php
                    echo laflambee_picture($image['basename'], esc_attr($image['alt']), [
                        'sizes' => '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw',
                        'width' => (string) $image['width'],
                        'height' => (string) $image['height'],
                        'loading' => 'lazy'
                    ]);
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
