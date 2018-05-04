<?php

include(__DIR__ . '/core/Menus/Container.php');
include(__DIR__ . '/core/Menus/Item.php');

/**
 * This file will contain all our custom PHP functions
 * and Wordpress settings
 */


/**
 * Theme navigation menus
 */

register_nav_menu('main', 'La navigation principale du site web.');

// MAIN MENU CONTROLLER 
// (temporary | TODO : should be moved to separate class)

function taf_get_menu($location) {
    global $post;
    if(!isset($post->taf_menus)) $post->taf_menus = [];
    if(!isset($post->taf_menus[$location])) $post->taf_menus[$location] = new Container($location);
    return $post->taf_menus[$location];
}

function taf_get_bem($base, $classes = []) {
    $string = $base;
    if(!is_array($classes)) $classes = [$classes];
    foreach ($classes as $modifier) {
        $string .= ' ' . $base . '--' . $modifier;
    }
    return $string;
}


