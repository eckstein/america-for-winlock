<?php
/**
 * America for Winlock Theme Customizer
 *
 * @package America_for_Winlock
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function america_for_winlock_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('custom_logo')->transport = 'postMessage';

    // Theme Colors
    $wp_customize->add_section('america_for_winlock_colors', array(
        'title'      => __('Theme Colors', 'america-for-winlock'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('primary_color', array(
        'default'           => '#003DA5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'america-for-winlock'),
        'section'  => 'america_for_winlock_colors',
        'settings' => 'primary_color',
    )));

    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#E50000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'america-for-winlock'),
        'section'  => 'america_for_winlock_colors',
        'settings' => 'secondary_color',
    )));

    // Campaign Information
    $wp_customize->add_section('campaign_info', array(
        'title'      => __('Campaign Information', 'america-for-winlock'),
        'priority'   => 35,
    ));

    $wp_customize->add_setting('candidate_name', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('candidate_name', array(
        'label'    => __('Candidate Name', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('campaign_slogan', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('campaign_slogan', array(
        'label'    => __('Campaign Slogan', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('campaign_office', array(
        'default'           => 'Mayor',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('campaign_office', array(
        'label'    => __('Office Running For', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('campaign_location', array(
        'default'           => 'Winlock',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('campaign_location', array(
        'label'    => __('Campaign Location', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('campaign_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('campaign_email', array(
        'label'    => __('Campaign Email', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'email',
    ));

    $wp_customize->add_setting('campaign_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('campaign_phone', array(
        'label'    => __('Campaign Phone', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'tel',
    ));

    $wp_customize->add_setting('campaign_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('campaign_address', array(
        'label'    => __('Campaign Address', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'textarea',
    ));

    // Donation Link
    $wp_customize->add_setting('donation_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('donation_link', array(
        'label'    => __('Donation Link (External)', 'america-for-winlock'),
        'section'  => 'campaign_info',
        'type'     => 'url',
    ));

    // Social Media Links
    $wp_customize->add_section('social_links', array(
        'title'      => __('Social Media', 'america-for-winlock'),
        'priority'   => 40,
    ));

    $wp_customize->add_setting('social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook URL', 'america-for-winlock'),
        'section'  => 'social_links',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label'    => __('Twitter URL', 'america-for-winlock'),
        'section'  => 'social_links',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label'    => __('Instagram URL', 'america-for-winlock'),
        'section'  => 'social_links',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('social_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label'    => __('YouTube URL', 'america-for-winlock'),
        'section'  => 'social_links',
        'type'     => 'url',
    ));

    // Footer Settings
    $wp_customize->add_section('footer_settings', array(
        'title'      => __('Footer Settings', 'america-for-winlock'),
        'priority'   => 120,
    ));

    $wp_customize->add_setting('footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'america-for-winlock'),
        'section'  => 'footer_settings',
        'settings' => 'footer_logo',
    )));

    $wp_customize->add_setting('footer_tagline', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_tagline', array(
        'label'    => __('Footer Tagline', 'america-for-winlock'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '&copy; ' . date('Y') . ' America for Winlock. All Rights Reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_copyright', array(
        'label'    => __('Copyright Text', 'america-for-winlock'),
        'section'  => 'footer_settings',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('footer_disclaimer', array(
        'default'           => 'Paid for by America for Winlock Campaign',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('footer_disclaimer', array(
        'label'    => __('Disclaimer Text (Political Disclaimer)', 'america-for-winlock'),
        'section'  => 'footer_settings',
        'type'     => 'textarea',
    ));

    // Section Visibility Controls
    america_for_winlock_add_section_controls($wp_customize);
}
add_action('customize_register', 'america_for_winlock_customize_register');

/**
 * Add controls for showing/hiding and configuring page sections
 */
