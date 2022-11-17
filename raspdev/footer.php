<nav class="navbar navbar-expand-md navbar-dark bg-dark border-0 color-footer" style="background-color: <?= get_theme_mod('footer_background'); ?>!important">
    <div class="container-fluid">
        <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?>
        <?php require_once('templates/social.php'); ?>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark bg-dark color-footer">
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-6">
            <h6 class="footer-title"><?= get_the_title(775) ?></h6>
            <div class="collapse navbar-collapse" id="column-one">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'column-one',
                    'container'      => false,
                    'menu_class'     => 'd-block ms-2',
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <h6 class="footer-title"><?= get_the_title(777) ?></h6>
            <div class="collapse navbar-collapse" id="column-two">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'column-two',
                    'container'      => false,
                    'menu_class'     => 'd-block ms-2',
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <h6 class="footer-title"><?= get_the_title(778) ?></h6>
            <div class="collapse navbar-collapse" id="column-three">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'column-three',
                    'container'      => false,
                    'menu_class'     => 'd-block ms-2',
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6">
            <h6 class="footer-title"><?= get_the_title(779) ?></h6>
            <div class="collapse navbar-collapse" id="column-four">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'column-four',
                    'container'      => false,
                    'menu_class'     => 'd-block m-2',
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
            </div>
        </div>

        <!-- Zone d'abonnement à la newsletter -->
        <div class="d-flex flex-wrap justify-content-start align-items-center py-3 col-lg-6 col-md-6 col-sm-10 col-xs-10">
            <div class="newsletter ps-3">
                <!-- Titre du bloc d'inscription à la newsletter -->
                <h6 class="text-white">Abonnez-vous !</h6>
                <!-- Texte de l'inscription à la newsletter -->
                <p class="text-white">
                    Recevez les nouveautés et les mises à jour mensuellement.
                </p>
                <div class="d-flex w-100 gap-2">
                    <!-- Label caché du input -->
                    <label for="newsletter" class="visually-hidden">
                        Votre Email
                    </label>
                    <!-- Input -->
                    <input id="newsletter" type="text" class="form-control" placeholder="Votre Email" />
                    <!-- Bouton personnalisé d'envoie du formulaire -->
                    <button class="btn btn-sm btn-outline-danger" type="button">
                        S'inscrire
                    </button>
                </div>
                <!-- Formulaire d'adonnement avec case à cocher pour la politique de confidentialité -->
                <div class="checkbox my-3">
                    <form>
                        <input class="form-check-input" type="checkbox" id="subscribeNews" name="subscribe" value="newsletter" />
                        <label for="subscribeNews">
                            <a class="link-footer" href="privacy.html" target="_blank">
                                Veuillez accepter notre politique de confidentialité
                            </a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="legal">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'legal',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => '__return_false',
                'items_wrap'     => '<ul id="%1$s" class="navbar-nav mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth'          => 2,
                'walker'         => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
    </div>
</nav>
<?php wp_footer() ?>
<div id="jsScroll" class="scroll" onclick="scrollToTop();">
    <i class="fa-solid fa-angle-up"></i>
</div>

</body>

</html>