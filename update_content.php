<?php
// Load WordPress
require_once('/var/www/html/wp-load.php');

function update_or_create_page($title, $content) {
    $page = get_page_by_title($title);
    if ($page) {
        wp_update_post(['ID' => $page->ID, 'post_content' => $content]);
        echo "Mise à jour de la page : $title\n";
    } else {
        wp_insert_post([
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish'
        ]);
        echo "Création de la page : $title\n";
    }
}

$home_html = <<<HTML
<!-- wp:html -->
<section class="custom-hero" style="background-image: url('/wp-content/uploads/2026/04/salle-restaurant-verriere.jpg');">
  <div class="custom-hero-content">
    <h1 id="animated-title" class="split-title" style="font-size:clamp(3.5rem, 10vw, 6.5rem);font-family:'Baskervville', serif;font-weight:700;">La Flambée</h1>
    <p style="font-size:1.5rem;font-weight:300;letter-spacing:1px;text-transform:uppercase;">Cuisine Traditionnelle Française à Mirepoix</p>
    <div style="margin-top:2rem;display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;">
      <a href="/la-carte" class="wp-block-button__link" style="background-color:white;color:black;text-decoration:none;">Voir la Carte</a>
      <a href="/contact-acces" class="wp-block-button__link" style="border:2px solid white;color:white;text-decoration:none;">Réserver</a>
    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:6rem;padding-bottom:6rem">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"clamp(2.5rem, 5vw, 3.5rem)"},"spacing":{"margin":{"bottom":"4rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:4rem;font-size:clamp(2.5rem, 5vw, 3.5rem);font-style:normal;font-weight:700;font-family:'Baskervville', serif;">Nos Spécialités</h2>
<!-- /wp:heading -->
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"}}}} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column"><div class="specialite-item"><img src="/wp-content/uploads/2026/04/cassoulet-confit-canard.jpg" alt="Cassoulet Maison au Confit" style="aspect-ratio:3/4;object-fit:cover;"/><div class="specialite-overlay"><span>Découvrir</span></div></div><!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"1.5rem"}},"typography":{"fontSize":"1.5rem"}}} --><h3 class="wp-block-heading has-text-align-center" style="margin-top:1.5rem;font-size:1.5rem;font-family:'Baskervville', serif;">Cassoulet Maison</h3><!-- /wp:heading --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><div class="specialite-item"><img src="/wp-content/uploads/2026/04/cuisses-grenouilles-persillade.jpg" alt="Cuisses de Grenouilles" style="aspect-ratio:3/4;object-fit:cover;"/><div class="specialite-overlay"><span>Découvrir</span></div></div><!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"1.5rem"}},"typography":{"fontSize":"1.5rem"}}} --><h3 class="wp-block-heading has-text-align-center" style="margin-top:1.5rem;font-size:1.5rem;font-family:'Baskervville', serif;">Cuisses de Grenouilles</h3><!-- /wp:heading --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><div class="specialite-item"><img src="/wp-content/uploads/2026/04/gambas-grillees-2.jpg" alt="Gambas Grillées" style="aspect-ratio:3/4;object-fit:cover;"/><div class="specialite-overlay"><span>Découvrir</span></div></div><!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"1.5rem"}},"typography":{"fontSize":"1.5rem"}}} --><h3 class="wp-block-heading has-text-align-center" style="margin-top:1.5rem;font-size:1.5rem;font-family:'Baskervville', serif;">Gambas Grillées</h3><!-- /wp:heading --></div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"backgroundColor":"brand-bordeaux","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background-color:var(--brand-bordeaux);padding-top:6rem;padding-bottom:6rem">
<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"400"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:3rem;font-weight:400;font-family:'Baskervville', serif;">Une table à réserver ?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center" style="margin-top:1rem;margin-bottom:2rem;font-size:1.2rem;opacity:0.9;">Appelez-nous pour garantir votre place.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"black","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background" href="tel:+33561671270" style="border-radius:0px;padding:15px 40px;font-size:1.5rem;font-family:'Baskervville', serif;">05 61 67 12 70</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"full","className":"cta-gallery","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns alignfull cta-gallery" style="gap:0">
<!-- wp:column --><div class="wp-block-column"><img src="/wp-content/uploads/2026/04/salle-interieure-poutres.jpg" style="width:100%;height:350px;object-fit:cover;display:block;" /></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><img src="/wp-content/uploads/2026/04/terrasse-exterieure-mirepoix.jpg" style="width:100%;height:350px;object-fit:cover;display:block;" /></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><img src="/wp-content/uploads/2026/04/bar-restaurant.jpg" style="width:100%;height:350px;object-fit:cover;display:block;" /></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><img src="/wp-content/uploads/2026/04/carte-des-vins.jpg" style="width:100%;height:350px;object-fit:cover;display:block;" /></div><!-- /wp:column -->
</div>
<!-- /wp:columns -->
HTML;

