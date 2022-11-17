<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body class="color-body" style="background-color: <?= get_theme_mod('body_background'); ?>!important">
    <!-- En tête -->
    <header class="">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient shadow-lg fixed-top color-header" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
            <div class="container-fluid">

                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>

                <a class="navbar-brand pb-2" href="<?php echo home_url( '/' ); ?>">
                    <?php bloginfo('') ?>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                        'depth'          => 2,
                        'walker'         => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>

                    <?= get_search_form() ?>

                </div>

            </div>
        </nav>
    </header>
    <?php require_once('infobar.php'); ?>
