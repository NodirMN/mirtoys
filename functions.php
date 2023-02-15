<?php
add_action('wp_enqueue_scripts', 'nodir_style');
add_action('wp_enqueue_scripts', 'nodir_scripts');
add_filter('upload_mimes', 'svg_upload_allow');




function nodir_style()
{
    wp_enqueue_style('nodir-style', get_stylesheet_uri());
    // wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/styles/main.min.css');


};

function nodir_scripts()
{
    wp_enqueue_script('nodir-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), null, true);
};

function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

    // WP 5.1 +
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
        $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    else
        $dosvg = ('.svg' === strtolower(substr($filename, -4)));

    if ($dosvg) {
        if (current_user_can('manage_options')) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }
    return $data;
}
?>