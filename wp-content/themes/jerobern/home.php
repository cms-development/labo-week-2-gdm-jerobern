<!-- Header -->
<?php get_header(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-12">
            <!-- Als er posts zijn, loop over de posts -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?= get_permalink() ?>"><?php the_title() ?></a>
                </div>
                <div class="card-body">
                    <?php the_content() ?>
                </div>
            </div>
            <!-- Loop sluiten -->
            <?php endwhile; ?>
            <!-- Geen posts -->
            <?php else : ?>
            <!-- Sluit if -->
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</main>
<!-- Footer -->
<?php get_footer(); ?>