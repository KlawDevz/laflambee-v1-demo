# La Flambée - Restaurant Mirepoix

Thème WordPress enfant GeneratePress pour le restaurant La Flambée à Mirepoix (Ariège).

## Architecture

### Structure des fichiers

```
la-flambee/
├── functions.php           # Hooks WordPress + footer custom
├── style.css               # Styles du thème (361 lignes)
├── update_content.php      # Script de création des pages
├── assets/
│   ├── images/            # Toutes les images du site
│   │   ├── cassoulet-confit-canard.jpg
│   │   ├── cuisses-grenouilles-persillade.jpg
│   │   ├── ... (27 images)
│   ├── icone-facebook-2.jpg
│   ├── icone-google-2.jpg
│   └── logo-la-flambee.jpg
├── README.md
└── DEPLOY_NOTES.md
```

### Pages créées

1. **Accueil** - Hero animé + spécialités + galerie mini + CTA
2. **La Carte** - Menu complet (entrées, plats, pizzas, desserts)
3. **Notre Histoire** - Présentation Davy & Julie
4. **La Galerie** - Grid de 12 photos (ambiance + plats)
5. **Contact & Accès** - Infos + carte Google Maps

### Système de gestion des images

**Approche senior :** Les images sont stockées dans `/assets/images/` et les chemins sont remplacés automatiquement via un filtre WordPress.

```php
// Dans functions.php - Filtre de remplacement automatique
add_filter('the_content', function($content) {
    $uploads_url = '/wp-content/uploads/2026/04/';
    $theme_images_url = get_stylesheet_directory_uri() . '/assets/images/';
    return str_replace($uploads_url, $theme_images_url, $content);
});
```

**Avantages :**
- ✅ Versioning Git complet (images incluses)
- ✅ Déploiement atomique (un seul `git pull`)
- ✅ Pas d'upload manuel nécessaire
- ✅ Chemins dynamiques avec `get_stylesheet_directory_uri()`
- ✅ Retour en arrière facile (rollback Git)

### Installation

1. **Déployer le thème**
   ```bash
   # Copier dans wp-content/themes/la-flambee/
   git clone [repo] /var/www/html/wp-content/themes/la-flambee/
   ```

2. **Activer le thème** dans WordPress

3. **Créer les pages** (une seule fois)
   ```php
   // Inclure via WP-CLI ou functions.php temporairement
   include 'update_content.php';
   ```

4. **Configurer la page d'accueil**
   - Réglages > Lecture
   - Page d'accueil : "Accueil"

### Personnalisation

**Couleurs**
- Bordeaux : #823B2A
- Orange : #C1603F
- Crème : #F5F3ED
- Noir : #2D2A28

**Typographie**
- Titres : Baskervville (serif)
- Corps : Onest (sans-serif)

**Contacts**
- Tél : 05 61 67 12 70
- Adresse : 24/25 Place Maréchal Leclerc, 09500 Mirepoix
- Horaires : Lun-Mar-Ven-Sam-Dim 12h-14h / 19h-22h
- Fermé : Mercredi et Jeudi

## Notes techniques

- Thème enfant GeneratePress
- Mobile-first, responsive
- Animations CSS/JS (pas de librairie lourde)
- Optimisé pour le cache
- WCAG AA compliant

## Auteur

Développé pour Davy et Julie - La Flambée Mirepoix
