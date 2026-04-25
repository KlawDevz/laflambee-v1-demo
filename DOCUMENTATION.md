## Documentation de la V1 — La Flambée 09

### 1. Architecture générale
- **Thème actif** : `LaFlambee` (v3.0.3) dans `/wp-content/themes/LaFlambee`
- **Pages principales** :
  - `front-page.php` : accueil (hero, features, spotlight, galerie, CTA)
  - `page-carte.php` : carte complète organisée par catégories
  - `page-equipe.php` : storytelling + galerie + citation
  - `page-contact.php` : infos pratiques + horaires + plan Google Maps
- **CSS** : `css/main.css`, `css/responsive.css`, `css/animations.css` (design tokens, responsive, animations scroll)
- **JS** : `js/navigation.js` (menu/hamburger, scroll header, reveal), `js/sticky-cta.js` (CTA appel mobile)

### 2. Design system & styles clés
- **Palette** : terracotta (`oklch(0.55 0.14 30)`), crème, encre chaude, accents olive
- **Typographie** : Libre Caslon Display (titres), Source Sans 3 (corps), Anybody (labels)
- **Spacing** : 4pt scale `--sp-1`...`--sp-24`, radius `--r-sm`/`--r-md`/`--r-lg`
- **Buttons** : `.btn`, `.btn--primary`, `.btn--outline-light`, `.btn--phone-icon` (hover + shadows)
- **Utilities** : `.text-center`, `.carte__cta`, `.spotlight`, `.hero__badge`, `.carte__category` etc.

### 3. Optimisation et helpers
- `functions.php` expose `laflambee_picture($basename, $alt, $args)` pour générer `<img>` responsives (lazy, decoding, sizes).
- Hero image + fonts préchargés via un `wp_head` inline.
- Images critiques remplacées par ce helper dans `front-page.php` (hero, plats) ; on peut étendre aux autres templates.

### 4. Carte par catégories
- La page carte génère dynamiquement les sections : Pizzas, Salades, Viandes, Snacking, Desserts, Boissons, Formules.
- CTA centralisé en bas (message aligné + bouton). Emphase sur la simplicité des titres (sans emoji).

### 5. Storytelling & accents
- Section `spotlight` sur l’accueil : texte narratif + CTA + note.
- Texte `Ici, chaque assiette...` stylé avec `.equipe__storyline`.
- Badge hero `.hero__badge`, dividers `.section-divider`, textures via classes spécifiques.

### 6. Performances
- Typos préconnectées/preloadées, hero image préchargée via `wp_head`.
- Helper `laflambee_picture()` pour toutes les images (avec `loading/decoding`).
- Update CSS pour aligner prix, ajouter `card` hover, `spotlight` et `menu anchors`.

### 7. Prochaines étapes pour la V1
1. Remplacer les autres images critiques (galerie, cartes, équipe) via `laflambee_picture()`.
2. Ajouter textures / flamme micro-décor sur les sections restantes (carte, équipe, contact).
3. Lancer Lighthouse mobile (home + carte) pour valider LCP/CLS/INP.
4. Documenter la procédure (asset names, helper) sur ce document pour la maintenance.
