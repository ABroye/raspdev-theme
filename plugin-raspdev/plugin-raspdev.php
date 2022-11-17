<?php

/**
 * Plugin Name:       Plugin RaspDev
 * Description:       Ce plugin vous permet de créer un menu Langues de type dropdown dans la barre information.
 * Version:           1.0
 * Author:            Alain BROYE
 * Author URI:        https://raspdev.fr/alainbroye/
 */

 /**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
defined('ABSPATH') or die('Vous n\'avez pas la permission d\'accéder à ce fichier et / ou à ce répertoire directement.');

// Version
define( 'PLUGIN_RASPDEV_VERSION', '1.0' );

register_activation_hook(__FILE__, function () {
    // Je suis activé
 });

register_deactivation_hook(__FILE__, function () {
    // Je suis désactivé
 });

 add_action('init', function () {
    register_post_type('langues', [
        'label' => 'Langues info',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-admin-site-alt',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);

    register_post_type('titles', [
        'label' => 'Titres footer',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-ellipsis',
        'supports' => ['title'],
        'show_in_rest' => true,
        'has_archive' => false,
    ]);
    
 });