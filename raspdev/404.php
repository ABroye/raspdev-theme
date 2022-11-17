<?php get_header() ?>

<?php if (have_posts()) : ?>
    <h1>404.php</h1>
    <?php while (have_posts()) : the_post(); ?>

    <?php endwhile ?>

<?php else : ?>
    <h1>404.php</h1>
<?php endif; ?>

<?php get_footer() ?>