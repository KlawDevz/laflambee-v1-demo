<?php
/**
 * Default Page Template
 * @package La Flambée
 * @version 3.0.0
 */
if (!defined('ABSPATH')) exit;

get_header();

while (have_posts()) : the_post();
?>

<section class="page-shell">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="page-shell__header">
                <h1><?php the_title(); ?></h1>
            </header>

            <div class="page-shell__content">
                <?php the_content(); ?>
            </div>

        </article>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
