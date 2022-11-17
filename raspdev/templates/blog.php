<?php
/*
* Template Name: Page Blog
* Template Post Type: page, post
*/
?>
<?php get_header() ?>
<!-- articles -->
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="container my-5">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-header bg-dark">
                    <h1 class="card-title text-light pt-1"><?php the_title() ?></h1>
                </div>
                <div class="card-body bg-light d-flex flex-column">
                    <p class="card-text"><?php the_content() ?></p>
                </div>
            </div>
        </div>

    <?php endwhile ?>

<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>