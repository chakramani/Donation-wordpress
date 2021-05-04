<?php

// add_theme_support('post-thumnails');

function donation_theme_support()
{
    // Adding dynamic tittle tag support 
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'donation_theme_support');


function donation_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('donation-custom', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('donation-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css", array(), '4.3.1', 'all');
    wp_enqueue_style('donation-fontawesome', "https://pro.fontawesome.com/releases/v5.10.0/css/all.css", array(), '5.10.0', 'all');
    wp_enqueue_style('donation-animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", array(), '4.1.1', 'all');
    wp_enqueue_style('donation-maxcdn-bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css", array(), '4.5.2', 'all');
}
add_action('wp_enqueue_scripts', 'donation_register_styles');



function donation_register_scripts()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script('donation-js', get_template_directory_uri() . "/assets/js/main.js", array(), $version, 'all', true);
    wp_enqueue_script('donation-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", array(), '3.5.1', 'all', true);
    wp_enqueue_script('donation-ajax', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js", array(), '1.16.0', 'all', true);
    wp_enqueue_script('donation-bootstrap-js', "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", array(), '4.5.2', 'all', true);
    wp_enqueue_script('donation-bootstrap-jquery', "https://code.jquery.com/jquery-3.4.1.js", array(), '3.4.1', 'all', true);
    wp_enqueue_script('donation-cloudflare-jquery', "https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js", array(), '4.0.1', 'all', true);


}
add_action('wp_enqueue_scripts', 'donation_register_scripts');

function donation_menus()
{
    $location = array(
        'primary' => "Desktop top Navigation Menu",
        'footer' => "Footer Menu",
    );
    register_nav_menus($location);
}
add_action('init', 'donation_menus');






require get_template_directory().'/inc/walker.php';
// add_filter( 'use_block_editor_for_post', '__return_false' );
