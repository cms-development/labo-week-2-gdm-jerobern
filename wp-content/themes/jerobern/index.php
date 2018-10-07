<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jerobern
 */
?>
<!-- Header -->
<?php get_header(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-8">
            <!-- Als er posts zijn, loop over de posts -->
            <?php if (have_posts()) : while(have_posts()) : the_post() ?>
            <h1>
                <?php the_title(); ?>
            </h1>
            <div>
                <?php the_content() ?>
            </div>
            <!-- Loop sluiten -->
            <?php endwhile; ?>
            <!-- Geen posts -->
            <?php else : ?>
            <!-- Sluit if -->
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<!-- Footer -->
<?php get_footer(); ?>