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