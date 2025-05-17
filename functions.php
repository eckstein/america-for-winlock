<?php
/**
 * America for Winlock functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme setup
function america_for_winlock_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register menu
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'america-for-winlock'),
        'footer'  => esc_html__('Footer Menu', 'america-for-winlock'),
    ));
}
add_action('after_setup_theme', 'america_for_winlock_setup');

// Enqueue scripts and styles
function america_for_winlock_scripts() {
    wp_enqueue_style('america-for-winlock-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap', array(), null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3');
    
    wp_enqueue_script('america-for-winlock-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'america_for_winlock_scripts');

// Include customizer settings
require get_template_directory() . '/inc/customizer.php';

/**
 * Create required directories and files if they don't exist
 */
if (!file_exists(get_template_directory() . '/inc')) {
    mkdir(get_template_directory() . '/inc', 0755);
}

if (!file_exists(get_template_directory() . '/js')) {
    mkdir(get_template_directory() . '/js', 0755);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom shortcodes for the theme
 */
function campaign_donation_button_shortcode($atts) {
    $atts = shortcode_atts(array(
        'text' => 'Donate Now',
        'url'  => '#',
        'type' => 'primary',
    ), $atts);
    
    return '<a href="' . esc_url($atts['url']) . '" class="campaign-button ' . esc_attr($atts['type']) . '">' . esc_html($atts['text']) . '</a>';
}
add_shortcode('donation_button', 'campaign_donation_button_shortcode');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load section rendering functions
 */
require get_template_directory() . '/inc/template-sections.php';