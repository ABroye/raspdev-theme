<nav id="" class="navbar navbar-dark navbar-expand-md color-infobar" style="background-color: <?= get_theme_mod('infobar_background'); ?>!important">
    <div class="container-fluid ms-4">
        <div class="collapse navbar-collapse" id="extra-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'extra-menu',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => '__return_false',
                'items_wrap'     => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth'          => 2,
                'walker'         => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
        <div>
            <button type="button" class="btn btn-outline-light text-white position-relative me-4">
                Membres connectés
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php if (function_exists('users_online')): ?>
                        <?php users_online(); ?>
                    <?php endif; ?>
                </span>
            </button>
        </div>
        <!-- Avatar du profil membre -->
        <div class="avatar dropdown text-end">
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo get_avatar_url( get_current_user_id(), 48 ); ?>" alt="Admin" width="48" height="48" class="rounded-circle profile" />
            </a>
            <span id="status" class="p-1 bg-success border border-light rounded-circle"></span>
            <!-- Menu de profil avec déclenchement de Offcanvas à droite position aside -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small rounded-0" aria-labelledby="dropdownUser1">
              <li>
                <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1">
                  Supervision des serveurs
                </button>
              </li>
              <li>
                <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight2">
                  Participer au Forum
                </button>
              </li>
              <li>
                <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight3" aria-controls="offcanvasRight3">
                  Gestion de mon compte
                </button>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#">Déconnexion</a>
              </li>
            </ul>
        </div>
    </div>
</nav>