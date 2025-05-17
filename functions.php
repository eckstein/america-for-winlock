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

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

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
 * Load section rendering functions - This is now deprecated as logic moved to template parts
 */
// require get_template_directory() . '/inc/template-sections.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Custom Post Types
 */
function america_for_winlock_register_cpts() {

    // Events CPT
    $event_labels = array(
        'name'                  => _x( 'Events', 'Post type general name', 'america-for-winlock' ),
        'singular_name'         => _x( 'Event', 'Post type singular name', 'america-for-winlock' ),
        'menu_name'             => _x( 'Events', 'Admin Menu text', 'america-for-winlock' ),
        'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'america-for-winlock' ),
        'add_new'               => __( 'Add New', 'america-for-winlock' ),
        'add_new_item'          => __( 'Add New Event', 'america-for-winlock' ),
        'new_item'              => __( 'New Event', 'america-for-winlock' ),
        'edit_item'             => __( 'Edit Event', 'america-for-winlock' ),
        'view_item'             => __( 'View Event', 'america-for-winlock' ),
        'all_items'             => __( 'All Events', 'america-for-winlock' ),
        'search_items'          => __( 'Search Events', 'america-for-winlock' ),
        'parent_item_colon'     => __( 'Parent Events:', 'america-for-winlock' ),
        'not_found'             => __( 'No events found.', 'america-for-winlock' ),
        'not_found_in_trash'    => __( 'No events found in Trash.', 'america-for-winlock' ),
        'featured_image'        => _x( 'Event Image', 'Overrides the Featured Image phrase for this post type', 'america-for-winlock' ),
        'set_featured_image'    => _x( 'Set event image', 'Overrides the Set featured image phrase for this post type', 'america-for-winlock' ),
        'remove_featured_image' => _x( 'Remove event image', 'Overrides the Remove featured image phrase for this post type', 'america-for-winlock' ),
        'use_featured_image'    => _x( 'Use as event image', 'Overrides the Use as featured image phrase for this post type', 'america-for-winlock' ),
        'archives'              => _x( 'Event archives', 'The post type archive label used in nav menus.', 'america-for-winlock' ),
        'insert_into_item'      => _x( 'Insert into event', 'Overrides the Insert into post phrase for this post type', 'america-for-winlock' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the Uploaded to this post phrase for this post type', 'america-for-winlock' ),
        'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for filter links', 'america-for-winlock' ),
        'items_list_navigation' => _x( 'Events list navigation', 'Screen reader text for pagination', 'america-for-winlock' ),
        'items_list'            => _x( 'Events list', 'Screen reader text for items list', 'america-for-winlock' ),
    );
    $event_args = array(
        'labels'             => $event_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-calendar-alt',
    );
    register_post_type( 'event', $event_args );

    // Endorsements CPT
    $endorsement_labels = array(
        'name'                  => _x( 'Endorsements', 'Post type general name', 'america-for-winlock' ),
        'singular_name'         => _x( 'Endorsement', 'Post type singular name', 'america-for-winlock' ),
        'menu_name'             => _x( 'Endorsements', 'Admin Menu text', 'america-for-winlock' ),
        'name_admin_bar'        => _x( 'Endorsement', 'Add New on Toolbar', 'america-for-winlock' ),
        'add_new'               => __( 'Add New', 'america-for-winlock' ),
        'add_new_item'          => __( 'Add New Endorsement', 'america-for-winlock' ),
        'new_item'              => __( 'New Endorsement', 'america-for-winlock' ),
        'edit_item'             => __( 'Edit Endorsement', 'america-for-winlock' ),
        'view_item'             => __( 'View Endorsement', 'america-for-winlock' ),
        'all_items'             => __( 'All Endorsements', 'america-for-winlock' ),
        'search_items'          => __( 'Search Endorsements', 'america-for-winlock' ),
        'parent_item_colon'     => __( 'Parent Endorsements:', 'america-for-winlock' ),
        'not_found'             => __( 'No endorsements found.', 'america-for-winlock' ),
        'not_found_in_trash'    => __( 'No endorsements found in Trash.', 'america-for-winlock' ),
        'featured_image'        => _x( 'Endorser Photo', 'Featured image for endorsement', 'america-for-winlock' ),
        'set_featured_image'    => _x( 'Set endorser photo', 'Set featured image for endorsement', 'america-for-winlock' ),
        'remove_featured_image' => _x( 'Remove endorser photo', 'Remove featured image for endorsement', 'america-for-winlock' ),
        'use_featured_image'    => _x( 'Use as endorser photo', 'Use as featured image for endorsement', 'america-for-winlock' ),
        'archives'              => _x( 'Endorsement archives', 'Archive label for endorsement', 'america-for-winlock' ),
        'insert_into_item'      => _x( 'Insert into endorsement', 'Insert into item phrase for endorsement', 'america-for-winlock' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this endorsement', 'Uploaded to item phrase for endorsement', 'america-for-winlock' ),
        'filter_items_list'     => _x( 'Filter endorsements list', 'Filter items list phrase for endorsement', 'america-for-winlock' ),
        'items_list_navigation' => _x( 'Endorsements list navigation', 'Items list navigation phrase for endorsement', 'america-for-winlock' ),
        'items_list'            => _x( 'Endorsements list', 'Items list phrase for endorsement', 'america-for-winlock' ),
    );
    $endorsement_args = array(
        'labels'             => $endorsement_labels,
        'public'             => false, 
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'endorsements' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-groups',
    );
    register_post_type( 'endorsement', $endorsement_args );
}
add_action( 'init', 'america_for_winlock_register_cpts' );

/**
 * Add Meta Boxes for CPTs
 */
function america_for_winlock_add_meta_boxes() {
    add_meta_box(
        'event_details',
        __('Event Details', 'america-for-winlock'),
        'america_for_winlock_event_details_mb_cb',
        'event',
        'normal',
        'high'
    );
    add_meta_box(
        'endorsement_details',
        __('Endorser Details', 'america-for-winlock'),
        'america_for_winlock_endorsement_details_mb_cb',
        'endorsement',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'america_for_winlock_add_meta_boxes' );

/** Callback for Event Details Meta Box */
function america_for_winlock_event_details_mb_cb( $post ) {
    wp_nonce_field( 'america_for_winlock_save_event_meta', 'event_meta_nonce' );

    $date = get_post_meta( $post->ID, '_event_date', true );
    $time = get_post_meta( $post->ID, '_event_time', true );
    $location = get_post_meta( $post->ID, '_event_location', true );
    $rsvp_link = get_post_meta( $post->ID, '_event_rsvp_link', true );
    $rsvp_text = get_post_meta( $post->ID, '_event_rsvp_text', true );

    echo '<p><label for="event_date">' . __('Date:', 'america-for-winlock') . '</label>';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr( $date ) . '" size="25" /></p>';

    echo '<p><label for="event_time">' . __('Time:', 'america-for-winlock') . '</label>';
    echo '<input type="text" id="event_time" name="event_time" value="' . esc_attr( $time ) . '" size="25" placeholder="e.g., 7:00 PM" /></p>';

    echo '<p><label for="event_location">' . __('Location:', 'america-for-winlock') . '</label>';
    echo '<input type="text" id="event_location" name="event_location" value="' . esc_attr( $location ) . '" size="50" placeholder="e.g., Winlock Community Center" /></p>';

    echo '<p><label for="event_rsvp_link">' . __('RSVP/More Info Link (URL):', 'america-for-winlock') . '</label>';
    echo '<input type="url" id="event_rsvp_link" name="event_rsvp_link" value="' . esc_url( $rsvp_link ) . '" size="50" /></p>';

    echo '<p><label for="event_rsvp_text">' . __('RSVP/More Info Button Text:', 'america-for-winlock') . '</label>';
    echo '<input type="text" id="event_rsvp_text" name="event_rsvp_text" value="' . esc_attr( $rsvp_text ?: __('RSVP', 'america-for-winlock') ) . '" size="25" /></p>';
}

/** Callback for Endorsement Details Meta Box */
function america_for_winlock_endorsement_details_mb_cb( $post ) {
    wp_nonce_field( 'america_for_winlock_save_endorsement_meta', 'endorsement_meta_nonce' );

    $endorser_title = get_post_meta( $post->ID, '_endorser_title', true );

    echo '<p><label for="endorser_title">' . __('Endorser\'s Title/Organization:', 'america-for-winlock') . '</label>';
    echo '<input type="text" id="endorser_title" name="endorser_title" value="' . esc_attr( $endorser_title ) . '" size="50" /></p>';
}

/** Save Meta Box Data */
function america_for_winlock_save_meta_data( $post_id ) {
    // Event Meta
    if ( isset( $_POST['event_meta_nonce'] ) && wp_verify_nonce( $_POST['event_meta_nonce'], 'america_for_winlock_save_event_meta' ) ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if (isset($_POST['post_type']) && 'event' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_post', $post_id ) ) return;
        } else {
            return; // Not an event post, so don't process event meta
        }

        if ( isset( $_POST['event_date'] ) ) {
            update_post_meta( $post_id, '_event_date', sanitize_text_field( $_POST['event_date'] ) );
        }
        if ( isset( $_POST['event_time'] ) ) {
            update_post_meta( $post_id, '_event_time', sanitize_text_field( $_POST['event_time'] ) );
        }
        if ( isset( $_POST['event_location'] ) ) {
            update_post_meta( $post_id, '_event_location', sanitize_text_field( $_POST['event_location'] ) );
        }
        if ( isset( $_POST['event_rsvp_link'] ) ) {
            update_post_meta( $post_id, '_event_rsvp_link', esc_url_raw( $_POST['event_rsvp_link'] ) );
        }
        if ( isset( $_POST['event_rsvp_text'] ) ) {
            update_post_meta( $post_id, '_event_rsvp_text', sanitize_text_field( $_POST['event_rsvp_text'] ) );
        }
    }

    // Endorsement Meta
    if ( isset( $_POST['endorsement_meta_nonce'] ) && wp_verify_nonce( $_POST['endorsement_meta_nonce'], 'america_for_winlock_save_endorsement_meta' ) ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if (isset($_POST['post_type']) && 'endorsement' == $_POST['post_type']) {
            if ( ! current_user_can( 'edit_post', $post_id ) ) return;
        } else {
            return; // Not an endorsement post
        }

        if ( isset( $_POST['endorser_title'] ) ) {
            update_post_meta( $post_id, '_endorser_title', sanitize_text_field( $_POST['endorser_title'] ) );
        }
    }
}
add_action( 'save_post', 'america_for_winlock_save_meta_data' );

/**
 * Modify query for Events CPT archive to order by event date (custom field).
 */
function america_for_winlock_event_archive_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'event' ) ) {
        $query->set( 'meta_key', '_event_date' );
        $query->set( 'orderby', 'meta_value' ); // Sorts alphabetically if meta_value is date, use meta_value_date for proper date sorting if available and needed.
        $query->set( 'meta_type', 'DATE'); // Important for correct date sorting
        $query->set( 'order', 'ASC' ); 
    }
}
add_action( 'pre_get_posts', 'america_for_winlock_event_archive_query' );

// functions.php continues...