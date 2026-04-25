<?php
/**
 * Template Name: La Carte
 * @package La Flambée
 * @version 4.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = get_theme_mod('laflambee_phone', '05 61 67 12 70');
$phone_clean = laflambee_phone_clean();
?>

<!-- ═══════════════════════════════════════════════
     HERO CARTE
     ═══════════════════════════════════════════════ -->
<section class="carte-hero">
    <div class="carte-hero__media">
        <?php
        echo laflambee_picture('carte-des-vins', esc_attr__('Carte des vins', 'la-flambee'), [
            'sizes' => '(max-width: 1200px) 100vw, 1200px',
            'width' => '2000',
            'height' => '1335',
            'loading' => 'eager',
            'fetchpriority' => 'high'
        ]);
        ?>
    </div>
    <div class="container">
        <div class="carte-hero__inner" data-reveal>
            <h1><?php esc_html_e('La carte', 'la-flambee'); ?></h1>
            <p class="carte-hero__lead text-fancy"><?php esc_html_e('Saison Automne‑Hiver 2025', 'la-flambee'); ?></p>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     STICKY NAV CARTE
     ═══════════════════════════════════════════════ -->
<nav class="carte-nav" aria-label="<?php esc_attr_e('Navigation carte', 'la-flambee'); ?>">
    <div class="carte-nav__inner">
        <a href="#specialites" class="carte-nav__link"><?php esc_html_e('Spécialités', 'la-flambee'); ?></a>
        <a href="#pizzas" class="carte-nav__link"><?php esc_html_e('Pizzas', 'la-flambee'); ?></a>
        <a href="#plats" class="carte-nav__link"><?php esc_html_e('Viandes & Plats', 'la-flambee'); ?></a>
        <a href="#entrees" class="carte-nav__link"><?php esc_html_e('Entrées & Salades', 'la-flambee'); ?></a>
        <a href="#snacking" class="carte-nav__link"><?php esc_html_e('Snacking', 'la-flambee'); ?></a>
        <a href="#desserts" class="carte-nav__link"><?php esc_html_e('Desserts & Crêpes', 'la-flambee'); ?></a>
        <a href="#menus" class="carte-nav__link"><?php esc_html_e('Menus', 'la-flambee'); ?></a>
        <a href="#vins" class="carte-nav__link carte-nav__link--accent"><?php esc_html_e('Vins & Boissons', 'la-flambee'); ?></a>
    </div>
</nav>

<!-- ═══════════════════════════════════════════════
     NOS INCONTOURNABLES
     ═══════════════════════════════════════════════ -->
<section id="specialites" class="carte-section carte-section--highlight">
    <div class="container">
        <div class="section-header section-header--center" data-reveal>
            <h2><?php esc_html_e('Spécialités maison', 'la-flambee'); ?></h2>
            <p class="carte-section__sub text-fancy"><?php esc_html_e('Les plats préférés de nos clients.', 'la-flambee'); ?></p>
        </div>
        <div class="carte-grid carte-grid--featured" data-reveal-stagger>

            <div class="carte-card carte-card--featured">
                <span class="carte-label carte-label--star"><?php esc_html_e('Le plus demandé', 'la-flambee'); ?></span>
                <h3 class="carte-card__name"><?php esc_html_e('Cassoulet au confit', 'la-flambee'); ?></h3>
                <p class="carte-card__desc"><?php esc_html_e('Haricots lingots, saucisse de Toulouse et confit de canard', 'la-flambee'); ?></p>
                <span class="carte-card__price">24 &euro;</span>
            </div>

            <div class="carte-card carte-card--featured">
                <span class="carte-label carte-label--fire"><?php esc_html_e('Spécialité maison', 'la-flambee'); ?></span>
                <h3 class="carte-card__name"><?php esc_html_e('Pizza Reine', 'la-flambee'); ?></h3>
                <p class="carte-card__desc"><?php esc_html_e('Tomate, mozzarella, jambon, champignons', 'la-flambee'); ?></p>
                <span class="carte-card__price">12 &euro;</span>
            </div>

            <div class="carte-card carte-card--featured">
                <span class="carte-label carte-label--chef"><?php esc_html_e('Suggestion du chef', 'la-flambee'); ?></span>
                <h3 class="carte-card__name"><?php esc_html_e('Entrecôte grillée (300g)', 'la-flambee'); ?></h3>
                <p class="carte-card__desc"><?php esc_html_e('Viande de bœuf grillée, servie avec frites', 'la-flambee'); ?></p>
                <span class="carte-card__price">19,50 &euro;</span>
            </div>

            <div class="carte-card carte-card--featured">
                <span class="carte-label carte-label--star"><?php esc_html_e('Le plus demandé', 'la-flambee'); ?></span>
                <h3 class="carte-card__name"><?php esc_html_e('Crêpe gourmande', 'la-flambee'); ?></h3>
                <p class="carte-card__desc"><?php esc_html_e('Chocolat maison, chantilly et éclats de noisettes', 'la-flambee'); ?></p>
                <span class="carte-card__price">7 &euro;</span>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     PIZZAS
     ═══════════════════════════════════════════════ -->
<section id="pizzas" class="carte-section carte-section--alt">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Pizzas', 'la-flambee'); ?></h2>
            <p class="carte-section__fire-note text-fancy"><?php esc_html_e('Toutes nos pizzas sont cuites au feu de bois', 'la-flambee'); ?></p>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $pizzas = [
                ['Marguerite', 'Tomate, mozzarella, olives', '10 €', ''],
                ['Reine', 'Tomate, mozzarella, jambon, champignons', '12 €', 'Le plus demandé'],
                ['Napolitaine', 'Tomate, mozzarella, anchois, câpres, olives', '12,50 €', ''],
                ['4 Fromages', 'Tomate, mozzarella, chèvre, emmental, bleu', '13,50 €', 'Spécialité maison'],
                ['Orientale', 'Tomate, mozzarella, merguez, poivrons, œuf', '13 €', ''],
                ['Calzone (chausson)', 'Tomate, mozzarella, jambon, œuf', '13 €', ''],
                ['Végétarienne', 'Tomate, mozzarella, légumes frais, olives', '12,50 €', ''],
                ['Hawaïenne', 'Tomate, mozzarella, jambon, ananas', '12,50 €', ''],
                ['Paysanne', 'Crème, mozzarella, lardons, oignons, pommes de terre', '13,50 €', ''],
                ['Nordique', 'Crème, mozzarella, saumon fumé, citron', '14,50 €', 'Suggestion du chef'],
                ['Burger (pizza)', 'Tomate, mozzarella, bœuf haché, sauce burger', '14 €', ''],
            ];
            foreach ($pizzas as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <span class="menu-item__dots"></span>
                        <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                    </div>
                    <?php if ($p[1]) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                    <?php if ($p[3]) : ?><span class="carte-label carte-label--inline"><?php echo esc_html($p[3]); ?></span><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="carte-section__cta" data-reveal>
            <a href="#plats" class="btn btn--outline"><?php esc_html_e('Voir les plats', 'la-flambee'); ?></a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     PLATS
     ═══════════════════════════════════════════════ -->
<section id="plats" class="carte-section carte-section--alt">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Viandes & Plats', 'la-flambee'); ?></h2>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $plats = [
                ['Entrecôte (300g)', 'Grillée, servie avec frites', '19,50 €', 'Spécialité maison'],
                ['Steak haché à cheval', 'Bœuf grillé, œuf au plat, servi avec frites', '13 €', ''],
                ['Escalope de poulet à la crème', 'Poulet tendre, sauce crémeuse maison', '14,50 €', ''],
                ['Pâtes Carbonara', 'Crème, lardons, parmesan', '12 €', ''],
                ['Pâtes Bolognaise', 'Sauce tomate mijotée, viande de bœuf', '11,50 €', ''],
            ];
            foreach ($plats as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <span class="menu-item__dots"></span>
                        <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                    </div>
                    <?php if ($p[1]) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                    <?php if ($p[3]) : ?><span class="carte-label carte-label--inline"><?php echo esc_html($p[3]); ?></span><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     SALADES & ENTREES
     ═══════════════════════════════════════════════ -->
<section id="entrees" class="carte-section">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Entrées & Salades', 'la-flambee'); ?></h2>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $salades = [
                ['Salade mixte', 'Salade fraîche, crudités', '8,50 €', ''],
                ['Salade César', 'Poulet, parmesan, croûtons, sauce César', '13,50 €', 'Le plus demandé'],
                ['Salade italienne', 'Tomates, mozzarella, jambon', '13 €', ''],
                ['Assiette de jambon cru', 'Charcuterie fine', '11 €', ''],
                ['Camembert rôti', 'Fromage chaud, fondant', '12,50 €', 'Spécialité maison'],
            ];
            foreach ($salades as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <span class="menu-item__dots"></span>
                        <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                    </div>
                    <?php if ($p[1]) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                    <?php if ($p[3]) : ?><span class="carte-label carte-label--inline"><?php echo esc_html($p[3]); ?></span><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     SNACKING
     ═══════════════════════════════════════════════ -->
<section id="snacking" class="carte-section carte-section--alt">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Snacking', 'la-flambee'); ?></h2>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $snacking = [
                ['Burger classique', 'Bœuf, fromage, salade, sauce', '10,50 €'],
                ['Burger flamand', 'Recette maison', '13 €'],
                ['Frites', '', '4 €'],
                ['Nuggets (x6)', '', '6 €'],
            ];
            foreach ($snacking as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <span class="menu-item__dots"></span>
                        <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                    </div>
                    <?php if (!empty($p[1])) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     DESSERTS
     ═══════════════════════════════════════════════ -->
<section id="desserts" class="carte-section">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Desserts & Crêpes', 'la-flambee'); ?></h2>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $desserts = [
                ['Crêpe sucre', '', '4 €', ''],
                ['Crêpe Nutella', '', '5,50 €', 'Le plus demandé'],
                ['Crêpe caramel beurre salé', '', '5,50 €', ''],
                ['Café gourmand', 'Assortiment de desserts', '7,50 €', 'Spécialité maison'],
                ['Mousse au chocolat', '', '5 €', ''],
                ['Tiramisu', '', '6 €', 'Suggestion du chef'],
                ['La crêpe flambée', 'Notre clin d\'œil à La Flambée : caramel, beurre salé et flambage minute.', '', 'Signature'],
            ];
            foreach ($desserts as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <?php if (!empty($p[2])) : ?>
                            <span class="menu-item__dots"></span>
                            <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($p[1])) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                    <?php if (!empty($p[3])) : ?><span class="carte-label carte-label--inline"><?php echo esc_html($p[3]); ?></span><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     BOISSONS
     ═══════════════════════════════════════════════ -->
<section id="vins" class="carte-section carte-section--alt">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Vins & Boissons', 'la-flambee'); ?></h2>
        </div>
        <div class="carte-list" data-reveal>
            <?php
            $boissons = [
                ['Soda (33cl)', '', '3,50 €'],
                ['Eau minérale (50cl)', '', '3 €'],
                ['Bière pression (25cl)', '', '3,50 €'],
                ['Bière pression (50cl)', '', '6,50 €'],
                ['Mojito', '', '8,50 €'],
                ['Spritz', '', '7,50 €'],
                ['Café', '', '1,80 €'],
                ['Verre de vin', '', 'à partir de 4 €'],
            ];
            foreach ($boissons as $p) : ?>
                <div class="menu-item">
                    <div class="menu-item__row">
                        <span class="menu-item__name"><?php echo esc_html($p[0]); ?></span>
                        <span class="menu-item__dots"></span>
                        <span class="menu-item__price"><?php echo esc_html($p[2]); ?></span>
                    </div>
                    <?php if (!empty($p[1])) : ?><p class="menu-item__desc"><?php echo esc_html($p[1]); ?></p><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════
     MENUS
     ═══════════════════════════════════════════════ -->
<section id="menus" class="carte-section">
    <div class="container">
        <div class="section-header" data-reveal>
            <h2><?php esc_html_e('Nos menus', 'la-flambee'); ?></h2>
            <p class="carte-section__sub text-fancy"><?php esc_html_e('Idéales pour un repas complet à petit prix.', 'la-flambee'); ?></p>
        </div>

        <div class="carte-list" data-reveal>
            <div class="menu-item">
                <div class="menu-item__row">
                    <span class="menu-item__name"><?php esc_html_e('Menu enfant', 'la-flambee'); ?></span>
                    <span class="menu-item__dots"></span>
                    <span class="menu-item__price">9,50 &euro;</span>
                </div>
                <p class="menu-item__desc"><?php esc_html_e('Plat + dessert + boisson', 'la-flambee'); ?></p>
            </div>

            <div class="menu-item">
                <div class="menu-item__row">
                    <span class="menu-item__name"><?php esc_html_e('Menu du midi', 'la-flambee'); ?></span>
                    <span class="menu-item__dots"></span>
                    <span class="menu-item__price">16 &euro;</span>
                </div>
                <p class="menu-item__desc"><?php esc_html_e('Entrée + plat ou plat + dessert', 'la-flambee'); ?></p>
                <span class="carte-label carte-label--inline"><?php esc_html_e('Le plus demandé', 'la-flambee'); ?></span>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
