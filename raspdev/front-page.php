<!-- Appel du header.php -->
<?php get_header() ?>
<!-- page d'accueil avec visualisation des articles -->
<?php if (have_posts()) : ?>

    <article class="row mx-2">

        <?php while (have_posts()) : the_post() ?>

            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-4">
                <div class="card card01 shadow-lg border-0 h-100">
                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100', 'alt' => '']) ?>
                    <div class="card-body bg-dark text-white d-flex flex-column border-top color-card" style="background-color: <?= get_theme_mod('card_background'); ?>!important">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <p class="card-text"><?php the_content() ?></p>
                        <a class="btn btn-outline-raspdev mt-auto" href="
                            <?= get_post_type_archive_link('post') ?>" target="_self">
                            Voir la procédure
                        </a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </article>

<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>