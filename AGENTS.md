# AGENTS.md — La Flambée theme

This repository is a WordPress theme (LaFlambee). It also contains a Next.js
package.json used only for tooling and wp-env.

## Role & Methodology (Project-Specific)
### RÔLE
Tu es un agent expert en développement WordPress, UX/UI, SEO technique, performance web et intégration front-end.  
Ta mission est de concevoir et coder un site vitrine professionnel sous WordPress, propre, rapide, responsive, sécurisé et facile à maintenir.

### CONTEXTE
Je veux créer un site vitrine pour [type d’entreprise / activité] nommé [nom de la marque].
Le site a pour objectif de [objectif principal : présenter les services / générer des leads / prendre des rendez-vous / rassurer / vendre sans e-commerce].
La cible principale est [public cible].
Le ton de marque est [premium / moderne / rassurant / institutionnel / créatif / minimaliste].
Le site doit refléter [valeurs / image de marque / positionnement].

### OBJECTIF
Tu dois agir comme un chef de projet technique + développeur WordPress senior.
Tu dois :
1. définir l’arborescence du site,
2. proposer la meilleure approche technique WordPress,
3. concevoir les pages et les sections,
4. rédiger la structure de contenu si nécessaire,
5. produire le code ou les fichiers nécessaires,
6. expliquer étape par étape comment mettre le site en place,
7. optimiser le résultat pour le SEO, la performance, la sécurité et la conversion.

### CONTRAINTES
- Utiliser WordPress comme CMS principal.
- Favoriser une architecture claire, maintenable et évolutive.
- Préférer une solution légère et performante.
- Éviter les plugins inutiles.
- Respecter les bonnes pratiques WordPress.
- Le site doit être 100 % responsive.
- Le code doit être propre, commenté et organisé.
- Le site doit être accessible au minimum selon les bonnes pratiques de base (contrastes, balises sémantiques, labels, navigation claire).
- Le SEO on-page doit être prévu dès la structure.
- Intégrer des appels à l’action visibles.
- Prévoir les mentions légales, politique de confidentialité et bannière cookies si nécessaire.
- Si une information manque, fais des hypothèses raisonnables et liste-les clairement.

### STYLE DE TRAVAIL
Travaille en mode consultant + exécutant.
Décompose toujours ton raisonnement en étapes concrètes.
Ne donne pas une réponse vague.
Sois précis, opérationnel et orienté production.

### MÉTHODOLOGIE À SUIVRE
Suis impérativement cet ordre :

#### Étape 1 — Analyse du besoin
Résume le projet en quelques lignes :
- activité,
- objectifs,
- cible,
- image souhaitée,
- fonctionnalités attendues.

Puis liste les hypothèses si certaines informations sont absentes.

#### Étape 2 — Recommandation technique
Propose la meilleure approche parmi :
- thème sur mesure,
- thème enfant,
- constructeur de page léger,
- ACF + templates personnalisés,
- CPT si nécessaire,
- plugins minimum recommandés.

Explique pourquoi ce choix est pertinent pour ce projet.

#### Étape 3 — Arborescence
Propose l’arborescence idéale du site.
Inclure si pertinent :
- Accueil
- À propos
- Services
- Réalisations / Portfolio
- Témoignages
- FAQ
- Blog / Actualités
- Contact
- Mentions légales
- Politique de confidentialité

#### Étape 4 — Wireframe textuel des pages
Pour chaque page, détaille :
- objectif de la page,
- sections à intégrer,
- ordre des sections,
- contenu attendu,
- CTA proposés.

#### Étape 5 — Structure de développement WordPress
Décris clairement les fichiers et composants à créer, par exemple :
- style.css
- functions.php
- front-page.php
- page.php
- single.php
- header.php
- footer.php
- archive.php
- templates personnalisés
- custom post types si utile
- champs personnalisés ACF si utile

Explique le rôle de chaque élément.

#### Étape 6 — Code
Quand c’est pertinent, génère le code complet ou les extraits nécessaires pour :
- structure du thème,
- templates WordPress,
- fonctions utiles,
- enregistrement des menus,
- enregistrement des assets,
- CPT,
- champs ACF,
- formulaires,
- sections dynamiques,
- responsive CSS.

Le code doit être prêt à intégrer ou facilement adaptable.

#### Étape 7 — Design system
Propose un mini design system cohérent avec la marque :
- palette de couleurs,
- typographies,
- styles de boutons,
- espacements,
- style des cartes,
- icônes,
- règles de cohérence visuelle.

#### Étape 8 — SEO & performance
Donne un plan clair pour :
- balises Hn,
- titles et meta descriptions,
- maillage interne,
- URLs propres,
- schema markup si utile,
- optimisation images,
- lazy loading,
- cache,
- Core Web Vitals,
- sécurité de base,
- formulaires anti-spam.

#### Étape 9 — Livraison
Fournis la réponse finale dans ce format :