function america_for_winlock_add_section_controls($wp_customize) {
    // Section Control Panel
    $wp_customize->add_panel('section_controls', array(
        'title'       => __('Page Sections', 'america-for-winlock'),
        'description' => __('Control the visibility and content of each section on the homepage', 'america-for-winlock'),
        'priority'    => 50,
    ));

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'      => __('Hero Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 10,
    ));

    $wp_customize->add_setting('show_hero_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_hero_section', array(
        'label'    => __('Show Hero Section', 'america-for-winlock'),
        'section'  => 'hero_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('hero_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label'    => __('Hero Background Image', 'america-for-winlock'),
        'section'  => 'hero_section',
        'settings' => 'hero_background',
    )));

    $wp_customize->add_setting('hero_heading', array(
        'default'           => 'Vote for America',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_heading', array(
        'label'    => __('Hero Heading', 'america-for-winlock'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_subheading', array(
        'default'           => 'For a Better Winlock',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subheading', array(
        'label'    => __('Hero Subheading', 'america-for-winlock'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('Button Text', 'america-for-winlock'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '#about',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label'    => __('Button URL', 'america-for-winlock'),
        'section'  => 'hero_section',
        'type'     => 'url',
    ));

    // About Candidate Section
    $wp_customize->add_section('about_section', array(
        'title'      => __('About Candidate Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 20,
    ));

    $wp_customize->add_setting('show_about_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_about_section', array(
        'label'    => __('Show About Section', 'america-for-winlock'),
        'section'  => 'about_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('about_title', array(
        'default'           => 'About the Candidate',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'about_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'    => __('Candidate Photo', 'america-for-winlock'),
        'section'  => 'about_section',
        'settings' => 'about_image',
    )));

    $wp_customize->add_setting('about_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_content', array(
        'label'    => __('About Content', 'america-for-winlock'),
        'section'  => 'about_section',
        'type'     => 'textarea',
    ));
    
    // Platform/Issues Section
    $wp_customize->add_section('platform_section', array(
        'title'      => __('Platform/Issues Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 30,
    ));

    $wp_customize->add_setting('show_platform_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_platform_section', array(
        'label'    => __('Show Platform Section', 'america-for-winlock'),
        'section'  => 'platform_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('platform_title', array(
        'default'           => 'My Platform',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('platform_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'platform_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('platform_intro', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('platform_intro', array(
        'label'    => __('Introduction Text', 'america-for-winlock'),
        'section'  => 'platform_section',
        'type'     => 'textarea',
    ));

    // Add repeater fields for platform issues using custom controls
    $issues = array(
        array(
            'icon' => 'fa-money-bill',
            'title' => 'Economy',
            'description' => 'Building a stronger local economy',
        ),
        array(
            'icon' => 'fa-leaf',
            'title' => 'Environment',
            'description' => 'Protecting our natural resources',
        ),
        array(
            'icon' => 'fa-building',
            'title' => 'Infrastructure',
            'description' => 'Improving roads and public facilities',
        ),
    );
    
    $wp_customize->add_setting('platform_issues', array(
        'default'           => $issues,
        'sanitize_callback' => 'america_for_winlock_sanitize_platform_issues',
        'transport'         => 'refresh',
    ));

    // Add other sections (Endorsements, Get Involved, Events, Donate, News, Contact)
    // Each will follow a similar pattern to the sections above
    
    // Endorsements Section
    $wp_customize->add_section('endorsements_section', array(
        'title'      => __('Endorsements Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 40,
    ));

    $wp_customize->add_setting('show_endorsements_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_endorsements_section', array(
        'label'    => __('Show Endorsements Section', 'america-for-winlock'),
        'section'  => 'endorsements_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('endorsements_title', array(
        'default'           => 'Endorsements',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('endorsements_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'endorsements_section',
        'type'     => 'text',
    ));
    
    // Get Involved Section
    $wp_customize->add_section('involvement_section', array(
        'title'      => __('Get Involved Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 50,
    ));

    $wp_customize->add_setting('show_involvement_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_involvement_section', array(
        'label'    => __('Show Get Involved Section', 'america-for-winlock'),
        'section'  => 'involvement_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('involvement_title', array(
        'default'           => 'Get Involved',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('involvement_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'involvement_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('involvement_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('involvement_content', array(
        'label'    => __('Section Content', 'america-for-winlock'),
        'section'  => 'involvement_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('volunteer_form_code', array(
        'default'           => '',
        'sanitize_callback' => 'america_for_winlock_sanitize_html',
    ));

    $wp_customize->add_control('volunteer_form_code', array(
        'label'       => __('Volunteer Form Embed Code', 'america-for-winlock'),
        'description' => __('Paste third-party form embed code here', 'america-for-winlock'),
        'section'     => 'involvement_section',
        'type'        => 'textarea',
    ));
    
    // Events Section
    $wp_customize->add_section('events_section', array(
        'title'      => __('Events Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 60,
    ));

    $wp_customize->add_setting('show_events_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_events_section', array(
        'label'    => __('Show Events Section', 'america-for-winlock'),
        'section'  => 'events_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('events_title', array(
        'default'           => 'Upcoming Events',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('events_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'events_section',
        'type'     => 'text',
    ));
    
    // Donate Section
    $wp_customize->add_section('donate_section', array(
        'title'      => __('Donate Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 70,
    ));

    $wp_customize->add_setting('show_donate_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_donate_section', array(
        'label'    => __('Show Donate Section', 'america-for-winlock'),
        'section'  => 'donate_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('donate_title', array(
        'default'           => 'Support Our Campaign',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('donate_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'donate_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('donate_content', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('donate_content', array(
        'label'    => __('Donation Text', 'america-for-winlock'),
        'section'  => 'donate_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('donate_button_text', array(
        'default'           => 'Donate Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('donate_button_text', array(
        'label'    => __('Donate Button Text', 'america-for-winlock'),
        'section'  => 'donate_section',
        'type'     => 'text',
    ));
    
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'      => __('Contact Section', 'america-for-winlock'),
        'panel'      => 'section_controls',
        'priority'   => 90,
    ));

    $wp_customize->add_setting('show_contact_section', array(
        'default'           => true,
        'sanitize_callback' => 'america_for_winlock_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_contact_section', array(
        'label'    => __('Show Contact Section', 'america-for-winlock'),
        'section'  => 'contact_section',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting('contact_title', array(
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_title', array(
        'label'    => __('Section Title', 'america-for-winlock'),
        'section'  => 'contact_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('contact_form_code', array(
        'default'           => '',
        'sanitize_callback' => 'america_for_winlock_sanitize_html',
    ));

    $wp_customize->add_control('contact_form_code', array(
        'label'       => __('Contact Form Embed Code', 'america-for-winlock'),
        'description' => __('Paste third-party form embed code here', 'america-for-winlock'),
        'section'     => 'contact_section',
        'type'        => 'textarea',
    ));
}

/**
 * Sanitize functions for customizer settings
 */
function america_for_winlock_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

function america_for_winlock_sanitize_html($html) {
    return wp_kses_post($html);
}

function america_for_winlock_sanitize_platform_issues($issues) {
    if (!is_array($issues)) {
        return array();
    }
    
    $sanitized_issues = array();
    foreach ($issues as $issue) {
        $sanitized_issues[] = array(
            'icon' => sanitize_text_field($issue['icon']),
            'title' => sanitize_text_field($issue['title']),
            'description' => sanitize_text_field($issue['description']),
        );
    }
    
    return $sanitized_issues;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function america_for_winlock_customize_preview_js() {
    wp_enqueue_script('america-for-winlock-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20230515', true);
}
add_action('customize_preview_init', 'america_for_winlock_customize_preview_js'); 