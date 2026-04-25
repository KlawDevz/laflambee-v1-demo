# La Flambée - Thème WordPress Rustique-Chic

## Direction Artistique

### Palette de Couleurs

**Couleurs Principales :**
- **Terracotta** `#C65D3B` - Couleur signature, chaleur du Sud-Ouest, utilisée pour les CTA et accents
- **Sage Green** `#8B9A7C` - Évoque les produits locaux, la nature, l'authenticité
- **Cream** `#FAF7F2` - Fond principal, chaleur douce, lisibilité optimale
- **Charcoal** `#2C2C2C` - Texte principal, élégance et contraste

**Couleurs Secondaires :**
- **Gold** `#D4A574` - Détails premium, prix, séparateurs
- **Warm White** `#FFFFFF` - Cartes et sections contrastées
- **Light Sage** `#E8EDE5` - Arrière-plans alternatifs

**Rationale Design :**
- Terracotta = Terre cuite des fours à pizza, chaleur du feu
- Sage = Nature, produits locaux, fraîcheur
- Cream = Toile de lin, nappe de restaurant traditionnel
- Le contraste offre une lisibilité parfaite sur mobile

### Typographie

**Titres :** Playfair Display (Google Fonts)
- Empattements élégants, aspect éditorial et traditionnel
- Parfait pour "La Flambée", "Notre Carte", les noms de plats
- Weights : 400 (Regular), 600 (Semi-bold), 700 (Bold)

**Corps de texte :** Inter (Google Fonts)
- Sans-serif moderne, excellente lisibilité sur mobile
- Grands x-height = lisibilité optimale en petite taille
- Weights : 300 (Light), 400 (Regular), 500 (Medium), 600 (Semi-bold)

**Accents/Labels :** Inter uppercase + tracking
- Pour les catégories de menu, labels, boutons

### Philosophie Design

**Rustique-Chic =**
- Rustique : Matériaux nobles (terre, bois, lin), chaleur humaine, authenticité
- Chic : Espaces négatifs généreux, hiérarchie typographique stricte, animations subtiles

**Mobile-First Strategy :**
- Thumb Zone : CTA principal accessible en bas de l'écran
- Fast Loading : Images optimisées, code minimal
- One-Handed : Navigation simplifiée, gestes naturels

## Architecture du Thème

```
la-flambee/
├── style.css                 # En-tête thème + styles de base
├── functions.php             # Configuration WordPress
├── header.php                # Navigation + CTA mobile
├── footer.php                # Pied de page
├── index.php                 # Template fallback
├── front-page.php            # Page d'accueil
├── page.php                  # Template de page
├── single.php                # Template article
├── screenshot.png            # Aperçu thème
├── css/
│   ├── main.css             # Styles principaux
│   ├── responsive.css       # Media queries
│   └── animations.css       # Animations CSS
├── js/
│   ├── navigation.js        # Menu mobile
│   └── sticky-cta.js        # CTA flottant
├── template-parts/
│   ├── hero.php             # Section hero réutilisable
│   ├── menu-section.php     # Section carte/menu
│   └── team-member.php      # Membre équipe
└── languages/               # Fichiers de traduction
    ├── la-flambee.pot
    ├── la-flambee-fr_FR.po
    └── la-flambee-fr_FR.mo
```

## Fonctionnalités Clés

### CTA Flottant Mobile (Sticky Call Button)

**Comportement :**
- Visible uniquement sur mobile (< 768px)
- Fixé en bas de l'écran (bottom: 20px)
- Largeur : 90% de l'écran, centré
- Couleur : Terracotta (#C65D3B) avec ombre
- Texte : "📞 Réserver par téléphone"
- Animation : Slide up au scroll, pulse subtil

**Code d'implémentation :**
Voir `header.php` (structure HTML) + `js/sticky-cta.js` (logique)

### Internationalisation (i18n)

Tous les textes utilisent les fonctions WordPress :
- `__()` - Retourne la chaîne traduite
- `_e()` - Affiche la chaîne traduite
- `esc_html__()` - Version échappée
- `esc_attr__()` - Pour les attributs HTML

Domaine de texte : `la-flambee`

## Installation

1. Copier le dossier `la-flambee` dans `/wp-content/themes/`
2. Activer le thème dans WordPress
3. Créer les pages : Accueil, La Carte, L'Équipe, Contact
4. Configurer le menu dans Apparence > Menus
5. Définir la page d'accueil dans Réglages > Lecture

## Optimisations Mobiles

- Touch targets : Minimum 44x44px
- Font-size base : 16px (évite le zoom iOS)
- Line-height : 1.6 pour une lecture confortable
- Contraste : Ratio minimum 4.5:1 (WCAG AA)
- Images : Lazy loading natif + srcset