$carte_html = <<<HTML
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:4rem;padding-bottom:4rem">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 6vw, 4.5rem)"},"spacing":{"margin":{"bottom":"4rem"}}}} -->
<h1 class="wp-block-heading has-text-align-center" style="margin-bottom:4rem;font-size:clamp(3rem, 6vw, 4.5rem);font-family:'Baskervville', serif;">La Carte</h1>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"4rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:2rem;font-size:2rem;text-transform:uppercase;color:var(--brand-bordeaux);border-bottom:1px solid var(--brand-bordeaux);padding-bottom:1rem;font-family:'Onest', sans-serif;font-weight:900;letter-spacing:2px;">Entrées</h2>
<!-- /wp:heading -->

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Salade de Gésiers Maison</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">14€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Salade fraîche, gésiers confits, tomates, noix.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Chèvre Chaud sur Toast</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">12€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Fromage de chèvre affiné, miel local, mesclun.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Assiette de Foie Gras</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">19€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Foie gras de canard entier, confiture de figues, pain toasté.</p>

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"2rem","top":"4rem"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:2rem;margin-top:4rem;font-size:2rem;text-transform:uppercase;color:var(--brand-bordeaux);border-bottom:1px solid var(--brand-bordeaux);padding-bottom:1rem;font-family:'Onest', sans-serif;font-weight:900;letter-spacing:2px;">Pizzas</h2>
<!-- /wp:heading -->

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Pizza Tradition</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">13€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Tomate, mozzarella, jambon, champignons, olives.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Pizza Fruits de Mer</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">18€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Tomate, persillade, fruits de mer frais, mozzarella.</p>

</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:2rem;font-size:2rem;text-transform:uppercase;color:var(--brand-bordeaux);border-bottom:1px solid var(--brand-bordeaux);padding-bottom:1rem;font-family:'Onest', sans-serif;font-weight:900;letter-spacing:2px;">Plats</h2>
<!-- /wp:heading -->

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Pièce de Bœuf Grillée</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">22€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Viande sélectionnée, frites maison, salade.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Cassoulet au Confit</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">24€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Haricots lingots, saucisse de Toulouse, confit de canard.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Cuisses de Grenouilles</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">19€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Préparées en persillade, servies avec accompagnement.</p>

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"2rem","top":"4rem"}}}} -->
<h2 class="wp-block-heading" style="margin-bottom:2rem;margin-top:4rem;font-size:2rem;text-transform:uppercase;color:var(--brand-bordeaux);border-bottom:1px solid var(--brand-bordeaux);padding-bottom:1rem;font-family:'Onest', sans-serif;font-weight:900;letter-spacing:2px;">Desserts</h2>
<!-- /wp:heading -->

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Crêpe Gourmande</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">7€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">Chocolat maison, chantilly, éclats de noisettes.</p>

<!-- Menu Item -->
<div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
  <h3 style="margin:0;font-size:1.3rem;font-family:'Baskervville', serif;">Coupe de Glace Artisanale</h3>
  <span style="border-bottom:1px dotted #999;flex-grow:1;margin:0 15px;opacity:0.5;"></span>
  <span style="font-weight:bold;font-size:1.2rem;color:var(--brand-bordeaux);">8€</span>
</div>
<p style="margin-top:0;font-size:0.95rem;opacity:0.7;margin-bottom:2.5rem;font-style:italic;">3 boules au choix, coulis et chantilly.</p>

</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
HTML;

