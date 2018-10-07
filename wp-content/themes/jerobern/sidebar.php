<?php
/**
 * Template file for sidebar
 */
if ( is_active_sidebar( 'sidebar_primary' ) ) : ?>

<!--Sidebar Section-->

<div class="col-4">
    <?php dynamic_sidebar( 'sidebar_primary' ); ?>
</div>

<!--Sidebar Section-->

<?php endif; ?>