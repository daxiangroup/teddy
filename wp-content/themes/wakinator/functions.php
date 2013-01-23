<?php

function tw_register_menus() {
    register_nav_menus(array(
        'main-navigation' => __('Main Navigation'),
    ));
}

function tw_slug_classes() {
    $classes = str_replace('/', ' ', substr($_SERVER['REQUEST_URI'], 1));
    return trim($classes);
}


/*---------------------------------------------------------
 | Hook Section
 |---------------------------------------------------------
 | Bottom of the theme functions.php, here is where we register all
 | the hooks for the theme.
 */
add_action('init',               'tw_register_menus');