$histoire_html = <<<HTML
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:6rem;padding-bottom:6rem">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"5rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"45%"} -->
<div class="wp-block-column" style="flex-basis:45%">
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="/wp-content/uploads/2026/04/salle-restaurant-terrasse.jpg" alt="Davy et Julie - La Flambée" style="border-radius:24px;box-shadow:0 20px 40px rgba(0,0,0,0.15);width:100%;height:auto;"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"width":"55%","style":{"spacing":{"padding":{"top":"2rem"}}}} -->
<div class="wp-block-column" style="padding-top:2rem;flex-basis:55%">
<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(3rem, 6vw, 4.5rem)"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h1 class="wp-block-heading" style="margin-bottom:2rem;font-size:clamp(3rem, 6vw, 4.5rem);font-family:'Baskervville', serif;">Notre Histoire</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.3rem","lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
<p style="margin-bottom:1.5rem;font-size:1.3rem;line-height:1.8">Bienvenue chez <strong>La Flambée</strong>, une histoire de passion et de partage née de l'association de <strong>Davy et Julie</strong>.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
<p style="margin-bottom:1.5rem;line-height:1.8">Fort de <strong>10 ans d'expérience</strong> dans des cuisines exigeantes, avec des passages formateurs par Chicago et New York, Davy a posé ses couteaux à Mirepoix pour proposer une cuisine qui lui ressemble : généreuse, technique et profondément ancrée dans le terroir du Sud-Ouest.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.8"}}} -->
<p style="line-height:1.8">Avec Julie à l'accueil, nous avons créé un lieu où l'authenticité se mêle au savoir-faire. Que ce soit pour une pizza au feu de bois, un cassoulet mijoté avec amour ou une crêpe gourmande, tout est <strong>fait-maison</strong> avec des produits locaux sélectionnés avec le plus grand soin.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
HTML;

$galerie_html = <<<HTML
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"4rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:4rem;padding-bottom:6rem">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 6vw, 4.5rem)"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<h1 class="wp-block-heading has-text-align-center" style="margin-bottom:1rem;font-size:clamp(3rem, 6vw, 4.5rem);font-family:'Baskervville', serif;">La Galerie</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem"},"spacing":{"margin":{"bottom":"4rem"}}}} -->
<p class="has-text-align-center" style="margin-bottom:4rem;font-size:1.2rem;opacity:0.7;">Un aperçu de notre restaurant, de nos plats et de notre ambiance chaleureuse.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<style>
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}
.gallery-grid img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
    border-radius: 12px;
    filter: grayscale(100%);
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.gallery-grid img:hover {
    filter: grayscale(0%);
    transform: scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}
@media (max-width: 768px) {
    .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .gallery-grid img { height: 200px; }
}
@media (max-width: 480px) {
    .gallery-grid { grid-template-columns: 1fr; }
}
</style>
<!-- /wp:html -->

<!-- wp:html -->
<div class="gallery-grid">
<img src="/wp-content/uploads/2026/04/salle-restaurant-verriere.jpg" alt="Salle avec verrière" />
<img src="/wp-content/uploads/2026/04/terrasse-exterieure-mirepoix.jpg" alt="Terrasse extérieure" />
<img src="/wp-content/uploads/2026/04/salle-interieure-poutres.jpg" alt="Salle intérieure" />
<img src="/wp-content/uploads/2026/04/bar-restaurant.jpg" alt="Bar" />
<img src="/wp-content/uploads/2026/04/carte-des-vins.jpg" alt="Carte des vins" />
<img src="/wp-content/uploads/2026/04/salle-restaurant-terrasse.jpg" alt="Terrasse couverte" />
<img src="/wp-content/uploads/2026/04/cassoulet-confit-canard.jpg" alt="Cassoulet maison" />
<img src="/wp-content/uploads/2026/04/cuisses-grenouilles-persillade.jpg" alt="Cuisses de grenouilles" />
<img src="/wp-content/uploads/2026/04/gambas-grillees-2.jpg" alt="Gambas grillées" />
<img src="/wp-content/uploads/2026/04/pizza-fruits-de-mer.jpg" alt="Pizza fruits de mer" />
<img src="/wp-content/uploads/2026/04/pizza-olives-tradition.jpg" alt="Pizza tradition" />
<img src="/wp-content/uploads/2026/04/crepe-dessert.jpg" alt="Crêpe dessert" />
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem"}}},"backgroundColor":"brand-bordeaux","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background-color:var(--brand-bordeaux);padding-top:4rem;padding-bottom:4rem">
<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"2.5rem","fontWeight":"400"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:2.5rem;font-weight:400;font-family:'Baskervville', serif;">Envie de découvrir nos saveurs ?</h2>
<!-- /wp:heading -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"black","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background" href="/contact-acces" style="border-radius:0px;padding:15px 40px;font-size:1.1rem;font-family:'Baskervville', serif;">Réserver une table</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
HTML;

