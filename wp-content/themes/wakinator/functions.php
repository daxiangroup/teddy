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

function tw_get_post($id, $item=null) {
    $post = get_post($id);

    if (!is_null($item)) {
        $content = $post->$item;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }

    return $post;
}


/*---------------------------------------------------------
 | Hook Section
 |---------------------------------------------------------
 | Bottom of the theme functions.php, here is where we register all
 | the hooks for the theme.
 */
add_action('init',               'tw_register_menus');
