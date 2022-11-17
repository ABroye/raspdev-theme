<?php
// Register Style
function raspdev_styles()
{
    wp_deregister_style( 'bootstrap' );
    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css', '5.2.2' );
    wp_enqueue_style( 'bootstrap' );

    wp_enqueue_style( 'scrollToTop', get_template_directory_uri() . '/assets/css/scrollToTop.css' );
    wp_enqueue_style( 'raspdev', get_template_directory_uri() . '/assets/css/raspdev.css' );
    wp_enqueue_style( 'mobile', get_template_directory_uri() . '/assets/css/mobile.css' );
}

// Register Script
function raspdev_scripts()
{
    wp_deregister_script( 'bootstrap' );
    wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js', array( 'popper', 'jquery' ), '5.2.2', true );
    wp_enqueue_script( 'bootstrap' );

    wp_deregister_script( 'popper' );
    wp_register_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', false, '2.11.6', true );
    wp_enqueue_script( 'popper' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', false, '3.6.1', true );
    wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'fa-kit' );
    wp_register_script( 'fa-kit', 'https://kit.fontawesome.com/0f3ecde558.js', array( 'jquery' ), '6.2.0', true );
    wp_enqueue_script( 'fa-kit' );

    wp_enqueue_script( 'scrollToTop', get_template_directory_uri() . '/assets/js/scrollToTop.js', false, '1.0', false );
}

// Add new tab navigator separator
function raspdev_title_separator() 
{
    return '|';
}

// Register Theme Features
function raspdev_support()
{
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    function raspdev_custom_logo_setup() {
        $defaults = array(
            'height' => 36,
            'width' => 36,
            'flex-height' => false,
            'flex-width' => false,
            'header-text' => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false,
        );
        add_theme_support( 'custom-logo', $defaults );
    }
    
    // Add theme support for custom CSS in the TinyMCE visual editor
    add_editor_style( 'editor-style.css' );

    // Add theme support for Translation
    load_theme_textdomain( 'raspdev', get_template_directory() . '/language' );
}

// Register Navigation Menus
function raspdev_navigation_menus()
{
    $locations = array(
        'main-menu' => __( 'Navbar avec moteur de recherche', 'raspdev' ),
        'extra-menu' => __( 'Barre d\'information sous la navbar', 'raspdev' ),
		'column-one' => __( 'Colonne 1 du footer', 'raspdev' ),
        'column-two' => __( 'Colonne 2 du footer', 'raspdev' ),
		'column-three' => __( 'Colonne 3 du footer', 'raspdev' ),
		'column-four' => __( 'Colonne 4 du footer', 'raspdev' ),
        'legal' => __( 'Infos légales du footer', 'raspdev' ),

    );
    register_nav_menus($locations);
}

function raspdev_init()
{
    register_taxonomy('logiciels', 'post', [
        'labels' => [
            'name' => 'Logiciels',
            'singular_name' => 'Logiciel',
            'plural_name' => 'Logiciels',
            'search_items' => 'Rechercher des logiciels',
            'all_items' => 'Tous les logiciels',
            'edit_item' => 'Modifier le logiciel',
            'update_item' => 'Mettre à jour le logiciel',
            'add_new_item' => 'Ajouter un nouveau logiciel',
            'new_item_name' => 'Ajouter un nouveau nom de logiciel',
            'menu_name' => 'Logiciels',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);

}

add_filter('manage_langues_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'Drapeaux',
        'title' => 'Langues',
        'date' => $columns['date']
    ];
});

add_filter('manage_langues_posts_custom_column', function ($column, $postId) {
    if ($column === 'thumbnail') {
        the_post_thumbnail('thumbnail', $postId);
    }
}, 10, 2);

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu dropdown-menu-dark rounded-0$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        //$attributes = !empty($item->thumbnail) ? ' src="' . esc_attr($item->thumbnail) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// Actions
add_action( 'wp_enqueue_scripts', 'raspdev_styles' );
add_action( 'wp_enqueue_scripts', 'raspdev_scripts' );
add_action( 'after_setup_theme', 'raspdev_support' );
add_action( 'after_setup_theme', 'raspdev_custom_logo_setup' );
add_action( 'init', 'raspdev_navigation_menus' );
add_action( 'init', 'raspdev_init' );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
add_action( 'switch_theme', 'flush_rewrite_rules' );

// Modification des couleurs du thème.
add_action('customize_register', function (WP_Customize_Manager $manager) {

    $manager->add_section('raspdev_colors', [
        'title' => 'Changer les couleurs du thème',
    ]);
    
    // Changement de couleur du header.
    $manager->add_setting('header_background', [
        'default' => '#212529',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'header_background', [
        'section' => 'raspdev_colors',
        'label' => 'Couleur du header'
    ]));

    // Changement de couleur de la barre d'info.
    $manager->add_setting('infobar_background', [
        'default' => '#343A3F',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'infobar_background', [
        'section' => 'raspdev_colors',
        'label' => 'Couleur de la barre d\'info.'
    ]));
    
    // Changement de couleur du body.
    $manager->add_setting('body_background', [
        'default' => '#ffffff',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'body_background', [
        'section' => 'raspdev_colors',
        'label' => 'Couleur du body'
    ]));

    // Changement de couleur des cartes.
    $manager->add_setting('card_background', [
        'default' => '#212529',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'card_background', [
        'section' => 'raspdev_colors',
        'label' => 'Couleur des cartes'
    ]));    
    
    // Changement de couleur du footer.
    $manager->add_setting('footer_background', [
        'default' => '#212529',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'footer_background', [
        'section' => 'raspdev_colors',
        'label' => 'Couleur du footer'
    ]));
    
});

add_action('customize_preview_init', function () {
    wp_enqueue_script( 'raspdev_colors', get_template_directory_uri() . '/assets/js/colors.js', ['jquery', 'customize-preview'], '', true );

});