$contact_html = <<<HTML
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:6rem;padding-bottom:6rem">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 6vw, 4.5rem)"},"spacing":{"margin":{"bottom":"5rem"}}}} -->
<h1 class="wp-block-heading has-text-align-center" style="margin-bottom:5rem;font-size:clamp(3rem, 6vw, 4.5rem);font-family:'Baskervville', serif;">Contact & Accès</h1>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"4rem"}}}} -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column" style="background-color:white;padding:3rem;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
<h3 class="wp-block-heading" style="font-size:1.5rem;color:var(--brand-bordeaux);text-transform:uppercase;letter-spacing:1px;margin-bottom:1rem;">📍 Adresse</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"2.5rem"}}}} -->
<p style="margin-bottom:2.5rem;font-size:1.1rem;line-height:1.6;">24/25 Place Maréchal Leclerc<br>09500 Mirepoix<br>France</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
<h3 class="wp-block-heading" style="font-size:1.5rem;color:var(--brand-bordeaux);text-transform:uppercase;letter-spacing:1px;margin-bottom:1rem;">📞 Réservations</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"2.5rem"}}}} -->
<p style="margin-bottom:2.5rem;font-size:1.1rem;">Par téléphone au : <br><strong style="font-size:1.5rem;"><a href="tel:+33561671270" style="color:var(--brand-bordeaux);text-decoration:none;">05 61 67 12 70</a></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
<h3 class="wp-block-heading" style="font-size:1.5rem;color:var(--brand-bordeaux);text-transform:uppercase;letter-spacing:1px;margin-bottom:1rem;">🕒 Horaires</h3>
<!-- /wp:heading -->
<!-- wp:html -->
<table style="width:100%; border-collapse: collapse; font-size:1.1rem;">
  <tr style="border-bottom: 1px solid #eee;"><td style="padding:10px 0;">Lundi</td><td style="text-align:right;padding:10px 0;">12h–14h / 19h–22h</td></tr>
  <tr style="border-bottom: 1px solid #eee;"><td style="padding:10px 0;">Mardi</td><td style="text-align:right;padding:10px 0;">12h–14h / 19h–22h</td></tr>
  <tr style="border-bottom: 1px solid #eee;color:var(--brand-bordeaux);"><td style="padding:10px 0;"><strong>Mercredi</strong></td><td style="text-align:right;padding:10px 0;"><strong>Fermé</strong></td></tr>
  <tr style="border-bottom: 1px solid #eee;color:var(--brand-bordeaux);"><td style="padding:10px 0;"><strong>Jeudi</strong></td><td style="text-align:right;padding:10px 0;"><strong>Fermé</strong></td></tr>
  <tr style="border-bottom: 1px solid #eee;"><td style="padding:10px 0;">Vendredi</td><td style="text-align:right;padding:10px 0;">12h–14h / 19h–22h</td></tr>
  <tr style="border-bottom: 1px solid #eee;"><td style="padding:10px 0;">Samedi</td><td style="text-align:right;padding:10px 0;">12h–14h / 19h–22h</td></tr>
  <tr><td style="padding:10px 0;">Dimanche</td><td style="text-align:right;padding:10px 0;">12h–14h / 19h–22h</td></tr>
</table>
<!-- /wp:html -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:html -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.721323381485!2d1.8719266!3d43.0863073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a87bc1a6b0c2e3%3A0xc3b8a1f8c6b7a0b0!2s24%20Pl.%20Mar%C3%A9chal%20Leclerc%2C%2009500%20Mirepoix!5e0!3m2!1sfr!2sfr!4v1700000000000!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,0.1);min-height:500px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!-- /wp:html -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
HTML;

update_or_create_page('Accueil', $home_html);
update_or_create_page('La Carte', $carte_html);
update_or_create_page('Notre Histoire', $histoire_html);
update_or_create_page('La Galerie', $galerie_html);
update_or_create_page('Contact & Accès', $contact_html);

// Create and assign Navigation Menu
$menu_name = 'Menu Principal';
$menu_exists = wp_get_nav_menu_object( $menu_name );
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menu_name);
    
    $pages_order = ['Accueil', 'La Carte', 'Notre Histoire', 'La Galerie', 'Contact & Accès'];
    foreach($pages_order as $p_title) {
        $p = get_page_by_title($p_title);
        if($p) {
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  $p->post_title,
                'menu-item-object-id' => $p->ID,
                'menu-item-object' => 'page',
                'menu-item-status' => 'publish',
                'menu-item-type' => 'post_type',
            ));
        }
    }
    
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
    echo "Menu '$menu_name' créé et assigné.\n";
} else {
    echo "Menu '$menu_name' existe déjà.\n";
}

// Ensure Home is set to front page
$home_page = get_page_by_title('Accueil');
if($home_page) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page->ID);
    echo "Page d'accueil configurée.\n";
}
?>