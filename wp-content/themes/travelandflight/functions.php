<?php

include(__DIR__ . '/core/Menus/Container.php');
include(__DIR__ . '/core/Menus/Item.php');

/**
 * This file will contain all our custom PHP functions
 * and Wordpress settings
 */

$taf = new \stdClass();

/**
 * Theme navigation menus
 */

register_nav_menu('main', 'La navigation principale du site web.');

// MAIN MENU CONTROLLER 

function taf_get_menu($location) {
    global $taf;
    if(!isset($taf->menus)) $taf->menus = [];
    if(!isset($taf->menus[$location])) $taf->menus[$location] = new Container($location);
    return $taf->menus[$location];
}


/**
 * Custom post_type declarations
 */

function taf_register_custom_post_types() {
    register_post_type('story', [
        'label' => 'Récits de voyages',
        'labels' => [
            'singular_name' => 'Récit de voyage',
            'add_new_item' => 'Ajouter un nouveau récit'
        ],
        'description' => 'Tous les récits de voyages réalisés par l\'équipe Travel & Flight',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-palmtree',
        'supports' => ['title','editor','thumbnail','excerpt'],
        'rewrite' => ['slug' => 'recits-de-voyages']
    ]);
}

add_theme_support('post-thumbnails');
add_action('init', 'taf_register_custom_post_types');

/**
 * Misc. functions
 */

function taf_get_bem($base, $classes = []) {
    $string = $base;
    if(!is_array($classes)) $classes = [$classes];
    foreach ($classes as $modifier) {
        $string .= ' ' . $base . '--' . $modifier;
    }
    return $string;
}


