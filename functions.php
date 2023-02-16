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

?>