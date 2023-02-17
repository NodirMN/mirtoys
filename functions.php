<?php
add_action('wp_enqueue_scripts', 'nodir_style');
add_action('wp_enqueue_scripts', 'nodir_scripts');





function nodir_style()
{
    wp_enqueue_style('nodir-style', get_stylesheet_uri());
    // wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/styles/main.min.css');


};

function nodir_scripts()
{
    wp_enqueue_script('nodir-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
};

add_theme_support( 'custom-logo' );

add_theme_support( 'post-thumbnails' );
add_theme_support('menus');


add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
function filter_nav_menu_link_attributes($atts, $item, $args)
{
    if ($args->menu === 'Main') {
        $atts['class'] = 'header__nav-item';

        if ($item->current) {
            $atts['class'] .= ' header__nav-item-active';
        }
    };

    return $atts;
}

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCMgoLVH3w44x7QvyK0rUs3CkMt8CqzMfw';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>