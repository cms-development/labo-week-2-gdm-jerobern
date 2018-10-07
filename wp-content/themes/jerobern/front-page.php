<!-- Header -->
<?php get_header(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-8">
            <h1>Recente Berichten</h1>
            <?php $posts = wp_get_recent_posts(array('numberposts' => 2)) ?>
            <?php foreach($posts as $post): ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= get_permalink($post['ID']) ?>">
                        <?= $post['post_title'] ?></a>
                </div>
                <div class="card-body">
                    <p>
                        <?= $post['post_content'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
            <h1>Weetjes</h1>
            <?php $customquery = new WP_Query(array('category_name' => 'weetjes', 'posts_per_page' => 2)); ?>
            <?php if ($customquery->have_posts()) : while($customquery->have_posts()) : $customquery->the_post() ?>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?= get_permalink() ?>">
                        <?php the_title() ?></a>
                </div>
                <div class="card-body">
                    <p>
                        <?php the_content() ?>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<!-- Footer -->
<?php get_footer(); ?>