<?php
/**
 * Main Index Template
 * 
 * @package La Flambée
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<section class="section-content">
    <div class="container">
        <div class="content-area">
            
            <?php if (have_posts()) : ?>
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        </header>
                        
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php _e('Lire la suite', 'la-flambee'); ?> →
                            </a>
                        </footer>
                        
                    </article>
                    
                <?php endwhile; ?>
                
                <?php the_posts_pagination(); ?>
                
            <?php else : ?>
                
                <p><?php _e('Aucun contenu trouvé.', 'la-flambee'); ?></p>
                
            <?php endif; ?>
            
        </div>
    </div>
</section>

<?php get_footer(); ?>
