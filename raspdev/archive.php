<?php get_header() ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="container my-5" style="background-color: <?= get_theme_mod('body_background'); ?>!important">
            <div class="card shadow-lg border-0 h-100">
                <div class="d-flex justify-content-between card-header bg-dark">
                    <h1 class="card-title text-light pt-1"><?php the_title() ?></h1>
                </div>
                <div class="card-body bg-light d-flex flex-column">
                    <h1>archive.php</h1>
                </div>
            </div>
        </div>

    <?php endwhile ?>

<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>