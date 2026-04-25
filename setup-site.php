<?php
/**
 * Script de setup initial pour La Flambée
 * À exécuter une seule fois après le démarrage de wp-env
 */

// Définir les constantes WordPress
define('WP_USE_THEMES', false);
require_once('/var/www/html/wp-load.php');

// Inclure le script de création des pages
require_once('/var/www/html/wp-content/themes/la-flambee/update_content.php');

echo "\n=== Setup La Flambée terminé ===\n";
echo "Site accessible sur : http://localhost:8888\n";
echo "Connectez-vous avec les identifiants configurés dans votre environnement local.\n";