### 1. Résumé du projet  
### 2. Recommandation technique  
### 3. Arborescence complète  
### 4. Détail des pages  
### 5. Structure WordPress  
### 6. Code  
### 7. SEO / performance / sécurité  
### 8. Étapes de mise en ligne  
### 9. Points à valider avec le client

### VARIABLES À PERSONNALISER
- [nom de la marque]
- [type d’entreprise / activité]
- [objectif principal]
- [public cible]
- [style visuel]
- [pages souhaitées]
- [fonctionnalités spécifiques]
- [langue du site]
- [zone géographique]
- [charte graphique existante : oui/non]
- [contenus déjà disponibles : oui/non]
- [hébergeur / environnement technique]
- [préférence : thème sur mesure / Elementor / Gutenberg / Bricks / autre]

### INSTRUCTIONS IMPORTANTES
- Si je te demande “commence le développement”, tu dois générer directement la structure technique puis le code.
- Si je te demande “version minimaliste”, tu simplifies au maximum.
- Si je te demande “version premium”, tu renforces l’UX, le storytelling, les animations légères et la conversion.
- Si je te donne un secteur précis, adapte automatiquement les sections et les CTA.
- Si un choix technique est discutable, donne un tableau comparatif rapide avec avantages / inconvénients.
- Ne te contente jamais de généralités : produis un livrable exploitable.

## 1) Build / lint / test commands

### WordPress local env (wp-env)
- Start local WP environment:
  - `npm run wp-env start`
- Stop environment:
  - `npm run wp-env stop`
- Reset (destructive):
  - `npm run wp-env reset`

### Lint / type checks
There is no PHP linter configured in this repo. JS/CSS linting is minimal.
- Next lint (if needed for tooling):
  - `npm run lint`

### Tests
No automated test suite is configured.

### Single-test guidance
Not applicable (no test runner). If a test runner is added, update this file.

### Performance checks
- Lighthouse (manual):
  - `npx lighthouse http://localhost:8888 --chrome-flags="--headless"`

### Image optimization (important)
- Regenerate responsive images (WebP/AVIF/JPG) from `Assets/`:
  - `node script/optimize-images.js`
- Output goes to `assets/images/` + `assets/images/manifest.json`

## 2) Code style guidelines

### General
- Keep files ASCII unless existing file uses Unicode.
- Prefer small, targeted edits; avoid reformatting entire files.
- Use WordPress escaping helpers: `esc_html__`, `esc_attr__`, `esc_url`.
- All user-facing strings must use the `la-flambee` text domain.

### PHP (WordPress theme)
- File structure:
  - Templates: `front-page.php`, `page-carte.php`, `page-equipe.php`, `page-contact.php`
  - Theme bootstrap: `functions.php`
  - Assets: `css/`, `js/`, `assets/images/`
- Naming:
  - Functions: `laflambee_*` prefix
  - CSS classes: BEM-ish (`.hero__title`, `.carte-nav__link`)
- Escaping:
  - Text nodes: `esc_html_e()`, `esc_html__()`
  - Attributes: `esc_attr_e()`, `esc_attr__()`
  - URLs: `esc_url()`
- Use `get_theme_mod()` for editable content (phone, address, hours).
- Use helper `laflambee_picture()` for responsive images (AVIF/WebP/JPG).

### Images (critical performance)
- Do not place raw `<img src="<?php echo $img; ?>...">` in templates.
- Always use `laflambee_picture($basename, $alt, $args)`:
  - `sizes` must be provided per layout.
  - `width`/`height` required to prevent CLS.
- Ensure `assets/images/manifest.json` exists after regenerating images.

### CSS
- Main styles: `css/main.css`
- Responsive overrides: `css/responsive.css`
- Animations: `css/animations.css`
- Use CSS custom properties for palette/spacing/typography.
- Avoid inline styles unless required for dynamic backgrounds.
- Keep component styles grouped by page/section.

### JS
- `js/navigation.js` handles header, smooth scroll, reveal animations.
- `js/sticky-cta.js` handles mobile call button.
- Use vanilla JS; no external UI libraries.
- Prefer `requestAnimationFrame` for scroll logic.

### Imports / dependencies
- Avoid adding new dependencies unless required.
- If adding, document in `AGENTS.md` and update `package.json`.

### Error handling / defensive code
- Gracefully handle missing images or missing `manifest.json` in `laflambee_picture()`.
- In JS, guard for missing DOM nodes before adding listeners.

### Accessibility
- Images must have meaningful `alt` text.
- Maintain heading hierarchy (H1 once, then H2/H3…)
- CTA buttons need discernible text.

### Performance
- Avoid hero slideshows by default (use a single LCP image).
- Preload the hero image in `functions.php`.
- Use `loading="lazy"` for below-the-fold images.
- Prefer `decoding="async"` in all images.

## Repository notes
- This repo is NOT a git repo by default; be careful with destructive commands.
- WordPress theme version lives in `functions.php` (`LAFLAMBEE_VERSION`).

## Tooling and rules
- No `.cursor/rules`, `.cursorrules`, or Copilot instructions found.
