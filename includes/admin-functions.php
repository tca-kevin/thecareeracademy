<?php

/**
 * Add admin colour scheme
 *
 * @return void
 */
function add_admin_colour_scheme()
{
    wp_admin_css_color(
        'the_career_academy',
        __('The Career Academy'),
        get_stylesheet_directory_uri() . '/admin.css',
        array('#006353', '#fff', '#ff6238', '#ff6238')
    );
}

add_action('admin_init', 'add_admin_colour_scheme');

/**
 * Add admin login logo
 *
 * @return void
 */
function add_admin_login_logo()
{
    echo '
    <style type="text/css">
        body.login h1 a {
            background-image: url("' . get_stylesheet_directory_uri() . '/admin-logo.png") !important;
            background-size: contain !important;
            width: 100% !important;
            height: 100px !important; /* Adjust the height as needed */
        }
    </style>';
}

add_action('login_head', 'add_admin_login_logo');

/**
 * Add admin login background
 *
 * @return void
 */
function add_admin_login_background()
{
    echo '<style type="text/css">
        body.login {
            background: url("' . get_stylesheet_directory_uri() . '/admin.png") no-repeat center center fixed;
            background-size: cover;
        }
    </style>';
}
add_action('login_head', 'add_admin_login_background');

/**
 * Enable SVG support in admin panel
 *
 * @param [type] $mimes
 * @return void
 */
function enable_svg_support_in_admin_panel($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'enable_svg_support_in_admin_panel');

/**
 * Enable iframe on admin and frontend
 *
 * @param [type] $initArray
 * @return void
 */
function enable_iframe_on_admin_and_frontend($tags)
{
    // if (current_user_can('administrator') || current_user_can('editor')) {
    // 	$tags['iframe'] = array(
    // 		'src'             => true,
    // 		'width'           => true,
    // 		'height'          => true,
    // 		'frameborder'     => true,
    // 		'allow'           => true,
    // 		'allowfullscreen' => true,
    // 	);
    // }

    $tags['iframe'] = array(
        'src'             => true,
        'width'           => true,
        'height'          => true,
        'frameborder'     => true,
        'allow'           => true,
        'allowfullscreen' => true,
    );

    return $tags;
}

add_filter('wp_kses_allowed_html', 'enable_iframe_on_admin_and_frontend', 10, 2);
