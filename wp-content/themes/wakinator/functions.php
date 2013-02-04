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

function tw_bg_img($post, $page_type) {
    switch (get_post_type($post->ID)) {
        case 'post': return 'blog'; break;
        case 'page': return $post->post_name; break;
    }
    
    //die('page: <pre>'.$page_type.' : '.print_r($post,true));
}

function tw_post_navigation() {
    echo '<span class="nav-previous">';
    if (get_adjacent_post(true, '', true)) { echo previous_post_link('%link', 'Older'); }
    else { echo 'Older'; }
    echo '</span>';

    echo '<span class="nav-next">';
    if (get_adjacent_post(true, '', false)) { next_post_link('%link', 'Newer'); }
    else { echo 'Newer'; }
    echo '</span>';
}

/*---------------------------------------------------------
 | Hook Section
 |---------------------------------------------------------
 | Bottom of the theme functions.php, here is where we register all
 | the hooks for the theme.
 */
add_action('init',               'tw_register_menus');
