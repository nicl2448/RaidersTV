<?php
/**
 * @package Wordpress
 * @subpackage Broadcast Lite
 */

// Theme Setup
function broadcast_setup() {
    register_nav_menus( array(
        'main-navigation' => 'Main Navigation',
        'footer-navigation' => 'Footer Navigation',
    ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    // Define image sizes here for auto-cropping
}

add_action( 'after_setup_theme', 'broadcast_setup' );

// Colour Scheme
require ('includes/functions/colourScheme.php');

// Scripts & Styles
function broadcast_scripts_styles() {
    global $wp_styles;
    global $post;
    // Use Wordpress' jQuery
    wp_enqueue_script('jquery');
    // Main + Plugins JS
    wp_enqueue_script( 'broadcast-plugins', get_template_directory_uri() . '/js/plugins.js', '', null, true );
    wp_enqueue_script( 'broadcast-main', get_template_directory_uri() . '/dist/main.min.js', '', null, true );
    // Main CSS
    wp_enqueue_style( 'broadcast-style', get_template_directory_uri() . '/dist/main.min.css', '', null );
    wp_enqueue_style( 'broadcast-quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Khand:300,400', '', null );   
    $bc_custom_css = broadcast_get_css();
    wp_add_inline_style( 'broadcast-style', $bc_custom_css );
}

add_action( 'wp_enqueue_scripts', 'broadcast_scripts_styles' );

function bc_admin_scripts() {
    wp_enqueue_script( 'broadcast-admin', get_template_directory_uri() . '/includes/functions/js/adminNotices.js', '', null, true );
}

add_action( 'admin_enqueue_scripts', 'bc_admin_scripts' );


// Customizer
require ('includes/functions/customizer.php');
require ('includes/functions/bc-customize-pro/broadcast-lite/class-customize.php');

// TGM
require ('includes/functions/class-tgm-plugin-activation.php');

// Body Class
require ('includes/functions/bodyClass.php');

// Custom Nav
require ('includes/functions/nav.php');

// Content Width
require ('includes/functions/contentWidth.php');

// Admin Notices
require ('includes/functions/adminNotices.php');

// Timezones
require ('includes/functions/dateTimeZone.php');